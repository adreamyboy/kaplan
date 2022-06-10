<?php
// created: 2015-02-07 19:57:52
$dictionary["gi_attempts_gi_responses_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_attempts_gi_responses_1' => 
    array (
      'lhs_module' => 'GI_Attempts',
      'lhs_table' => 'gi_attempts',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Responses',
      'rhs_table' => 'gi_responses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_attempts_gi_responses_1_c',
      'join_key_lhs' => 'gi_attempts_gi_responses_1gi_attempts_ida',
      'join_key_rhs' => 'gi_attempts_gi_responses_1gi_responses_idb',
    ),
  ),
  'table' => 'gi_attempts_gi_responses_1_c',
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
      'name' => 'gi_attempts_gi_responses_1gi_attempts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_attempts_gi_responses_1gi_responses_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_attempts_gi_responses_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_attempts_gi_responses_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_attempts_gi_responses_1gi_attempts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_attempts_gi_responses_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_attempts_gi_responses_1gi_responses_idb',
      ),
    ),
  ),
);