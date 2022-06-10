<?php
// created: 2014-11-11 03:01:02
$dictionary["gi_discounts_prospectlists_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_discounts_prospectlists_1' => 
    array (
      'lhs_module' => 'GI_Discounts',
      'lhs_table' => 'gi_discounts',
      'lhs_key' => 'id',
      'rhs_module' => 'ProspectLists',
      'rhs_table' => 'prospect_lists',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_discounts_prospectlists_1_c',
      'join_key_lhs' => 'gi_discounts_prospectlists_1gi_discounts_ida',
      'join_key_rhs' => 'gi_discounts_prospectlists_1prospectlists_idb',
    ),
  ),
  'table' => 'gi_discounts_prospectlists_1_c',
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
      'name' => 'gi_discounts_prospectlists_1gi_discounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_discounts_prospectlists_1prospectlists_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_discounts_prospectlists_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_discounts_prospectlists_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_discounts_prospectlists_1gi_discounts_ida',
        1 => 'gi_discounts_prospectlists_1prospectlists_idb',
      ),
    ),
  ),
);