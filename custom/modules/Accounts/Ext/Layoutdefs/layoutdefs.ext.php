<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-05-29 08:27:28
$layout_defs["Accounts"]["subpanel_setup"]['accounts_gi_credit_notes_1'] = array (
  'order' => 100,
  'module' => 'GI_Credit_Notes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_GI_CREDIT_NOTES_TITLE',
  'get_subpanel_data' => 'accounts_gi_credit_notes_1',
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


 // created: 2014-06-02 09:51:29
$layout_defs["Accounts"]["subpanel_setup"]['accounts_gi_products_1'] = array (
  'order' => 100,
  'module' => 'GI_Products',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
  'get_subpanel_data' => 'accounts_gi_products_1',
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




$layout_defs['Accounts']['subpanel_setup']['securitygroups'] = array(
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
$layout_defs['Accounts']['subpanel_setup']['accounts_gi_credit_notes_1']['override_subpanel_name'] = 'Account_subpanel_accounts_gi_credit_notes_1';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['accounts_gi_products_1']['override_subpanel_name'] = 'Account_subpanel_accounts_gi_products_1';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['contacts']['override_subpanel_name'] = 'Account_subpanel_contacts';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['opportunities']['override_subpanel_name'] = 'Account_subpanel_opportunities';

?>