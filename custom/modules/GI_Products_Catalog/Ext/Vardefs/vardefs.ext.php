<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2014-11-11 03:10:26
$dictionary["GI_Products_Catalog"]["fields"]["gi_discounts_gi_products_catalog_1"] = array (
  'name' => 'gi_discounts_gi_products_catalog_1',
  'type' => 'link',
  'relationship' => 'gi_discounts_gi_products_catalog_1',
  'source' => 'non-db',
  'module' => 'GI_Discounts',
  'bean_name' => 'GI_Discounts',
  'vname' => 'LBL_GI_DISCOUNTS_GI_PRODUCTS_CATALOG_1_FROM_GI_DISCOUNTS_TITLE',
);


// created: 2014-11-12 12:38:15
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_documents_1"] = array (
  'name' => 'gi_products_catalog_documents_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_documents_1',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_DOCUMENTS_1_FROM_DOCUMENTS_TITLE',
);


// created: 2014-05-06 18:39:55
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_gi_products_1"] = array (
  'name' => 'gi_products_catalog_gi_products_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_1',
  'source' => 'non-db',
  'module' => 'GI_Products',
  'bean_name' => 'GI_Products',
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
);


// created: 2014-11-12 12:42:26
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_gi_products_catalog_1"] = array (
  'name' => 'gi_products_catalog_gi_products_catalog_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_catalog_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Catalog',
  'bean_name' => 'GI_Products_Catalog',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATALOG_L_TITLE',
);
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_gi_products_catalog_1"] = array (
  'name' => 'gi_products_catalog_gi_products_catalog_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_catalog_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Catalog',
  'bean_name' => 'GI_Products_Catalog',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATALOG_R_TITLE',
);


// created: 2014-05-06 18:29:53
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_gi_products_categories_1"] = array (
  'name' => 'gi_products_catalog_gi_products_categories_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_products_categories_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Categories',
  'bean_name' => 'GI_Products_Categories',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_CATEGORIES_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
);


// created: 2015-02-16 21:50:07
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_gi_testimonials_1"] = array (
  'name' => 'gi_products_catalog_gi_testimonials_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_gi_testimonials_1',
  'source' => 'non-db',
  'module' => 'GI_Testimonials',
  'bean_name' => 'GI_Testimonials',
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_TESTIMONIALS_TITLE',
);


// created: 2014-11-20 05:53:08
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_catalog_users_1"] = array (
  'name' => 'gi_products_catalog_users_1',
  'type' => 'link',
  'relationship' => 'gi_products_catalog_users_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_GI_PRODUCTS_CATALOG_USERS_1_FROM_USERS_TITLE',
);


// created: 2016-05-24 14:27:51
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_categories_gi_products_catalog_1"] = array (
  'name' => 'gi_products_categories_gi_products_catalog_1',
  'type' => 'link',
  'relationship' => 'gi_products_categories_gi_products_catalog_1',
  'source' => 'non-db',
  'module' => 'GI_Products_Categories',
  'bean_name' => 'GI_Products_Categories',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'id_name' => 'gi_productbf36egories_ida',
);
$dictionary["GI_Products_Catalog"]["fields"]["gi_products_categories_gi_products_catalog_1_name"] = array (
  'name' => 'gi_products_categories_gi_products_catalog_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATEGORIES_TITLE',
  'save' => true,
  'id_name' => 'gi_productbf36egories_ida',
  'link' => 'gi_products_categories_gi_products_catalog_1',
  'table' => 'gi_products_categories',
  'module' => 'GI_Products_Categories',
  'rname' => 'name',
);
$dictionary["GI_Products_Catalog"]["fields"]["gi_productbf36egories_ida"] = array (
  'name' => 'gi_productbf36egories_ida',
  'type' => 'link',
  'relationship' => 'gi_products_categories_gi_products_catalog_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_PRODUCTS_CATEGORIES_GI_PRODUCTS_CATALOG_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
);


 // created: 2014-05-06 16:08:29
