<?php
$module_name = 'GI_Line_Items';
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
            'customCode' => '<input class="button" onclick="window.open(\'index.php?entryPoint=updateExamResultEntryPoint&line_item_id={$id}&exam_id={$exam_id}&result=Passed&return_module={$module}&return_id={$id}&return_action=DetailView\', \'_self\');" type="submit" value="Set as Passed">',
          ),
          5 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?entryPoint=updateExamResultEntryPoint&line_item_id={$id}&exam_id={$exam_id}&result=Failed&return_module={$module}&return_id={$id}&return_action=DetailView\', \'_self\');" type="submit" value="Set as Failed">',
          ),
          6 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?entryPoint=updateExamResultEntryPoint&line_item_id={$id}&exam_id={$exam_id}&result=Did_Not_Appear&return_module={$module}&return_id={$id}&return_action=DetailView\', \'_self\');" type="submit" value="Set as Did_Not_Appear">',
          ),
          7 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?entryPoint=updateExamResultEntryPoint&line_item_id={$id}&exam_id={$exam_id}&result=Did_Not_Disclose&return_module={$module}&return_id={$id}&return_action=DetailView\', \'_self\');" type="submit" value="Set as Did_Not_Disclose">',
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
        'LBL_DETAILVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
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
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_gi_line_items_1_name',
            'label' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'provisional_c',
            'label' => 'LBL_PROVISIONAL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
          1 => 
          array (
            'name' => 'exam_result_c',
            'studio' => 'visible',
            'label' => 'LBL_EXAM_RESULT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'contacts_gi_line_items_1_name',
            'label' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'opportunities_gi_line_items_1_name',
            'label' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
          ),
        ),
        4 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'excluded_from_invoice_c',
            'label' => 'LBL_EXCLUDED_FROM_INVOICE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_sync_with_moodle_c',
            'label' => 'LBL_DATE_SYNC_WITH_MOODLE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'moodle_cohort_id_c',
            'label' => 'LBL_MOODLE_COHORT_ID',
          ),
          1 => 
          array (
            'name' => 'moodle_user_id_c',
            'label' => 'LBL_MOODLE_USER_ID',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'prospectlists_gi_line_items_1_name',
          ),
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'unit_price',
            'label' => 'LBL_UNIT_PRICE',
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
            'name' => 'gi_discounts_gi_line_items_1_name',
          ),
          1 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'discount_type_c',
            'studio' => 'visible',
            'label' => 'LBL_DISCOUNT_TYPE',
          ),
          1 => 
          array (
            'name' => 'total_price',
            'label' => 'LBL_TOTAL_PRICE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'discount_ratio_c',
            'label' => 'LBL_DISCOUNT_RATIO',
          ),
          1 => 
          array (
            'name' => 'total_discount',
            'label' => 'LBL_TOTAL_DISCOUNT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'vat_amount_c',
            'label' => 'LBL_VAT_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'total_before_vat_c',
            'label' => 'LBL_TOTAL_BEFORE_VAT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'discount_rate',
            'label' => 'LBL_DISCOUNT_RATE',
          ),
          1 => 
          array (
            'name' => 'total_price_net',
            'label' => 'LBL_TOTAL_PRICE_NET',
          ),
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'delivery_mode_c',
            'studio' => 'visible',
            'label' => 'LBL_DELIVERY_MODE',
          ),
          1 => 
          array (
            'name' => 'date_shipped_c',
            'label' => 'LBL_DATE_SHIPPED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'shipment_details_c',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_DETAILS',
          ),
          1 => 
          array (
            'name' => 'date_delivered_c',
            'label' => 'LBL_DATE_DELIVERED',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
