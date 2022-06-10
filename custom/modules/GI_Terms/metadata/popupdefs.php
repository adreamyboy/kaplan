<?php
$popupMeta = array (
    'moduleMain' => 'GI_Terms',
    'varName' => 'GI_Terms',
    'orderBy' => 'gi_terms.name',
    'whereClauses' => array (
  'name' => 'gi_terms.name',
  'code' => 'gi_terms.code',
  'discontinued' => 'gi_terms.discontinued',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'discontinued',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'discontinued' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued',
  ),
),
);
