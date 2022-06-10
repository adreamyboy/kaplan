<?php
// created: 2014-05-29 08:27:28
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1"] = array (
  'name' => 'accounts_gi_credit_notes_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_credit_notes_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_gi_credit_notes_1accounts_ida',
);
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1_name"] = array (
  'name' => 'accounts_gi_credit_notes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_gi_credit_notes_1accounts_ida',
  'link' => 'accounts_gi_credit_notes_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1accounts_ida"] = array (
  'name' => 'accounts_gi_credit_notes_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_gi_credit_notes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_GI_CREDIT_NOTES_TITLE',
);
