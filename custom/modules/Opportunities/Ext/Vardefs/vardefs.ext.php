<?php 
 //WARNING: The contents of this file are auto-generated



//edit_amount
$dictionary['Opportunity']['fields']['edit_amount'] = array(
'name'       => 'edit_amount',
'id'         => 'edit_amount',
'type'       => 'varchar',
'importable' => 'true',								
'studio'     => 'visible',
//'vname'      => 'LBL_NAME_OF_INTERMEDIARY',
'len'        => '500',
'size'       => '20',
'inline_edit'=> false,
);
$dictionary['Opportunity']['fields']['payment_link_sent_date'] = array(
    'name'       => 'payment_link_sent_date',
    'id'         => 'payment_link_sent_date',
    'type'       => 'datetime',
    'importable' => 'true',								
    'studio'     => 'visible',
    'vname'      => 'LBL_PAYMENT_LINK_SENT_DATE',
    'len'        => '500',
    'size'       => '20',
    'inline_edit'=> false,
    );





 // created: 2015-10-29 07:47:11
$dictionary['Opportunity']['fields']['no_of_not_held_activities_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['no_of_not_held_activities_c']['labelValue']='No. of Not-Held Activities';
$dictionary['Opportunity']['fields']['no_of_not_held_activities_c']['enable_range_search']='1';

 

// created: 2014-05-06 12:42:35
$dictionary["Opportunity"]["fields"]["opportunities_gi_line_items_1"] = array (
  'name' => 'opportunities_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Line_Items',
  'bean_name' => 'GI_Line_Items',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


 // created: 2015-01-10 22:45:40
$dictionary['Opportunity']['fields']['payment_mode_c']['labelValue']='Preferred Payment Mode';

 

// created: 2014-05-29 06:25:07
$dictionary["Opportunity"]["fields"]["opportunities_gi_payments_1"] = array (
  'name' => 'opportunities_gi_payments_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_payments_1',
  'source' => 'non-db',
  'module' => 'GI_Payments',
  'bean_name' => 'GI_Payments',
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);


 // created: 2014-05-08 16:28:15
$dictionary['Opportunity']['fields']['quickbooks_invoice_c']['labelValue']='QuickBooks Invoice';

 

// created: 2021-06-08 21:44:46
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1"] = array (
  'name' => 'prospectlists_opportunities_1',
  'type' => 'link',
  'relationship' => 'prospectlists_opportunities_1',
  'source' => 'non-db',
  'module' => 'ProspectLists',
  'bean_name' => 'ProspectList',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_PROSPECTLISTS_TITLE',
  'id_name' => 'prospectlists_opportunities_1prospectlists_ida',
);
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1_name"] = array (
  'name' => 'prospectlists_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectlists_opportunities_1prospectlists_ida',
  'link' => 'prospectlists_opportunities_1',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["prospectlists_opportunities_1prospectlists_ida"] = array (
  'name' => 'prospectlists_opportunities_1prospectlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);


 // created: 2016-07-21 04:32:55
$dictionary['Opportunity']['fields']['reason_of_loss_c']['labelValue']='Reason of Loss';

 


$dictionary['Opportunity']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_opportunities',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2014-08-18 06:56:16
$dictionary['Opportunity']['fields']['amount']['comments']='Unconverted amount of the opportunity';
$dictionary['Opportunity']['fields']['amount']['duplicate_merge']='enabled';
$dictionary['Opportunity']['fields']['amount']['duplicate_merge_dom_value']='1';
$dictionary['Opportunity']['fields']['amount']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['amount']['required']=false;

 

 // created: 2014-05-08 09:28:39
$dictionary['Opportunity']['fields']['total_discounts_c']['labelValue']='Total Discounts';

 

 // created: 2014-06-17 07:25:36
$dictionary['Opportunity']['fields']['amount_usdollar']['comments']='Formatted amount of the opportunity';
$dictionary['Opportunity']['fields']['amount_usdollar']['duplicate_merge']='disabled';
$dictionary['Opportunity']['fields']['amount_usdollar']['duplicate_merge_dom_value']='0';
$dictionary['Opportunity']['fields']['amount_usdollar']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['amount_usdollar']['enable_range_search']=false;

 

 // created: 2014-08-16 17:39:59
$dictionary['Opportunity']['fields']['total_installments_c']['labelValue']='Total Installments';

 

 // created: 2015-01-22 01:45:09
$dictionary['Opportunity']['fields']['auto_discount_c']['labelValue']='Auto Discount?';
$dictionary['Opportunity']['fields']['auto_discount_c']['massupdate']=true;

 

 // created: 2014-09-03 02:28:31
$dictionary['Opportunity']['fields']['cash_flow_c']['labelValue']='Cash Flow';

 

 // created: 2014-07-02 08:51:27
$dictionary['Opportunity']['fields']['total_not_cleared_payments_c']['labelValue']='Total Not Cleared Payments';

 

 // created: 2014-06-23 09:55:44
$dictionary['Opportunity']['fields']['company_sponsored_c']['labelValue']='Company Sponsored';

 

 // created: 2016-02-07 12:01:02

 

 // created: 2014-08-31 22:56:45
$dictionary['Opportunity']['fields']['total_payments_c']['labelValue']='Total Receipts';

 

 // created: 2014-06-18 01:20:18
$dictionary['Opportunity']['fields']['customer_lpo_c']['labelValue']='Customer LPO';

 

 // created: 2014-06-18 15:44:30
$dictionary['Opportunity']['fields']['date_closed']['required']=false;
$dictionary['Opportunity']['fields']['date_closed']['comments']='Actual date the opportunity close';
$dictionary['Opportunity']['fields']['date_closed']['importable']='true';
$dictionary['Opportunity']['fields']['date_closed']['merge_filter']='disabled';

 

 // created: 2014-06-11 16:38:14
$dictionary['Opportunity']['fields']['reference_c']['labelValue']='Reference';
$dictionary['Opportunity']['fields']['reference_c']['autoinc_next']='1';
$dictionary['Opportunity']['fields']['reference_c']['auto_increment']=true;

 

 // created: 2014-06-17 07:50:31
$dictionary['Opportunity']['fields']['date_sync_with_quickbooks_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['date_sync_with_quickbooks_c']['labelValue']='Date Sync with QuickBooks';
$dictionary['Opportunity']['fields']['date_sync_with_quickbooks_c']['enable_range_search']='1';

 

 // created: 2014-12-15 10:15:06
$dictionary['Opportunity']['fields']['total_promises_c']['labelValue']='Total Promises';

 

 // created: 2015-10-25 08:51:27
$dictionary['Opportunity']['fields']['first_activity_c']['labelValue']='First Activity';

 

 // created: 2014-05-29 07:30:04
$dictionary['Opportunity']['fields']['total_refunds_c']['labelValue']='Total Refunds';

 

 // created: 2015-10-25 04:16:57
$dictionary['Opportunity']['fields']['first_activity_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['first_activity_date_c']['labelValue']='First Activity Date';
$dictionary['Opportunity']['fields']['first_activity_date_c']['enable_range_search']='1';

 

 // created: 2015-04-12 21:00:44
$dictionary['Opportunity']['fields']['send_invoice_via_email_c']['labelValue']='Send Invoice via Email';

 

 // created: 2015-12-13 02:41:47

 

 // created: 2014-06-08 20:49:14
$dictionary['Opportunity']['fields']['total_unpaid_c']['labelValue']='Total Unpaid';

 

 // created: 2014-05-08 09:24:54
$dictionary['Opportunity']['fields']['invoice_comments_c']['labelValue']='Invoice Comments';

 

 // created: 2017-12-31 03:17:59
$dictionary['Opportunity']['fields']['total_vat_amount_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['total_vat_amount_c']['labelValue']='Total VAT Amount';

 

 // created: 2017-01-04 13:43:07

 

 // created: 2014-06-21 13:58:00
$dictionary['Opportunity']['fields']['status_c']['labelValue']='Status';

 

 // created: 2017-01-04 13:43:06

 

 // created: 2015-01-07 13:46:01
$dictionary['Opportunity']['fields']['web_order_confirmed_c']['labelValue']='Web Order Confirmed?';

 

 // created: 2017-01-04 13:43:05

 

 // created: 2017-01-04 13:43:05

 

 // created: 2015-10-25 08:51:41
$dictionary['Opportunity']['fields']['last_activity_c']['labelValue']='Last Activity';

 

 // created: 2015-10-25 04:24:25
$dictionary['Opportunity']['fields']['last_activity_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['last_activity_date_c']['labelValue']='Last Activity Date';
$dictionary['Opportunity']['fields']['last_activity_date_c']['enable_range_search']='1';

 

 // created: 2016-01-23 19:37:03
$dictionary['Opportunity']['fields']['last_interaction_c']['labelValue']='Last Interaction';

 

 // created: 2015-12-13 03:17:25
$dictionary['Opportunity']['fields']['terms_and_conditions_c']['labelValue']='Terms & Conditions';

 

 // created: 2016-01-23 19:37:44
$dictionary['Opportunity']['fields']['last_interaction_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['last_interaction_date_c']['labelValue']='Last Interaction Date';
$dictionary['Opportunity']['fields']['last_interaction_date_c']['enable_range_search']='1';

 

 // created: 2014-08-04 02:57:02
$dictionary['Opportunity']['fields']['lead_source']['len']=100;
$dictionary['Opportunity']['fields']['lead_source']['comments']='Source of the opportunity';
$dictionary['Opportunity']['fields']['lead_source']['merge_filter']='disabled';

 

 // created: 2015-06-18 06:54:57
$dictionary['Opportunity']['fields']['lead_source_details_c']['labelValue']='Lead Source Details';

 

 // created: 2017-03-13 02:24:52
$dictionary['Opportunity']['fields']['mass_created_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['mass_created_c']['labelValue']='Mass Created?';

 

 // created: 2014-06-11 17:19:48
$dictionary['Opportunity']['fields']['name']['required']=false;
$dictionary['Opportunity']['fields']['name']['comments']='Name of the opportunity';
$dictionary['Opportunity']['fields']['name']['importable']='false';
$dictionary['Opportunity']['fields']['name']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['name']['full_text_search']=array (
);

 

 // created: 2015-10-25 08:53:00
$dictionary['Opportunity']['fields']['next_step']['comments']='The next step in the sales process';
$dictionary['Opportunity']['fields']['next_step']['merge_filter']='disabled';

 

 // created: 2015-10-25 04:25:14
$dictionary['Opportunity']['fields']['next_step_date_c']['options']='date_range_search_dom';
$dictionary['Opportunity']['fields']['next_step_date_c']['labelValue']='Next Step Date';
$dictionary['Opportunity']['fields']['next_step_date_c']['enable_range_search']='1';

 

 // created: 2014-05-08 09:29:40
$dictionary['Opportunity']['fields']['total_before_discounts_c']['labelValue']='Total Before Discounts';

 

 // created: 2015-10-29 07:47:25
$dictionary['Opportunity']['fields']['no_of_completed_activities_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['no_of_completed_activities_c']['labelValue']='No. of Completed Activities';
$dictionary['Opportunity']['fields']['no_of_completed_activities_c']['enable_range_search']='1';

 

 // created: 2015-03-15 02:00:52
$dictionary['Opportunity']['fields']['sales_stage']['default']='Open';
$dictionary['Opportunity']['fields']['sales_stage']['len']=100;
$dictionary['Opportunity']['fields']['sales_stage']['comments']='Indication of progression towards closure';
$dictionary['Opportunity']['fields']['sales_stage']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['sales_stage']['required']=true;

 

 // created: 2016-01-23 19:35:53
$dictionary['Opportunity']['fields']['no_of_completed_interactions_c']['options']='numeric_range_search_dom';
$dictionary['Opportunity']['fields']['no_of_completed_interactions_c']['labelValue']='No. of Completed Interactions';
$dictionary['Opportunity']['fields']['no_of_completed_interactions_c']['enable_range_search']='1';

 

 // created: 2018-02-03 08:16:44
$dictionary['Opportunity']['fields']['quote_valid_until_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['quote_valid_until_c']['labelValue']='Quote Valid Until';

 

 // created: 2016-02-07 12:04:48
$dictionary['Opportunity']['fields']['referral_status_c']['labelValue']='Referral Status';

 

 // created: 2017-12-31 03:18:20
$dictionary['Opportunity']['fields']['total_before_vat_c']['inline_edit']='';
$dictionary['Opportunity']['fields']['total_before_vat_c']['labelValue']='Total Before VAT';

 

 // created: 2016-02-07 12:05:33
$dictionary['Opportunity']['fields']['referral_status_description_c']['labelValue']='Referral Status Description';

 

 // created: 2016-02-07 12:01:02
$dictionary['Opportunity']['fields']['referred_by_c']['labelValue']='Referred By';

 

 // created: 2014-05-29 07:52:17
$dictionary['Opportunity']['fields']['total_creditnote_allocations_c']['labelValue']='Total Credit Note Allocations';

 

 // created: 2021-10-26 07:24:55
$dictionary['Opportunity']['fields']['reason_of_loss_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['reason_of_loss_c']['labelValue']='Reason of Loss';

 
?>