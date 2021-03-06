<?php
// created: 2015-03-24 04:13:22
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '30%',
    'default' => true,
  ),
  'code_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_CODE',
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
  'type_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'sequence_c' => 
  array (
    'type' => 'int',
    'default' => true,
    'vname' => 'LBL_SEQUENCE',
    'width' => '10%',
  ),
  'web_hidden_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
  ),
  'discontinued' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Products_Catalog',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Products_Catalog',
    'width' => '5%',
    'default' => true,
  ),
);