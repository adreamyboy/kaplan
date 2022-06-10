<?php
 // created: 2014-06-02 09:51:29
$layout_defs["Accounts"]["subpanel_setup"]['accounts_gi_products_1'] = array (
  'order' => 100,
  'module' => 'GI_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
  'get_subpanel_data' => 'accounts_gi_products_1',
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
