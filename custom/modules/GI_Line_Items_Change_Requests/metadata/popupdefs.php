<?php
$popupMeta = array (
    'moduleMain' => 'GI_Line_Items_Change_Requests',
    'varName' => 'GI_Line_Items_Change_Requests',
    'orderBy' => 'gi_line_items_change_requests.name',
    'whereClauses' => array (
  'name' => 'gi_line_items_change_requests.name',
  'limit_to_capacity_c' => 'gi_line_items_change_requests_cstm.limit_to_capacity_c',
  'discontinued_c' => 'gi_line_items_change_requests_cstm.discontinued_c',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'limit_to_capacity_c',
  5 => 'discontinued_c',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'limit_to_capacity_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_LIMIT_TO_CAPACITY',
    'width' => '10%',
    'name' => 'limit_to_capacity_c',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued_c',
  ),
),
);
