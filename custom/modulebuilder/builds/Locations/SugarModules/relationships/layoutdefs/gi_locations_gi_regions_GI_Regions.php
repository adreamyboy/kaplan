<?php
 // created: 2014-05-06 09:59:36
$layout_defs["GI_Regions"]["subpanel_setup"]['gi_locations_gi_regions'] = array (
  'order' => 100,
  'module' => 'GI_Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_LOCATIONS_GI_REGIONS_FROM_GI_LOCATIONS_TITLE',
  'get_subpanel_data' => 'gi_locations_gi_regions',
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
