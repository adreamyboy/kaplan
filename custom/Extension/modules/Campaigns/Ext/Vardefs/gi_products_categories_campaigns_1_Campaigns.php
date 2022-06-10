<?php
// created: 2014-06-17 06:49:45
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1"] = array (
  'name' => 'gi_products_categories_campaigns_1',
  'type' => 'link',
  'relationship' => 'gi_products_categories_campaigns_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Categories',
  'bean_name' => 'GI_Products_Categories',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'id_name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
);
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1_name"] = array (
  'name' => 'gi_products_categories_campaigns_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'save' => true,
  'id_name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
  'link' => 'gi_products_categories_campaigns_1',
  'table' => 'gi_products_categories',
  'module' => 'GI_Products_Categories',
  'rname' => 'name',
);
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1gi_products_categories_ida"] = array (
  'name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
  'type' => 'link',
  'relationship' => 'gi_products_categories_campaigns_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
);
