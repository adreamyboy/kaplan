<?php
// created: 2021-06-08 21:44:46
$dictionary["prospectlists_opportunities_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'prospectlists_opportunities_1' => 
    array (
      'lhs_module' => 'ProspectLists',
      'lhs_table' => 'prospect_lists',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'prospectlists_opportunities_1_c',
      'join_key_lhs' => 'prospectlists_opportunities_1prospectlists_ida',
      'join_key_rhs' => 'prospectlists_opportunities_1opportunities_idb',
    ),
  ),
  'table' => 'prospectlists_opportunities_1_c',
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
      'name' => 'prospectlists_opportunities_1prospectlists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'prospectlists_opportunities_1opportunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'prospectlists_opportunities_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'prospectlists_opportunities_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'prospectlists_opportunities_1prospectlists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'prospectlists_opportunities_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'prospectlists_opportunities_1opportunities_idb',
      ),
    ),
  ),
);