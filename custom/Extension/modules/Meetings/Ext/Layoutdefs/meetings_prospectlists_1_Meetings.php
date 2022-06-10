<?php
 // created: 2014-10-13 13:30:33
$layout_defs["Meetings"]["subpanel_setup"]['meetings_prospectlists_1'] = array (
  'order' => 100,
  'module' => 'ProspectLists',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MEETINGS_PROSPECTLISTS_1_FROM_PROSPECTLISTS_TITLE',
  'get_subpanel_data' => 'meetings_prospectlists_1',
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
