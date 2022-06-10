<?php
 // created: 2014-05-06 18:29:53
$layout_defs["GI_Products_Catalog"]["subpanel_setup"]['gi_products_catalog_gi_products_categories_1'] = array (
  'order' => 100,
  'module' => 'GI_Products_Categories',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_CATEGORIES_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'get_subpanel_data' => 'gi_products_catalog_gi_products_categories_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate', 'additional_form_fields' => array ( 'batch_c' => '333' ),
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
