<?php
// created: 2021-07-09 10:40:12
$viewdefs = array (
  'Opportunities' => 
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
              'customCode' => '<input class="button" onclick="window.open(\'index.php?module=GI_Payments&action=EditView&type=Promise&amount={$fields.total_unpaid_c.value|abs}&return_module={$module}&return_id={$id}&return_action=DetailView&opportunities_gi_payments_1_name={$fields.name.value}&opportunities_gi_payments_1opportunities_ida={$id}\');" type="submit" value="Convert to Invoice">',
            ),
            5 => 
            array (
              'customCode' => '<input class="button" onclick="if(prompt(\'You should NEVER use this option to create a PUBLIC product.\\n\\nAfter you create a Custom/IHT product, you should add a line item to use it.\\n\\nAre you want to continue? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module=GI_Products&action=EditView&return_module={$module}&return_id={$id}&return_action=DetailView&accounts_gi_products_1_name={$fields.account_name.value}&accounts_gi_products_1accounts_ida={$fields.account_id.value}&gi_products_catalog_gi_products_1_name=Custom In-House Training&gi_products_catalog_gi_products_1gi_products_catalog_ida=S-49&provisional_c=1&add_line_item_to_opp_id_c={$id}\');" type="submit" value="Create Custom / IHT Product">',
            ),
            6 => 
            array (
              'customCode' => '{if $fields.total_unpaid_c.value < 0}<input class="button" onclick="window.open(\'index.php?module=GI_Credit_Notes&action=EditView&amount_c={$fields.total_unpaid_c.value|abs}&opportunity_id_c={$id}&invoice_c={$fields.name.value}&accounts_gi_credit_notes_1accounts_ida={$fields.account_id.value}&accounts_gi_credit_notes_1_name={$fields.account_name.value}\');" type="submit" value="Create Credit Note">{/if}',
            ),
            7 => 
            array (
              'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=quote\');" type="submit" value="Generate PDF">',
            ),
            8 => 
            array (
              'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=quote_ar\');" type="submit" value="Generate PDF (Arabic for FTA)">',
            ),
            9 => 
            array (
              'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=sendPDF\', \'_self\');" type="submit" value="Send PDF and T&C">',
            ),
            10 => 
            array (
              'customCode' => '<input class="button" onclick="EditAmount();" type="submit" value="Send Payment Link">',
            ),
            11 => 
            array (
              'customCode' => '<input class="button" onclick="if(prompt(\'Are you absolutely sure you want to delete the opportunity and its line items? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=DeleteOpportunityLineItems\', \'_self\');" type="submit" value="Delete Opportunity and Line Items (for Admin only)">',
            ),
            12 => 
            array (
              'customCode' => '<input class="button" onclick="if(prompt(\'Are you sure you want to send a Referral Acceptance Confirmation email to the referring and referred contacts? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=sendReferralAcceptanceConfirmation\', \'_self\');" type="submit" value="Send Referral Acceptance Email">',
            ),
            13 => 
            array (
              'customCode' => '<input class="button" onclick="if(prompt(\'Are you sure you want to send a Referral Cheque Collection email to the referring person? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=sendReferralChequeCollection\', \'_self\');" type="submit" value="Send Referral Cheque Collection Email">',
            ),
            14 => 
            array (
              'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=changeInvoiceDate\', \'_self\');" type="submit" value="Change Invoice Date">',
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
        'useTabs' => true,
        'tabDefs' => 
        array (
          'DEFAULT' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_EDITVIEW_PANEL1' => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
          'LBL_DETAILVIEW_PANEL2' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_DETAILVIEW_PANEL3' => 
          array (
            'newTab' => true,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ASSIGNMENT' => 
          array (
            'newTab' => true,
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
            0 => 'account_name',
            1 => 'sales_stage',
          ),
          1 => 
          array (
            0 => 'name',
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
              'name' => 'web_order_confirmed_c',
              'label' => 'LBL_WEB_ORDER_CONFIRMED',
            ),
            1 => 
            array (
              'name' => 'payment_mode_c',
              'studio' => 'visible',
              'label' => 'LBL_PAYMENT_MODE',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'terms_and_conditions_c',
              'studio' => 'visible',
              'label' => 'LBL_TERMS_AND_CONDITIONS',
            ),
            1 => 
            array (
              'name' => 'quote_valid_until_c',
              'label' => 'LBL_QUOTE_VALID_UNTIL',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'description',
              'nl2br' => true,
            ),
            1 => 
            array (
              'name' => 'mass_created_c',
              'label' => 'LBL_MASS_CREATED',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'prospectlists_opportunities_1_name',
            ),
          ),
        ),
        'lbl_editview_panel1' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'status_c',
              'studio' => 'visible',
              'label' => 'LBL_STATUS',
            ),
            1 => 
            array (
              'name' => 'currency_id',
              'comment' => 'Currency used for display purposes',
              'label' => 'LBL_CURRENCY',
            ),
          ),
          1 => 
          array (
            0 => 'date_closed',
            1 => 
            array (
              'name' => 'amount',
              'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
            ),
          ),
          2 => 
          array (
            1 => 
            array (
              'name' => 'total_vat_amount_c',
              'label' => 'LBL_TOTAL_VAT_AMOUNT',
            ),
          ),
          3 => 
          array (
            1 => 
            array (
              'name' => 'total_before_vat_c',
              'label' => 'LBL_TOTAL_BEFORE_VAT',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'invoice_comments_c',
              'studio' => 'visible',
              'label' => 'LBL_INVOICE_COMMENTS',
            ),
            1 => 
            array (
              'name' => 'total_discounts_c',
              'label' => 'LBL_TOTAL_DISCOUNTS',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'customer_lpo_c',
              'label' => 'LBL_CUSTOMER_LPO',
            ),
            1 => 
            array (
              'name' => 'total_before_discounts_c',
              'label' => 'LBL_TOTAL_BEFORE_DISCOUNTS',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'name' => 'total_creditnote_allocations_c',
              'label' => 'LBL_TOTAL_CREDITNOTE_ALLOCATIONS',
            ),
            1 => 
            array (
              'name' => 'total_payments_c',
              'label' => 'LBL_TOTAL_PAYMENTS',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'name' => 'total_refunds_c',
              'label' => 'LBL_TOTAL_REFUNDS',
            ),
            1 => 
            array (
              'name' => 'total_installments_c',
              'label' => 'LBL_TOTAL_INSTALLMENTS',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'name' => 'total_promises_c',
              'label' => 'LBL_TOTAL_PROMISES',
            ),
            1 => 
            array (
              'name' => 'total_unpaid_c',
              'label' => 'LBL_TOTAL_UNPAID',
            ),
          ),
        ),
        'lbl_detailview_panel2' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'no_of_completed_interactions_c',
              'label' => 'LBL_NO_OF_COMPLETED_INTERACTIONS',
            ),
            1 => 
            array (
              'name' => 'assigned_user_name',
              'label' => 'LBL_ASSIGNED_TO',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'no_of_completed_activities_c',
              'label' => 'LBL_NO_OF_COMPLETED_ACTIVITIES',
            ),
            1 => 
            array (
              'name' => 'no_of_not_held_activities_c',
              'label' => 'LBL_NO_OF_NOT_HELD_ACTIVITIES',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'first_activity_date_c',
              'label' => 'LBL_FIRST_ACTIVITY_DATE',
            ),
            1 => 
            array (
              'name' => 'first_activity_c',
              'label' => 'LBL_FIRST_ACTIVITY',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'last_activity_date_c',
              'label' => 'LBL_LAST_ACTIVITY_DATE',
            ),
            1 => 
            array (
              'name' => 'last_activity_c',
              'label' => 'LBL_LAST_ACTIVITY',
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'last_interaction_date_c',
              'label' => 'LBL_LAST_INTERACTION_DATE',
            ),
            1 => 
            array (
              'name' => 'last_interaction_c',
              'label' => 'LBL_LAST_INTERACTION',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'next_step_date_c',
              'label' => 'LBL_NEXT_STEP_DATE',
            ),
            1 => 'next_step',
          ),
        ),
        'lbl_detailview_panel3' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'lead_source_details_c',
              'label' => 'LBL_LEAD_SOURCE_DETAILS',
            ),
            1 => 'campaign_name',
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'referred_by_c',
              'studio' => 'visible',
              'label' => 'LBL_REFERRED_BY',
            ),
            1 => 'lead_source',
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'referral_status_c',
              'studio' => 'visible',
              'label' => 'LBL_REFERRAL_STATUS',
            ),
            1 => 
            array (
              'name' => 'referral_status_description_c',
              'studio' => 'visible',
              'label' => 'LBL_REFERRAL_STATUS_DESCRIPTION',
            ),
          ),
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          0 => 
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
          1 => 
          array (
            0 => 
            array (
              'name' => 'date_sync_with_quickbooks_c',
              'label' => 'LBL_DATE_SYNC_WITH_QUICKBOOKS',
            ),
            1 => 
            array (
              'name' => 'quickbooks_invoice_c',
              'label' => 'LBL_QUICKBOOKS_INVOICE',
            ),
          ),
        ),
      ),
    ),
  ),
);