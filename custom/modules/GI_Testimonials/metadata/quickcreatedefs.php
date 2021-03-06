<?php
$module_name = 'GI_Testimonials';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'first_name_c',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name_c',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'designation_c',
            'label' => 'LBL_DESIGNATION',
          ),
          1 => 
          array (
            'name' => 'company_c',
            'label' => 'LBL_COMPANY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email_c',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'video_url_c',
            'label' => 'LBL_VIDEO_URL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'is_public_c',
            'label' => 'LBL_IS_PUBLIC',
          ),
          1 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_posted_c',
            'label' => 'LBL_DATE_POSTED',
          ),
          1 => 
          array (
            'name' => 'featured_c',
            'label' => 'LBL_FEATURED',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'catalog_c',
            'label' => 'LBL_CATALOG',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_catalog_gi_testimonials_1_name',
            'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_TESTIMONIALS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
          ),
          1 => 
          array (
            'name' => 'contacts_gi_testimonials_1_name',
            'label' => 'LBL_CONTACTS_GI_TESTIMONIALS_1_FROM_CONTACTS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
