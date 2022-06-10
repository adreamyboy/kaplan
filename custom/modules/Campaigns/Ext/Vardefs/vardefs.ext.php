<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-06-17 06:48:24
$dictionary["Campaign"]["fields"]["gi_products_campaigns_1"] = array (
  'name' => 'gi_products_campaigns_1',
  'type' => 'link',
  'relationship' => 'gi_products_campaigns_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'vname' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_GI_PRODUCTS_TITLE',
  'id_name' => 'gi_products_campaigns_1gi_products_ida',
);
$dictionary["Campaign"]["fields"]["gi_products_campaigns_1_name"] = array (
  'name' => 'gi_products_campaigns_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_GI_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'gi_products_campaigns_1gi_products_ida',
  'link' => 'gi_products_campaigns_1',
  'table' => 'gi_products',
  'module' => 'GI_Products',
  'rname' => 'name',
);
$dictionary["Campaign"]["fields"]["gi_products_campaigns_1gi_products_ida"] = array (
  'name' => 'gi_products_campaigns_1gi_products_ida',
  'type' => 'link',
  'relationship' => 'gi_products_campaigns_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
);


// created: 2014-06-17 06:49:45
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1"] = array (
  'name' => 'gi_products_categories_campaigns_1',
  'type' => 'link',
  'relationship' => 'gi_products_categories_campaigns_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Categories',
  'bean_name' => 'GI_Products_Categories',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'id_name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
);
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1_name"] = array (
  'name' => 'gi_products_categories_campaigns_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'save' => true,
  'id_name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
  'link' => 'gi_products_categories_campaigns_1',
  'table' => 'gi_products_categories',
  'module' => 'GI_Products_Categories',
  'rname' => 'name',
);
$dictionary["Campaign"]["fields"]["gi_products_categories_campaigns_1gi_products_categories_ida"] = array (
  'name' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
  'type' => 'link',
  'relationship' => 'gi_products_categories_campaigns_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
);



$dictionary['Campaign']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_campaigns',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2014-10-29 04:52:59
$dictionary['Campaign']['fields']['campaign_type']['required']=false;
$dictionary['Campaign']['fields']['campaign_type']['comments']='The type of campaign';
$dictionary['Campaign']['fields']['campaign_type']['merge_filter']='disabled';

 

 // created: 2014-06-17 06:54:05
$dictionary['Campaign']['fields']['department_c']['labelValue']='Department';

 

 // created: 2014-10-13 04:53:20
$dictionary['Campaign']['fields']['name']['len']='70';
$dictionary['Campaign']['fields']['name']['comments']='The name of the campaign';
$dictionary['Campaign']['fields']['name']['merge_filter']='disabled';
$dictionary['Campaign']['fields']['name']['unified_search']=false;
$dictionary['Campaign']['fields']['name']['full_text_search']=array (
);

 

 // created: 2014-08-05 04:09:39
$dictionary['Campaign']['fields']['show_on_web_c']['labelValue']='Show On Web';

 

 // created: 2014-06-17 06:55:12
$dictionary['Campaign']['fields']['start_date']['display_default']='now';
$dictionary['Campaign']['fields']['start_date']['required']=true;
$dictionary['Campaign']['fields']['start_date']['comments']='Starting date of the campaign';
$dictionary['Campaign']['fields']['start_date']['merge_filter']='disabled';

 
?>