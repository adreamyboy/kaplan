<?php
// created: 2015-07-08 05:44:07
$dictionary["GI_Products"]["fields"]["gi_exam_results_gi_products_1"] = array (
  'name' => 'gi_exam_results_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_exam_results_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Exam_Results',
  'bean_name' => 'GI_Exam_Results',
  'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE',
  'id_name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
);
$dictionary["GI_Products"]["fields"]["gi_exam_results_gi_products_1_name"] = array (
  'name' => 'gi_exam_results_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE',
  'save' => true,
  'id_name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
  'link' => 'gi_exam_results_gi_products_1',
  'table' => 'gi_exam_results',
  'module' => 'GI_Exam_Results',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_exam_results_gi_products_1gi_exam_results_ida"] = array (
  'name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
  'type' => 'link',
  'relationship' => 'gi_exam_results_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);
