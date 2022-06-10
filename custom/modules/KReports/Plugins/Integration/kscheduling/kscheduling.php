<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/KReports/Plugins/prototypes/kreportintegrationplugin.php');


class kscheduling extends kreportintegrationplugin {

    public function __construct() {
        $this->pluginName = 'Schedule Report';
    }
    
    public function checkAccess($thisReport){
        return true;
    }

    public function getMenuItem() {
        return '';
    }

}

?>
