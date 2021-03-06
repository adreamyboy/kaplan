<?php
// created: 2015-10-22 10:37:25
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_SUBJECT',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'gi_products_meetings_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_MEETINGS_1GI_PRODUCTS_IDA',
    'width' => '25%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products',
    'target_record_key' => 'gi_products_meetings_1gi_products_ida',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'vname' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'location' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'date_start' => 
  array (
    'name' => 'date_start',
    'vname' => 'LBL_LIST_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'assigned_user_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'width' => '2%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'width' => '2%',
    'default' => true,
  ),
  'recurring_source' => 
  array (
    'usage' => 'query_only',
  ),
);