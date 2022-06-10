<?php
// created: 2014-05-08 09:52:12
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1"] = array (
  'name' => 'gi_products_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'gi_products_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
  'id_name' => 'gi_products_gi_line_items_1gi_products_ida',
);
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1_name"] = array (
  'name' => 'gi_products_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'gi_products_gi_line_items_1gi_products_ida',
  'link' => 'gi_products_gi_line_items_1',
  'table' => 'gi_products',
  'module' => 'GI_Products',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1gi_products_ida"] = array (
  'name' => 'gi_products_gi_line_items_1gi_products_ida',
  'type' => 'link',
  'relationship' => 'gi_products_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);
