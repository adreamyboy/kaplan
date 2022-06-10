<?php
$module_name = 'GI_Testimonials';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'catalog_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CATALOG',
        'width' => '10%',
        'name' => 'catalog_c',
      ),
      'featured_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_FEATURED',
        'width' => '10%',
        'name' => 'featured_c',
      ),
      'status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status_c',
      ),
      'group_name_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_GROUP_NAME',
        'width' => '10%',
        'name' => 'group_name_c',
      ),
      'gi_products_catalog_gi_testimonials_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
        'id' => 'GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1GI_PRODUCTS_CATALOG_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_products_catalog_gi_testimonials_1_name',
      ),
      'first_name_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'name' => 'first_name_c',
      ),
      'is_public_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_IS_PUBLIC',
        'width' => '10%',
        'name' => 'is_public_c',
      ),
      'last_name_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'name' => 'last_name_c',
      ),
      'date_posted_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATE_POSTED',
        'width' => '10%',
        'name' => 'date_posted_c',
      ),
      'company_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMPANY',
        'width' => '10%',
        'name' => 'company_c',
      ),
      'contacts_gi_testimonials_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_CONTACTS_TITLE',
        'id' => 'CONTACTS_GI_TESTIMONIALS_1CONTACTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_gi_testimonials_1_name',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
