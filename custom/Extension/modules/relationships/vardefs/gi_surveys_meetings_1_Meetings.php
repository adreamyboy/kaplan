<?php
// created: 2015-10-22 10:20:56
$dictionary["Meeting"]["fields"]["gi_surveys_meetings_1"] = array (
  'name' => 'gi_surveys_meetings_1',
  'type' => 'link',
  'relationship' => 'gi_surveys_meetings_1',
  'source' => 'non-db',
  'module' => 'GI_Surveys',
  'bean_name' => 'GI_Surveys',
  'vname' => 'LBL_GI_SURVEYS_MEETINGS_1_FROM_GI_SURVEYS_TITLE',
  'id_name' => 'gi_surveys_meetings_1gi_surveys_ida',
);
$dictionary["Meeting"]["fields"]["gi_surveys_meetings_1_name"] = array (
  'name' => 'gi_surveys_meetings_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_SURVEYS_MEETINGS_1_FROM_GI_SURVEYS_TITLE',
  'save' => true,
  'id_name' => 'gi_surveys_meetings_1gi_surveys_ida',
  'link' => 'gi_surveys_meetings_1',
  'table' => 'gi_surveys',
  'module' => 'GI_Surveys',
  'rname' => 'name',
);
$dictionary["Meeting"]["fields"]["gi_surveys_meetings_1gi_surveys_ida"] = array (
  'name' => 'gi_surveys_meetings_1gi_surveys_ida',
  'type' => 'link',
  'relationship' => 'gi_surveys_meetings_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_SURVEYS_MEETINGS_1_FROM_MEETINGS_TITLE',
);
