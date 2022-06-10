<?php
// created: 2016-05-24 14:27:51
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_categories_gi_products_catalog_1"] = array (
  'name' => 'gi_products_categories_gi_products_catalog_1',
  'type' => 'link',
  'relationship' => 'gi_products_categories_gi_products_catalog_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Categories',
  'bean_name' => 'GI_Products_Categories',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'id_name' => 'gi_productbf36egories_ida',
);
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_categories_gi_products_catalog_1_name"] = array (
  'name' => 'gi_products_categories_gi_products_catalog_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'save' => true,
  'id_name' => 'gi_productbf36egories_ida',
  'link' => 'gi_products_categories_gi_products_catalog_1',
  'table' => 'gi_products_categories',
  'module' => 'GI_Products_Categories',
  'rname' => 'name',
);
$dictionary["GI_Products_Catalog"]["fields"]["gi_productbf36egories_ida"] = array (
  'name' => 'gi_productbf36egories_ida',
  'type' => 'link',
  'relationship' => 'gi_products_categories_gi_products_catalog_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
);
