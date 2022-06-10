<?php
// created: 2014-05-06 15:32:53
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1"] = array (
  'name' => 'gi_terms_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_terms_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Terms',
  'bean_name' => 'GI_Terms',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
  'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
);
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1_name"] = array (
  'name' => 'gi_terms_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
  'save' => true,
  'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
  'link' => 'gi_terms_gi_products_1',
  'table' => 'gi_terms',
  'module' => 'GI_Terms',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1gi_terms_ida"] = array (
  'name' => 'gi_terms_gi_products_1gi_terms_ida',
  'type' => 'link',
  'relationship' => 'gi_terms_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);
