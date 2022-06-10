<?php
// created: 2015-08-19 23:06:30
$dictionary["gi_products_gi_elearning_courses_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_products_gi_elearning_courses_1' => 
    array (
      'lhs_module' => 'GI_Products',
      'lhs_table' => 'gi_products',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_eLearning_Courses',
      'rhs_table' => 'gi_elearning_courses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_products_gi_elearning_courses_1_c',
      'join_key_lhs' => 'gi_products_gi_elearning_courses_1gi_products_ida',
      'join_key_rhs' => 'gi_products_gi_elearning_courses_1gi_elearning_courses_idb',
    ),
  ),
  'table' => 'gi_products_gi_elearning_courses_1_c',
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
      'name' => 'gi_products_gi_elearning_courses_1gi_products_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_products_gi_elearning_courses_1gi_elearning_courses_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_products_gi_elearning_courses_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_products_gi_elearning_courses_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_products_gi_elearning_courses_1gi_products_ida',
        1 => 'gi_products_gi_elearning_courses_1gi_elearning_courses_idb',
      ),
    ),
  ),
);