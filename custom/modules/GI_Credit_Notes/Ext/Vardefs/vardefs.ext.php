<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-05-29 08:27:28
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1"] = array (
  'name' => 'accounts_gi_credit_notes_1',
  'type' => 'link',
  'relationship' => 'accounts_gi_credit_notes_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_gi_credit_notes_1accounts_ida',
);
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1_name"] = array (
  'name' => 'accounts_gi_credit_notes_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_gi_credit_notes_1accounts_ida',
  'link' => 'accounts_gi_credit_notes_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GI_Credit_Notes"]["fields"]["accounts_gi_credit_notes_1accounts_ida"] = array (
  'name' => 'accounts_gi_credit_notes_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_gi_credit_notes_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_GI_CREDIT_NOTES_TITLE',
);


// created: 2014-06-01 17:38:34
$dictionary["GI_Credit_Notes"]["fields"]["gi_credit_notes_gi_payments_1"] = array (
  'name' => 'gi_credit_notes_gi_payments_1',
  'type' => 'link',
  'relationship' => 'gi_credit_notes_gi_payments_1',
  'source' => 'non-db',
  'module' => 'GI_Payments',
  'bean_name' => 'GI_Payments',
  'side' => 'right',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);


 // created: 2014-06-01 18:37:35
$dictionary['GI_Credit_Notes']['fields']['amount_allocated_c']['labelValue']='Amount Allocated';

 

 // created: 2014-05-29 08:26:25
$dictionary['GI_Credit_Notes']['fields']['amount_c']['labelValue']='Amount';

 

 // created: 2014-06-01 20:21:50
$dictionary['GI_Credit_Notes']['fields']['amount_refunded_c']['labelValue']='Amount Refunded';

 

 // created: 2014-06-01 18:37:47
$dictionary['GI_Credit_Notes']['fields']['amount_unallocated_c']['labelValue']='Amount Unallocated';

 

 // created: 2014-09-03 02:29:31
$dictionary['GI_Credit_Notes']['fields']['cash_flow_c']['labelValue']='Cash Flow';

 

 // created: 2014-05-29 08:26:13

 

 // created: 2014-05-29 08:25:37
$dictionary['GI_Credit_Notes']['fields']['date_issued_c']['labelValue']='Date Issued';

 

 // created: 2015-02-28 03:57:27
$dictionary['GI_Credit_Notes']['fields']['invoice_c']['labelValue']='Invoice';

 

 // created: 2014-06-11 17:21:24
$dictionary['GI_Credit_Notes']['fields']['name']['required']=false;
$dictionary['GI_Credit_Notes']['fields']['name']['importable']='false';
$dictionary['GI_Credit_Notes']['fields']['name']['duplicate_merge']='disabled';
$dictionary['GI_Credit_Notes']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['GI_Credit_Notes']['fields']['name']['merge_filter']='disabled';
$dictionary['GI_Credit_Notes']['fields']['name']['unified_search']=false;

 

 // created: 2014-06-12 01:21:06

 

 // created: 2014-06-11 16:37:00
$dictionary['GI_Credit_Notes']['fields']['reference_c']['labelValue']='Reference';
$dictionary['GI_Credit_Notes']['fields']['reference_c']['autoinc_next']='1';
$dictionary['GI_Credit_Notes']['fields']['reference_c']['auto_increment']=true;

 

 // created: 2014-06-03 03:22:25
$dictionary['GI_Credit_Notes']['fields']['status_c']['labelValue']='Status';

 

 // created: 2014-06-29 07:49:23
$dictionary['GI_Credit_Notes']['fields']['verified_c']['labelValue']='Verified';

 
?>