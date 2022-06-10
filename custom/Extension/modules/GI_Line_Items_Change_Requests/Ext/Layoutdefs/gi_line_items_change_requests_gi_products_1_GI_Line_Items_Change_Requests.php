<?php
 // created: 2015-03-10 20:38:00
$layout_defs["GI_Line_Items_Change_Requests"]["subpanel_setup"]['gi_line_items_change_requests_gi_products_1'] = array (
  'order' => 100,
  'module' => 'GI_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
  'get_subpanel_data' => 'gi_line_items_change_requests_gi_products_1',
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
