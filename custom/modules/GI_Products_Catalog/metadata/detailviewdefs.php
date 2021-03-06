<?php
$module_name = 'GI_Products_Catalog';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
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
            'name' => 'code_c',
            'label' => 'LBL_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name_in_website_c',
            'label' => 'LBL_NAME_IN_WEBSITE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'web_hidden_c',
            'label' => 'LBL_WEB_HIDDEN',
          ),
          1 => 
          array (
            'name' => 'discontinued',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'website_url_c',
            'label' => 'LBL_WEBSITE_URL',
          ),
          1 => 
          array (
            'name' => 'image_url_c',
            'label' => 'LBL_IMAGE_URL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'h1_heading_c',
            'label' => 'LBL_H1_HEADING',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_categories_gi_products_catalog_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
