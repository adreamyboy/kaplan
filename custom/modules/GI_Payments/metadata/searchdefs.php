<?php
$module_name = 'GI_Payments';
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
      'verified_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_VERIFIED',
        'width' => '10%',
        'name' => 'verified_c',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
      ),
      'mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MODE',
        'width' => '10%',
        'name' => 'mode',
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
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
      ),
      'mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MODE',
        'width' => '10%',
        'name' => 'mode',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_paid' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_PAID',
        'width' => '10%',
        'default' => true,
        'name' => 'date_paid',
      ),
      'date_cleared' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_CLEARED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_cleared',
      ),
      'reference_no_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_REFERENCE_NO',
        'width' => '10%',
        'name' => 'reference_no_c',
      ),
      'verified_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_VERIFIED',
        'width' => '10%',
        'name' => 'verified_c',
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
        'width' => '10%',
        'default' => true,
      ),
      'amount' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_AMOUNT',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'amount',
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
