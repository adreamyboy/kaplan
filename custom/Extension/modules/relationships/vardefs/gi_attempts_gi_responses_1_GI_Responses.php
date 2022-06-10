<?php
// created: 2015-02-07 19:57:52
$dictionary["GI_Responses"]["fields"]["gi_attempts_gi_responses_1"] = array (
  'name' => 'gi_attempts_gi_responses_1',
  'type' => 'link',
  'relationship' => 'gi_attempts_gi_responses_1',
  'source' => 'non-db',
  'module' => 'GI_Attempts',
  'bean_name' => 'GI_Attempts',
  'vname' => 'LBL_GI_ATTEMPTS_GI_RESPONSES_1_FROM_GI_ATTEMPTS_TITLE',
  'id_name' => 'gi_attempts_gi_responses_1gi_attempts_ida',
);
$dictionary["GI_Responses"]["fields"]["gi_attempts_gi_responses_1_name"] = array (
  'name' => 'gi_attempts_gi_responses_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_ATTEMPTS_GI_RESPONSES_1_FROM_GI_ATTEMPTS_TITLE',
  'save' => true,
  'id_name' => 'gi_attempts_gi_responses_1gi_attempts_ida',
  'link' => 'gi_attempts_gi_responses_1',
  'table' => 'gi_attempts',
  'module' => 'GI_Attempts',
  'rname' => 'name',
);
$dictionary["GI_Responses"]["fields"]["gi_attempts_gi_responses_1gi_attempts_ida"] = array (
  'name' => 'gi_attempts_gi_responses_1gi_attempts_ida',
  'type' => 'link',
  'relationship' => 'gi_attempts_gi_responses_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_ATTEMPTS_GI_RESPONSES_1_FROM_GI_RESPONSES_TITLE',
);
