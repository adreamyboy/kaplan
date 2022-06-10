<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2014-07-03 00:50:33
$dictionary['GI_Products']['fields']['revenues_budgeted_c']['labelValue']='Revenues Budgeted';

 

// created: 2014-06-02 09:51:30
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1"] = array (
  'name' => 'accounts_gi_products_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_products_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_gi_products_1accounts_ida',
);
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1_name"] = array (
  'name' => 'accounts_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_gi_products_1accounts_ida',
  'link' => 'accounts_gi_products_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["accounts_gi_products_1accounts_ida"] = array (
  'name' => 'accounts_gi_products_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


 // created: 2014-11-11 17:23:24
$dictionary['GI_Products']['fields']['web_hidden']['audited']=true;
$dictionary['GI_Products']['fields']['web_hidden']['default']='1';
$dictionary['GI_Products']['fields']['web_hidden']['massupdate']=true;

 

// created: 2014-11-11 03:11:15
$dictionary["GI_Products"]["fields"]["gi_discounts_gi_products_1"] = array (
  'name' => 'gi_discounts_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Discounts',
  'bean_name' => 'GI_Discounts',
  'vname' => 'LBL_GI_DISCOUNTS_GI_PRODUCTS_1_FROM_GI_DISCOUNTS_TITLE',
);


 // created: 2015-05-18 02:27:03
$dictionary['GI_Products']['fields']['quarter_c']['labelValue']='Quarter';

 

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


 // created: 2017-12-31 03:08:51
$dictionary['GI_Products']['fields']['vat_c']['inline_edit']='';
$dictionary['GI_Products']['fields']['vat_c']['labelValue']='VAT %';

 

// created: 2015-03-10 20:38:00
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_1"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items_Change_Requests',
  'bean_name' => 'GI_Line_Items_Change_Requests',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'id_name' => 'gi_line_itcd35equests_ida',
);
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_1_name"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'save' => true,
  'id_name' => 'gi_line_itcd35equests_ida',
  'link' => 'gi_line_items_change_requests_gi_products_1',
  'table' => 'gi_line_items_change_requests',
  'module' => 'GI_Line_Items_Change_Requests',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_line_itcd35equests_ida"] = array (
  'name' => 'gi_line_itcd35equests_ida',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


 // created: 2014-08-30 11:42:44
$dictionary['GI_Products']['fields']['price']['audited']=true;

 

// created: 2015-03-10 20:38:41
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_2"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_2',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_2',
  'source' => 'non-db',
  'module' => 'GI_Line_Items_Change_Requests',
  'bean_name' => 'GI_Line_Items_Change_Requests',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'id_name' => 'gi_line_it60abequests_ida',
);
$dictionary["GI_Products"]["fields"]["gi_line_items_change_requests_gi_products_2_name"] = array (
  'name' => 'gi_line_items_change_requests_gi_products_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
  'save' => true,
  'id_name' => 'gi_line_it60abequests_ida',
  'link' => 'gi_line_items_change_requests_gi_products_2',
  'table' => 'gi_line_items_change_requests',
  'module' => 'GI_Line_Items_Change_Requests',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_line_it60abequests_ida"] = array (
  'name' => 'gi_line_it60abequests_ida',
  'type' => 'link',
  'relationship' => 'gi_line_items_change_requests_gi_products_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_PRODUCTS_TITLE',
);


 // created: 2014-05-08 10:33:07
$dictionary['GI_Products']['fields']['provisional_c']['labelValue']='Provisional';

 

// created: 2015-11-11 03:50:09
$dictionary["GI_Products"]["fields"]["gi_line_items_mass_creator_gi_products_1"] = array (
  'name' => 'gi_line_items_mass_creator_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_line_items_mass_creator_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items_Mass_Creator',
  'bean_name' => 'GI_Line_Items_Mass_Creator',
  'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_MASS_CREATOR_TITLE',
);


// created: 2014-05-06 15:34:14
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1"] = array (
  'name' => 'gi_locations_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Locations',
  'bean_name' => 'GI_Locations',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
  'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
);
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1_name"] = array (
  'name' => 'gi_locations_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
  'link' => 'gi_locations_gi_products_1',
  'table' => 'gi_locations',
  'module' => 'GI_Locations',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_locations_gi_products_1gi_locations_ida"] = array (
  'name' => 'gi_locations_gi_products_1gi_locations_ida',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


// created: 2014-06-17 06:48:24
$dictionary["GI_Products"]["fields"]["gi_products_campaigns_1"] = array (
  'name' => 'gi_products_campaigns_1',
  'type' => 'link',
  'relationship' => 'gi_products_campaigns_1',
  'source' => 'non-db',
  'module' => 'Campaigns',
  'bean_name' => 'Campaign',
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
);


 // created: 2016-05-18 18:02:50
