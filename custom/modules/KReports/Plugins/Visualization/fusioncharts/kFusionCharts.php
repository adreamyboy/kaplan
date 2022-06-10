<?php

// 2013-03-18 added include fro Formatting Bug #459 
require_once('modules/KReports/KReport.php');
require_once('modules/KReports/KReportChartData.php');
require_once('modules/KReports/Plugins/prototypes/kreportvisualizationplugin.php');

class kFusionChart extends kreportvisualizationplugin {

   //2013-03-18 ... required for the rrenderer of numbers  Bug #459
   var $report = null;
   
   function __construct() {
      
   }

   public function getHeader() {
      $coreString = "<script type='text/javascript' src='custom/k/FusionCharts/FCXT/FusionCharts.js'></script>";
      $coreString .= "<script type='text/javascript' src='custom/modules/KReports/Plugins/Visualization/fusioncharts/fusionchartstools" . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . ".js'></script>";
      return $coreString;
   }

   /*
    * get only the data component if the selction has changed
    */

   public function getItemUpdate($thisReport, $thisParams, $snaphotid = 0, $addReportParams = array()) {
      //2013-03-18 ... required for the rrenderer of numbers  Bug #459
      $this->report = $thisReport;
      
      return json_encode($this->createFusionDataSource($this->getChartData($thisReport, $thisParams, $snaphotid, $addReportParams), $thisParams));
   }

   /*
    * get the Chart Object to render into the visualization
    */

