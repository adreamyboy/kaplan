<?php

require_once('modules/KReports/KReport.php');

// the export helpers
if (file_exists('custom/modules/KReports//Plugins/Integration/kexcelexport/kexcelexport.php'))
    require_once('custom/modules/KReports//Plugins/Integration/kexcelexport/kexcelexport.php');

// the export helpers
if (file_exists('custom/modules/KReports//Plugins/Integration/kpdfexport/kpdfexport.php'))
    require_once('custom/modules/KReports//Plugins/Integration/kpdfexport/kpdfexport.php');


// include the mailer
require_once('include/SugarPHPMailer.php');

// for the cron handling
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/FieldInterface.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/AbstractField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/DayOfMonthField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/DayOfWeekField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/HoursField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/MinutesField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/MonthField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/YearField.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/FieldFactory.php');
require_once ('custom/modules/KReports/Plugins/Integration/kscheduling/cron/CronExpression.php');

class kschedulingcronhandler {

    // queries all reports with schedules and sees if a planned entry is in the table ... 
    // if not creates an entry for the scheduler
    // or delete an entry
    public function initializeScheduledReports() {
        global $db;
        
        // get all new 
        $scheduledReportsObj = $db->query("SELECT * FROM kreports WHERE integration_params like '%\"kscheduling\":\"1\"%' AND deleted = 0");
        while ($thisReport = $db->fetchByAssoc($scheduledReportsObj)) {
            $integrationparams = json_decode(html_entity_decode($thisReport['integration_params'], ENT_QUOTES), true);
            foreach ($integrationparams['kscheduling'] as $schedulerIndex => $schedulerData) {
                if ($db->getRowCount($db->query("SELECT * FROM kreportschedulers WHERE report_id='" . $thisReport['id'] . "' AND job_id = '" . $schedulerData['schedulerid'] . "' AND status='P'")) == 0) {
                    $this->setNextSchedulerDate($thisReport['id'], $schedulerData);
                }
            }
        }
        
        // remove all that have been disabled but are still scheduled .. reduces load
        $scheduledReportsObj = $db->query("SELECT kreportschedulers.* FROM kreports INNER JOIN kreportschedulers ON kreports.id = kreportschedulers.report_id WHERE integration_params like '%\"kscheduling\":\"0\"%' AND kreportschedulers.status='P' AND deleted = 0");
        while ($thisReportSchedule = $db->fetchByAssoc($scheduledReportsObj)) {
            $db->query("UPDATE kreportschedulers SET status='X' WHERE id='" . $thisReportSchedule['id'] . "'");
        }

    }

    // runs all currently overdue reports
    public function runScheduledReports() {
        global $db;

        $schedulers = array();

        $thisReport = new KReport();

        //2013-01-12 respect current system settings re timezone
        //$now = new DateTime('now', new DateTimeZone('UTC'));
        $now = new DateTime('now', new DateTimeZone(date_default_timezone_get()));


        // get all overdue entries
        $scheduledJobjsObj = $db->query("SELECT * FROM kreportschedulers WHERE status = 'P' AND timestamp <= '" . $now->format('Y-m-d H:i:s') . "' ORDER BY report_id");
        while ($thisScheduledJob = $db->fetchByAssoc($scheduledJobjsObj)) {

            // get the report if the id has changed
            if ($thisReport->id != $thisScheduledJob['report_id']) {
                $thisReport->retrieve($thisScheduledJob['report_id']);

                // get the scheduler lines
                $integrationparams = json_decode(html_entity_decode($thisReport->integration_params, ENT_QUOTES), true);
                // check if the scheduler is active
                if ($integrationparams['activePlugins']['kscheduling'] == '1')
                {
                    foreach ($integrationparams['kscheduling'] as $schedulerIndex => $schedulerData) {
                        $schedulers[$schedulerData['schedulerid']] = $schedulerData;
                    }
                }
            }

            if (!empty($schedulers[$thisScheduledJob['job_id']]) && $schedulers[$thisScheduledJob['job_id']]['scheduleraction'] != '' && method_exists($this, $schedulers[$thisScheduledJob['job_id']]['scheduleraction'])) {

                // execute
                // $this->sendMail('info@kreporter.org', $this->{$thisScheduledJob['scheduleraction']}());
                // $this->{$thisScheduledJob['scheduleraction']}($thisReport);
                $this->{$schedulers[$thisScheduledJob['job_id']]['scheduleraction']}($thisScheduledJob, $schedulers[$thisScheduledJob['job_id']]);
                $this->setSchedulerStatus($thisScheduledJob['id'], 'X');
                
                // 2013-06-25 do not set the scheduler dat .. done anyway automatically. 
                //$this->setNextSchedulerDate($thisScheduledJob['report_id'], $schedulers[$thisScheduledJob['job_id']]);
            }
            else
                $this->setSchedulerStatus($thisScheduledJob['id'], 'D');
        }
    }

