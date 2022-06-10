<?php
// created: 2015-07-08 05:44:07
$dictionary["gi_exam_results_gi_products_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_exam_results_gi_products_1' => 
    array (
      'lhs_module' => 'GI_Exam_Results',
      'lhs_table' => 'gi_exam_results',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_exam_results_gi_products_1_c',
      'join_key_lhs' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
      'join_key_rhs' => 'gi_exam_results_gi_products_1gi_products_idb',
    ),
  ),
  'table' => 'gi_exam_results_gi_products_1_c',
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
      'name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_exam_results_gi_products_1gi_products_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_exam_results_gi_products_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_exam_results_gi_products_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_exam_results_gi_products_1gi_exam_results_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_exam_results_gi_products_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_exam_results_gi_products_1gi_products_idb',
      ),
    ),
  ),
);