<?php
 // created: 2015-11-11 03:49:39
$layout_defs["GI_Line_Items_Mass_Creator"]["subpanel_setup"]['gi_line_items_mass_creator_users_1'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_USERS_1_FROM_USERS_TITLE',
  'get_subpanel_data' => 'gi_line_items_mass_creator_users_1',
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
