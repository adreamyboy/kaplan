<?php
$module_name = 'GI_Discounts';
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
      'syncDetailEditViews' => true,
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
            'name' => 'description',
            'type' => 'Html',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'valid_from_days_c',
            'label' => 'LBL_VALID_FROM_DAYS',
          ),
          1 => 
          array (
            'name' => 'is_combo_c',
            'label' => 'LBL_IS_COMBO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'expires_on_days_c',
            'label' => 'LBL_EXPIRES_ON_DAYS',
          ),
          1 => 
          array (
            'name' => 'rate_c',
            'label' => 'LBL_RATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'valid_from_date_c',
            'label' => 'LBL_VALID_FROM_DATE',
          ),
          1 => 
          array (
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'expires_on_date_c',
            'label' => 'LBL_EXPIRES_ON_DATE',
          ),
          1 => 'assigned_user_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
