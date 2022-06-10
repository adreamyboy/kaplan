<?php

/* * *******************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact us at info@kreporter.org
 * ****************************************************************************** */
if (!defined('sugarEntry') || !sugarEntry)
   die('Not A Valid Entry Point');

require_once('modules/KReports/Plugins/prototypes/kreportpresentationplugin.php');

class kreportpresentationgrouped extends kreportpresentationplugin {

   public function display($thisReport) {

      if (empty($thisReport->kQueryArray))
         $thisReport->get_report_main_sql_query(true, '', '');

      // build the Field List for the JSON Reader
      $arrayList = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES), true);
      $fieldArray = '[';

      foreach ($arrayList as $thisList) {
         if ($fieldArray != '[')
            $fieldArray .= ',';

         // switch the type
         $fieldType = 'auto';
         switch($thisReport->kQueryArray->fieldNameMap[$thisList['fieldid']]['type']){
            case 'date': 
               $fieldType = 'date';
               $sortType = 'asDate';
               break; 
            case 'currency':
               $fieldType = 'float';
               break; 
         }

         $fieldArray .= '{name : \'' . trim($thisList['fieldid'], ':') . '\', type : \'' . $fieldType . '\'}';

         // see if we nee to add a field for the currency_id to the store 2010-12-25 
         // change to check if set to avoid php notice
         if ((isset($thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type']) && $thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type'] == 'currency') || (isset($thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype']) && $thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype'] == 'currency'))
            $fieldArray .= ',{name : \'' . trim($thisList['fieldid'], ':') . '_curid\'}';
      }

      //$fieldArray .= trim($fieldArray, ',');
      $fieldArray .= "]";
      // $fieldArray = htmlentities($fieldArray, ENT_QUOTES, 'UTF-8');
      $viewJS .= '<script type="text/javascript">FieldsArray = ' . htmlentities($fieldArray) . ';</script>';

      // build the Field List for the JSON Reader
      // $arrayList = json_decode(html_entity_decode($thisReport->listfields), true);
      // add List View Options also for the grouped view
      // $listTypeProperties = $this->json_decode_kinamu( html_entity_decode_utf8($this->bean->listtypeproperties));
      $columnArray = array();
      $hasSummary = false;
      foreach ($arrayList as $thisList) {
         $thisFieldType = ($thisList['overridetype'] == '' ? $thisReport->getFieldTypeById($thisList['fieldid']) : $thisList['overridetype']);

         $thisColumn = array(
             //2013-03-05 html entities to support special chars in Text
             //2013-04-19 added UTF-8 support
             'text' => '\'' . htmlentities($thisList['name'], ENT_QUOTES, 'UTF-8') . '\'',
             'width' => ((isset($thisList['width']) && $thisList['width'] != '' && $thisList['width'] != '0') ? $thisList['width'] : '150'),
             //2013-03-01 changed to recognize the sortable flag
             'sortable' => ($thisList['sort'] != '' && $thisList['sort'] != '-' ? 'true' : 'false'),
             'dataIndex' => '\'' . trim($thisList['fieldid'], ':') . '\'',
             'hidden' => ($thisList['display'] != 'yes' ? true : false),
             'align' => '\'' . $thisReport->getXtypeAlignment($thisFieldType, $thisList['fieldid']) . '\''
         );

         // see if we have renderer we need to process
         $renderer = $thisReport->getXtypeRenderer($thisFieldType, $thisList['fieldid']);
         if ($renderer != '')
            $thisColumn['renderer'] = "'" . $renderer . "'";
         else
            $thisColumn['renderer'] = "'fieldRenderer'";

         // see if we have alignment we need to process
         $alignment = $thisReport->getXtypeAlignment($thisReport->getFieldTypeById($thisList['fieldid']), $thisList['fieldid']);
         if ($alignment != '')
            $thisColumn['align'] = "'" . $alignment . "'";

         // see if the summary is set
         if ($thisList['summaryfunction'] != '') {
            $thisColumn['summaryType'] = 'function(records){return K.kreports.sumplugin(records,\'' . trim($thisList['fieldid']) . '\', \'' . $thisList['summaryfunction'] . '\');}';

            // also set the renderer to the same as the column
            if ($renderer != '')
               $thisColumn['summaryRenderer'] = 'Ext.util.Format.' . $renderer;
            else
               $thisColumn['summaryRenderer'] = 'Ext.util.Format.fieldRenderer';

            $hasSummary = true;
         }

         $columnArray[] = $thisColumn;
      }

      $viewJS .= '<script type="text/javascript">ColumnsArray = ' . str_replace('"', '', json_encode($columnArray)) . ';</script>';

      // the list type properties
      $listOptions = json_decode(html_entity_decode($thisReport->presentation_params), true);
      if (!empty($listOptions['pluginData']))
         $viewJS .= '<script type="text/javascript">var listOptions = ' . html_entity_decode(json_encode($listOptions['pluginData'])) . ';</script>';
      else
         $viewJS .= '<script type="text/javascript">var listOptions = ' . html_entity_decode($thisReport->listtypeproperties) . ';</script>';


      $viewJS .= '<script type="text/javascript">var groupPlugin = ' . ($hasSummary ? '\'groupingsummary\'' : '\'grouping\'') . ';</script>';

      // handle all additonal js we need 
      $viewJS .= '<script type="text/javascript" src="custom/modules/KReports/Plugins/Presentation/groupedview/js/viewgrouped' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js" charset="utf-8"></script>';

      return $viewJS;
   }

   public function getExportData($thisReport, $dynamicols = '', $renderFields = true) {

      // get the group criteria
      $listViewData = json_decode(html_entity_decode($thisReport->listtypeproperties));
      $groupCriteria = $listViewData->groupedViewProperties->groupById;

      // 2013-08-24 .. BUG#494 set the Report Paramaters up here .. sorting can be added
      $reportParams = array('toPDF' => true, 'noFormat' => true);

      // instance of the renderer
      $thisReportRenderer = new KReportRenderer($thisReport);

      // get the fields
      $fieldList = json_decode(html_entity_decode($thisReport->listfields), true);

      //see if we have dynamic cols in the Request ... 
      $dynamicolsOverride = array();
      if (isset($dynamicols) && $dynamicols != '') {
         $dynamicolsOverride = json_decode($dynamicols, true);
         $overrideMap = array();
         foreach ($dynamicolsOverride as $thisOverrideKey => $thisOverrideEntry) {
            $overrideMap[$thisOverrideEntry['dataIndex']] = $thisOverrideKey;
            
            // 2013-08-24 .. BUG#494 check sorting
            if(!empty($thisOverrideEntry['sortState'])){
               $reportParams['sortseq'] = $thisOverrideEntry['sortState'];
               $reportParams['sortid'] = $thisOverrideEntry['dataIndex'];
            }
         }

         //loop over the listfields
         for ($i = 0; $i < count($fieldList); $i++) {
            if (isset($overrideMap[$fieldList[$i]['fieldid']])) {
               // set the display flag
               if ($dynamicolsOverride[$overrideMap[$fieldList[$i]['fieldid']]]['isHidden'] == 'true')
                  $fieldList[$i]['display'] = 'no';
               else
                  $fieldList[$i]['display'] = 'yes';

               // set the width
               $fieldList[$i]['width'] = $dynamicolsOverride[$overrideMap[$fieldList[$i]['fieldid']]]['width'];

               // set the sequence
               $fieldList[$i]['sequence'] = $dynamicolsOverride[$overrideMap[$fieldList[$i]['fieldid']]]['sequence'];

               // 2012-12-03 .. BUG#494 override the groupby if set
               if ($dynamicolsOverride[$overrideMap[$fieldList[$i]['fieldid']]]['groupby'] == true)
                  $groupCriteria = $fieldList[$i]['fieldid'];
            }
         }

         // resort the array
         usort($fieldList, 'sortFieldArrayBySequence');
      }

      // get the report results
      // 2013-08-25 moved since we need to get the sort order first 
      $reportResults = $thisReport->getSelectionResults($reportParams);
      
      // to return we create an emtpy array
      $exportData = array();

      // process the header
      $totalWidth = 0;
      $fieldArray = array();
      foreach ($fieldList as $thisField) {
         if ($thisField['display'] == 'yes') {
            $exportData['header'][$thisField['fieldid']] = $thisField['name'];

            $exportData['width'][$thisField['fieldid']] = $thisField['width'];

            // separat small fieldarray
            $fieldArray[$thisField['fieldid']] = array(
                'fieldid' => $thisField['fieldid'],
                'summaryfunction' => $thisField['summaryfunction'],
                'renderer' => $thisReport->getXtypeRenderer($thisReport->getFieldTypeById($thisField['fieldid']), $thisField['fieldid']),
                'alignment' => $thisReport->getXtypeAlignment($thisReport->getFieldTypeById($thisField['fieldid']), $thisField['fieldid'])
            );
         }
      }

      // return the fieldArray
      $exportData['fieldArray'] = $fieldArray;

      //run through the results
      $tmpSummaries = array();
      foreach ($reportResults as $resultRecord) {
         $recordArray = array();
         foreach ($fieldArray as $fieldId => $fieldData) {
            if ($fieldData['renderer'] != '' && $renderFields)
               $recordArray[$fieldId] = $thisReportRenderer->$fieldData['renderer']($fieldId, $resultRecord);
            else {
               $recordArray[$fieldId] = $resultRecord[$fieldId];

               //special treatment for currencies
               if ($fieldData['renderer'] == 'kcurrencyRenderer')
                  $recordArray[$fieldId . '_curid'] = $resultRecord[$fieldId . '_curid'];
            }

            if ($fieldData['summaryfunction'] != '') {
               switch ($fieldData['summaryfunction']) {
                  case 'sum':
                  case 'avg':
                     $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId] += $resultRecord[$fieldId];
                     break;
                  case 'min':
                     if (!isset($tmpSummaries[$resultRecord[$groupCriteria]][$fieldId]) || $resultRecord[$fieldId] < $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId])
                        $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId] = $resultRecord[$fieldId];
                     break;
                  case 'max':
                     if (!isset($tmpSummaries[$resultRecord[$groupCriteria]][$fieldId]) || $resultRecord[$fieldId] > $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId])
                        $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId] = $resultRecord[$fieldId];
                     break;
                  case 'count':
                     if (empty($tmpSummaries[$resultRecord[$groupCriteria]][$fieldId]))
                        $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId] = 1;
                     $tmpSummaries[$resultRecord[$groupCriteria]][$fieldId]++;
                     break;
               }
            }
         }
         $exportData['datasets'][$resultRecord[$groupCriteria]][] = $recordArray;

         if (!isset($exportData['datasettitles'][$resultRecord[$groupCriteria]]))
            $exportData['datasettitles'][$resultRecord[$groupCriteria]] = $resultRecord[$groupCriteria];
      }

      // sort the array so we have the same reuslt as in the grid
      ksort($exportData['datasets']);

      // process the summaries
      if (count($tmpSummaries) > 0) {
         foreach ($fieldArray as $fieldId => $fieldData) {
            foreach ($exportData['datasets'] as $datasetId => $datasetData) {
               switch ($fieldData['summaryfunction']) {
                  case 'avg':
                     $tmpSummaries[$datasetId][$fieldId] = $tmpSummaries[$datasetId][$fieldId] / count($datasetData);
                     if ($fieldData['renderer'] != '' && $renderFields)
                        $exportData['datasetsummaries'][$datasetId][$fieldId] = $thisReportRenderer->$fieldData['renderer']($fieldId, $tmpSummaries[$datasetId]);
                     else
                        $exportData['datasetsummaries'][$datasetId][$fieldId] = $tmpSummaries[$datasetId][$fieldId];
                     break;
                  default:
                     if ($fieldData['renderer'] != '' && $renderFields)
                        $exportData['datasetsummaries'][$datasetId][$fieldId] = $thisReportRenderer->$fieldData['renderer']($fieldId, $tmpSummaries[$datasetId]);
                     else
                        $exportData['datasetsummaries'][$datasetId][$fieldId] = $tmpSummaries[$datasetId][$fieldId];
                     break;
               }
            }
         }
      }

      // return the 
      return $exportData;
   }

}

?>
