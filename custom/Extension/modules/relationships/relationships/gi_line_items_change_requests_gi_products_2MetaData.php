<?php
// created: 2015-03-10 20:38:41
$dictionary["gi_line_items_change_requests_gi_products_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_line_items_change_requests_gi_products_2' => 
    array (
      'lhs_module' => 'GI_Line_Items_Change_Requests',
      'lhs_table' => 'gi_line_items_change_requests',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_line_items_change_requests_gi_products_2_c',
      'join_key_lhs' => 'gi_line_it60abequests_ida',
      'join_key_rhs' => 'gi_line_items_change_requests_gi_products_2gi_products_idb',
    ),
  ),
  'table' => 'gi_line_items_change_requests_gi_products_2_c',
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
      'name' => 'gi_line_it60abequests_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2gi_products_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_line_it60abequests_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_line_items_change_requests_gi_products_2gi_products_idb',
      ),
    ),
  ),
);