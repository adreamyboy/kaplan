<?php
// created: 2014-05-06 09:59:36
$dictionary["gi_locations_gi_regions"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'gi_locations_gi_regions' => 
    array (
      'lhs_module' => 'GI_Regions',
      'lhs_table' => 'gi_regions',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Locations',
      'rhs_table' => 'gi_locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_locations_gi_regions_c',
      'join_key_lhs' => 'gi_locations_gi_regionsgi_regions_ida',
      'join_key_rhs' => 'gi_locations_gi_regionsgi_locations_idb',
    ),
  ),
  'table' => 'gi_locations_gi_regions_c',
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
      'name' => 'gi_locations_gi_regionsgi_regions_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_locations_gi_regionsgi_locations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_locations_gi_regionsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_locations_gi_regions_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_locations_gi_regionsgi_regions_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_locations_gi_regions_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_locations_gi_regionsgi_locations_idb',
      ),
    ),
  ),
);