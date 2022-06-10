<?php
$module_name = 'GI_Line_Items_Change_Requests';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'discontinued_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_DISCONTINUED',
        'width' => '10%',
        'name' => 'discontinued_c',
      ),
      'limit_to_capacity_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_LIMIT_TO_CAPACITY',
        'width' => '10%',
        'name' => 'limit_to_capacity_c',
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
      'limit_to_capacity_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_LIMIT_TO_CAPACITY',
        'width' => '10%',
        'name' => 'limit_to_capacity_c',
      ),
      'discontinued_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_DISCONTINUED',
        'width' => '10%',
        'name' => 'discontinued_c',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
