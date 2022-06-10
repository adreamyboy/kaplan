<?php
$module_name = 'GI_Credit_Notes';
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
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=creditnote\');" type="submit" value="Generate PDF">',
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
            'name' => 'reference_c',
            'label' => 'LBL_REFERENCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amount_c',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'amount_allocated_c',
            'label' => 'LBL_AMOUNT_ALLOCATED',
          ),
          1 => 
          array (
            'name' => 'accounts_gi_credit_notes_1_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'amount_refunded_c',
            'label' => 'LBL_AMOUNT_REFUNDED',
          ),
          1 => 
          array (
            'name' => 'date_issued_c',
            'label' => 'LBL_DATE_ISSUED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'amount_unallocated_c',
            'label' => 'LBL_AMOUNT_UNALLOCATED',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        5 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'invoice_c',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE',
          ),
        ),
        6 => 
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
