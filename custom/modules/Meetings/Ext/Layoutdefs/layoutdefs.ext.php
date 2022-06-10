<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-02-07 20:02:16
$layout_defs["Meetings"]["subpanel_setup"]['meetings_gi_attempts_1'] = array (
  'order' => 100,
  'module' => 'GI_Attempts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
  'get_subpanel_data' => 'meetings_gi_attempts_1',
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



$layout_defs['Meetings']['subpanel_setup']['securitygroups'] = array(
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






//auto-generated file DO NOT EDIT
$layout_defs['Meetings']['subpanel_setup']['contacts']['override_subpanel_name'] = 'Meeting_subpanel_contacts';

?>