<?php
$dashletData['MeetingsDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'status' => 
  array (
    'default' => '',
  ),
  'date_start' => 
  array (
    'default' => '',
  ),
  'date_end' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
  'venue_status_c' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
  'gi_surveys_meetings_1_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['MeetingsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_SUBJECT',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_start' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'time_start',
    ),
    'name' => 'date_start',
  ),
  'gi_products_meetings_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_MEETINGS_1GI_PRODUCTS_IDA',
    'width' => '25%',
    'default' => true,
    'name' => 'gi_products_meetings_1_name',
  ),
  'gi_surveys_meetings_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_SURVEYS_MEETINGS_1_FROM_GI_SURVEYS_TITLE',
    'id' => 'GI_SURVEYS_MEETINGS_1GI_SURVEYS_IDA',
    'width' => '25%',
    'default' => true,
    'name' => 'gi_surveys_meetings_1_name',
  ),
  'duration' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DURATION',
    'sortable' => false,
    'related_fields' => 
    array (
      0 => 'duration_hours',
      1 => 'duration_minutes',
    ),
    'name' => 'duration',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => false,
  ),
  'set_accept_links' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ACCEPT_THIS',
    'sortable' => false,
    'default' => false,
    'related_fields' => 
    array (
      0 => 'status',
    ),
    'name' => 'set_accept_links',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'location' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => false,
    'name' => 'location',
  ),
  'venue_status_c' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_VENUE_STATUS',
    'width' => '10%',
    'name' => 'venue_status_c',
  ),
  'date_end' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATE_END',
    'width' => '10%',
    'default' => false,
    'name' => 'date_end',
  ),
);