$dictionary['GI_Products']['fields']['redirect_url_c']['labelValue']='Redirect URL (experimental)';

 

// created: 2014-05-06 18:39:55
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1"] = array (
  'name' => 'gi_products_catalog_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Catalog',
  'bean_name' => 'GI_Products_Catalog',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
);
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1_name"] = array (
  'name' => 'gi_products_catalog_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'save' => true,
  'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
  'link' => 'gi_products_catalog_gi_products_1',
  'table' => 'gi_products_catalog',
  'module' => 'GI_Products_Catalog',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_products_catalog_gi_products_1gi_products_catalog_ida"] = array (
  'name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


 // created: 2015-07-12 14:59:43
$dictionary['GI_Products']['fields']['refund_expiry_terms_c']['labelValue']='Refund Expiry Terms';

 

// created: 2015-08-19 23:06:30
$dictionary["GI_Products"]["fields"]["gi_products_gi_elearning_courses_1"] = array (
  'name' => 'gi_products_gi_elearning_courses_1',
  'type' => 'link',
  'relationship' => 'gi_products_gi_elearning_courses_1',
  'source' => 'non-db',
  'module' => 'GI_eLearning_Courses',
  'bean_name' => 'GI_eLearning_Courses',
  'vname' => 'LBL_GI_PRODUCTS_GI_ELEARNING_COURSES_1_FROM_GI_ELEARNING_COURSES_TITLE',
);


