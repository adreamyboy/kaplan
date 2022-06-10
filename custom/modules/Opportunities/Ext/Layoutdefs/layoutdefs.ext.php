<?php 
 //WARNING: The contents of this file are auto-generated


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$layout_defs['Opportunities']['subpanel_setup']['activities']['top_buttons'] = array(
				array('widget_class' => 'SubPanelTopCreateTaskButton'),
				array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
				array('widget_class' => 'SubPanelTopScheduleCallButton'),
				array('widget_class' => 'SubPanelTopComposeEmailButton'),
				array('widget_class' => 'SubPanelTopSendSmsButton'),
			);


/**
 * sps_opportunitiesLayoutdefs.php
 * @author SalesAgility <support@salesagility.com>
 * Date: 27/01/14
 */


$layout_defs["Opportunities"]["subpanel_setup"]["history"]['searchdefs'] =
array (
    'collection' =>
        array (
            'name' => 'collection',
            'label' => 'LBL_COLLECTION_TYPE',
            'type' => 'enum',
            'options' => $GLOBALS['app_list_strings']['collection_temp_list'],
            'default' => true,
            'width' => '10%',
        ),
    'name' =>
        array (
            'name' => 'name',
            'default' => true,
            'width' => '10%',
        ),
        /*
    'current_user_only' =>
        array (
            'name' => 'current_user_only',
            'label' => 'LBL_CURRENT_USER_FILTER',
            'type' => 'bool',
            'default' => true,
            'width' => '10%',
        ),
    'date_modified' =>
        array (
            'name' => 'date_modified',
            'default' => true,
            'width' => '10%',
        ),
        */
);

$layout_defs["Opportunities"]["subpanel_setup"]["history"]['top_buttons'][] = array('widget_class' => 'SubPanelTopFilterButton');

 // created: 2014-05-06 12:42:35
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_gi_line_items_1'] = array (
  'order' => 100,
  'module' => 'GI_Line_Items',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
  'get_subpanel_data' => 'opportunities_gi_line_items_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
      //'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    /*
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);


 // created: 2014-05-29 06:25:06
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_gi_payments_1'] = array (
  'order' => 100,
  'module' => 'GI_Payments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
  'get_subpanel_data' => 'opportunities_gi_payments_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
      //'widget_class' => 'SubPanelTopButton',
      //'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    /*
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);



$layout_defs['Opportunities']['subpanel_setup']['securitygroups'] = array(
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






/**
 * sps_opportunitiesLayoutdefs.php
 * @author SalesAgility <support@salesagility.com>
 * Date: 27/01/14
 */


$layout_defs["Opportunities"]["subpanel_setup"]["history"]['searchdefs'] =
array (
    'collection' =>
        array (
            'name' => 'collection',
            'label' => 'LBL_COLLECTION_TYPE',
            'type' => 'enum',
            'options' => $GLOBALS['app_list_strings']['collection_temp_list'],
            'default' => true,
            'width' => '10%',
        ),
    'name' =>
        array (
            'name' => 'name',
            'default' => true,
            'width' => '10%',
        ),
        /*
    'current_user_only' =>
        array (
            'name' => 'current_user_only',
            'label' => 'LBL_CURRENT_USER_FILTER',
            'type' => 'bool',
            'default' => true,
            'width' => '10%',
        ),
    'date_modified' =>
        array (
            'name' => 'date_modified',
            'default' => true,
            'width' => '10%',
        ),
        */
);

$layout_defs["Opportunities"]["subpanel_setup"]["history"]['top_buttons'][] = array('widget_class' => 'SubPanelTopFilterButton');

//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['contacts']['override_subpanel_name'] = 'Opportunity_subpanel_contacts';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['leads']['override_subpanel_name'] = 'Opportunity_subpanel_leads';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['opportunities_gi_line_items_1']['override_subpanel_name'] = 'Opportunity_subpanel_opportunities_gi_line_items_1';


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['opportunities_gi_payments_1']['override_subpanel_name'] = 'Opportunity_subpanel_opportunities_gi_payments_1';

?>