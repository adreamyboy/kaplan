<?php
// created: 2015-03-11 01:28:52
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '40%',
    'default' => true,
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
  'days_c' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_DAYS',
    'width' => '10%',
  ),
  'capacity_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_CAPACITY',
    'width' => '10%',
  ),
  'has_elearning_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_HAS_ELEARNING',
    'width' => '10%',
  ),
  'web_hidden' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '15%',
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