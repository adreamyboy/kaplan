<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-05-06 12:41:33
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1"] = array (
  'name' => 'contacts_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'contacts_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_gi_line_items_1contacts_ida',
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1_name"] = array (
  'name' => 'contacts_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_gi_line_items_1contacts_ida',
  'link' => 'contacts_gi_line_items_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1contacts_ida"] = array (
  'name' => 'contacts_gi_line_items_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created by: Tawfeeq Jaafar
/*
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1"] = array (
  'massupdate' => 0,
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1_name"] = array (
  'massupdate' => 0,
);
$dictionary["GI_Line_Items"]["fields"]["contacts_gi_line_items_1contacts_ida"] = array (
  'massupdate' => 0,
);
*/


// created: 2014-11-11 03:25:37
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1"] = array (
  'name' => 'gi_discounts_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Discounts',
  'bean_name' => 'GI_Discounts',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
  'id_name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
);
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1_name"] = array (
  'name' => 'gi_discounts_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
  'link' => 'gi_discounts_gi_line_items_1',
  'table' => 'gi_discounts',
  'module' => 'GI_Discounts',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["gi_discounts_gi_line_items_1gi_discounts_ida"] = array (
  'name' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created: 2014-05-08 09:52:12
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1"] = array (
  'name' => 'gi_products_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'gi_products_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
  'id_name' => 'gi_products_gi_line_items_1gi_products_ida',
);
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1_name"] = array (
  'name' => 'gi_products_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'gi_products_gi_line_items_1gi_products_ida',
  'link' => 'gi_products_gi_line_items_1',
  'table' => 'gi_products',
  'module' => 'GI_Products',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["gi_products_gi_line_items_1gi_products_ida"] = array (
  'name' => 'gi_products_gi_line_items_1gi_products_ida',
  'type' => 'link',
  'relationship' => 'gi_products_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created: 2014-05-06 12:42:35
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1"] = array (
  'name' => 'opportunities_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_gi_line_items_1opportunities_ida',
);
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1_name"] = array (
  'name' => 'opportunities_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_gi_line_items_1opportunities_ida',
  'link' => 'opportunities_gi_line_items_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["opportunities_gi_line_items_1opportunities_ida"] = array (
  'name' => 'opportunities_gi_line_items_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


// created: 2021-06-08 10:32:01
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1"] = array (
  'name' => 'prospectlists_gi_line_items_1',
  'type' => 'link',
  'relationship' => 'prospectlists_gi_line_items_1',
  'source' => 'non-db',
  'module' => 'ProspectLists',
  'bean_name' => 'ProspectList',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_PROSPECTLISTS_TITLE',
  'id_name' => 'prospectlists_gi_line_items_1prospectlists_ida',
);
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1_name"] = array (
  'name' => 'prospectlists_gi_line_items_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectlists_gi_line_items_1prospectlists_ida',
  'link' => 'prospectlists_gi_line_items_1',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["GI_Line_Items"]["fields"]["prospectlists_gi_line_items_1prospectlists_ida"] = array (
  'name' => 'prospectlists_gi_line_items_1prospectlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_gi_line_items_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
);


 // created: 2014-09-28 10:30:58
$dictionary['GI_Line_Items']['fields']['create_followup_task_c']['labelValue']='Create a New Follow-up Task';
$dictionary['GI_Line_Items']['fields']['create_followup_task_c']['massupdate']=true;

 

 // created: 2015-09-10 05:22:54
$dictionary['GI_Line_Items']['fields']['date_delivered_c']['options']='date_range_search_dom';
$dictionary['GI_Line_Items']['fields']['date_delivered_c']['labelValue']='Date Delivered';
$dictionary['GI_Line_Items']['fields']['date_delivered_c']['enable_range_search']='1';

 

 // created: 2015-09-10 05:22:30
$dictionary['GI_Line_Items']['fields']['date_shipped_c']['options']='date_range_search_dom';
$dictionary['GI_Line_Items']['fields']['date_shipped_c']['labelValue']='Date Shipped';
$dictionary['GI_Line_Items']['fields']['date_shipped_c']['enable_range_search']='1';

 

 // created: 2014-12-14 02:21:40
$dictionary['GI_Line_Items']['fields']['date_sync_with_moodle_c']['labelValue']='Date Sync with Moodle';

 

 // created: 2015-09-13 06:11:44
$dictionary['GI_Line_Items']['fields']['delivery_mode_c']['labelValue']='Preferred Delivery Mode';

 

 // created: 2015-09-13 06:31:43
