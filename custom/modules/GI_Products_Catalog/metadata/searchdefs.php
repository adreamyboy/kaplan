<?php
$module_name = 'GI_Products_Catalog';
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
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'code_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CODE',
        'width' => '10%',
        'name' => 'code_c',
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
      'web_hidden_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_WEB_HIDDEN',
        'width' => '10%',
        'name' => 'web_hidden_c',
      ),
      'discontinued' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_DISCONTINUED',
        'width' => '10%',
        'name' => 'discontinued',
      ),
      'code_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_CODE',
        'width' => '10%',
        'name' => 'code_c',
      ),
      'short_description_c' => 
      array (
        'type' => 'text',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHORT_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'short_description_c',
      ),
      'price' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_PRICE',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'price',
      ),
      'type_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type_c',
      ),
      'sequence_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_SEQUENCE',
        'width' => '10%',
        'name' => 'sequence_c',
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
