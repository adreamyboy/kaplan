<?php

require_once('modules/KReports/KReport.php');
require_once('modules/KReports/KReportChartData.php');
require_once('modules/KReports/Plugins/prototypes/kreportvisualizationplugin.php');

class kGoogleChart extends kreportvisualizationplugin {

   //2013-03-05 ... required for the rrenderer of numbers
   var $report = null;

   function __construct() {
      
   }

   public function getHeader() {

      $coreString = "<script type='text/javascript' src='https://www.google.com/jsapi?autoload={\"modules\":[{\"name\":\"visualization\",\"version\":\"1\"}]}'></script>";
      $coreString .= "<script type='text/javascript' src='custom/modules/KReports/Plugins/Visualization/googlecharts/googlechartstools" . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . ".js'></script>";

      return $coreString;
   }

   /*
    * get only the data component if the selction has changed
    */

   public function getItemUpdate($thisReport, $thisParams, $snaphotid = 0, $addReportParams = array()) {
      // 2013-05-16 set the report on the object
      $this->report = $thisReport;

      return json_encode($this->getChartData($thisReport, $thisParams, $snaphotid, $addReportParams));
   }

   /*
    * get the Chart Object to render into the visualization
    */

   public function getItem($thisDivId, $thisReport, $thisParams, $addReportParams = array()) {

      $this->report = $thisReport;

      $googleData = $this->getChartData($thisReport, $thisParams, 0, $addReportParams);
      $chartData = $this->wrapGoogleData($googleData, $thisDivId, $thisParams);

      //2013-07-27 added script ID so in the Popup this can be calles 
      $chartDataString = '<script id="' . $thisDivId . '_script" type="text/javascript">';
      $chartDataString .= $thisParams['uid'] . " = new Object({
                uid: '" . $thisParams['uid'] . "',
                chartWrapper: new google.visualization.ChartWrapper(" . json_encode($chartData) . "), 
                update: function(chartData){
                    this.chartWrapper.setDataTable(chartData);
                    this.chartWrapper.draw();
                 },
                selectHandler: function(){
                  if(K.kreports.pdrilldown){
                    var wrpperDataTable = " . $thisParams['uid'] . ".chartWrapper.getDataTable();
                    var selectedObject = " . $thisParams['uid'] . ".chartWrapper.getChart().getSelection();
                    if(selectedObject.length > 0){
                       K.kreports.googlechartstools.record.data[wrpperDataTable.getColumnId(0)]  =  wrpperDataTable.getValue(selectedObject[0].row, 0);
                          K.kreports.pdrilldown.displayContextMenu(K.kreports.googlechartstools.record, K.kreports.googlechartstools.e);
                    }
                  }
                },
                exportVisualization: function(){
                        return K.kreports.googlechartstools.exportObjectHelper(document.getElementById('" . $thisDivId . "'));
                    }
                });
                document.addEventListener('load', " . $thisParams['uid'] . ".chartWrapper.draw());";
      
      //2013-07-27 make sure we do not popup in the popup ... 
      if (empty($_REQUEST['popupreportid']))
         $chartDataString .= "google.visualization.events.addListener(" . $thisParams['uid'] . ".chartWrapper, 'select', " . $thisParams['uid'] . ".selectHandler);";
      
      $chartDataString .= '</script>';

      return $chartDataString;
   }

   public function getChartData($thisReport, $thisParams, $snaphotid = 0, $addReportParams = array()) {
      $chartDataObj = new KReportChartData();
      $fields = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES, 'UTF-8'), true);

      // check for all the fieldids we have
      $fieldMap = array();
      foreach ($fields as $thisFieldIndex => $thisFieldData) {
         $fieldMap[$thisFieldData['fieldid']] = $thisFieldIndex;
      }

      //$dimensions = array(array('fieldid' => $fields[0]['fieldid']));
      $dimensions = array();
      foreach ($thisParams['dimensions'] as $thisDimension => $thisDimensionData) {
         if ($thisDimensionData != null)
            $dimensions[] = array('fieldid' => $thisDimensionData);
      }

      //$dataseries = array($fields[1]['fieldid'], $fields[2]['fieldid']);
      $dataseries = array();
      foreach ($thisParams['dataseries'] as $thisDataSeries => $thisDataSeriesData) {
         $dataseries[$thisDataSeriesData['fieldid']] = array(
             'fieldid' => $thisDataSeriesData['fieldid'],
             'name' => $fields[$fieldMap[$thisDataSeriesData['fieldid']]]['name'],
             // 2013-03-19 handle Chart Function properly Bug #448
             // also added axis and renderer
             'axis' => $thisDataSeriesData['axis'],
             'chartfunction' => $thisDataSeriesData['chartfunction'],
             'renderer' => $thisDataSeriesData['renderer']
         );
      }

      // set Chart Params
      $chartParams = array();
      $chartParams['showEmptyValues'] = ($thisParams['options']['emptyvalues'] == 'on' ? true : false);
      if ($thisParams['context'] != '')
         $chartParams['context'] = $thisParams['context'];

      $rawData = $chartDataObj->getChartData($thisReport, $snaphotid, $chartParams, $dimensions, $dataseries, $addReportParams);

      return $this->convertRawToGoogleData($rawData['chartData'], $rawData['dimensions'], $rawData['dataseries']);
   }

   /*
    * helper function to mingle the data and prepare for a google represenatation
    */

   public function convertRawToGoogleData($chartData, $dimensions, $dataseries) {
      $googleData = array();
      $googleData['cols'] = array();
      $googleData['rows'] = array();

      foreach ($dimensions as $thisDimension) {
         $googleData['cols'][] = array('id' => $thisDimension['fieldid'], 'type' => 'string', 'label' => $thisDimension['fieldid']);
      }

      foreach ($dataseries as $thisDataseries) {
         $googleData['cols'][] = array('id' => $thisDataseries['fieldid'], 'type' => 'number', 'label' => ($thisDataseries['name'] != '' ? $thisDataseries['name'] : $thisDataseries['fieldid']));

         // 2013-03-05 check if we have a renderer
         $dataseries[$thisDataseries['fieldid']]['renderer'] = $this->report->getXtypeRenderer($this->report->fieldNameMap[$thisDataseries['fieldid']]['type'], $thisDataseries['fieldid']);
      }

      //2013-03-05 instantiate a renderer
      $kreportRenderer = new KReportRenderer();

      foreach ($chartData as $thisDimensionId => $thisData) {
         $rowArray = array();
         $rowArray[] = array('v' => $dimensions[0]['values'][$thisDimensionId]);
         foreach ($dataseries as $thisDataseries) {
            //2013-03-05 check if we should render
            if (!empty($thisDataseries['renderer']))
               $rowArray[] = array('x' => 'guidValue', 'v' => $thisData[$thisDataseries['fieldid']], 'f' => $kreportRenderer->{$thisDataseries['renderer']}($thisDataseries['fieldid'], $thisData));
            else
               $rowArray[] = array('v' => $thisData[$thisDataseries['fieldid']]);
         }
         $googleData['rows'][] = array('c' => $rowArray);
      }

      return $googleData;
   }

   /*
    * function to wrap the code with the google visualization API options etc. 
    */

   public function wrapGoogleData($googleData, $divId, $thisParams) {
      // else continue processing .. 
      $googleChart = array(
          'chartType' => ($thisParams['type'] != 'Gauge' ? $thisParams['type'] . 'Chart' : 'Gauge'),
          'containerId' => $divId,
          'options' => array(
              'legend' => none,
              'fontSize' => 11
          ),
          'dataTable' => $googleData
      );

      // handle options
      foreach ($thisParams['options'] as $thisOption => $thisOptionCount) {
         switch ($thisOption) {
            case 'is3D':
               $googleChart['options']['is3D'] = true;
               break;
            case 'legend':
               $googleChart['options']['legend'] = array(
                   'position' => 'right'
               );
               break;
            case 'stacked':
               $googleChart['options']['isStacked'] = true;
               break;
            case 'reverse':
               $googleChart['options']['reverse'] = true;
               break;
            case 'curvetypefunction':
               $googleChart['options']['curveType'] = 'function';
               break;
            case 'points':
               $googleChart['options']['pointSize'] = 2;
               break;
            case 'novlabels':
               $googleChart['options']['vAxis']['textPosition'] = 'none';
               break;
            case 'nohlabels':
               $googleChart['options']['hAxis']['textPosition'] = 'none';
               break;
            case 'logv':
               $googleChart['options']['vAxis']['logScale'] = true;
               break;
            case 'logh':
               $googleChart['options']['hAxis']['logScale'] = true;
               break;
         }
      }

      // set the title if we have one
      if ($thisParams['title'] != '') {
         $googleChart['options']['title'] = $thisParams['title'];
         $googleChart['options'][titleTextStyle] = array(
             'fontSize' => 14
         );
      }

      //set the legend
      if ($thisParams['legend'] != '' && $thisParams['legend'] != '') {
         $googleChart['options']['legend'] = array(
             'position' => $thisParams['legend']
         );
      }

      // set axis max/min values
      if ($thisParams['minmax']['vmin'] != '') {
         if ($thisParams['type'] != 'Gauge')
            $googleChart['options']['vAxis']['minValue'] = $thisParams['minmax']['vmin'];
         else
            $googleChart['options']['min'] = $thisParams['minmax']['vmin'];
      }
      if ($thisParams['minmax']['vmax'] != '') {
         if ($thisParams['type'] != 'Gauge')
            $googleChart['options']['vAxis']['maxValue'] = $thisParams['minmax']['vmax'];
         else
            $googleChart['options']['max'] = $thisParams['minmax']['vmax'];
      }
      if ($thisParams['minmax']['hmin'] != '')
         $googleChart['options']['hAxis']['minValue'] = $thisParams['minmax']['hmin'];
      if ($thisParams['minmax']['hmax'] != '')
         $googleChart['options']['hAxis']['maxValue'] = $thisParams['minmax']['hmax'];

      // specific for rht Gauage Charts
      if ($thisParams['type'] == 'Gauge') {
         if ($thisParams['minmax']['rto'] != '')
            $googleChart['options']['redTo'] = $thisParams['minmax']['rto'];
         if ($thisParams['minmax']['yto'] != '')
            $googleChart['options']['yellowTo'] = $thisParams['minmax']['yto'];
         if ($thisParams['minmax']['gto'] != '')
            $googleChart['options']['greenTo'] = $thisParams['minmax']['gto'];
         if ($thisParams['minmax']['rfrom'] != '')
            $googleChart['options']['redFrom'] = $thisParams['minmax']['rfrom'];
         if ($thisParams['minmax']['yfrom'] != '')
            $googleChart['options']['yellowFrom'] = $thisParams['minmax']['yfrom'];
         if ($thisParams['minmax']['gfrom'] != '')
            $googleChart['options']['greenFrom'] = $thisParams['minmax']['gfrom'];
      }

      // specific for the Combo Chart
      if ($thisParams['type'] == 'Combo') {
         $googleChart['options']['seriesType'] = 'bars';

         // loop over the series settings
         foreach ($thisParams['dataseries'] as $seriesId => $seriesData) {

            //if ($seriesData['renderer'] != '')
            $googleChart['options']['series'][$seriesId] = array(
                'type' => (empty($seriesData['renderer']) ? 'bars' : $seriesData['renderer']),
                'targetAxisIndex' => ( $seriesData['axis'] == 'S' ? 1 : 0)
            );
         }
      }

      // handle the colors
      include('modules/KReports/config/KReportColors.php');
      if ($thisParams['colors'] != '' && isset($kreportColors[$thisParams['colors']])) {
         $googleChart['options']['colors'] = $kreportColors[$thisParams['colors']]['colors'];
      }

      // see if we have a special color for a series 
      foreach ($thisParams['dataseries'] as $seriesId => $seriesData) {
         if ($seriesData['color'] != '')
            $googleChart['options']['colors'][$seriesId] = '#' . $seriesData['color'];
      }

      // send back the Chart as Array
      return $googleChart;
   }

   /*
    * google chart provides proper svg code .. so nothing to do but to base64 decode
    */

   function parseExportData($exportedData) {
      return array(
          'type' => 'SVG',
          'data' => urldecode(base64_decode($exportedData))
      );
   }

}

?>
