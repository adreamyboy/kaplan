<?php
$module_name = 'GI_Exam_Results';
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
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'url_passed_c',
            'label' => 'LBL_URL_PASSED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'url_failed_c',
            'label' => 'LBL_URL_FAILED',
          ),
        ),
        4 => 
        array (
          1 => 
          array (
            'name' => 'url_did_not_appear_c',
            'label' => 'LBL_URL_DID_NOT_APPEAR',
          ),
        ),
        5 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
      ),
    ),
  ),
);
?>
