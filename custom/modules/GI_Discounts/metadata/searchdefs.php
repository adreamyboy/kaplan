<?php
$module_name = 'GI_Discounts';
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
      'discontinued_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_DISCONTINUED',
        'width' => '10%',
        'name' => 'discontinued_c',
      ),
      'rate_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_RATE',
        'width' => '10%',
        'name' => 'rate_c',
      ),
      'is_combo_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_IS_COMBO',
        'width' => '10%',
        'name' => 'is_combo_c',
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
