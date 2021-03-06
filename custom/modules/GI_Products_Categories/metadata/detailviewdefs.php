<?php
$module_name = 'GI_Products_Categories';
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
          1 => 
          array (
            'name' => 'parent_category_c',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_CATEGORY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name_with_category_c',
            'label' => 'LBL_NAME_WITH_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'name_in_website_c',
            'label' => 'LBL_NAME_IN_WEBSITE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'web_hidden_c',
            'label' => 'LBL_WEB_HIDDEN',
          ),
          1 => 
          array (
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
          1 => 
          array (
            'name' => 'image_url_c',
            'label' => 'LBL_IMAGE_URL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'h1_heading_c',
            'label' => 'LBL_H1_HEADING',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
        ),
      ),
    ),
  ),
);
?>
