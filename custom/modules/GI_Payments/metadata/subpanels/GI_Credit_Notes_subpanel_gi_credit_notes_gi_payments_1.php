<?php
// created: 2014-06-01 19:04:59
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'opportunities_gi_payments_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_PAYMENTS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Opportunities',
    'target_record_key' => 'opportunities_gi_payments_1opportunities_ida',
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
  'date_cleared' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DATE_CLEARED',
    'width' => '10%',
    'default' => true,
  ),
  'comments' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_COMMENTS',
    'sortable' => false,
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