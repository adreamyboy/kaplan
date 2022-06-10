<?php
// created: 2015-10-01 02:46:45
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'valid_from_date_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'vname' => 'LBL_VALID_FROM_DATE',
    'width' => '10%',
  ),
  'expires_on_date_c' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'vname' => 'LBL_EXPIRES_ON_DATE',
    'width' => '10%',
  ),
  'valid_from_days_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_VALID_FROM_DAYS',
    'width' => '10%',
  ),
  'expires_on_days_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_EXPIRES_ON_DAYS',
    'width' => '10%',
  ),
  'sequence_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
  'ratio_c' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'vname' => 'LBL_RATIO',
    'width' => '10%',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'is_combo_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_IS_COMBO',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Discounts',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Discounts',
    'width' => '5%',
    'default' => true,
  ),
);