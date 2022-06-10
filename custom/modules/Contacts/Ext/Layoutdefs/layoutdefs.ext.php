<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-05-06 12:41:33
$layout_defs["Contacts"]["subpanel_setup"]['accounts_contacts'] = array (
  'order' => 200,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_SUBPANEL_TITLE',
  'get_subpanel_data' => 'accounts',
  'top_buttons' => 
  array (
    /*
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);


 // created: 2015-07-13 01:47:35
$layout_defs["Contacts"]["subpanel_setup"]['contacts_accounts_1'] = array (
  'order' => 300,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_ACCOUNTS_1_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'contacts_accounts_1',
  'top_buttons' => 
  array (
    /*
	0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
	*/
  ),
);


 // created: 2015-02-07 20:09:13
$layout_defs["Contacts"]["subpanel_setup"]['contacts_gi_attempts_1'] = array (
  'order' => 100,
  'module' => 'GI_Attempts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
  'get_subpanel_data' => 'contacts_gi_attempts_1',
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


 // created: 2014-05-06 12:41:33
$layout_defs["Contacts"]["subpanel_setup"]['contacts_gi_line_items_1'] = array (
  'order' => 100,
  'module' => 'GI_Line_Items',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
  'get_subpanel_data' => 'contacts_gi_line_items_1',
  'top_buttons' => 
  array (
    /*
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);


 // created: 2015-10-22 07:35:50
$layout_defs["Contacts"]["subpanel_setup"]['contacts_gi_mobile_registrations_1'] = array (
  'order' => 100,
  'module' => 'GI_Mobile_Registrations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_GI_MOBILE_REGISTRATIONS_1_FROM_GI_MOBILE_REGISTRATIONS_TITLE',
  'get_subpanel_data' => 'contacts_gi_mobile_registrations_1',
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


 // created: 2015-02-16 21:48:56
$layout_defs["Contacts"]["subpanel_setup"]['contacts_gi_testimonials_1'] = array (
  'order' => 100,
  'module' => 'GI_Testimonials',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_GI_TESTIMONIALS_TITLE',
  'get_subpanel_data' => 'contacts_gi_testimonials_1',
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



$layout_defs['Contacts']['subpanel_setup']['securitygroups'] = array(
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
$layout_defs['Contacts']['subpanel_setup']['accounts_contacts']['override_subpanel_name'] = 'Contact_subpanel_accounts_contacts';


//auto-generated file DO NOT EDIT
$layout_defs['Contacts']['subpanel_setup']['contacts_accounts_1']['override_subpanel_name'] = 'Contact_subpanel_contacts_accounts_1';


//auto-generated file DO NOT EDIT
$layout_defs['Contacts']['subpanel_setup']['contacts_gi_line_items_1']['override_subpanel_name'] = 'Contact_subpanel_contacts_gi_line_items_1';


//auto-generated file DO NOT EDIT
$layout_defs['Contacts']['subpanel_setup']['contacts_gi_mobile_registrations_1']['override_subpanel_name'] = 'Contact_subpanel_contacts_gi_mobile_registrations_1';


//auto-generated file DO NOT EDIT
$layout_defs['Contacts']['subpanel_setup']['opportunities']['override_subpanel_name'] = 'Contact_subpanel_opportunities';

?>