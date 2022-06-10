<?php
$module_name = 'GI_Products_Catalog';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CODE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CODE',
    'width' => '10%',
  ),
  'PRICE' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'WEB_HIDDEN_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
  ),
  'DISCONTINUED' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'SEQUENCE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
);
?>
