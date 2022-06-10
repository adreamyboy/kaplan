<?php
// created: 2015-02-07 20:02:16
$dictionary["GI_Attempts"]["fields"]["meetings_gi_attempts_1"] = array (
  'name' => 'meetings_gi_attempts_1',
  'type' => 'link',
  'relationship' => 'meetings_gi_attempts_1',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_MEETINGS_TITLE',
  'id_name' => 'meetings_gi_attempts_1meetings_ida',
);
$dictionary["GI_Attempts"]["fields"]["meetings_gi_attempts_1_name"] = array (
  'name' => 'meetings_gi_attempts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_MEETINGS_TITLE',
  'save' => true,
  'id_name' => 'meetings_gi_attempts_1meetings_ida',
  'link' => 'meetings_gi_attempts_1',
  'table' => 'meetings',
  'module' => 'Meetings',
  'rname' => 'name',
);
$dictionary["GI_Attempts"]["fields"]["meetings_gi_attempts_1meetings_ida"] = array (
  'name' => 'meetings_gi_attempts_1meetings_ida',
  'type' => 'link',
  'relationship' => 'meetings_gi_attempts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
);
