<?php 
 //WARNING: The contents of this file are auto-generated



// Tawfeeq Jaafar - suggested in: https://community.sugarcrm.com/thread/21468

array_push($job_strings, 'runScheduledKReports');

function runScheduledKReports() {
    require_once('custom/modules/KReports/Plugins/Integration/kscheduling/kschedulingcronhandler.php');
    $kreportscheduler = new kschedulingcronhandler();
    $kreportscheduler->initializeScheduledReports();
    $kreportscheduler->runScheduledReports();
    return true;  // Tawfeeq Jaafar: "return" may need to be disabled.
}


?>