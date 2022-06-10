<?php
// created: 2015-02-07 19:56:31
$dictionary["gi_surveys_gi_questions_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_surveys_gi_questions_1' => 
    array (
      'lhs_module' => 'GI_Surveys',
      'lhs_table' => 'gi_surveys',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Questions',
      'rhs_table' => 'gi_questions',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_surveys_gi_questions_1_c',
      'join_key_lhs' => 'gi_surveys_gi_questions_1gi_surveys_ida',
      'join_key_rhs' => 'gi_surveys_gi_questions_1gi_questions_idb',
    ),
  ),
  'table' => 'gi_surveys_gi_questions_1_c',
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
      'name' => 'gi_surveys_gi_questions_1gi_surveys_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_surveys_gi_questions_1gi_questions_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_surveys_gi_questions_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_surveys_gi_questions_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_surveys_gi_questions_1gi_surveys_ida',
        1 => 'gi_surveys_gi_questions_1gi_questions_idb',
      ),
    ),
  ),
);