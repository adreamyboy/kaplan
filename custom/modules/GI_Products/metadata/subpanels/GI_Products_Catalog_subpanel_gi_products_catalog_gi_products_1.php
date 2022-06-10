<?php
// created: 2014-06-14 21:54:37
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'code' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'price' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'gi_locations_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
    'id' => 'GI_LOCATIONS_GI_PRODUCTS_1GI_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Locations',
    'target_record_key' => 'gi_locations_gi_products_1gi_locations_ida',
  ),
  'gi_terms_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
    'id' => 'GI_TERMS_GI_PRODUCTS_1GI_TERMS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Terms',
    'target_record_key' => 'gi_terms_gi_products_1gi_terms_ida',
  ),
  'batch_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_BATCH',
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
  'web_hidden' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_WEB_HIDDEN',
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