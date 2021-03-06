<?php
$module_name = 'GI_Discounts';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '20%',
    'default' => true,
  ),
  'IS_COMBO_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_COMBO',
    'width' => '10%',
  ),
  'RATE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_RATE',
    'width' => '10%',
  ),
  'RATIO_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RATIO_TYPE',
    'width' => '10%',
  ),
  'RATIO_C' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_RATIO',
    'width' => '10%',
  ),
  'VALID_FROM_DAYS_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_VALID_FROM_DAYS',
    'width' => '10%',
  ),
  'EXPIRES_ON_DAYS_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_EXPIRES_ON_DAYS',
    'width' => '10%',
  ),
  'VALID_FROM_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_VALID_FROM_DATE',
    'width' => '10%',
  ),
  'EXPIRES_ON_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_EXPIRES_ON_DATE',
    'width' => '10%',
  ),
  'DISCONTINUED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'SEQUENCE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
);
?>
