<?php
$popupMeta = array (
    'moduleMain' => 'GI_Credit_Notes',
    'varName' => 'GI_Credit_Notes',
    'orderBy' => 'gi_credit_notes.name',
    'whereClauses' => array (
  'name' => 'gi_credit_notes.name',
  'accounts_gi_credit_notes_1_name' => 'gi_credit_notes.accounts_gi_credit_notes_1_name',
  'amount_c' => 'gi_credit_notes_cstm.amount_c',
  'amount_allocated_c' => 'gi_credit_notes_cstm.amount_allocated_c',
  'amount_unallocated_c' => 'gi_credit_notes_cstm.amount_unallocated_c',
  'date_issued_c' => 'gi_credit_notes_cstm.date_issued_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'accounts_gi_credit_notes_1_name',
  5 => 'amount_c',
  6 => 'amount_allocated_c',
  7 => 'amount_unallocated_c',
  8 => 'date_issued_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'accounts_gi_credit_notes_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_GI_CREDIT_NOTES_1ACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'accounts_gi_credit_notes_1_name',
  ),
  'amount_c' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'amount_c',
  ),
  'amount_allocated_c' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT_ALLOCATED',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'amount_allocated_c',
  ),
  'amount_unallocated_c' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT_UNALLOCATED',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'amount_unallocated_c',
  ),
  'date_issued_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_ISSUED',
    'width' => '10%',
    'name' => 'date_issued_c',
  ),
),
);
