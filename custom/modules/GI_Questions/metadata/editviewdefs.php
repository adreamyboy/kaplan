<?php
$module_name = 'GI_Questions';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
          1 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'option_1_c',
            'label' => 'LBL_OPTION_1',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'option_2_c',
            'label' => 'LBL_OPTION_2',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'option_3_c',
            'label' => 'LBL_OPTION_3',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'option_4_c',
            'label' => 'LBL_OPTION_4',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'option_5_c',
            'label' => 'LBL_OPTION_5',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
          1 => 
          array (
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
      ),
    ),
  ),
);
?>
