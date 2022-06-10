<?php
$popupMeta = array (
    'moduleMain' => 'GI_Exam_Results',
    'varName' => 'GI_Exam_Results',
    'orderBy' => 'gi_exam_results.name',
    'whereClauses' => array (
  'name' => 'gi_exam_results.name',
  'discontinued_c' => 'gi_exam_results_cstm.discontinued_c',
  'assigned_user_id' => 'gi_exam_results.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'discontinued_c',
  5 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'discontinued_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
    'name' => 'discontinued_c',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
