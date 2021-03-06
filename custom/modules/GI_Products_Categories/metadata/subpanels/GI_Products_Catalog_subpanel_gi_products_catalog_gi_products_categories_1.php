<?php
// created: 2014-11-18 15:11:34
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'web_hidden_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_WEB_HIDDEN',
    'width' => '10%',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
  'parent_category_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PARENT_CATEGORY',
    'id' => 'GI_PRODUCTS_CATEGORIES_ID_C',
    'link' => true,
    'width' => '25%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products_Categories',
    'target_record_key' => 'gi_products_categories_id_c',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Products_Categories',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Products_Categories',
    'width' => '5%',
    'default' => true,
  ),
);