    private function CSV($jobData, $schedulerData) {
        $thisReport = new KReport();
        $thisReport->retrieve($jobData['report_id']);
        if (!empty($schedulerData['schedulersendto']))
            $this->sendMail($jobData['report_id'], $schedulerData['schedulersendto'], $thisReport->createCSV(), 'csv');
    }

    private function EXCEL($jobData, $schedulerData) {
        $exporter = new kexcelexport();
        if (!empty($schedulerData['schedulersendto']))
            $this->sendMail($jobData['report_id'], $schedulerData['schedulersendto'], $exporter->exportToExcel($jobData['report_id']), 'xlsx');
    }

    private function PDF($jobData, $schedulerData) {
        $exporter = new kpdfexport();
        $thisReport = new KReport();
        $thisReport->retrieve($jobData['report_id']);
        if (!empty($schedulerData['schedulersendto']))
            $this->sendMail($jobData['report_id'], $schedulerData['schedulersendto'], $exporter->exportToPDF($thisReport), 'pdf');
    }

    private function SNAPSHOT($jobData, $schedulerData) {
        $thisReport = new KReport();
        $thisReport->retrieve($jobData['report_id']);
        $thisReport->takeSnapshot();
    }

    private function TARGETLIST($jobData, $schedulerData) {
        if (file_exists('custom/modules/KReports//Plugins/Integration/ktargetlistexport/ktargetlisthandler.php')) {
            require_once('custom/modules/KReports//Plugins/Integration/ktargetlistexport/ktargetlisthandler.php');

            $thisReport = new KReport();
            $thisReport->retrieve($jobData['report_id']);

            $integrationsettings = json_decode(html_entity_decode($thisReport->integration_params));

            if ($integrationsettings->activePlugins->ktargetlistexport == 1) {
                // initiate the handler
                $thisTargetListHandler = new KReportTargetListHandler($thisReport, ($integrationsettings->ktargetlistexport->targetlist_create_direct == true ? false : true));

                $thisTargetListHandler->handle_update_request($integrationsettings->ktargetlistexport->targetlist_update_action, $integrationsettings->ktargetlistexport->targetlist_id, $integrationsettings->ktargetlistexport->targetlist_create_direct);
            }
        }
    }

