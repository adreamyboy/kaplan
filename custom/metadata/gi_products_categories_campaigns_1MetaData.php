<?php
// created: 2014-06-17 06:49:45
$dictionary["gi_products_categories_campaigns_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_products_categories_campaigns_1' => 
    array (
      'lhs_module' => 'GI_Products_Categories',
      'lhs_table' => 'gi_products_categories',
      'lhs_key' => 'id',
      'rhs_module' => 'Campaigns',
      'rhs_table' => 'campaigns',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_products_categories_campaigns_1_c',
      'join_key_lhs' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
      'join_key_rhs' => 'gi_products_categories_campaigns_1campaigns_idb',
    ),
  ),
  'table' => 'gi_products_categories_campaigns_1_c',
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
      'name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_products_categories_campaigns_1campaigns_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_products_categories_campaigns_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_products_categories_campaigns_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_products_categories_campaigns_1gi_products_categories_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_products_categories_campaigns_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_products_categories_campaigns_1campaigns_idb',
      ),
    ),
  ),
);