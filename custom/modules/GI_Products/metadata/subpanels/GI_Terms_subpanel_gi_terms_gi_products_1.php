<?php
// created: 2014-05-28 22:42:28
$subpanel_layout['list_fields'] = array (
  'type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'code' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'gi_products_catalog_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
    'id' => 'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1GI_PRODUCTS_CATALOG_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products_Catalog',
    'target_record_key' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
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
  'batch_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_BATCH',
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