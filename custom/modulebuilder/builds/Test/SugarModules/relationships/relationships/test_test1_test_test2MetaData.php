<?php
// created: 2014-05-08 23:28:29
$dictionary["test_test1_test_test2"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'test_test1_test_test2' => 
    array (
      'lhs_module' => 'Test_Test2',
      'lhs_table' => 'test_test2',
      'lhs_key' => 'id',
      'rhs_module' => 'Test_Test1',
      'rhs_table' => 'test_test1',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'test_test1_test_test2_c',
      'join_key_lhs' => 'test_test1_test_test2test_test2_ida',
      'join_key_rhs' => 'test_test1_test_test2test_test1_idb',
    ),
  ),
  'table' => 'test_test1_test_test2_c',
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
      'name' => 'test_test1_test_test2test_test2_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'test_test1_test_test2test_test1_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'test_test1_test_test2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'test_test1_test_test2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'test_test1_test_test2test_test2_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'test_test1_test_test2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'test_test1_test_test2test_test1_idb',
      ),
    ),
  ),
);