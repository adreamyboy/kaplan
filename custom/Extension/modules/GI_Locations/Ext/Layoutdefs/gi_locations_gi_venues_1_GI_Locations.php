<?php
 // created: 2014-05-06 14:03:51
$layout_defs["GI_Locations"]["subpanel_setup"]['gi_locations_gi_venues_1'] = array (
  'order' => 100,
  'module' => 'GI_Venues',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_LOCATIONS_GI_VENUES_1_FROM_GI_VENUES_TITLE',
  'get_subpanel_data' => 'gi_locations_gi_venues_1',
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
