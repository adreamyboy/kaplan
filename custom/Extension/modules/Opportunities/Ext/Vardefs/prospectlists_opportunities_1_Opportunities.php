<?php
// created: 2021-06-08 21:44:46
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1"] = array (
  'name' => 'prospectlists_opportunities_1',
  'type' => 'link',
  'relationship' => 'prospectlists_opportunities_1',
  'source' => 'non-db',
  'module' => 'ProspectLists',
  'bean_name' => 'ProspectList',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_PROSPECTLISTS_TITLE',
  'id_name' => 'prospectlists_opportunities_1prospectlists_ida',
);
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1_name"] = array (
  'name' => 'prospectlists_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectlists_opportunities_1prospectlists_ida',
  'link' => 'prospectlists_opportunities_1',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1prospectlists_ida"] = array (
  'name' => 'prospectlists_opportunities_1prospectlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);
