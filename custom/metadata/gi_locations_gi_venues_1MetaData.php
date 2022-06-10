<?php
// created: 2014-05-06 14:03:51
$dictionary["gi_locations_gi_venues_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_locations_gi_venues_1' => 
    array (
      'lhs_module' => 'GI_Locations',
      'lhs_table' => 'gi_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Venues',
      'rhs_table' => 'gi_venues',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_locations_gi_venues_1_c',
      'join_key_lhs' => 'gi_locations_gi_venues_1gi_locations_ida',
      'join_key_rhs' => 'gi_locations_gi_venues_1gi_venues_idb',
    ),
  ),
  'table' => 'gi_locations_gi_venues_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'gi_locations_gi_venues_1gi_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_locations_gi_venues_1gi_venues_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_locations_gi_venues_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_locations_gi_venues_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_locations_gi_venues_1gi_locations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_locations_gi_venues_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_locations_gi_venues_1gi_venues_idb',
      ),
    ),
  ),
);