<?php
// created: 2014-11-20 05:53:08
$dictionary["gi_products_catalog_users_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_products_catalog_users_1' => 
    array (
      'lhs_module' => 'GI_Products_Catalog',
      'lhs_table' => 'gi_products_catalog',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_products_catalog_users_1_c',
      'join_key_lhs' => 'gi_products_catalog_users_1gi_products_catalog_ida',
      'join_key_rhs' => 'gi_products_catalog_users_1users_idb',
    ),
  ),
  'table' => 'gi_products_catalog_users_1_c',
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
      'name' => 'gi_products_catalog_users_1gi_products_catalog_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_products_catalog_users_1users_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_products_catalog_users_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_products_catalog_users_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_products_catalog_users_1gi_products_catalog_ida',
        1 => 'gi_products_catalog_users_1users_idb',
      ),
    ),
  ),
);