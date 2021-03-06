<?php
$module_name = 'GI_Products_Categories';
$listViewDefs [$module_name] = 
array (
  'NAME_WITH_CATEGORY_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_NAME_WITH_CATEGORY',
    'width' => '20%',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SHORT_DESCRIPTION_C' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHORT_DESCRIPTION',
    'sortable' => false,
    'width' => '30%',
  ),
  'PARENT_CATEGORY_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PARENT_CATEGORY',
    'id' => 'GI_PRODUCTS_CATEGORIES_ID_C',
    'link' => true,
    'width' => '15%',
  ),
  'WEB_HIDDEN_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
  ),
  'SEQUENCE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
  'DISCONTINUED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
);
?>
