<?php
$module_name = 'GI_Credit_Notes';
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
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'amount_c',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accounts_gi_credit_notes_1_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'date_issued_c',
            'label' => 'LBL_DATE_ISSUED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'invoice_c',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE',
          ),
          1 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'verified_c',
            'label' => 'LBL_VERIFIED',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