    private function sendMail($reportId, $receipients, $attachement, $attachementType) {

       global $sugar_config;
       
        // load the report and build a display_link
        $thisReport = new KReport();
        $thisReport->retrieve($reportId);
        $thisReport->displaylink = $GLOBALS['sugar_config']['site_url'] . '/index.php?module=KReports&action=DetailView&record=' . $reportId;

        // initialize mailer
        $email = new SugarPHPMailer ();
        $email->setMailer();

        // handle email addresses
        if (strpos($receipients, ',') !== false)
            $addressArray = explode(',', $receipients);
        elseif (strpos($receipients, ';') !== false)
            $addressArray = explode(';', $receipients);
        else
            $addressArray [] = $receipients;

        // add all addresses 
        foreach ($addressArray as $thisEmailAddress) {
            // trim whitespaces
            $thisEmailAddress = trim($thisEmailAddress);
            // add the address
            $email->AddAddress($thisEmailAddress);
        }

        // get template or text settings if there are any
        $kreportEmailTemplate = $sugar_config['KReports']['emailTemplate'];
        if ($kreportEmailTemplate != '') {
            $template = new EmailTemplate ();
            $template->retrieve($kreportEmailTemplate);
            $email->Subject = $template->subject; //$emailTemplateDetail['subject'];
            $email->Body = '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>' . html_entity_decode($template->body_html);
            $email->Body = str_replace(array('%7B', '%7D', '%7B&', '%7D&'), array('{', '}', '{', '}'), $email->Body);

            $email->IsHTML(true);
        } else {
            $email->Subject = $kreportEmailSubject != '' ? $kreportEmailSubject : 'K Reports Scheduler';
            $email->Body = $kreportEmailBody != '' ? $kreportEmailBody : $thisReport->name;
        }

        // replace all variables in teh Subject
        preg_match_all('/\{(kreport_[\s\S]*?)\}/', $email->Subject, $kreportMatches);
        foreach ($kreportMatches[1] as $matchId => $thisMatch) {
            $matchArray = explode('_', $thisMatch, 2);
            if (property_exists($thisReport, $matchArray[1]))
                $email->Subject = str_replace($kreportMatches[0][$matchId], $thisReport->{$matchArray[1]}, $email->Subject);
        }

        // replace all variables in the Body
        preg_match_all('/\{(kreport_[\s\S]*?)\}/', $email->Body, $kreportMatches);
        foreach ($kreportMatches[1] as $matchId => $thisMatch) {
            $matchArray = explode('_', $thisMatch, 2);
            if (property_exists($thisReport, $matchArray[1]))
                $email->Body = str_replace($kreportMatches[0][$matchId], $thisReport->{$matchArray[1]}, $email->Body);
        }

        //get the base email settings for the system
        $emailSettingsRes = $GLOBALS ['db']->query("SELECT * FROM config WHERE category='notify' AND name like 'from%'");
        while ($emailDetails = $GLOBALS ['db']->fetchByAssoc($emailSettingsRes)) {
            switch ($emailDetails ['name']) {
                case 'fromname' :
                    $email->FromName = $emailDetails ['value'];
                    break;
                case 'fromaddress' :
                    $email->From = $emailDetails ['value'];
                    break;
            }
        }

        // add the senders
        $email->Sender = $email->From;
        $email->AddReplyTo($email->From, $email->FromName);

        // add the Attachement
        $email->AddStringAttachment($attachement, 'kreport.' . $attachementType);

        // send the email 
        $email->Send();
    }

    private function setSchedulerStatus($schedulerId, $status) {
        global $db;
        $db->query("UPDATE kreportschedulers SET 
                        status = '$status'
                    WHERE id='$schedulerId'");
    }

    private function setNextSchedulerDate($reportId, $schedulerData) {
        global $db;
        $nextDate = $this->parseRunData($schedulerData['min'] . ' ' . $schedulerData['hrs'] . ' ' . $schedulerData['day'] . ' ' . $schedulerData['month'] . ' ' . $schedulerData['weekday']);
        $db->query("INSERT INTO kreportschedulers SET 
                        id = '" . create_guid() . "', 
                        report_id  = '" . $reportId . "',
                        job_id = '" . $schedulerData['schedulerid'] . "',
                        timestamp = '" . $nextDate . "',
                        status = 'P'");
    }

    public function parseRunData($cronExpression = '* * * * *') {
        //2013-01-12 .. make sure we syncronize TimeZones
        $timeZone = new DateTimeZone(date_default_timezone_get());
        $now = new DateTime('now', $timeZone);
        $thisCronExpression = CronExpression::factory($cronExpression);
        $nextRunDate = $thisCronExpression->getNextRunDate($now, 0, true)->format('Y-m-d H:i:s');

        return $nextRunDate;
    }

}

?>
