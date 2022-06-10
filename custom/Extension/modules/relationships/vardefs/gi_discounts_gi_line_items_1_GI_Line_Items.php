<?php
// created: 2014-11-11 03:25:37
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1"] = array (
  'name' => 'gi_discounts_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Discounts',
  'bean_name' => 'GI_Discounts',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
  'id_name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
);
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1_name"] = array (
  'name' => 'gi_discounts_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
  'link' => 'gi_discounts_gi_line_items_1',
  'table' => 'gi_discounts',
  'module' => 'GI_Discounts',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1gi_discounts_ida"] = array (
  'name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);
