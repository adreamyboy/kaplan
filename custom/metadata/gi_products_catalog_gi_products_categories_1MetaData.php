<?php
// created: 2014-05-06 18:29:53
$dictionary["gi_products_catalog_gi_products_categories_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_products_catalog_gi_products_categories_1' => 
    array (
      'lhs_module' => 'GI_Products_Catalog',
      'lhs_table' => 'gi_products_catalog',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products_Categories',
      'rhs_table' => 'gi_products_categories',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_products_catalog_gi_products_categories_1_c',
      'join_key_lhs' => 'gi_productbf6ccatalog_ida',
      'join_key_rhs' => 'gi_product4c35egories_idb',
    ),
  ),
  'table' => 'gi_products_catalog_gi_products_categories_1_c',
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
      'name' => 'gi_productbf6ccatalog_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_product4c35egories_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_products_catalog_gi_products_categories_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_products_catalog_gi_products_categories_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_productbf6ccatalog_ida',
        1 => 'gi_product4c35egories_idb',
      ),
    ),
  ),
);