<?php
// created: 2014-05-06 12:41:33
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1"] = array (
  'name' => 'contacts_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'contacts_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_gi_line_items_1contacts_ida',
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1_name"] = array (
  'name' => 'contacts_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_gi_line_items_1contacts_ida',
  'link' => 'contacts_gi_line_items_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1contacts_ida"] = array (
  'name' => 'contacts_gi_line_items_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);
