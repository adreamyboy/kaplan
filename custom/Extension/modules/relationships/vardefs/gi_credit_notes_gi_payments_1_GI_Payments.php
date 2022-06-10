<?php
// created: 2014-06-01 17:38:34
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1"] = array (
  'name' => 'gi_credit_notes_gi_payments_1',
  'type' => 'link',
  'relationship' => 'gi_credit_notes_gi_payments_1',
  'source' => 'non-db',
  'module' => 'GI_Credit_Notes',
  'bean_name' => 'GI_Credit_Notes',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_CREDIT_NOTES_TITLE',
  'id_name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
);
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1_name"] = array (
  'name' => 'gi_credit_notes_gi_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_CREDIT_NOTES_TITLE',
  'save' => true,
  'id_name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
  'link' => 'gi_credit_notes_gi_payments_1',
  'table' => 'gi_credit_notes',
  'module' => 'GI_Credit_Notes',
  'rname' => 'name',
);
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1gi_credit_notes_ida"] = array (
  'name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
  'type' => 'link',
  'relationship' => 'gi_credit_notes_gi_payments_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);
