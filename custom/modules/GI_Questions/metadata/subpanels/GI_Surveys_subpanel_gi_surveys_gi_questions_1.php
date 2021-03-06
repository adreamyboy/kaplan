<?php
// created: 2015-02-07 21:53:10
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'sequence_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
  'type_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '30%',
    'default' => true,
  ),
  'option_1_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_OPTION_1',
    'width' => '10%',
  ),
  'option_2_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_OPTION_2',
    'width' => '10%',
  ),
  'option_3_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_OPTION_3',
    'width' => '10%',
  ),
  'option_4_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_OPTION_4',
    'width' => '10%',
  ),
  'option_5_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_OPTION_5',
    'width' => '10%',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Questions',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Questions',
    'width' => '5%',
    'default' => true,
  ),
);