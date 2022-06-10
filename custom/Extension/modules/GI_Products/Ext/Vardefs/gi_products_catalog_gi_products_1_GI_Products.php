<?php
// created: 2014-05-06 18:39:55
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1"] = array (
  'name' => 'gi_products_catalog_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Catalog',
  'bean_name' => 'GI_Products_Catalog',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
);
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1_name"] = array (
  'name' => 'gi_products_catalog_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'save' => true,
  'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
  'link' => 'gi_products_catalog_gi_products_1',
  'table' => 'gi_products_catalog',
  'module' => 'GI_Products_Catalog',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1gi_products_catalog_ida"] = array (
  'name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);
