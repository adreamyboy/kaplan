<?php
$module_name = 'GI_Payments';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/GI_Payments/js/script.js',
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
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'date_paid',
            'label' => 'LBL_DATE_PAID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_credit_notes_gi_payments_1_name',
            'displayParams' => 
            array (
              'initial_filter' => '&accounts_gi_credit_notes_1_name_advanced=',
              'field_to_name_array' => 
              array (
                'id' => 'gi_credit_notes_gi_payments_1gi_credit_notes_ida',
                'name' => 'gi_credit_notes_gi_payments_1_name',
                'amount_unallocated_c' => 'amount',
                'currency_id' => 'currency_id',
              ),
            ),
          ),
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'date_cleared',
            'label' => 'LBL_DATE_CLEARED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'opportunities_gi_payments_1_name',
            'label' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&account_name_advanced=&status_c_advanced=Invoice_Unpaid',
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'mode',
            'studio' => 'visible',
            'label' => 'LBL_MODE',
          ),
          1 => 
          array (
            'name' => 'comments',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reference_no_c',
            'label' => 'LBL_REFERENCE_NO',
          ),
          1 => 
          array (
            'name' => 'verified_c',
            'label' => 'LBL_VERIFIED',
          ),
        ),
        6 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