$dictionary['GI_Products_Catalog']['fields']['code_c']['labelValue']='Code';

 

 // created: 2014-11-12 09:00:01
$dictionary['GI_Products_Catalog']['fields']['description_1_c']['labelValue']='Description (1)';

 

 // created: 2014-11-24 12:10:38
$dictionary['GI_Products_Catalog']['fields']['description_2_c']['labelValue']='Package Includes';

 

 // created: 2014-11-17 02:09:15
$dictionary['GI_Products_Catalog']['fields']['description_3_c']['labelValue']='Who Should Attend';

 

 // created: 2014-11-12 09:05:40
$dictionary['GI_Products_Catalog']['fields']['description_4_c']['labelValue']='Description (4)';

 

 // created: 2014-11-12 10:34:13
$dictionary['GI_Products_Catalog']['fields']['description_5_c']['labelValue']='Price';

 

 // created: 2014-11-17 02:09:29
$dictionary['GI_Products_Catalog']['fields']['description_6_c']['labelValue']='Study Materials';

 

 // created: 2014-11-17 02:09:59
$dictionary['GI_Products_Catalog']['fields']['description_7_c']['labelValue']='Exams';

 

 // created: 2017-02-03 09:45:19
$dictionary['GI_Products_Catalog']['fields']['description_8_c']['inline_edit']='1';
$dictionary['GI_Products_Catalog']['fields']['description_8_c']['labelValue']='Objectives';

 

 // created: 2017-02-03 09:46:00
$dictionary['GI_Products_Catalog']['fields']['description_9_c']['inline_edit']='1';
$dictionary['GI_Products_Catalog']['fields']['description_9_c']['labelValue']='Features';

 

 // created: 2014-11-11 17:29:42
$dictionary['GI_Products_Catalog']['fields']['discontinued']['audited']=true;
$dictionary['GI_Products_Catalog']['fields']['discontinued']['massupdate']=true;

 

 // created: 2017-03-15 03:02:50
$dictionary['GI_Products_Catalog']['fields']['h1_heading_c']['inline_edit']='1';
$dictionary['GI_Products_Catalog']['fields']['h1_heading_c']['labelValue']='H1 Heading';

 

 // created: 2017-02-27 03:31:35
$dictionary['GI_Products_Catalog']['fields']['image_url_c']['inline_edit']='1';
$dictionary['GI_Products_Catalog']['fields']['image_url_c']['labelValue']='Image URL';

 

 // created: 2016-02-17 04:20:27
$dictionary['GI_Products_Catalog']['fields']['name']['required']=true;
$dictionary['GI_Products_Catalog']['fields']['name']['duplicate_merge']='disabled';
$dictionary['GI_Products_Catalog']['fields']['name']['duplicate_merge_dom_value']='0';
$dictionary['GI_Products_Catalog']['fields']['name']['merge_filter']='disabled';
$dictionary['GI_Products_Catalog']['fields']['name']['unified_search']=false;

 

 // created: 2015-06-28 03:40:38
$dictionary['GI_Products_Catalog']['fields']['name_in_website_c']['labelValue']='Name in Website';

 

 // created: 2014-12-21 02:09:24
$dictionary['GI_Products_Catalog']['fields']['sequence_c']['labelValue']='Sequence';

 

 // created: 2014-11-11 18:09:32
$dictionary['GI_Products_Catalog']['fields']['short_description_c']['labelValue']='Short Description';

 

 // created: 2014-11-12 09:12:13
$dictionary['GI_Products_Catalog']['fields']['type_c']['labelValue']='Type';

 

 // created: 2014-11-11 17:22:59
$dictionary['GI_Products_Catalog']['fields']['web_hidden_c']['labelValue']='Web Hidden';
$dictionary['GI_Products_Catalog']['fields']['web_hidden_c']['massupdate']=true;

 

 // created: 2016-02-11 02:27:24
$dictionary['GI_Products_Catalog']['fields']['website_url_c']['labelValue']='Website URL';

 
?>