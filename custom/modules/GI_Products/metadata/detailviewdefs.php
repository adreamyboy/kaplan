<?php
$module_name = 'GI_Products';
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
            'customCode' => '<input class="button" onclick="if(prompt(\'Are you sure you want to change status to Active? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=ChangeStatus&status=Active\', \'_self\');" type="submit" value="Set as Active">',
          ),
          5 => 
          array (
            'customCode' => '<input class="button" onclick="if(prompt(\'Are you sure you want to change status to Cancelled? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=ChangeStatus&status=Cancelled\', \'_self\');" type="submit" value="Set as Cancelled">',
          ),
          6 => 
          array (
            'customCode' => '<input class="button" onclick="if(prompt(\'Are you sure you want to change status to Complete? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=ChangeStatus&status=Complete\', \'_self\');" type="submit" value="Set as Complete">',
          ),
          7 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=schedule\');" type="submit" value="Generate Schedule">',
          ),
          8 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=signinsheet\');" type="submit" value="Generate Sign-In Sheet">',
          ),
          9 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=SendEmail\');" type="submit" value="Send Email to Students">',
          ),
          10 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=SendLogins\');" type="submit" value="Send e-Learning Logins">',
          ),
          11 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=ActivateSuspendedPaid\');" type="submit" value="Activate Suspended / Paid Lineitems">',
          ),
          12 => 
          array (
            'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=certificates&bg=certificate-kapgen\');" type="submit" value="Generate Certificates">',
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL2' => 
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
            'name' => 'code',
            'label' => 'LBL_CODE',
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
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_catalog_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'web_hidden',
            'label' => 'LBL_WEB_HIDDEN',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hide_add_to_cart_c',
            'label' => 'LBL_HIDE_ADD_TO_CART',
          ),
          1 => 
          array (
            'name' => 'hide_instructor_c',
            'label' => 'LBL_HIDE_INSTRUCTOR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'gi_locations_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'accounts_gi_products_1_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'gi_terms_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'number_of_targeted_c',
            'label' => 'LBL_NUMBER_OF_TARGETED',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'revenues_budgeted_c',
            'label' => 'LBL_REVENUES_BUDGETED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'type' => 'Html',
          ),
          1 => 
          array (
            'name' => 'capacity_c',
            'label' => 'LBL_CAPACITY',
          ),
        ),
        8 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'gi_line_items_change_requests_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'gi_line_items_change_requests_gi_products_2_name',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'refund_expiry_terms_c',
            'studio' => 'visible',
            'label' => 'LBL_REFUND_EXPIRY_TERMS',
          ),
          1 => 
          array (
            'name' => 'date_refund_expired_c',
            'label' => 'LBL_DATE_REFUND_EXPIRED',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'quarter_c',
            'label' => 'LBL_QUARTER',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'gi_exam_results_gi_products_1_name',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'default_line_item_status_c',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_LINE_ITEM_STATUS',
          ),
          1 => 
          array (
            'name' => 'redirect_url_c',
            'label' => 'LBL_REDIRECT_URL',
          ),
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
          1 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'batch_c',
            'label' => 'LBL_BATCH',
          ),
          1 => 
          array (
            'name' => 'provisional_c',
            'label' => 'LBL_PROVISIONAL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'number_of_sessions_c',
            'label' => 'LBL_NUMBER_OF_SESSIONS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_start_c',
            'label' => 'LBL_DATE_START',
          ),
          1 => 
          array (
            'name' => 'days_c',
            'studio' => 'visible',
            'label' => 'LBL_DAYS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_end_c',
            'label' => 'LBL_DATE_END',
          ),
          1 => 'assigned_user_name',
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'has_elearning_c',
            'label' => 'LBL_HAS_ELEARNING',
          ),
          1 => 
          array (
            'name' => 'date_sync_with_moodle_c',
            'label' => 'LBL_DATE_SYNC_WITH_MOODLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'moodle_cohort_id_c',
            'label' => 'LBL_MOODLE_COHORT_ID',
          ),
        ),
      ),
    ),
  ),
);
?>
