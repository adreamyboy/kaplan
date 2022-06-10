<?php
$popupMeta = array (
    'moduleMain' => 'GI_Products_Catalog',
    'varName' => 'GI_Products_Catalog',
    'orderBy' => 'gi_products_catalog.name',
    'whereClauses' => array (
  'name' => 'gi_products_catalog.name',
  'code_c' => 'gi_products_catalog_cstm.code_c',
  'discontinued' => 'gi_products_catalog.discontinued',
  'assigned_user_id' => 'gi_products_catalog.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code_c',
  5 => 'discontinued',
  6 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'code_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code_c',
  ),
  'discontinued' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
