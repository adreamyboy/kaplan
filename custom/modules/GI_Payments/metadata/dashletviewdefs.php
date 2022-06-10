<?php
$dashletData['GI_PaymentsDashlet']['searchFields'] = array (
  'date_paid' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'type' => 
  array (
    'default' => '',
  ),
  'date_cleared' => 
  array (
    'default' => '',
  ),
  'verified_c' => 
  array (
    'default' => '',
  ),
  'gi_credit_notes_gi_payments_1_name' => 
  array (
    'default' => '',
  ),
  'mode' => 
  array (
    'default' => '',
  ),
  'amount' => 
  array (
    'default' => '',
  ),
  'cash_flow_c' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['GI_PaymentsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'amount',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
  'date_paid' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_PAID',
    'width' => '10%',
    'default' => true,
    'name' => 'date_paid',
  ),
  'opportunities_gi_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_PAYMENTS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'opportunities_gi_payments_1_name',
  ),
  'verified_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_VERIFIED',
    'width' => '10%',
    'name' => 'verified_c',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'reference_no_c' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_REFERENCE_NO',
    'width' => '10%',
  ),
  'mode' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_MODE',
    'width' => '10%',
    'name' => 'mode',
  ),
  'date_cleared' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_CLEARED',
    'width' => '10%',
    'default' => false,
  ),
);
