<?php
$module_name = 'GI_Products_Categories';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
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
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'parent_category_c' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PARENT_CATEGORY',
        'id' => 'GI_PRODUCTS_CATEGORIES_ID_C',
        'link' => true,
        'width' => '10%',
        'name' => 'parent_category_c',
      ),
      'web_hidden_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_WEB_HIDDEN',
        'width' => '10%',
        'name' => 'web_hidden_c',
      ),
      'discontinued_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_DISCONTINUED',
        'width' => '10%',
        'name' => 'discontinued_c',
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
