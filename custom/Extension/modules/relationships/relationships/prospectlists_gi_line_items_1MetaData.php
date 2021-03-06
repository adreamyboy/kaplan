<?php
// created: 2021-06-08 10:32:01
$dictionary["prospectlists_gi_line_items_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'prospectlists_gi_line_items_1' => 
    array (
      'lhs_module' => 'ProspectLists',
      'lhs_table' => 'prospect_lists',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Line_Items',
      'rhs_table' => 'gi_line_items',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'prospectlists_gi_line_items_1_c',
      'join_key_lhs' => 'prospectlists_gi_line_items_1prospectlists_ida',
      'join_key_rhs' => 'prospectlists_gi_line_items_1gi_line_items_idb',
    ),
  ),
  'table' => 'prospectlists_gi_line_items_1_c',
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
      'name' => 'prospectlists_gi_line_items_1prospectlists_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'prospectlists_gi_line_items_1gi_line_items_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'prospectlists_gi_line_items_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'prospectlists_gi_line_items_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'prospectlists_gi_line_items_1prospectlists_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'prospectlists_gi_line_items_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'prospectlists_gi_line_items_1gi_line_items_idb',
      ),
    ),
  ),
);