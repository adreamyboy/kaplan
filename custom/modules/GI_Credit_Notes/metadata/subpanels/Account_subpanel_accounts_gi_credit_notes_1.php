<?php
// created: 2014-07-08 15:25:48
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
  'amount_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'amount_allocated_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_AMOUNT_ALLOCATED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'amount_unallocated_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_AMOUNT_UNALLOCATED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'amount_refunded_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_AMOUNT_REFUNDED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'invoice_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_INVOICE',
    'id' => 'OPPORTUNITY_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Opportunities',
    'target_record_key' => 'opportunity_id_c',
  ),
  'date_issued_c' => 
  array (
    'type' => 'date',
    'default' => true,
    'vname' => 'LBL_DATE_ISSUED',
    'width' => '10%',
  ),
  'verified_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_VERIFIED',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Credit_Notes',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Credit_Notes',
    'width' => '5%',
    'default' => true,
  ),
);