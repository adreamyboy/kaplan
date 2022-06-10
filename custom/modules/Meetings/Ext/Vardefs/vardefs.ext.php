<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-05-08 10:46:41
$dictionary["Meeting"]["fields"]["gi_products_meetings_1"] = array (
  'name' => 'gi_products_meetings_1',
  'type' => 'link',
  'relationship' => 'gi_products_meetings_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_GI_PRODUCTS_TITLE',
  'id_name' => 'gi_products_meetings_1gi_products_ida',
);
$dictionary["Meeting"]["fields"]["gi_products_meetings_1_name"] = array (
  'name' => 'gi_products_meetings_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_GI_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'gi_products_meetings_1gi_products_ida',
  'link' => 'gi_products_meetings_1',
  'table' => 'gi_products',
  'module' => 'GI_Products',
  'rname' => 'name',
);
$dictionary["Meeting"]["fields"]["gi_products_meetings_1gi_products_ida"] = array (
  'name' => 'gi_products_meetings_1gi_products_ida',
  'type' => 'link',
  'relationship' => 'gi_products_meetings_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_MEETINGS_TITLE',
);


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


// created: 2015-11-04 16:05:00

$dictionary['Meeting']['fields']['contacts']['rel_fields'] = array(
	'accept_status' => array(
		'type' => 'enum',
		'options' => 'dom_meeting_accept_status',
	),
	'longitude' => array(
		'type' => 'varchar',
	),
	'latitude' => array(
		'type' => 'varchar',
	),
	'marked_by' => array(
		'type' => 'enum',
		'options' => 'marked_by_list',
	),
	'marking_mode' => array(
		'type' => 'enum',
		'options' => 'attendance_marking_mode_list',
	),
	'date_marked' => array(
		'type' => 'datetime',
	),
);



// created: 2015-02-07 20:02:16
$dictionary["Meeting"]["fields"]["meetings_gi_attempts_1"] = array (
  'name' => 'meetings_gi_attempts_1',
  'type' => 'link',
  'relationship' => 'meetings_gi_attempts_1',
  'source' => 'non-db',
  'module' => 'GI_Attempts',
  'bean_name' => 'GI_Attempts',
  'side' => 'right',
  'vname' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_GI_ATTEMPTS_TITLE',
);



// created by: Tawfeeq Jaafar
$dictionary['Meeting']['fields']['location']['massupdate']=1;



// created: 2014-10-13 13:30:33
$dictionary["Meeting"]["fields"]["meetings_prospectlists_1"] = array (
  'name' => 'meetings_prospectlists_1',
  'type' => 'link',
  'relationship' => 'meetings_prospectlists_1',
  'source' => 'non-db',
  'module' => 'ProspectLists',
  'bean_name' => 'ProspectList',
  'vname' => 'LBL_MEETINGS_PROSPECTLISTS_1_FROM_PROSPECTLISTS_TITLE',
);



$dictionary['Meeting']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_meetings',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-10-29 06:58:15
$dictionary['Meeting']['fields']['date_end']['audited']=true;
$dictionary['Meeting']['fields']['date_end']['comments']='Date meeting ends';
$dictionary['Meeting']['fields']['date_end']['merge_filter']='disabled';

 

 // created: 2015-10-29 06:58:06
$dictionary['Meeting']['fields']['date_start']['audited']=true;
$dictionary['Meeting']['fields']['date_start']['comments']='Date of start of meeting';
$dictionary['Meeting']['fields']['date_start']['merge_filter']='disabled';

 

 // created: 2017-01-04 13:43:04

 

 // created: 2017-01-04 13:43:03

 

 // created: 2017-01-04 13:43:03

 

 // created: 2017-01-04 13:43:03

 

 // created: 2014-09-18 01:47:30
$dictionary['Meeting']['fields']['name']['len']='200';
$dictionary['Meeting']['fields']['name']['comments']='Meeting name';
$dictionary['Meeting']['fields']['name']['merge_filter']='disabled';
$dictionary['Meeting']['fields']['name']['full_text_search']=array (
);

 

 // created: 2015-10-29 06:58:36
$dictionary['Meeting']['fields']['status']['comments']='Meeting status (ex: Planned, Held, Not held)';
$dictionary['Meeting']['fields']['status']['merge_filter']='disabled';
$dictionary['Meeting']['fields']['status']['audited']=true;

 

 // created: 2014-09-15 06:45:31
$dictionary['Meeting']['fields']['venue_status_c']['labelValue']='Venue Status';

 

 // created: 2017-12-31 01:59:03
$dictionary['Meeting']['fields']['web_hidden_c']['inline_edit']='';
$dictionary['Meeting']['fields']['web_hidden_c']['labelValue']='Web Hidden';

 


//$dictionary['Meeting']['fields']['gi_surveys_meetings_1']['massupdate'] = 1;
$dictionary['Meeting']['fields']['gi_surveys_meetings_1_name']['massupdate'] = 1;


?>