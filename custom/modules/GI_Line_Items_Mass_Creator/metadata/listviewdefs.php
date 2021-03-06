<?php
$module_name = 'GI_Line_Items_Mass_Creator';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CAMPAIGN_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CAMPAIGN',
    'id' => 'CAMPAIGN_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'AUTO_DISCOUNT_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_AUTO_DISCOUNT',
    'width' => '10%',
  ),
  'DISCOUNT_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DISCOUNT_TYPE',
    'width' => '10%',
  ),
  'DISCOUNT_RATIO_C' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_DISCOUNT_RATIO',
    'width' => '10%',
  ),
  'CREATE_LINE_ITEM_IF_EXISTS_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_CREATE_LINE_ITEM_IF_EXISTS',
    'width' => '10%',
  ),
);
?>
