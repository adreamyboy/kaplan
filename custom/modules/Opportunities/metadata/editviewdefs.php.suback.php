<?php
$viewdefs ['Opportunities'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/Opportunities/js/script.js',
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
      'javascript' => '{$PROBABILITY_SCRIPT}',
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
          0 => 'account_name',
          1 => 'lead_source',
        ),
        1 => 
        array (
          0 => 'sales_stage',
          1 => 
          array (
            'name' => 'reason_of_loss_c',
            'studio' => 'visible',
            'label' => 'LBL_REASON_OF_LOSS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_closed',
          ),
          1 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'auto_discount_c',
            'label' => 'LBL_AUTO_DISCOUNT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'terms_and_conditions_c',
            'studio' => 'visible',
            'label' => 'LBL_TERMS_AND_CONDITIONS',
          ),
          1 => 
          array (
            'name' => 'customer_lpo_c',
            'label' => 'LBL_CUSTOMER_LPO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'invoice_comments_c',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_COMMENTS',
          ),
          1 => 'assigned_user_name',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_source_details_c',
            'label' => 'LBL_LEAD_SOURCE_DETAILS',
          ),
          1 => 
          array (
            'name' => 'campaign_name',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&status_advanced=Active',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'referred_by_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERRED_BY',
          ),
          1 => 
          array (
            'name' => 'referral_status_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERRAL_STATUS',
          ),
        ),
        2 => 
        array (
          1 => 
          array (
            'name' => 'referral_status_description_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERRAL_STATUS_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
