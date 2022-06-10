<?php
// created: 2015-10-22 07:30:37
$dictionary["gi_mobile_messages_prospectlists_1"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'gi_mobile_messages_prospectlists_1' => 
    array (
      'lhs_module' => 'GI_Mobile_Messages',
      'lhs_table' => 'gi_mobile_messages',
      'lhs_key' => 'id',
      'rhs_module' => 'ProspectLists',
      'rhs_table' => 'prospect_lists',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gi_mobile_messages_prospectlists_1_c',
      'join_key_lhs' => 'gi_mobile_messages_prospectlists_1gi_mobile_messages_ida',
      'join_key_rhs' => 'gi_mobile_messages_prospectlists_1prospectlists_idb',
    ),
  ),
  'table' => 'gi_mobile_messages_prospectlists_1_c',
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
      'name' => 'gi_mobile_messages_prospectlists_1gi_mobile_messages_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gi_mobile_messages_prospectlists_1prospectlists_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gi_mobile_messages_prospectlists_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gi_mobile_messages_prospectlists_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gi_mobile_messages_prospectlists_1gi_mobile_messages_ida',
        1 => 'gi_mobile_messages_prospectlists_1prospectlists_idb',
      ),
    ),
  ),
);