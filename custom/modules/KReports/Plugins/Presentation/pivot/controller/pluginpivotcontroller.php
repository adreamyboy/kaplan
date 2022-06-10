<?php

require_once('modules/KReports/KReport.php');
require_once('custom/modules/KReports/Plugins/Presentation/pivot/kreportpivot.php');

class pluginpivotcontroller {
    public function action_load_report($thisController){
               
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);
        
        // set the override Where if set in the request
        if (isset($_REQUEST['whereConditions'])) {
            $thisReport->whereOverride = json_decode_kinamu(html_entity_decode($_REQUEST['whereConditions']));
        }
        
        $thisPivot = new kreportpresentationpivot();
        
        echo json_encode($thisPivot->generatePivot($thisReport, isset($_REQUEST['snapshotid']) ? $_REQUEST['snapshotid'] : '0', $_REQUEST['panelwidth']));
    }
    
    
    
    
    
}
?>
