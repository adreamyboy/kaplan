<?php
$viewdefs ['Leads'] = 
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
          4 => 'FIND_DUPLICATES',
          5 => 
          array (
            'customCode' => '<input class="button" onclick="if(prompt(\'Are you absolutely sure you want to copy the lead details into the selected Contact? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=ProcessWebLead\', \'_self\');" type="submit" value="Process Web-Based Lead">',
          ),
          6 => 
          array (
            'customCode' => '<input class="button" onclick="if(prompt(\'Are you absolutely sure you want to delete the lead and its opportunity and line items? Type YES to confirm.\', \'\') == \'YES\') window.open(\'index.php?module={$module}&record={$id}&action=DeleteWebLead\', \'_self\');" type="submit" value="Delete Lead, Opportunity, Line Items">',
          ),
          7 => 
          array (
            'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'class' => 'button',
                'id' => 'manage_subscriptions_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';',
                'name' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              ),
            ),
          ),
        ),
        'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Leads/Lead.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'email1',
          1 => 'phone_mobile',
        ),
        2 => 
        array (
          0 => 'phone_work',
          1 => 'phone_fax',
        ),
        3 => 
        array (
          0 => 'department',
          1 => 'title',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
          ),
          1 => 
          array (
            'name' => 'company_sponsored_c',
            'label' => 'LBL_COMPANY_SPONSORED',
          ),
        ),
        5 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'form_url_c',
            'label' => 'LBL_FORM_URL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_country',
            'comment' => 'Country for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'alt_address_country',
            'comment' => 'Country for alternate address',
            'label' => 'LBL_ALT_ADDRESS_COUNTRY',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_city',
            'comment' => 'City for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY',
          ),
          1 => 
          array (
            'name' => 'alt_address_city',
            'comment' => 'City for alternate address',
            'label' => 'LBL_ALT_ADDRESS_CITY',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_postalcode',
            'comment' => 'Postal code for primary address',
            'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
          ),
          1 => 
          array (
            'name' => 'alt_address_postalcode',
            'comment' => 'Postal code for alternate address',
            'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => 'lead_source',
        ),
        1 => 
        array (
          0 => 'status_description',
          1 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
        ),
        2 => 
        array (
          0 => 'do_not_call',
          1 => 'lead_source_description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'send_email_verification_link_c',
            'label' => 'LBL_SEND_EMAIL_VERIFICATION_LINK',
          ),
          1 => 
          array (
            'name' => 'email_verification_date_sent_c',
            'label' => 'LBL_EMAIL_VERIFICATION_DATE_SENT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'product_c',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT',
          ),
          1 => 
          array (
            'name' => 'current_url_c',
            'label' => 'LBL_CURRENT_URL',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
?>
