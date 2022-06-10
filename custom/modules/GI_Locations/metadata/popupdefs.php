<?php
$popupMeta = array (
    'moduleMain' => 'GI_Locations',
    'varName' => 'GI_Locations',
    'orderBy' => 'gi_locations.name',
    'whereClauses' => array (
  'name' => 'gi_locations.name',
  'assigned_user_id' => 'gi_locations.assigned_user_id',
  'gi_country_gi_locations_1_name' => 'gi_locations.gi_country_gi_locations_1_name',
  'discontinued' => 'gi_locations.discontinued',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'assigned_user_id',
  5 => 'gi_country_gi_locations_1_name',
  6 => 'discontinued',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
  'gi_country_gi_locations_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_COUNTRY_GI_LOCATIONS_1_FROM_GI_COUNTRY_TITLE',
    'id' => 'GI_COUNTRY_GI_LOCATIONS_1GI_COUNTRY_IDA',
    'width' => '10%',
    'name' => 'gi_country_gi_locations_1_name',
  ),
  'discontinued' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued',
  ),
),
);
