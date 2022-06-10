<?php
// created: 2015-03-10 20:38:41
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_2"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_2',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_2',
  'source' => 'non-db',
  'module' => 'GI_Line_Items_Change_Requests',
  'bean_name' => 'GI_Line_Items_Change_Requests',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'id_name' => 'gi_line_it60abequests_ida',
);
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_2_name"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'save' => true,
  'id_name' => 'gi_line_it60abequests_ida',
  'link' => 'gi_line_items_change_requests_gi_products_2',
  'table' => 'gi_line_items_change_requests',
  'module' => 'GI_Line_Items_Change_Requests',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_line_it60abequests_ida"] = array (
  'name' => 'gi_line_it60abequests_ida',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_PRODUCTS_TITLE',
);
