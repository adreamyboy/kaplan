<?php
 // created: 2014-05-08 09:52:12
$layout_defs["GI_Products"]["subpanel_setup"]['gi_products_gi_line_items_1'] = array (
  'order' => 100,
  'module' => 'GI_Line_Items',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
  'get_subpanel_data' => 'gi_products_gi_line_items_1',
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
