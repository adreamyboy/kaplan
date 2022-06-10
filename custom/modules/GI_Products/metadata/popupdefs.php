<?php
$popupMeta = array (
    'moduleMain' => 'GI_Products',
    'varName' => 'GI_Products',
    'orderBy' => 'gi_products.name',
    'whereClauses' => array (
  'name' => 'gi_products.name',
  'code' => 'gi_products.code',
  'type' => 'gi_products.type',
  'gi_products_catalog_gi_products_1_name' => 'gi_products.gi_products_catalog_gi_products_1_name',
  'gi_terms_gi_products_1_name' => 'gi_products.gi_terms_gi_products_1_name',
  'gi_locations_gi_products_1_name' => 'gi_products.gi_locations_gi_products_1_name',
  'batch_c' => 'gi_products_cstm.batch_c',
  'provisional_c' => 'gi_products_cstm.provisional_c',
  'web_hidden' => 'gi_products.web_hidden',
  'status_c' => 'gi_products_cstm.status_c',
  'date_start_c' => 'gi_products_cstm.date_start_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'type',
  8 => 'gi_products_catalog_gi_products_1_name',
  9 => 'gi_terms_gi_products_1_name',
  10 => 'gi_locations_gi_products_1_name',
  11 => 'batch_c',
  12 => 'provisional_c',
  14 => 'web_hidden',
  15 => 'status_c',
  16 => 'date_start_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'date_start_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_START',
    'width' => '10%',
    'name' => 'date_start_c',
  ),
  'gi_products_catalog_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
    'id' => 'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1GI_PRODUCTS_CATALOG_IDA',
    'width' => '10%',
    'name' => 'gi_products_catalog_gi_products_1_name',
  ),
  'gi_terms_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
    'id' => 'GI_TERMS_GI_PRODUCTS_1GI_TERMS_IDA',
    'width' => '10%',
    'name' => 'gi_terms_gi_products_1_name',
  ),
  'gi_locations_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
    'id' => 'GI_LOCATIONS_GI_PRODUCTS_1GI_LOCATIONS_IDA',
    'width' => '10%',
    'name' => 'gi_locations_gi_products_1_name',
  ),
  'batch_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BATCH',
    'width' => '10%',
    'name' => 'batch_c',
  ),
  'provisional_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_PROVISIONAL',
    'width' => '10%',
    'name' => 'provisional_c',
  ),
  'web_hidden' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
    'name' => 'web_hidden',
  ),
),
    'listviewdefs' => array (
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
    'name' => 'code',
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
  'DATE_START_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_DATE_START',
    'width' => '10%',
  ),
  'PRICE' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'price',
  ),
  'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
    'id' => 'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1GI_PRODUCTS_CATALOG_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'gi_products_catalog_gi_products_1_name',
  ),
  'GI_TERMS_GI_PRODUCTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
    'id' => 'GI_TERMS_GI_PRODUCTS_1GI_TERMS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'gi_terms_gi_products_1_name',
  ),
  'GI_LOCATIONS_GI_PRODUCTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
    'id' => 'GI_LOCATIONS_GI_PRODUCTS_1GI_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'gi_locations_gi_products_1_name',
  ),
  'BATCH_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_BATCH',
    'width' => '10%',
    'name' => 'batch_c',
  ),
  'PROVISIONAL_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_PROVISIONAL',
    'width' => '10%',
    'name' => 'provisional_c',
  ),
  'NUMBER_OF_TARGETED_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_NUMBER_OF_TARGETED',
    'width' => '10%',
    'name' => 'number_of_targeted_c',
  ),
  'DAYS_C' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DAYS',
    'width' => '10%',
    'name' => 'days_c',
  ),
),
);
