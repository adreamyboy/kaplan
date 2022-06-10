<?php
$popupMeta = array (
    'moduleMain' => 'GI_Products_Categories',
    'varName' => 'GI_Products_Categories',
    'orderBy' => 'gi_products_categories.name',
    'whereClauses' => array (
  'name' => 'gi_products_categories.name',
  'parent_category_c' => 'gi_products_categories.parent_category_c',
  'discontinued_c' => 'gi_products_categories_cstm.discontinued_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'parent_category_c',
  5 => 'discontinued_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'parent_category_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_CATEGORY',
    'id' => 'GI_PRODUCTS_CATEGORIES_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'parent_category_c',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued_c',
  ),
),
);
