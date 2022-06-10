<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-11-11 03:01:02
$dictionary["ProspectList"]["fields"]["gi_discounts_prospectlists_1"] = array (
  'name' => 'gi_discounts_prospectlists_1',
  'type' => 'link',
  'relationship' => 'gi_discounts_prospectlists_1',
  'source' => 'non-db',
  'module' => 'GI_Discounts',
  'bean_name' => 'GI_Discounts',
  'vname' => 'LBL_GI_DISCOUNTS_PROSPECTLISTS_1_FROM_GI_DISCOUNTS_TITLE',
);


// created: 2015-11-11 03:49:00
$dictionary["ProspectList"]["fields"]["gi_line_items_mass_creator_prospectlists_1"] = array (
  'name' => 'gi_line_items_mass_creator_prospectlists_1',
  'type' => 'link',
  'relationship' => 'gi_line_items_mass_creator_prospectlists_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items_Mass_Creator',
  'bean_name' => 'GI_Line_Items_Mass_Creator',
  'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_PROSPECTLISTS_1_FROM_GI_LINE_ITEMS_MASS_CREATOR_TITLE',
);


// created: 2015-10-22 07:30:37
$dictionary["ProspectList"]["fields"]["gi_mobile_messages_prospectlists_1"] = array (
  'name' => 'gi_mobile_messages_prospectlists_1',
  'type' => 'link',
  'relationship' => 'gi_mobile_messages_prospectlists_1',
  'source' => 'non-db',
  'module' => 'GI_Mobile_Messages',
  'bean_name' => 'GI_Mobile_Messages',
  'vname' => 'LBL_GI_MOBILE_MESSAGES_PROSPECTLISTS_1_FROM_GI_MOBILE_MESSAGES_TITLE',
);


// created: 2014-10-12 04:21:20
$dictionary["ProspectList"]["fields"]["gi_sms_messages_prospectlists_1"] = array (
  'name' => 'gi_sms_messages_prospectlists_1',
  'type' => 'link',
  'relationship' => 'gi_sms_messages_prospectlists_1',
  'source' => 'non-db',
  'module' => 'GI_SMS_Messages',
  'bean_name' => 'GI_SMS_Messages',
  'vname' => 'LBL_GI_SMS_MESSAGES_PROSPECTLISTS_1_FROM_GI_SMS_MESSAGES_TITLE',
);


// created: 2014-10-13 13:30:33
$dictionary["ProspectList"]["fields"]["meetings_prospectlists_1"] = array (
  'name' => 'meetings_prospectlists_1',
  'type' => 'link',
  'relationship' => 'meetings_prospectlists_1',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'vname' => 'LBL_MEETINGS_PROSPECTLISTS_1_FROM_MEETINGS_TITLE',
);


// created: 2021-06-08 10:32:01
$dictionary["ProspectList"]["fields"]["prospectlists_gi_line_items_1"] = array (
  'name' => 'prospectlists_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'prospectlists_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items',
  'bean_name' => 'GI_Line_Items',
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created: 2021-06-08 21:44:46
$dictionary["ProspectList"]["fields"]["prospectlists_opportunities_1"] = array (
  'name' => 'prospectlists_opportunities_1',
  'type' => 'link',
  'relationship' => 'prospectlists_opportunities_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);



$dictionary['ProspectList']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_prospect_lists',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-07-12 04:32:57
$dictionary['ProspectList']['fields']['name']['len']='90';
$dictionary['ProspectList']['fields']['name']['merge_filter']='disabled';
$dictionary['ProspectList']['fields']['name']['unified_search']=false;
$dictionary['ProspectList']['fields']['name']['required']=true;
$dictionary['ProspectList']['fields']['name']['full_text_search']=array (
);

 

 // created: 2015-07-12 05:55:43
$dictionary['ProspectList']['fields']['system_protected_c']['labelValue']='System Protected';

 
?>