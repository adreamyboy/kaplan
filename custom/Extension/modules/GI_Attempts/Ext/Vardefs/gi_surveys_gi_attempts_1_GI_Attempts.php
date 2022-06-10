<?php
// created: 2015-02-07 19:53:07
$dictionary["GI_Attempts"]["fields"]["gi_surveys_gi_attempts_1"] = array (
  'name' => 'gi_surveys_gi_attempts_1',
  'type' => 'link',
  'relationship' => 'gi_surveys_gi_attempts_1',
  'source' => 'non-db',
  'module' => 'GI_Surveys',
  'bean_name' => 'GI_Surveys',
  'vname' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_SURVEYS_TITLE',
  'id_name' => 'gi_surveys_gi_attempts_1gi_surveys_ida',
);
$dictionary["GI_Attempts"]["fields"]["gi_surveys_gi_attempts_1_name"] = array (
  'name' => 'gi_surveys_gi_attempts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_SURVEYS_TITLE',
  'save' => true,
  'id_name' => 'gi_surveys_gi_attempts_1gi_surveys_ida',
  'link' => 'gi_surveys_gi_attempts_1',
  'table' => 'gi_surveys',
  'module' => 'GI_Surveys',
  'rname' => 'name',
);
$dictionary["GI_Attempts"]["fields"]["gi_surveys_gi_attempts_1gi_surveys_ida"] = array (
  'name' => 'gi_surveys_gi_attempts_1gi_surveys_ida',
  'type' => 'link',
  'relationship' => 'gi_surveys_gi_attempts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
);
