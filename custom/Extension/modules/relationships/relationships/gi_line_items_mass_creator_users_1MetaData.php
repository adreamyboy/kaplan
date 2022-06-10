<?php
// created: 2015-11-11 03:49:39
$dictionary["gi_line_items_mass_creator_users_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_line_items_mass_creator_users_1' => 
    array (
      'lhs_module' => 'GI_Line_Items_Mass_Creator',
      'lhs_table' => 'gi_line_items_mass_creator',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_line_items_mass_creator_users_1_c',
      'join_key_lhs' => 'gi_line_items_mass_creator_users_1gi_line_items_mass_creator_ida',
      'join_key_rhs' => 'gi_line_items_mass_creator_users_1users_idb',
    ),
  ),
  'table' => 'gi_line_items_mass_creator_users_1_c',
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
      'name' => 'gi_line_items_mass_creator_users_1gi_line_items_mass_creator_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_line_items_mass_creator_users_1users_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_line_items_mass_creator_users_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_line_items_mass_creator_users_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_line_items_mass_creator_users_1gi_line_items_mass_creator_ida',
        1 => 'gi_line_items_mass_creator_users_1users_idb',
      ),
    ),
  ),
);