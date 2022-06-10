<?php
 // created: 2015-02-07 19:53:07
$layout_defs["GI_Surveys"]["subpanel_setup"]['gi_surveys_gi_attempts_1'] = array (
  'order' => 100,
  'module' => 'GI_Attempts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
  'get_subpanel_data' => 'gi_surveys_gi_attempts_1',
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
