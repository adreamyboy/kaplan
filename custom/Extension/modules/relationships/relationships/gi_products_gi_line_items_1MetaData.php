<?php
// created: 2014-05-08 09:52:12
$dictionary["gi_products_gi_line_items_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_products_gi_line_items_1' => 
    array (
      'lhs_module' => 'GI_Products',
      'lhs_table' => 'gi_products',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Line_Items',
      'rhs_table' => 'gi_line_items',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_products_gi_line_items_1_c',
      'join_key_lhs' => 'gi_products_gi_line_items_1gi_products_ida',
      'join_key_rhs' => 'gi_products_gi_line_items_1gi_line_items_idb',
    ),
  ),
  'table' => 'gi_products_gi_line_items_1_c',
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
      'name' => 'gi_products_gi_line_items_1gi_products_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_products_gi_line_items_1gi_line_items_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_products_gi_line_items_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_products_gi_line_items_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_products_gi_line_items_1gi_products_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_products_gi_line_items_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_products_gi_line_items_1gi_line_items_idb',
      ),
    ),
  ),
);