<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-07 20:09:13
$dictionary["GI_Attempts"]["fields"]["contacts_gi_attempts_1"] = array (
  'name' => 'contacts_gi_attempts_1',
  'type' => 'link',
  'relationship' => 'contacts_gi_attempts_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_gi_attempts_1contacts_ida',
);
$dictionary["GI_Attempts"]["fields"]["contacts_gi_attempts_1_name"] = array (
  'name' => 'contacts_gi_attempts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_gi_attempts_1contacts_ida',
  'link' => 'contacts_gi_attempts_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GI_Attempts"]["fields"]["contacts_gi_attempts_1contacts_ida"] = array (
  'name' => 'contacts_gi_attempts_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_gi_attempts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
);


// created: 2015-02-07 19:57:52
$dictionary["GI_Attempts"]["fields"]["gi_attempts_gi_responses_1"] = array (
  'name' => 'gi_attempts_gi_responses_1',
  'type' => 'link',
  'relationship' => 'gi_attempts_gi_responses_1',
  'source' => 'non-db',
  'module' => 'GI_Responses',
  'bean_name' => 'GI_Responses',
  'side' => 'right',
  'vname' => 'LBL_GI_ATTEMPTS_GI_RESPONSES_1_FROM_GI_RESPONSES_TITLE',
);


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


 // created: 2015-10-22 07:03:12
$dictionary['GI_Attempts']['fields']['status_c']['labelValue']='Status';

 
?>