   public function getItem($thisDivId, $thisReport, $thisParams, $addReportParams = array()) {
      //2013-03-18 ... required for the rrenderer of numbers  Bug #459
      $this->report = $thisReport;
      
      $chartDataString = '<script type="text/javascript">';
      $chartDataString .= $thisParams['uid'] . " = new Object({
                uid: '" . $thisParams['uid'] . "',
                chartWrapper: new FusionCharts(" . $this->wrapFusionData($this->getChartData($thisReport, $thisParams, 0, $addReportParams), $thisDivId, $thisParams) . "), 
                update: function(chartData){
                    this.chartWrapper.setJSONData(chartData);
                },
                exportVisualization: function(){
                        //return K.kreports.encode64(this.chartWrapper.getSVGString());
                         return K.kreports.fusionchartstools.exportObjectHelper(document.getElementById('" . $thisDivId . "'));
                    }
                });
                document.addEventListener('load', " . $thisParams['uid'] . ".chartWrapper.render());";
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
             'axis' => $thisDataSeriesData['axis'],
             // 2013-03-19 handle Chart Function properly Bug #448
             'chartfunction' => $thisDataSeriesData['chartfunction'],
             'renderer' => $thisDataSeriesData['renderer']
         );
      }

      // 2013-03-18 Context was missing Bug #445
      $rawData = $chartDataObj->getChartData($thisReport, $snaphotid, array('context' => $thisParams['context'], 'showEmptyValues' => ($thisParams['options']['emptyvalues'] == 'on' ? true : false)), $dimensions, $dataseries, $addReportParams);

      return $this->convertRawToFusionData($rawData['chartData'], $rawData['dimensions'], $rawData['dataseries']);
   }

   /*
    * helper function to mingle the data and prepare for a FusionCharts represenatation
    */

   public function convertRawToFusionData($chartData, $dimensions, $dataseries) {
      $fusionData = array();

      //2013-03-05 instantiate a renderer  Bug #459
      $kreportRenderer = new KReportRenderer();
      foreach ($dataseries as $thisDataseries) {
         $dataseries[$thisDataseries['fieldid']]['renderer'] = $this->report->getXtypeRenderer($this->report->fieldNameMap[$thisDataseries['fieldid']]['type'], $thisDataseries['fieldid']);
      }

      switch (count($dataseries)) {
         // one series only
         case 1:
            foreach ($dataseries as $thisSeriesID => $thisSeriesData) {
               foreach ($chartData as $thisDimensionId => $thisData) {
                  //2013-03-05render Data Bug #459
                  if (!empty($thisSeriesData['renderer']))
                     $fusionData['data'][] = array(
                         'label' => $dimensions[0]['values'][$thisDimensionId],
                         'value' => $thisData[$thisSeriesID],
                         'displayValue' => $kreportRenderer->{$thisSeriesData['renderer']}($thisSeriesID, $thisData)
                     );
                  else
                     $fusionData['data'][] = array(
                         'label' => $dimensions[0]['values'][$thisDimensionId],
                         'value' => $thisData[$thisSeriesID]
                     );
               }
               return $fusionData;
            }
            break;
         default:
            $dataSetArray = array();
            foreach ($chartData as $thisDimensionId => $thisData) {
               $fusionData['categories']['category'][] = array(
                   'label' => $dimensions[0]['values'][$thisDimensionId]
               );
               foreach ($dataseries as $thisSeriesID => $thisSeriesData) {
                  //2013-03-05render Data Bug #459
                  if (!empty($thisSeriesData['renderer']))
                     $dataSetArray[$thisSeriesID][] = array(
                         'value' => $thisData[$thisSeriesID],
                         'displayValue' => $kreportRenderer->{$thisSeriesData['renderer']}($thisSeriesID, $thisData)
                     );
                  else
                     $dataSetArray[$thisSeriesID][] = array(
                         'value' => $thisData[$thisSeriesID],
                     );
               }
            }

            foreach ($dataseries as $thisSeriesID => $thisSeriesData) {
               $thisDataset = array(
                   'seriesname' => ($thisSeriesData['name'] != '' ? $thisSeriesData['name'] : $thisSeriesData['fieldid']),
                   'data' => $dataSetArray[$thisSeriesID]
               );

               if ($thisSeriesData['axis'] != '')
                  $thisDataset['parentYAxis'] = $thisSeriesData['axis'];

               if ($thisSeriesData['renderer'] != '')
                  $thisDataset['renderAs'] = $thisSeriesData['renderer'];

               $fusionData['dataset'][] = $thisDataset;
            }
            return $fusionData;
            break;
      }

      // if all goes wrong we end up here ... 
      return $fusionData;
   }

   /*
    * function to wrap the code with the google visualization API options etc. 
    */

   public function wrapFusionData($fusionData, $divId, $thisParams) {
      $fusionChart = array(
          'type' => $thisParams['type'],
          'width' => '100%',
          'height' => '100%',
          'renderAt' => $divId,
          'debugMode' => true,
          'dataFormat' => 'json',
          'dataSource' => $this->createFusionDataSource($fusionData, $thisParams)
      );

      return json_encode($fusionChart);
   }

   public function createFusionDataSource($fusionData, $thisParams) {
      $dataSource = array(
          'chart' => array(
              'showLegend' => 0,
              'formatNumberScale' => 0,
              'plotFillRatio' => 100
          )
      );

      foreach ($fusionData as $item => $data) {
         $dataSource[$item] = $data;
      }

      // handle the colors
      include('modules/KReports/config/KReportColors.php');
      if ($thisParams['colors'] != '' && isset($kreportColors[$thisParams['colors']])) {
         $dataSource['chart']['paletteColors'] = str_replace('#', '', implode(',', $kreportColors[$thisParams['colors']]['colors']));
      }

      // set the title if we have one
      if ($thisParams['title'] != '') {
         $dataSource['chart']['caption'] = $thisParams['title'];
      }

      // process the options
      foreach ($thisParams['options'] as $thisOption => $thisOptionCount) {
         switch ($thisOption) {
            case 'legend':
               $dataSource['chart']['showLegend'] = 1;
               break;
            case 'useRoundEdges':
               $dataSource['chart']['useRoundEdges'] = 1;
               break;
            case 'hideLabels':
               $dataSource['chart']['showLabels'] = 0;
               break;
            case 'hideValues':
               $dataSource['chart']['showValues'] = 0;
               break;
            case 'formatNumberScale':
               $dataSource['chart']['formatNumberScale'] = 1;
               break;
            case 'rotateValues':
               $dataSource['chart']['rotateValues'] = 1;
               break;
            case 'placeValuesInside':
               $dataSource['chart']['placeValuesInside'] = 1;
               break;
            case 'showShadow':
               $dataSource['chart']['showShadow'] = 1;
               break;
         }
      }

      // $dataSource['chart']['exportenabled'] = 1;
      // Primary Axis
      if ($thisParams['minmax']['vmin'] != '') {
         $dataSource['chart']['yAxisMinValue'] = $thisParams['minmax']['vmin'];
         $dataSource['chart']['PYAxisMinValue'] = $thisParams['minmax']['vmin'];
      }
      if ($thisParams['minmax']['vmax'] != '') {
         $dataSource['chart']['yAxisMaxValue'] = $thisParams['minmax']['vmax'];
         $dataSource['chart']['PYAxisMaxValue'] = $thisParams['minmax']['vmin'];
      }

      //Secondary Axis
      if ($thisParams['minmax']['hmin'] != '')
         $dataSource['chart']['SYAxisMinValue'] = $thisParams['minmax']['hmin'];
      if ($thisParams['minmax']['hmax'] != '')
         $dataSource['chart']['SYAxisMaxValue'] = $thisParams['minmax']['hmax'];

      // misc parameters
      $dataSource['chart']['showBorder'] = 0;
      $dataSource['chart']['bgAlpha'] = '0';

      return $dataSource;
   }

   /*
    * need to rework due to gradients 
    */

   function parseExportData($exportedData) {

      /*
        $im = new Imagick();
        $im->setBackgroundColor(new ImagickPixel('transparent'));
        $svg = str_replace('http://127.0.0.1/ce65/index.php?module=KReports&amp;action=DetailView&amp;record=31c34101-b8f3-d87b-6148-50b24bd1016a', '', urldecode(base64_decode($exportedData)));
        $im->setresolution(300, 300);
        $im->readImageBlob(urldecode(base64_decode($exportedData)));
        $im->setImageFormat("png32");
       */

      return array(
          'type' => 'SVG',
          'data' => urldecode(base64_decode($exportedData))
      );
   }

}

?>
