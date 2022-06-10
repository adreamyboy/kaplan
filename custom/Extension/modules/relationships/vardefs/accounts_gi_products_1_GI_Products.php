<?php
// created: 2014-06-02 09:51:30
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1"] = array (
  'name' => 'accounts_gi_products_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_products_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_gi_products_1accounts_ida',
);
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1_name"] = array (
  'name' => 'accounts_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_gi_products_1accounts_ida',
  'link' => 'accounts_gi_products_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1accounts_ida"] = array (
  'name' => 'accounts_gi_products_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);
