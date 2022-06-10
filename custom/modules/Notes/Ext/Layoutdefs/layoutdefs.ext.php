<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-11-11 09:13:31
$layout_defs["Notes"]["subpanel_setup"]['gi_line_items_mass_creator_notes_1'] = array (
  'order' => 100,
  'module' => 'GI_Line_Items_Mass_Creator',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_NOTES_1_FROM_GI_LINE_ITEMS_MASS_CREATOR_TITLE',
  'get_subpanel_data' => 'gi_line_items_mass_creator_notes_1',
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



$layout_defs['Notes']['subpanel_setup']['securitygroups'] = array(
	'top_buttons' => array(array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'SecurityGroups', 'mode' => 'MultiSelect'),),
	'order' => 900,
	'sort_by' => 'name',
	'sort_order' => 'asc',
	'module' => 'SecurityGroups',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'SecurityGroups',
	'add_subpanel_data' => 'securitygroup_id',
	'title_key' => 'LBL_SECURITYGROUPS_SUBPANEL_TITLE',
);




?>