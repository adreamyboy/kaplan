<?php

require_once ('modules/ProspectLists/ProspectList.php');

class KReportTargetListHandler {

    var $KReport;
    var $KReportResults;
    var $targetListID;
    var $targetList;

    function __construct(&$thisReport, $readResults = true) {
        $this->KReport = $thisReport;

        if ($readResults)
            $this->KReportResults = $this->KReport->getSelectionresults();

        $this->targetList = new ProspectList();
    }

    function createTargeList($listname, $campaign_id = '', $createDirect = false) {
        global $current_user, $db;

        if (count($this->KReportResults > 0) || $createDirect) {
            require_once ('modules/ProspectLists/ProspectList.php');
            $newProspectList = new ProspectList ();

            $newProspectList->name = $listname;
            $newProspectList->list_type = 'default';
            $newProspectList->assigned_user_id = $current_user->id;
            $newProspectList->save();

            // add to campaign
            if ($campaign_id != '') {
                require_once('modules/Campaigns/Campaign.php');
                $thisCampaign = new Campaign();
                $thisCampaign->retrieve($campaign_id);
                $thisCampaign->load_relationships();
                $campaignLinkedFields = $thisCampaign->get_linked_fields();
                foreach ($campaignLinkedFields as $linkedField => $linkedFieldData) {
                    if ($thisCampaign->$linkedField->_relationship->rhs_module == 'ProspectList')
                        $thisCampaign->$linkedField->add($newProspectList->id);
                }
            }

            // fill with results: 
            $newProspectList->load_relationships();

            $linkedFields = $newProspectList->get_linked_fields();

            foreach ($linkedFields as $linkedField => $linkedFieldData) {
                if ($newProspectList->$linkedField->_relationship->rhs_module == $this->KReport->report_module) {
                    // success
                    if ($createDirect != true) {
                        foreach ($this->KReportResults as $thisRecord) {
                            $newProspectList->$linkedField->add($thisRecord ['sugarRecordId']);
                        }
                    } else {
                        $sqlArray = $this->KReport->get_report_main_sql_query();
                        $createPLSQL = "INSERT INTO prospect_lists_prospects (id, prospect_list_id, related_id, related_type, date_modified, deleted)
						 	SELECT uuid(), '" . $newProspectList->id . "', reportselect.sugarRecordId, '" . $this->KReport->report_module . "', UTC_TIMESTAMP(), '0' FROM
						 	(" . $sqlArray . ") as reportselect
						 	WHERE NOT EXISTS(SELECT id FROM prospect_lists_prospects WHERE related_id = reportselect.sugarRecordId AND prospect_list_id='" . $newProspectList->id . "' AND deleted=0)";
                        $db->query($createPLSQL);
                    }
                } elseif ($newProspectList->$linkedField->_relationship->rhs_module == 'Campaigns' and $campaign_id != '') {
                    $newProspectList->$linkedField->add($campaign_id);
                }
            }
        }
    }

    function handle_update_request($thisAction, $thisTargetListID, $handleDirect = false) {
        // load the TargetList
        $this->targetList->retrieve($thisTargetListID);

        // swithc the action
        switch ($thisAction) {
            case 'add':
                $this->add_targets($handleDirect);
                break;
            case 'rep':
                $this->replace_targets($handleDirect);
                break;
            case 'sub':
                $this->remove_targets($handleDirect);
                break;
        }
    }

    function add_targets($handleDirect = false) {
        global $db;
        
        $this->targetList->load_relationships();
        $linkedFields = $this->targetList->get_linked_fields();

        foreach ($linkedFields as $linkedField => $linkedFieldData) {
            if ($this->targetList->$linkedField->_relationship->rhs_module == $this->KReport->report_module) {
                // success
                if (!$handleDirect) {
                    foreach ($this->KReportResults as $thisRecord) {
                        $this->targetList->$linkedField->add($thisRecord ['sugarRecordId']);
                    }
                } else {
                    $sqlArray = $this->KReport->get_report_main_sql_query();
                    $addPLSQL = "INSERT INTO prospect_lists_prospects (id, prospect_list_id, related_id, related_type, date_modified, deleted)
                                                            SELECT uuid(), '" . $this->targetList->id . "', reportselect.sugarRecordId, '" . $this->KReport->report_module . "', UTC_TIMESTAMP(), '0' FROM
                                                            (" . $sqlArray . ") as reportselect
                                                            WHERE NOT EXISTS(SELECT id FROM prospect_lists_prospects WHERE related_id = reportselect.sugarRecordId AND prospect_list_id='" . $this->targetList->id . "' AND deleted=0)";
                    $db->query($addPLSQL);
                }
            }
        }
    }

    function remove_targets($handleDirect = false) {
        global $db;
        
        $this->targetList->load_relationships();
        $linkedFields = $this->targetList->get_linked_fields();

        foreach ($linkedFields as $linkedField => $linkedFieldData) {
            if ($this->targetList->$linkedField->_relationship->rhs_module == $this->KReport->report_module) {
                // success
                if (!$handleDirect) {
                    foreach ($this->KReportResults as $thisRecord) {
                        $this->targetList->$linkedField->delete($this->targetList->id, $thisRecord ['sugarRecordId']);
                    }
                } else {
                    $db->query("UPDATE prospect_lists_prospects SET deleted='1' WHERE prospect_list_id='" . $this->targetList->id . "' AND related_type = '" . $this->KReport->report_module . "' AND deleted='0'");
                }
            }
        }
    }

    function replace_targets($handleDirect = false) {
        global $db;

        // flag all records as deleted
        $db->query("UPDATE prospect_lists_prospects SET deleted='1' WHERE prospect_list_id='" . $this->targetList->id . "' AND related_type = '" . $this->KReport->report_module . "' AND deleted='0'");

        // add the records
        $this->add_targets($handleDirect);
    }

}

?>
