<?php
// created: 2014-05-06 12:42:35
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1"] = array (
  'name' => 'opportunities_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_gi_line_items_1opportunities_ida',
);
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1_name"] = array (
  'name' => 'opportunities_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_gi_line_items_1opportunities_ida',
  'link' => 'opportunities_gi_line_items_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1opportunities_ida"] = array (
  'name' => 'opportunities_gi_line_items_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);
