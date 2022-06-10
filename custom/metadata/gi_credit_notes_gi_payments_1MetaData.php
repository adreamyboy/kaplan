<?php
// created: 2014-06-01 17:38:34
$dictionary["gi_credit_notes_gi_payments_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_credit_notes_gi_payments_1' => 
    array (
      'lhs_module' => 'GI_Credit_Notes',
      'lhs_table' => 'gi_credit_notes',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Payments',
      'rhs_table' => 'gi_payments',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_credit_notes_gi_payments_1_c',
      'join_key_lhs' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
      'join_key_rhs' => 'gi_credit_notes_gi_payments_1gi_payments_idb',
    ),
  ),
  'table' => 'gi_credit_notes_gi_payments_1_c',
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
      'name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_credit_notes_gi_payments_1gi_payments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_credit_notes_gi_payments_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_credit_notes_gi_payments_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gi_credit_notes_gi_payments_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_credit_notes_gi_payments_1gi_payments_idb',
      ),
    ),
  ),
);