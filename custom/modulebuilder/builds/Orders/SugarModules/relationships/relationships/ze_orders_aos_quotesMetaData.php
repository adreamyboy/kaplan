<?php
// created: 2021-12-01 12:24:57
$dictionary["ze_orders_aos_quotes"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'ze_orders_aos_quotes' => 
    array (
      'lhs_module' => 'ZE_Orders',
      'lhs_table' => 'ze_orders',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Quotes',
      'rhs_table' => 'aos_quotes',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ze_orders_aos_quotes_c',
      'join_key_lhs' => 'ze_orders_aos_quotesze_orders_ida',
      'join_key_rhs' => 'ze_orders_aos_quotesaos_quotes_idb',
    ),
  ),
  'table' => 'ze_orders_aos_quotes_c',
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
      'name' => 'ze_orders_aos_quotesze_orders_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ze_orders_aos_quotesaos_quotes_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ze_orders_aos_quotesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ze_orders_aos_quotes_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ze_orders_aos_quotesze_orders_ida',
        1 => 'ze_orders_aos_quotesaos_quotes_idb',
      ),
    ),
  ),
);