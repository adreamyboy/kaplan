<?php

class pluginkschedulingcontroller {

    public function __construct(){
        
    }
    
   public function action_run_scheduled_reports(){
        require_once('custom/modules/KReports/Plugins/Integration/kscheduling/kschedulingcronhandler.php');
        $kreportscheduler = new kschedulingcronhandler();
        $kreportscheduler->initializeScheduledReports();
        $kreportscheduler->runScheduledReports();
    }
    
}

?>
