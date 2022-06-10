<?php

if (!defined('sugarEntry') || !sugarEntry)
   die('Not A Valid Entry Point');

require_once('modules/KReports/Plugins/prototypes/kreportintegrationplugin.php');

class kpdrilldown extends kreportintegrationplugin {

   var $thisReport;

   public function __construct() {
      $this->pluginName = 'Presentation Drilldown';
   }

   public function checkAccess($thisReport) {
      $this->thisReport = $thisReport;
      return true;
   }

   public function getMenuItem() {
      $drillDownArray = array(); 
      $integrationParams = json_decode(html_entity_decode($this->thisReport->integration_params));
      foreach($integrationParams->kpdrilldown as $thisDrilldown){
         $drillDownArray[] = array(
             'id' => $thisDrilldown->linkid, 
             'reportid' => $thisDrilldown->reportid, 
             'text' => (!empty($thisDrilldown->displayname) ? $thisDrilldown->displayname : $thisDrilldown->reportname), 
             'linktype' => $thisDrilldown->linktype,
             'icon' => 'modules/KReports/images/report'.strtolower($thisDrilldown->linktype).'.png'
         );
      }
      return array(
          'jsCode' => "K.kreports.pdrilldownitems = " . json_encode($drillDownArray), 
          'jsFile' => 'custom/modules/KReports/Plugins/Integration/kpdrilldown/kpdrilldownview' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
      );
   }
}

?>