<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-05-29 08:27:28
$dictionary["Account"]["fields"]["accounts_gi_credit_notes_1"] = array (
  'name' => 'accounts_gi_credit_notes_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_credit_notes_1',
  'source' => 'non-db',
  'module' => 'GI_Credit_Notes',
  'bean_name' => 'GI_Credit_Notes',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_GI_CREDIT_NOTES_TITLE',
);


// created: 2014-06-02 09:51:30
$dictionary["Account"]["fields"]["accounts_gi_products_1"] = array (
  'name' => 'accounts_gi_products_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


// created: 2015-07-13 01:47:35
$dictionary["Account"]["fields"]["contacts_accounts_1"] = array (
  'name' => 'contacts_accounts_1',
  'type' => 'link',
  'relationship' => 'contacts_accounts_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_ACCOUNTS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_accounts_1contacts_ida',
);
$dictionary["Account"]["fields"]["contacts_accounts_1_name"] = array (
  'name' => 'contacts_accounts_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_ACCOUNTS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_accounts_1contacts_ida',
  'link' => 'contacts_accounts_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Account"]["fields"]["contacts_accounts_1contacts_ida"] = array (
  'name' => 'contacts_accounts_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_accounts_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_ACCOUNTS_1_FROM_ACCOUNTS_TITLE',
);



$dictionary['Account']['fields']['first_invoice_date'] = array(
	'name' => 'first_invoice_date',
	'vname' => 'LBL_FIRST_INVOICE_DATE',
	'type' => 'kreporter',
	'source' => 'non-db',
	'kreporttype' => 'int',
	'eval' => array(
		'presentation' => array(
			'eval' => '
				SELECT
					MIN(opp.date_closed)
				FROM
					accounts acc 
				LEFT JOIN
					accounts_cstm as acc_c  
					ON acc.id = acc_c.id_c  
				INNER JOIN
					accounts_opportunities acc_opp 
					ON acc.id=acc_opp.account_id 
					AND acc_opp.deleted=0 
				INNER JOIN
					opportunities opp 
					ON opp.id=acc_opp.opportunity_id 
					AND opp.deleted=0 
				LEFT JOIN
					opportunities_cstm as opp_c 
					ON opp.id = opp_c.id_c 
				WHERE
					acc.deleted = "0" 
					AND opp.sales_stage IN (\'Closed Won\') 
					AND acc.id={t}.id 
				GROUP BY
					acc.id  
				ORDER BY
					acc.id ASC
			',
		),
	)
);




$dictionary['Account']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_accounts',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2014-10-09 01:29:00
$dictionary['Account']['fields']['billing_address_postalcode']['len']='50';
$dictionary['Account']['fields']['billing_address_postalcode']['comments']='The postal code used for billing address';
$dictionary['Account']['fields']['billing_address_postalcode']['merge_filter']='disabled';

 

 // created: 2015-10-20 10:25:10
$dictionary['Account']['fields']['employees']['comments']='Number of employees, varchar to accomodate for both number (100) or range (50-100)';
$dictionary['Account']['fields']['employees']['merge_filter']='disabled';

 

 // created: 2014-12-09 00:28:47
$dictionary['Account']['fields']['individual_c']['labelValue']='Individual';

 

 // created: 2017-01-04 13:43:01

 

 // created: 2017-01-04 13:43:01

 

 // created: 2017-01-04 13:43:01

 

 // created: 2017-01-04 13:43:01

 

 // created: 2015-08-26 23:48:57
$dictionary['Account']['fields']['tier_c']['labelValue']='Tier';

 
?>