<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-06-01 17:38:34
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1"] = array (
  'name' => 'gi_credit_notes_gi_payments_1',
  'type' => 'link',
  'relationship' => 'gi_credit_notes_gi_payments_1',
  'source' => 'non-db',
  'module' => 'GI_Credit_Notes',
  'bean_name' => 'GI_Credit_Notes',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_CREDIT_NOTES_TITLE',
  'id_name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
);
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1_name"] = array (
  'name' => 'gi_credit_notes_gi_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_CREDIT_NOTES_TITLE',
  'save' => true,
  'id_name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
  'link' => 'gi_credit_notes_gi_payments_1',
  'table' => 'gi_credit_notes',
  'module' => 'GI_Credit_Notes',
  'rname' => 'name',
);
$dictionary["GI_Payments"]["fields"]["gi_credit_notes_gi_payments_1gi_credit_notes_ida"] = array (
  'name' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
  'type' => 'link',
  'relationship' => 'gi_credit_notes_gi_payments_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_CREDIT_NOTES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);


// created: 2014-05-29 06:25:07
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1"] = array (
  'name' => 'opportunities_gi_payments_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_payments_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_gi_payments_1opportunities_ida',
);
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1_name"] = array (
  'name' => 'opportunities_gi_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_gi_payments_1opportunities_ida',
  'link' => 'opportunities_gi_payments_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1opportunities_ida"] = array (
  'name' => 'opportunities_gi_payments_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_gi_payments_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);


 // created: 2014-06-26 22:28:57
$dictionary['GI_Payments']['fields']['amount']['audited']=true;

 

 // created: 2014-06-26 22:35:47
$dictionary['GI_Payments']['fields']['cash_flow_c']['labelValue']='Cash Flow';

 

 // created: 2015-03-01 01:41:56
$dictionary['GI_Payments']['fields']['comments']['audited']=true;

 

 // created: 2014-08-16 16:04:10
$dictionary['GI_Payments']['fields']['date_cleared']['audited']=true;
$dictionary['GI_Payments']['fields']['date_cleared']['display_default']='';
$dictionary['GI_Payments']['fields']['date_cleared']['options']='date_range_search_dom';
$dictionary['GI_Payments']['fields']['date_cleared']['enable_range_search']='1';

 

 // created: 2014-06-28 11:16:08
$dictionary['GI_Payments']['fields']['date_entered']['audited']=false;
$dictionary['GI_Payments']['fields']['date_entered']['comments']='Date record created';
$dictionary['GI_Payments']['fields']['date_entered']['merge_filter']='disabled';

 

 // created: 2014-08-30 11:40:26
$dictionary['GI_Payments']['fields']['date_modified']['audited']=false;
$dictionary['GI_Payments']['fields']['date_modified']['comments']='Date record last modified';
$dictionary['GI_Payments']['fields']['date_modified']['merge_filter']='disabled';

 

 // created: 2014-08-20 07:56:08
$dictionary['GI_Payments']['fields']['date_paid']['audited']=true;
$dictionary['GI_Payments']['fields']['date_paid']['options']='date_range_search_dom';
$dictionary['GI_Payments']['fields']['date_paid']['enable_range_search']='1';

 

 // created: 2014-06-26 22:36:27
$dictionary['GI_Payments']['fields']['date_sync_with_quickbooks_c']['labelValue']='Date Sync with QuickBooks';

 

 // created: 2015-03-01 01:41:47
$dictionary['GI_Payments']['fields']['description']['comments']='Full text of the note';
$dictionary['GI_Payments']['fields']['description']['merge_filter']='disabled';

 

 // created: 2014-08-30 11:41:27
$dictionary['GI_Payments']['fields']['mode']['audited']=true;

 

 // created: 2014-06-11 17:20:34
$dictionary['GI_Payments']['fields']['name']['required']=false;
$dictionary['GI_Payments']['fields']['name']['importable']='false';
$dictionary['GI_Payments']['fields']['name']['duplicate_merge']='disabled';
$dictionary['GI_Payments']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['GI_Payments']['fields']['name']['merge_filter']='disabled';
$dictionary['GI_Payments']['fields']['name']['unified_search']=false;

 

 // created: 2014-06-26 22:37:58
$dictionary['GI_Payments']['fields']['quickbooks_payment_c']['labelValue']='QuickBooks Payment';

 

 // created: 2014-08-30 11:41:51
$dictionary['GI_Payments']['fields']['reference_c']['labelValue']='Reference';
$dictionary['GI_Payments']['fields']['reference_c']['autoinc_next']='1';
$dictionary['GI_Payments']['fields']['reference_c']['auto_increment']=true;

 

 // created: 2014-07-02 10:04:24
$dictionary['GI_Payments']['fields']['reference_no_c']['labelValue']='Reference No';
$dictionary['GI_Payments']['fields']['reference_no_c']['unified_search']= true;
$dictionary['GI_Payments']['fields']['reference_no_c']['enable_range_search']= true;

 


 // created: 2014-07-02 10:04:24
$dictionary['GI_Payments']['fields']['reference_no_c']['labelValue']='Reference No';

 

 // created: 2014-06-26 14:54:21
$dictionary['GI_Payments']['fields']['request_change_c']['labelValue']='Request Change';

 

 // created: 2015-04-12 22:46:03
$dictionary['GI_Payments']['fields']['send_payment_via_email_c']['labelValue']='Send Payment via Email';

 

 // created: 2014-08-31 22:32:23
$dictionary['GI_Payments']['fields']['type']['audited']=true;
$dictionary['GI_Payments']['fields']['type']['default']='Receipt';

 

 // created: 2014-06-28 11:17:15
$dictionary['GI_Payments']['fields']['verified_c']['labelValue']='Verified';

 

 // created: 2022-03-17 04:46:12
$dictionary['GI_Payments']['fields']['send_payment_via_email_date_c']['inline_edit']='1';
$dictionary['GI_Payments']['fields']['send_payment_via_email_date_c']['labelValue']='Send Payment Via Email Date';

 
?>