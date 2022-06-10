<?php
// created: 2015-11-11 03:50:09
$dictionary["gi_line_items_mass_creator_gi_products_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_line_items_mass_creator_gi_products_1' => 
    array (
      'lhs_module' => 'GI_Line_Items_Mass_Creator',
      'lhs_table' => 'gi_line_items_mass_creator',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_line_items_mass_creator_gi_products_1_c',
      'join_key_lhs' => 'gi_line_itbb2fcreator_ida',
      'join_key_rhs' => 'gi_line_items_mass_creator_gi_products_1gi_products_idb',
    ),
  ),
  'table' => 'gi_line_items_mass_creator_gi_products_1_c',
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
      'name' => 'gi_line_itbb2fcreator_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_line_items_mass_creator_gi_products_1gi_products_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_line_items_mass_creator_gi_products_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_line_items_mass_creator_gi_products_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_line_itbb2fcreator_ida',
        1 => 'gi_line_items_mass_creator_gi_products_1gi_products_idb',
      ),
    ),
  ),
);