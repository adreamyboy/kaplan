<?php
// created: 2014-05-06 15:34:14
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1"] = array (
  'name' => 'gi_locations_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Locations',
  'bean_name' => 'GI_Locations',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
  'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
);
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1_name"] = array (
  'name' => 'gi_locations_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
  'link' => 'gi_locations_gi_products_1',
  'table' => 'gi_locations',
  'module' => 'GI_Locations',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1gi_locations_ida"] = array (
  'name' => 'gi_locations_gi_products_1gi_locations_ida',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);
