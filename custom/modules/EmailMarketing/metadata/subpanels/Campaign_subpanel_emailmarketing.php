<?php
// created: 2014-10-20 04:36:46
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_LIST_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '40%',
    'default' => true,
  ),
  'date_start' => 
  array (
    'vname' => 'LBL_LIST_DATE_START',
    'width' => '20%',
    'default' => true,
  ),
  'status' => 
  array (
    'vname' => 'LBL_LIST_STATUS',
    'width' => '15%',
    'default' => true,
  ),
  'template_name' => 
  array (
    'vname' => 'LBL_LIST_TEMPLATE_NAME',
    'width' => '15%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_record_key' => 'template_id',
    'target_module' => 'EmailTemplates',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'EmailMarketing',
    'width' => '5%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'EmailMarketing',
    'width' => '5%',
    'default' => true,
  ),
  'time_start' => 
  array (
    'usage' => 'query_only',
  ),
);