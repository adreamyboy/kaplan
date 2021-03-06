<?php
$module_name = 'GI_Testimonials';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_catalog_gi_testimonials_1_name',
          ),
          1 => 
          array (
            'name' => 'contacts_gi_testimonials_1_name',
          ),
        ),
        3 => 
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
        4 => 
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
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'catalog_c',
            'label' => 'LBL_CATALOG',
          ),
          1 => 
          array (
            'name' => 'group_name_c',
            'label' => 'LBL_GROUP_NAME',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'type' => 'Html',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
