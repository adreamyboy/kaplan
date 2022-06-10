<?php

class pluginkpdrilldowncontroller {

   public function __construct() {
      
   }

   public function action_load_visualization() {
      require_once('modules/KReports/KReport.php');
      require_once('modules/KReports/KReportVisualizationManager.php');

      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['popupreportid']);

      // retrieve the mapping and add the filters
      $parentReport = new KReport();
      $parentReport->retrieve($_REQUEST['parentreportid']);
      $integration_params = json_decode(html_entity_decode($parentReport->integration_params));
      $mappingData = null;
      foreach ($integration_params->kpdrilldown as $thisDrilldown) {
         if ($thisDrilldown->linkid == $_REQUEST['drilldownid']) {
            $mappingData = $thisDrilldown->mappingdata;
            break;
         }
      }
      
      // handle our where conditions
      $whereconditions = json_decode(html_entity_decode($thisReport->whereconditions));
      if (is_array($mappingData)) {
         $recordData = json_decode(html_entity_decode($_REQUEST['recorddata']));
         foreach ($mappingData as $thisMappingEntry) {
            if ($thisMappingEntry->mappedid != '') {
               foreach ($whereconditions as $whereConditionIndex => $whereconditionData) {
                  if ($whereconditionData->fieldid == $thisMappingEntry->whereid) {
                     $whereconditions[$whereConditionIndex]->operator = 'equals';
                     $whereconditions[$whereConditionIndex]->value = $recordData->{$thisMappingEntry->mappedid};
                     $whereconditions[$whereConditionIndex]->valuekey = '';
                     break;
                  }
               }
            }
         }
      }

      $thisReport->whereconditions = json_encode($whereconditions);

      $thisVisualizationManager = new KReportVisualizationManager();
      $visContent = $thisVisualizationManager->renderVisualization(html_entity_decode($thisReport->visualization_params, ENT_QUOTES, 'UTF-8'), $thisReport, array('parentbean' => $parentBean));

      $visItems = array();
      foreach ($thisVisualizationManager->itemData as $thisItemIndex => $thisItemData)
         $visItems[] = $thisItemData['divID'];

