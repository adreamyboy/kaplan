<?php

require_once('modules/KReports/KReport.php');
require_once('custom/modules/KReports/Plugins/Integration/kpdfexport/kpdfexport.php');

class pluginkpdfexportcontroller {

   var $currencySymbols = null;

   public function action_export() {
      global $sugar_config; 
      
      ob_start();
      $exporter = new kpdfexport();

      // 2013-05-29 add config option for memory limit see if we should set the runtime and memory limit
      if(!empty($sugar_config['KReports']['pdfmemorylimit'])) ini_set('memory_limit', $sugar_config['KReports']['pdfmemorylimit']);
      if(!empty($sugar_config['KReports']['pdfmaxruntime'])) ini_set('max_execution_time', $sugar_config['KReports']['pdfmaxruntime']);
      
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);

      // 2013-03-13 check for custom filtering 
      if (isset($_REQUEST['dynamicoptions'])) {
         $_REQUEST['whereConditions'] = $_REQUEST['dynamicoptions'];
         $thisReport->whereOverride = json_decode(html_entity_decode($_REQUEST['dynamicoptions']), true);
      }

      if (isset($_REQUEST['dynamicols']) && $_REQUEST['dynamicols'] != '')
         $dynamicolsOverride = html_entity_decode($_REQUEST['dynamicols'], ENT_QUOTES, 'UTF-8');

      ob_get_clean();
      $exporter->exportToPDF($thisReport, $dynamicolsOverride, 'D');
   }

   public function action_getPDFLayouts() {
      require('custom/modules/KReports/Plugins/Integration/kpdfexport/config/KReportPDF.php');
      $layoutArray = array();
      foreach ($kreportPDFconfig as $thisLayout => $thisLayoutData) {
         $layoutArray[] = array(
             'fieldvalueid' => $thisLayout,
             'fieldname' => (isset($thisLayoutData['displayName']) && $thisLayoutData['displayName'] != '' ? $thisLayoutData['displayName'] : $thisLayout)
         );
      }

      echo json_encode($layoutArray);
   }

}

?>