// created: 2014-05-08 09:52:12
$dictionary["GI_Products"]["fields"]["gi_products_gi_line_items_1"] = array (
  'name' => 'gi_products_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'gi_products_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items',
  'bean_name' => 'GI_Line_Items',
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created: 2014-05-08 10:46:41
$dictionary["GI_Products"]["fields"]["gi_products_meetings_1"] = array (
  'name' => 'gi_products_meetings_1',
  'type' => 'link',
  'relationship' => 'gi_products_meetings_1',
  'source' => 'non-db',
  'module' => 'Meetings',
  'bean_name' => 'Meeting',
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_MEETINGS_TITLE',
);


// created: 2014-05-06 15:32:53
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1"] = array (
  'name' => 'gi_terms_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_terms_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Terms',
  'bean_name' => 'GI_Terms',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
  'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
);
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1_name"] = array (
  'name' => 'gi_terms_gi_products_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
  'save' => true,
  'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
  'link' => 'gi_terms_gi_products_1',
  'table' => 'gi_terms',
  'module' => 'GI_Terms',
  'rname' => 'name',
);
$dictionary["GI_Products"]["fields"]["gi_terms_gi_products_1gi_terms_ida"] = array (
  'name' => 'gi_terms_gi_products_1gi_terms_ida',
  'type' => 'link',
  'relationship' => 'gi_terms_gi_products_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);



$dictionary['GI_Products']['fields']['total_active'] = array(
	'name' => 'total_active',
	'vname' => 'LBL_TOTAL_ACTIVE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Active\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_suspended'] = array(
	'name' => 'total_suspended',
	'vname' => 'LBL_TOTAL_SUSPENDED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Suspended\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_complete'] = array(
	'name' => 'total_complete',
	'vname' => 'LBL_TOTAL_COMPLETE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Complete\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_not_interested'] = array(
	'name' => 'total_not_interested',
	'vname' => 'LBL_TOTAL_NOT_INTERESTED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Not_Interested\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_cancelled'] = array(
	'name' => 'total_cancelled',
	'vname' => 'LBL_TOTAL_CANCELLED',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Cancelled\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_intersted_cold'] = array(
	'name' => 'total_intersted_cold',
	'vname' => 'LBL_TOTAL_INTERESTED_COLD',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Cold\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_interested_warm'] = array(
	'name' => 'total_interested_warm',
	'vname' => 'LBL_TOTAL_INTERESTED_WARM',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Warm\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_interested_hot'] = array(
	'name' => 'total_interested_hot',
	'vname' => 'LBL_TOTAL_INTERESTED_HOT',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Hot\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_revenues'] = array(
	'name' => 'total_revenues',
	'vname' => 'LBL_TOTAL_REVENUES',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'currency',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				SUM(li.total_price_net)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);

$dictionary['GI_Products']['fields']['total_discounts'] = array(
	'name' => 'total_discounts',
	'vname' => 'LBL_TOTAL_DISCOUNTS',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'currency',
	'eval' => array(
		'presentation' => array(
			'eval' => '
			SELECT
				SUM(li.total_discount)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
		),
		/*
		'selection' => array(
			'equals' => 'exists(select * from kpostalcodes where kfzkz = \'{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'between' => 'exists(select * from kpostalcodes where kfzkz >= \'{p1}\' and kfzkz     <= \'{p2}\' and postalcode = {t}.billing_address_postalcode)',
			'starts' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}\' and     postalcode = {t}.billing_address_postalcode)',
			'contains' => 'exists(select * from kpostalcodes where kfzkz like \'%{p1}%\' and     postalcode = {t}.billing_address_postalcode)'
		)
		*/
	)
);



 // created: 2015-10-21 10:08:57
$dictionary['GI_Products']['fields']['add_line_item_to_opp_id_c']['labelValue']='Automatically add a new Line Item to Opportunity ID';

 

 // created: 2014-08-30 11:44:27
$dictionary['GI_Products']['fields']['batch_c']['labelValue']='Batch';

 

 // created: 2015-03-11 01:38:15
$dictionary['GI_Products']['fields']['capacity_c']['labelValue']='Maximum Capacity';

 

 // created: 2014-08-30 11:43:51
$dictionary['GI_Products']['fields']['code']['audited']=true;

 

 // created: 2014-08-05 00:25:38
$dictionary['GI_Products']['fields']['date_end_c']['options']='date_range_search_dom';
$dictionary['GI_Products']['fields']['date_end_c']['labelValue']='Date End';
$dictionary['GI_Products']['fields']['date_end_c']['enable_range_search']='1';

 

 // created: 2014-06-28 09:49:32
$dictionary['GI_Products']['fields']['date_refund_expired_c']['labelValue']='Date Refund Expired';

 

 // created: 2014-08-30 11:43:13
$dictionary['GI_Products']['fields']['date_start_c']['options']='date_range_search_dom';
$dictionary['GI_Products']['fields']['date_start_c']['labelValue']='Date Start';
$dictionary['GI_Products']['fields']['date_start_c']['enable_range_search']='1';

 

 // created: 2014-05-08 10:35:33
$dictionary['GI_Products']['fields']['date_sync_with_moodle_c']['labelValue']='Date Sync with Moodle';

 

 // created: 2014-07-16 13:23:42
$dictionary['GI_Products']['fields']['days_c']['labelValue']='Days';

 

 // created: 2016-05-18 17:03:07
$dictionary['GI_Products']['fields']['default_line_item_status_c']['labelValue']='Default Line Item Status (experimental)';

 

 // created: 2014-06-13 12:03:35
$dictionary['GI_Products']['fields']['deleted']['comments']='Record deletion indicator';
$dictionary['GI_Products']['fields']['deleted']['merge_filter']='disabled';
$dictionary['GI_Products']['fields']['deleted']['reportable']=true;

 

 // created: 2014-06-13 12:02:41
 $dictionary['GI_Products']['fields']['discontinued']['massupdate']=true;

 

 // created: 2014-12-09 10:41:05
$dictionary['GI_Products']['fields']['has_elearning_c']['labelValue']='Has eLearning';

 

 // created: 2015-06-10 21:16:41
$dictionary['GI_Products']['fields']['hide_add_to_cart_c']['labelValue']='Hide (Add to Cart) in website';

 

 // created: 2015-06-10 21:16:53
$dictionary['GI_Products']['fields']['hide_instructor_c']['labelValue']='Hide Instructor in PDF';

 

 // created: 2014-12-09 10:40:17
$dictionary['GI_Products']['fields']['moodle_cohort_id_c']['labelValue']='Moodle Cohort ID';

 

 // created: 2014-09-30 03:53:42
$dictionary['GI_Products']['fields']['name']['required']=false;
$dictionary['GI_Products']['fields']['name']['importable']='true';
$dictionary['GI_Products']['fields']['name']['audited']=true;
$dictionary['GI_Products']['fields']['name']['duplicate_merge']='disabled';
$dictionary['GI_Products']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['GI_Products']['fields']['name']['full_text_search']=array (
);

 

 // created: 2014-05-08 10:32:40
$dictionary['GI_Products']['fields']['number_of_sessions_c']['labelValue']='Number of Sessions';

 

 // created: 2014-06-08 13:18:56
$dictionary['GI_Products']['fields']['number_of_targeted_c']['labelValue']='Number of Targeted';

 

 // created: 2014-06-21 19:55:46
$dictionary['GI_Products']['fields']['status_c']['labelValue']='Status';

 

 // created: 2014-12-09 12:59:34
$dictionary['GI_Products']['fields']['synch_lineitems_immediately_c']['labelValue']='Synch LineItems Immediately?';

 

 // created: 2014-08-30 11:42:57
$dictionary['GI_Products']['fields']['type']['audited']=true;

 

 // created: 2021-12-01 11:35:09
$dictionary['GI_Products']['fields']['woo_error_c']['inline_edit']='1';
$dictionary['GI_Products']['fields']['woo_error_c']['labelValue']='woo error';

 

 // created: 2021-11-24 12:26:20
$dictionary['GI_Products']['fields']['upload_schedules_c']['inline_edit']='1';
$dictionary['GI_Products']['fields']['upload_schedules_c']['labelValue']='Upload Schedules';

 
?>