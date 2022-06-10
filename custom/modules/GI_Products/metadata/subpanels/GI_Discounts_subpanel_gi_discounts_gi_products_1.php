<?php
// created: 2014-11-18 15:16:57
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '30%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
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
  'web_hidden' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_WEB_HIDDEN',
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
  'gi_products_catalog_gi_products_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
    'id' => 'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1GI_PRODUCTS_CATALOG_IDA',
    'width' => '30%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products_Catalog',
    'target_record_key' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
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