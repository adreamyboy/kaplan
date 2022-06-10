<?php
// created: 2021-06-08 10:32:01
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1"] = array (
  'name' => 'prospectlists_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'prospectlists_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'ProspectLists',
  'bean_name' => 'ProspectList',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_PROSPECTLISTS_TITLE',
  'id_name' => 'prospectlists_gi_line_items_1prospectlists_ida',
);
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1_name"] = array (
  'name' => 'prospectlists_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectlists_gi_line_items_1prospectlists_ida',
  'link' => 'prospectlists_gi_line_items_1',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1prospectlists_ida"] = array (
  'name' => 'prospectlists_gi_line_items_1prospectlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);
