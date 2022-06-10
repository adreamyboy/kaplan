<?php

require_once('modules/KReports/KReport.php');
require_once('custom/modules/KReports/Plugins/Presentation/pivot/kreportpivot.php');

class plugineditcontroller {

   public function action_updatefield($thisController) {
      global $beanFiles, $beanList;
      // get the Report
      $thisReport = new KReport();
      $thisReport->retrieve($_REQUEST['record']);
      $fieldData = $thisReport->listFieldArrayById[$_REQUEST['changedColumn']];


      // get the poath for the Field
      $pathArray = explode('::field:', $fieldData['path']);

      // get an instance oif the module bean
      $nodeModuleName = '';
      $pathDetailArray = explode('::', $pathArray[0]);
      $nodeArray = explode(':', $pathDetailArray[count($pathDetailArray) - 1]);
      switch ($nodeArray[0]) {
         case 'root':
            $nodeModuleName = $nodeArray['1'];
            break;
         case 'link':
            require_once($beanFiles[$beanList[$nodeArray['1']]]);
            $nodeModule = new $beanList[$nodeArray['1']];
            $nodeModule->load_relationship($nodeArray['2']);
            $nodeModuleName = $nodeModule->$nodeArray['2']->getRelatedModuleName();
            break;
         case 'relate':
            require_once($beanFiles[$beanList[$nodeArray['1']]]);
            $nodeModule = new $beanList[$nodeArray['1']];
            $nodeModuleName = $nodeModule->field_defs[$nodeArray[2]]['module'];
            break;
      }

      // get anb instance of the bean 
      $nodeBean = null;
      if ($nodeModuleName != '') {
         require_once($beanFiles[$beanList[$nodeModuleName]]);
         $nodeBean = new $beanList[$nodeModuleName];
      } else {
         echo 'error';
         return;
      }

      // get the id for the element with the searched path
      // decode the Record
      $thisRecord = json_decode(html_entity_decode($_REQUEST['changedRecord']), true);

      foreach ($thisRecord as $thisFieldId => $thisFieldData) {
         if (strpos($thisFieldId, 'path') > 0 && $thisFieldData == $pathArray[0]) {
            $nodeBean->retrieve($thisRecord[str_replace('path', 'id', $thisFieldId)]);
            break;
         }
      }

      if (!empty($nodeBean->id)) {
         $fieldname = $pathArray[1];
         switch ($thisReport->getFieldTypeById($fieldData['fieldid'])) {
            case 'date';
               $nodeBean->$fieldname = $GLOBALS['timedate']->to_display_date(str_replace('T', ' ',$_REQUEST['changedTo']), false);
               break;
            default:
               $nodeBean->$fieldname = $_REQUEST['changedTo'];
               break;
         }
         $nodeBean->save();
      } else {
         echo 'error';
         return;
      }


      echo 'success';
   }

}

?>
