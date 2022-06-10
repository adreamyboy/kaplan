<?php
 // created: 2021-12-01 12:24:57
$layout_defs["ZE_Orders"]["subpanel_setup"]['ze_orders_aos_quotes'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ZE_ORDERS_AOS_QUOTES_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'ze_orders_aos_quotes',
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
