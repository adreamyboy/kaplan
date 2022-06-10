<?php
 // created: 2014-06-17 06:48:23
$layout_defs["GI_Products"]["subpanel_setup"]['gi_products_campaigns_1'] = array (
  'order' => 100,
  'module' => 'Campaigns',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
  'get_subpanel_data' => 'gi_products_campaigns_1',
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
