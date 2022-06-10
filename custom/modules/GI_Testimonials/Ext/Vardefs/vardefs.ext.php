<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-16 21:48:56
$dictionary["GI_Testimonials"]["fields"]["contacts_gi_testimonials_1"] = array (
  'name' => 'contacts_gi_testimonials_1',
  'type' => 'link',
  'relationship' => 'contacts_gi_testimonials_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_gi_testimonials_1contacts_ida',
);
$dictionary["GI_Testimonials"]["fields"]["contacts_gi_testimonials_1_name"] = array (
  'name' => 'contacts_gi_testimonials_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_gi_testimonials_1contacts_ida',
  'link' => 'contacts_gi_testimonials_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GI_Testimonials"]["fields"]["contacts_gi_testimonials_1contacts_ida"] = array (
  'name' => 'contacts_gi_testimonials_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_gi_testimonials_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_GI_TESTIMONIALS_TITLE',
);


// created: 2015-02-16 21:50:07
$dictionary["GI_Testimonials"]["fields"]["gi_products_catalog_gi_testimonials_1"] = array (
  'name' => 'gi_products_catalog_gi_testimonials_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_testimonials_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Catalog',
  'bean_name' => 'GI_Products_Catalog',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'id_name' => 'gi_products_catalog_gi_testimonials_1gi_products_catalog_ida',
);
$dictionary["GI_Testimonials"]["fields"]["gi_products_catalog_gi_testimonials_1_name"] = array (
  'name' => 'gi_products_catalog_gi_testimonials_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
  'save' => true,
  'id_name' => 'gi_products_catalog_gi_testimonials_1gi_products_catalog_ida',
  'link' => 'gi_products_catalog_gi_testimonials_1',
  'table' => 'gi_products_catalog',
  'module' => 'GI_Products_Catalog',
  'rname' => 'name',
);
$dictionary["GI_Testimonials"]["fields"]["gi_products_catalog_gi_testimonials_1gi_products_catalog_ida"] = array (
  'name' => 'gi_products_catalog_gi_testimonials_1gi_products_catalog_ida',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_testimonials_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_TESTIMONIALS_TITLE',
);


 // created: 2015-03-25 04:28:59
$dictionary['GI_Testimonials']['fields']['catalog_c']['labelValue']='What course have you attended with us?';
$dictionary['GI_Testimonials']['fields']['catalog_c']['massupdate']=1;

 

 // created: 2015-02-16 21:55:45
$dictionary['GI_Testimonials']['fields']['company_c']['labelValue']='Company';

 

 // created: 2015-02-17 00:37:41
$dictionary['GI_Testimonials']['fields']['date_posted_c']['options']='date_range_search_dom';
$dictionary['GI_Testimonials']['fields']['date_posted_c']['labelValue']='Date Posted';
$dictionary['GI_Testimonials']['fields']['date_posted_c']['enable_range_search']='1';

 

 // created: 2015-02-17 00:04:58
$dictionary['GI_Testimonials']['fields']['designation_c']['labelValue']='Designation';

 

 // created: 2015-02-16 21:54:18
$dictionary['GI_Testimonials']['fields']['email_c']['labelValue']='Email';

 

 // created: 2015-02-18 12:47:39
$dictionary['GI_Testimonials']['fields']['featured_c']['labelValue']='Featured';

 

 // created: 2015-02-16 21:55:03
$dictionary['GI_Testimonials']['fields']['first_name_c']['labelValue']='First Name';

 

 // created: 2015-04-01 00:42:31
$dictionary['GI_Testimonials']['fields']['group_name_c']['labelValue']='Group Name';
$dictionary['GI_Testimonials']['fields']['group_name_c']['massupdate']=1;

 

 // created: 2015-03-25 03:58:19
$dictionary['GI_Testimonials']['fields']['is_public_c']['labelValue']='Is Public?';
$dictionary['GI_Testimonials']['fields']['is_public_c']['massupdate']=1;

 

 // created: 2015-02-16 21:55:16
$dictionary['GI_Testimonials']['fields']['last_name_c']['labelValue']='Last Name';

 

 // created: 2015-02-17 00:47:54
$dictionary['GI_Testimonials']['fields']['status_c']['labelValue']='Status';
$dictionary['GI_Testimonials']['fields']['status_c']['massupdate']=1;

 

 // created: 2015-02-17 00:06:02
$dictionary['GI_Testimonials']['fields']['video_url_c']['labelValue']='Video URL';

 
?>