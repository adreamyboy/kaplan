<?php
// created: 2015-02-24 20:21:09
$subpanel_layout['list_fields'] = array (
  'individual_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_INDIVIDUAL',
    'width' => '10%',
  ),
  'name' => 
  array (
    'vname' => 'LBL_LIST_ACCOUNT_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '30%',
    'default' => true,
  ),
  'billing_address_city' => 
  array (
    'vname' => 'LBL_LIST_CITY',
    'width' => '20%',
    'default' => true,
  ),
  'phone_office' => 
  array (
    'vname' => 'LBL_LIST_PHONE',
    'width' => '20%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'width' => '4%',
    'default' => true,
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButtonAccount',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'width' => '4%',
    'default' => true,
  ),
);