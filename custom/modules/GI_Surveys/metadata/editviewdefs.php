<?php
$module_name = 'GI_Surveys';
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
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'header_text_c',
            'studio' => 'visible',
            'label' => 'LBL_HEADER_TEXT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'footer_text_c',
            'studio' => 'visible',
            'label' => 'LBL_FOOTER_TEXT',
          ),
        ),
      ),
    ),
  ),
);
?>
