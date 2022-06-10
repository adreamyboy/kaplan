<?php
// created: 2015-05-17 08:37:38
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'date_start_c' => 
  array (
    'type' => 'date',
    'default' => true,
    'vname' => 'LBL_DATE_START',
    'width' => '10%',
  ),
  'date_end_c' => 
  array (
    'type' => 'date',
    'default' => true,
    'vname' => 'LBL_DATE_END',
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
  'provisional_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_PROVISIONAL',
    'width' => '10%',
  ),
  'price' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Products',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Products',
    'width' => '5%',
    'default' => true,
  ),
);