$dictionary['GI_Line_Items']['fields']['description']['comments']='Full text of the note';
$dictionary['GI_Line_Items']['fields']['description']['merge_filter']='disabled';
$dictionary['GI_Line_Items']['fields']['description']['cols']='50';

 

 // created: 2016-05-02 23:25:04
$dictionary['GI_Line_Items']['fields']['discount_rate']['required']=false;
$dictionary['GI_Line_Items']['fields']['discount_rate']['audited']=true;

 

 // created: 2014-05-29 04:23:01
$dictionary['GI_Line_Items']['fields']['discount_ratio_c']['labelValue']='Discount Ratio';

 

 // created: 2014-08-13 02:35:07
$dictionary['GI_Line_Items']['fields']['discount_type_c']['labelValue']='Discount Type';

 

 // created: 2015-07-29 02:47:46
$dictionary['GI_Line_Items']['fields']['exam_result_c']['labelValue']='Exam Result';

 

 // created: 2014-05-08 10:01:06
$dictionary['GI_Line_Items']['fields']['excluded_from_invoice_c']['labelValue']='Excluded From Invoice';

 

 // created: 2015-01-27 21:51:31
$dictionary['GI_Line_Items']['fields']['moodle_cohort_id_c']['labelValue']='Moodle Cohort ID';

 

 // created: 2015-01-27 21:51:01
$dictionary['GI_Line_Items']['fields']['moodle_user_id_c']['labelValue']='Moodle User ID';

 

 // created: 2014-06-11 17:20:03
$dictionary['GI_Line_Items']['fields']['name']['required']=false;
$dictionary['GI_Line_Items']['fields']['name']['importable']='false';
$dictionary['GI_Line_Items']['fields']['name']['duplicate_merge']='disabled';
$dictionary['GI_Line_Items']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['GI_Line_Items']['fields']['name']['merge_filter']='disabled';
$dictionary['GI_Line_Items']['fields']['name']['unified_search']=false;

 

 // created: 2014-09-28 06:56:44
$dictionary['GI_Line_Items']['fields']['provisional_c']['labelValue']='Provisional';
$dictionary['GI_Line_Items']['fields']['provisional_c']['massupdate']=true;

 

 // created: 2014-05-29 05:04:24
$dictionary['GI_Line_Items']['fields']['quantity']['default']='1';

 

 // created: 2014-05-31 02:49:56
$dictionary['GI_Line_Items']['fields']['reference_c']['labelValue']='Reference';
$dictionary['GI_Line_Items']['fields']['reference_c']['autoinc_next']='1';
$dictionary['GI_Line_Items']['fields']['reference_c']['auto_increment']=true;

 

 // created: 2015-09-13 06:32:05
$dictionary['GI_Line_Items']['fields']['shipment_details_c']['labelValue']='Shipment Details / Airway Bill No';

 

 // created: 2015-09-22 02:17:34
$dictionary['GI_Line_Items']['fields']['status_c']['labelValue']='Status';

 

 // created: 2017-12-31 03:20:56
$dictionary['GI_Line_Items']['fields']['total_before_vat_c']['inline_edit']='';
$dictionary['GI_Line_Items']['fields']['total_before_vat_c']['labelValue']='Total Before VAT';

 

 // created: 2014-05-29 04:30:43
$dictionary['GI_Line_Items']['fields']['total_discount']['required']=false;

 

 // created: 2014-05-29 04:30:59
$dictionary['GI_Line_Items']['fields']['total_price']['required']=false;

 

 // created: 2014-05-29 04:30:36
$dictionary['GI_Line_Items']['fields']['total_price_net']['required']=false;

 

 // created: 2017-12-31 13:33:12
$dictionary['GI_Line_Items']['fields']['unit_price']['audited']=true;
$dictionary['GI_Line_Items']['fields']['unit_price']['inline_edit']=true;
$dictionary['GI_Line_Items']['fields']['unit_price']['options']='numeric_range_search_dom';
$dictionary['GI_Line_Items']['fields']['unit_price']['enable_range_search']='1';

 

 // created: 2017-12-31 03:21:24
$dictionary['GI_Line_Items']['fields']['vat_amount_c']['inline_edit']='';
$dictionary['GI_Line_Items']['fields']['vat_amount_c']['labelValue']='VAT Amount';

 

 // created: 2017-12-31 12:35:24
$dictionary['GI_Line_Items']['fields']['vat_c']['inline_edit']='';
$dictionary['GI_Line_Items']['fields']['vat_c']['labelValue']='VAT %';

 
?>