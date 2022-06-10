<?php
// created: 2014-05-10 16:36:43
$dictionary["test_test1_test_test2_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'test_test1_test_test2_1' => 
    array (
      'lhs_module' => 'Test_Test1',
      'lhs_table' => 'test_test1',
      'lhs_key' => 'id',
      'rhs_module' => 'Test_Test2',
      'rhs_table' => 'test_test2',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'test_test1_test_test2_1_c',
      'join_key_lhs' => 'test_test1_test_test2_1test_test1_ida',
      'join_key_rhs' => 'test_test1_test_test2_1test_test2_idb',
    ),
  ),
  'table' => 'test_test1_test_test2_1_c',
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
      'name' => 'test_test1_test_test2_1test_test1_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'test_test1_test_test2_1test_test2_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'test_test1_test_test2_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'test_test1_test_test2_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'test_test1_test_test2_1test_test1_ida',
        1 => 'test_test1_test_test2_1test_test2_idb',
      ),
    ),
  ),
);