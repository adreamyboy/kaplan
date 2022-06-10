<?php
 // created: 2014-05-06 13:01:24
$layout_defs["GI_Country"]["subpanel_setup"]['gi_country_gi_locations_1'] = array (
  'order' => 100,
  'module' => 'GI_Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_COUNTRY_GI_LOCATIONS_1_FROM_GI_LOCATIONS_TITLE',
  'get_subpanel_data' => 'gi_country_gi_locations_1',
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
