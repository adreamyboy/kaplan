<?php

require_once('modules/KReports/KReport.php');
require_once('custom/modules/KReports/Plugins/Integration/ktargetlistexport/ktargetlisthandler.php');

class pluginktargetlistexportcontroller {

    function action_export_to_targetlist() {
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);

        // check if we have set dynamic Options
        if (isset($_REQUEST['whereConditions']))
            $thisReport->whereOverride = json_decode_kinamu(html_entity_decode($_REQUEST['whereConditions']));

        // initiate the handler
        // $thisTargetListHandler = new KReportTargetListHandler($thisReport);

        $integrationsettings = json_decode(html_entity_decode($thisReport->integration_params));

        // initiate the handler
        $thisTargetListHandler = new KReportTargetListHandler($thisReport, ($integrationsettings->ktargetlistexport->targetlist_create_direct == true ? false : true));

        if ($_REQUEST['targetlist_action'] == 'new') {
            $thisTargetListHandler->createTargeList($_REQUEST['targetlist_name'], $_REQUEST['campaign_id'], $integrationsettings->ktargetlistexport->targetlist_create_direct);
        } else {
            $thisTargetListHandler->handle_update_request($_REQUEST['taregtlist_update_action'], $_REQUEST['targetlist_id'], $integrationsettings->ktargetlistexport->targetlist_create_direct);
        }
        return true;
    }

    function action_get_targetlists() {
        global $db;

        $returnArray = array();

        $targetListObj = $db->query("SELECT id, name FROM prospect_lists WHERE deleted='0'");
        while ($prospect_list_record = $db->fetchByAssoc($targetListObj)) {
            $returnArray[] = array(
                'id' => $prospect_list_record['id'],
                'name' => $prospect_list_record['name']
            );
        }

        echo json_encode($returnArray);
    }

    function action_get_campaigns() {
        global $db;

        $returnArray = array();
        $returnArray[] = array(
            'id' => '',
            'name' => '-'
        );

        $campaignsObj = $db->query("SELECT id, name FROM campaigns WHERE deleted='0'");
        while ($campaign_record = $db->fetchByAssoc($campaignsObj)) {
            $returnArray[] = array(
                'id' => $campaign_record['id'],
                'name' => $campaign_record['name']
            );
        }

        echo json_encode($returnArray);
    }

}

?>
