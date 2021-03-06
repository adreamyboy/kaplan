<?php
$module_name = 'GI_Payments';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MODE',
    'width' => '10%',
  ),
  'AMOUNT' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'CASH_FLOW_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_CASH_FLOW',
    'currency_format' => true,
    'width' => '10%',
  ),
  'DATE_PAID' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_PAID',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_CLEARED' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_CLEARED',
    'width' => '10%',
    'default' => true,
  ),
  'OPPORTUNITIES_GI_PAYMENTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_PAYMENTS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'REFERENCE_NO_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_REFERENCE_NO',
    'width' => '10%',
  ),
  'VERIFIED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_VERIFIED',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
