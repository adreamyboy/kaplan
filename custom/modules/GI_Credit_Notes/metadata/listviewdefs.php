<?php
$module_name = 'GI_Credit_Notes';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ACCOUNTS_GI_CREDIT_NOTES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_GI_CREDIT_NOTES_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'AMOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'DATE_ISSUED_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_DATE_ISSUED',
    'width' => '10%',
  ),
  'AMOUNT_ALLOCATED_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT_ALLOCATED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'AMOUNT_REFUNDED_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT_REFUNDED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'AMOUNT_UNALLOCATED_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT_UNALLOCATED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'VERIFIED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_VERIFIED',
    'width' => '10%',
  ),
);
?>
