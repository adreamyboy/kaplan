<?php

require_once('custom/modules/KReports/Plugins/Integration/kexcelexport/kexcelexport.php');

class pluginkexcelexportcontroller {

   var $currencySymbols = null;

   public function action_export() {
      global $sugar_config;

      // 2013-05-29 add config option for memory limit see if we should set the runtime and memory limit
      if(!empty($sugar_config['KReports']['excelmemorylimit'])) ini_set('memory_limit', $sugar_config['KReports']['excelmemorylimit']);
      if(!empty($sugar_config['KReports']['excelmaxruntime'])) ini_set('max_execution_time', $sugar_config['KReports']['excelmaxruntime']);
      
      $exporter = new kexcelexport();

      // see if we have override layout from the grid
      $dynamicolsOverride = '';
      if (isset($_REQUEST['dynamicols']) && $_REQUEST['dynamicols'] != '')
         $dynamicolsOverride = html_entity_decode($_REQUEST['dynamicols'], ENT_QUOTES, 'UTF-8');

      //2013-04-16 support xls export Bug #467
      if ($sugar_config['KReports']['excelversion'] == '2003')
         $filename = str_replace(' ', '_', $thisReport->name) . '_' . date('Y-m-d_H-i-s') . ".xls";
      else
         $filename = str_replace(' ', '_', $thisReport->name) . '_' . date('Y-m-d_H-i-s') . ".xlsx";

      header('Content-type: application/ms-excel');
      header('Content-Disposition: attachment; filename=' . $filename);
      header('Content-Transfer-Encoding: binary');

      //2013-04-16 support xls export Bug #467
      if ($sugar_config['KReports']['excelversion'] == '2003')
         echo $exporter->exportToExcel($_REQUEST['record'], $dynamicolsOverride, 'xls');
      else
         echo $exporter->exportToExcel($_REQUEST['record'], $dynamicolsOverride);
   }

}

?>
