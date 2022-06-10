<?php

class plugintreecontroller {
    public function action_load_report_tree($thisController){

        // processing
        require_once('modules/KReports/KReport.php');
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['requester']);

        $currentGroupLevel = 1;
        $filterArray = '';

        //build the filter for the node ..
        if (isset($_REQUEST['node']) && $_REQUEST['node'] != 'root') {
            $tmp_filterArray = preg_split('/::/', $_REQUEST['node']);
            foreach ($tmp_filterArray as $filterSeq => $filterDef) {
                $filterEntryArray = preg_split('/:/', $filterDef);
                $filterArray[$filterEntryArray[0]] = $filterEntryArray[1];
            }
            $currentGroupLevel = count($filterArray) + 1;
        }

        // get the results for the node
        //$maxGroupLevel = $thisReport->getMaxGroupLevel();
        // get the grouping fields
        $listTypeProperties = json_decode(html_entity_decode($thisReport->listtypeproperties));

        $arrayList = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES), true);

        // asses the grouping depth .. index of the last node 
        $groupdepth = 0; 
        while($arrayList[$groupdepth]['fieldid'] != $listTypeProperties->treeViewProperties->stopTreeAt &&  $groupdepth < 10)
                $groupdepth++;
        
        // increase by 1 since the last is the last level
        $groupdepth++;
        
        //if($currentGroupLevel > $maxGroupLevel)
        if ($currentGroupLevel < $groupdepth) {
            // since we are not at the end we change the field functions
            $listFields = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES), true);
            foreach ($arrayList as $listFieldKey => $listFieldData) {
                if (isset($listFieldData['summaryfunction']) && $listFieldData['summaryfunction'] != '')
                    $listFields[$listFieldKey]['sqlfunction'] = $listFieldData['summaryfunction'];
            }
            $thisReport->listfields = json_encode($listFields);

            $resultRecords = $thisReport->getSelectionResults(array('noFormat' => true, 'toPDF' => true, 'exclusiveGrouping' => true), '0', false, $filterArray, array($arrayList[$currentGroupLevel - 1]['fieldid']));
        }
        else
        // 2011-03-25 no grouping on the lowest level excpet what the report groups anyway
            $resultRecords = $thisReport->getSelectionResults(array('noFormat' => true, 'toPDF' => true), '0', false, $filterArray, array() /* array($thisReportGroupings[count($thisReportGroupings) - 1]['fieldid']) */);

        // now get the format ... first we did not format to keep original values for the later selection
        // need that for the ID
        // $formattedResultRecords =$thisReport->formatFields($resultRecords, false);
        //$levelFieldId = $thisReport->getGroupLevelId($currentGroupLevel);
        $levelFieldId = $arrayList[$currentGroupLevel - 1]['fieldid'];

        // get the list fields array since we need to check against that one
        $listFieldsAray = $thisReport->getListFieldsArray();

        foreach ($resultRecords as $thisRecordId => $thisRecordData) {
            $returnArray = array();
            // 2011-03-07 add the original value '_val' as id rather then the translated value
            // 2012-10-04 ... not said that the name is unique ... so at ethe end of the tree we return a GUID
            if ($currentGroupLevel < $groupdepth)
                $returnArray['id'] = (isset($_REQUEST['node']) && $_REQUEST['node'] != 'root' ? $_REQUEST['node'] . '::' : '') . $levelFieldId . ':' . (isset($thisRecordData[$levelFieldId . '_val']) ? $thisRecordData[$levelFieldId . '_val'] : $thisRecordData[$levelFieldId]);
            else
                $returnArray['id'] = create_guid();

            $returnArray['leaf'] = $currentGroupLevel == $groupdepth /* $maxGroupLevel */ ? true : false;
            $returnArray['text'] = $thisRecordData[$arrayList[$currentGroupLevel - 1]['fieldid']];
            // process all the other entry fields
            foreach ($thisRecordData as $fieldId => $fieldValue) {

                if ($groupdepth  == $currentGroupLevel || $groupdepth  > $currentGroupLevel && $listFieldsAray[$fieldId]['sqlfunction'] != '-')
                    $returnArray[$fieldId] = $thisRecordData[$fieldId];
                else
                    $returnArray[$fieldId] = '';
            }

            // set the text if we still have a field
            if ($levelFieldId != '')
                $returnArray[$arrayList[count($thisReportGroupings) - 1]['fieldid']] = $thisRecordData[$arrayList[$currentGroupLevel - 1]['fieldid']];
            //$returnArray['text'] = $thisFormattedRecordData[$levelFieldId];

            $return[] = $returnArray;
        }

        //json encode an return$thisReportGroupings$arrayList
        print json_encode($return);
    }
    
    
    function action_save_tree_layout() {

        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);

        $layoutParams = json_decode(html_entity_decode($_REQUEST['layoutparams']), true);

        $listFields = json_decode(html_entity_decode($thisReport->listfields), true);

        // process the Fields
        foreach ($listFields as $thisFieldIndex => $thisListField) {
            reset($layoutParams);
            foreach ($layoutParams as $thisLayoutParam) {
                if ($thisLayoutParam['dataIndex'] == $thisListField['fieldid']) {
                    $thisListField['width'] = $thisLayoutParam['width'];
                    $thisListField['sequence'] = (string) $thisLayoutParam['sequence'];

                    // bug 2011-03-04 sequence needs leading 0
                    if (strlen($thisListField['sequence']) < 2)
                        $thisListField['sequence'] = '0' . $thisListField['sequence'];

                    $thisListField['display'] = $thisLayoutParam['isHidden'] ? 'no' : 'yes';
                    $listFields[$thisFieldIndex] = $thisListField;
                    break;
                }
            }
        }

        // usort($listFields, 'arraySortBySequence');

        $thisReport->listfields = json_encode($listFields);
        $thisReport->save();
        // echo thisReport->listfields;
    }
    
    
    
}
?>
