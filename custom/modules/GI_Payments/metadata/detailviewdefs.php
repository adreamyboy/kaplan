<?php
$module_name = 'GI_Payments';
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
          4 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=payment\');" type="submit" value="Generate PDF">',
          ),
          5 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sendPDF\', \'_self\');" type="submit" value="Send PDF">',
          ),
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
            'name' => 'reference_no_c',
            'label' => 'LBL_REFERENCE_NO',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'mode',
            'studio' => 'visible',
            'label' => 'LBL_MODE',
          ),
          1 => 
          array (
            'name' => 'gi_credit_notes_gi_payments_1_name',
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
            'name' => 'date_cleared',
            'label' => 'LBL_DATE_CLEARED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'opportunities_gi_payments_1_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cash_flow_c',
            'label' => 'LBL_CASH_FLOW',
          ),
          1 => 'assigned_user_name',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'comments',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
          1 => 
          array (
            'name' => 'verified_c',
            'label' => 'LBL_VERIFIED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'send_payment_via_email_date_c',
            'label' => 'LBL_SEND_PAYMENT_VIA_EMAIL_DATE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
