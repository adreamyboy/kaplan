<?php
// created: 2015-12-29 00:53:15
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'mode' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_MODE',
    'width' => '10%',
  ),
  'cash_flow_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_CASH_FLOW',
    'currency_format' => true,
    'width' => '10%',
  ),
  'date_paid' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DATE_PAID',
    'width' => '10%',
    'default' => true,
  ),
  'date_cleared' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DATE_CLEARED',
    'width' => '10%',
    'default' => true,
  ),
  'gi_credit_notes_gi_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_CREDIT_NOTES_TITLE',
    'id' => 'GI_CREDIT_NOTES_GI_PAYMENTS_1GI_CREDIT_NOTES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Credit_Notes',
    'target_record_key' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
  ),
  'verified_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_VERIFIED',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Payments',
    'width' => '4%',
    'default' => true,
  ),
);