      echo json_encode(array(
          'visContent' => $visContent,
          'visItems' => $visItems
      ));
   }

   public function action_load_report() {
      global $db;

      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['popupreportid']);

      // retrieve the mapping and add the filters
      $parentReport = new KReport();
      $parentReport->retrieve($_REQUEST['parentreportid']);
      $integration_params = json_decode(html_entity_decode($parentReport->integration_params));
      $mappingData = null;
      foreach ($integration_params->kpdrilldown as $thisDrilldown) {
         if ($thisDrilldown->linkid == $_REQUEST['drilldownid']) {
            $mappingData = $thisDrilldown->mappingdata;
            break;
         }
      }

      $whereconditions = json_decode(html_entity_decode($thisReport->whereconditions));
      if (is_array($mappingData)) {
         $recordData = json_decode(html_entity_decode($_REQUEST['recorddata']));
         foreach ($mappingData as $thisMappingEntry) {
            if ($thisMappingEntry->mappedid != '') {
               foreach ($whereconditions as $whereConditionIndex => $whereconditionData) {
                  if ($whereconditionData->fieldid == $thisMappingEntry->whereid) {
                     $whereconditions[$whereConditionIndex]->operator = 'equals';
                     $whereconditions[$whereConditionIndex]->value = $recordData->{$thisMappingEntry->mappedid};
                     $whereconditions[$whereConditionIndex]->valuekey = '';
                     break;
                  }
               }
            }
         }
      }

      $thisReport->whereconditions = json_encode($whereconditions);

      // set start and limit if not set 
      if (!isset($_REQUEST['start']))
         $_REQUEST['start'] = 0;
      if (!isset($_REQUEST['limit']))
         $_REQUEST['limit'] = 0;

      // set the override Where if set in the request
      if (isset($_REQUEST['whereConditions'])) {
         $thisReport->whereOverride = json_decode(html_entity_decode($_REQUEST['whereConditions']), true);
      }

      // set request Paramaters
      $reportParams = array('noFormat' => true, 'start' => isset($_REQUEST['start']) ? $_REQUEST['start'] : 0, 'limit' => isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 0);

      // see if we should sort
      if (isset($_REQUEST['sort']) && isset($_REQUEST['dir'])) {
         $reportParams['sortseq'] = $_REQUEST['dir'];
         $reportParams['sortid'] = $_REQUEST['sort'];
      } elseif (isset($_REQUEST['sort'])) {
         $sortParams = json_decode(html_entity_decode($_REQUEST['sort']));
         $reportParams['sortid'] = $sortParams[0]->property;
         $reportParams['sortseq'] = $sortParams[0]->direction;
      }

      $totalArray = array();
      $totalArray['records'] = $thisReport->getSelectionResults($reportParams, '0', false, $drillDownFilter);

      // rework ... load from kQuery fieldArray
      $fieldArr = array();

      //2012-12-01 added link array to add to metadata for buiilding links in the frontend
      $linkArray = $thisReport->buildLinkArray($thisReport->kQueryArray->queryArray['root']['kQuery']->fieldArray);

      foreach ($thisReport->kQueryArray->queryArray['root']['kQuery']->fieldArray as $fieldid => $fieldname) {
         $thisFieldArray = array('name' => $fieldname);
         if (isset($linkArray[$fieldid]))
            $thisFieldArray['linkInfo'] = json_encode($linkArray[$fieldid]);
         $fieldArr[] = $thisFieldArray;
      }

      $totalArray['metaData'] = array(
          'totalProperty' => 'count',
          'root' => 'records',
          'fields' => $fieldArr
      );

      // do a count 
      $totalArray['count'] = $thisReport->getSelectionResults(array('start' => $_REQUEST['start'], 'limit' => $_REQUEST['limit']), isset($_REQUEST['snapshotid']) ? $_REQUEST['snapshotid'] : '0', true);

      // jscon encode the result and return it
      $json_string = json_encode($totalArray);
      echo $json_string;
   }

   public function action_getdisplaycolumns() {
      require_once('modules/KReports/KReportPresentationManager.php');

      if (!empty($_REQUEST['popupreportid'])) {
         require_once('modules/KReports/KReport.php');
         $thisReport = new KReport();
         $thisReport->retrieve($_REQUEST['popupreportid']);
         //$thisReport = BeanFactory::getBean('KReports', $_REQUEST['popupreportid']);
         $presentationManager = new KReportPresentationManager();
         $presPlugin = $presentationManager->getPresentationPlugin($thisReport);
         echo str_replace('"', '', json_encode($presPlugin->buildColumnArray($thisReport)));
         //str_replace('"', '', json_encode($this->buildColumnArray($thisReport)))
      }
      else
         echo json_encode(array());
   }

   public function action_getreports() {
      // get a Bean for Kreports
      // $report = BeanFactory::getBean('KReports');
      require_once('modules/KReports/KReport.php');
      $report = new KReport();

      // see if we have a Where Clause
      $addWhere = '';
      if (!empty($_REQUEST['filter']))
         $addWhere = "kreports.name like '%" . $_REQUEST['filter'] . "%'";

      // get all Beans
      $reportList = $report->get_list("kreports.name", $addWhere, 0, 20);

      // an emtpy return Array
      $repArray = array();

      // loop over the array
      foreach ($reportList['list'] as $thisReport) {
         $repArray[] = array(
             'id' => $thisReport->id,
             'name' => $thisReport->name
         );
      }

      // echo the JSON
      echo json_encode($repArray);
   }

   public function action_getwherefields() {
      require_once('modules/KReports/KReport.php');
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['wherereportid']);

      $whereFields = json_decode(html_entity_decode($thisReport->whereconditions));

      $wherefieldArray = array();

      foreach ($whereFields as $thisWhereField) {
         if ($thisWhereField->usereditable == 'yes')
            $wherefieldArray[] = array(
                'fieldid' => $thisWhereField->fieldid,
                'name' => $thisWhereField->name
            );
      }

      echo json_encode($wherefieldArray);
   }

}

?>
