<?php
 // created: 2014-11-20 05:53:08
$layout_defs["GI_Products_Catalog"]["subpanel_setup"]['gi_products_catalog_users_1'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_PRODUCTS_CATALOG_USERS_1_FROM_USERS_TITLE',
  'get_subpanel_data' => 'gi_products_catalog_users_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
