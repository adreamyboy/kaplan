<?php
 // created: 2014-05-06 13:00:13
$layout_defs["GI_Regions"]["subpanel_setup"]['gi_regions_gi_country_1'] = array (
  'order' => 100,
  'module' => 'GI_Country',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_COUNTRY_TITLE',
  'get_subpanel_data' => 'gi_regions_gi_country_1',
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
