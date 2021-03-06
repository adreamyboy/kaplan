<?php
$module_name = 'GI_Testimonials';
$listViewDefs [$module_name] = 
array (
  'GROUP_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_GROUP_NAME',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CONTACTS_GI_TESTIMONIALS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_TESTIMONIALS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'FIRST_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
  ),
  'LAST_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
  ),
  'EMAIL_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_EMAIL',
    'width' => '10%',
  ),
  'DESIGNATION_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DESIGNATION',
    'width' => '10%',
  ),
  'COMPANY_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_COMPANY',
    'width' => '10%',
  ),
  'VIDEO_URL_C' => 
  array (
    'type' => 'url',
    'default' => true,
    'label' => 'LBL_VIDEO_URL',
    'width' => '10%',
  ),
  'IS_PUBLIC_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_PUBLIC',
    'width' => '10%',
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'FEATURED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_FEATURED',
    'width' => '10%',
  ),
  'GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
    'id' => 'GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1GI_PRODUCTS_CATALOG_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_POSTED_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_DATE_POSTED',
    'width' => '10%',
  ),
  'CATALOG_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CATALOG',
    'width' => '10%',
  ),
);
?>
