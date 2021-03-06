<?php
// created: 2017-01-04 13:42:41
$viewdefs['Leads']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'hidden' => 
      array (
        0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
        1 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
        2 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
        3 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
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
    'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>',
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
        ),
        1 => 
        array (
          'name' => 'last_name',
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'email1',
        ),
        1 => 
        array (
          'name' => 'phone_mobile',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'phone_work',
        ),
        1 => 
        array (
          'name' => 'phone_fax',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'department',
        ),
        1 => 
        array (
          'name' => 'title',
        ),
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
        0 => 
        array (
          'name' => 'description',
          'comment' => 'Full text of the note',
          'label' => 'LBL_DESCRIPTION',
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
        0 => 
        array (
          'name' => 'status',
        ),
        1 => 
        array (
          'name' => 'lead_source',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'status_description',
          'comment' => 'Description of the status of the lead',
          'label' => 'LBL_STATUS_DESCRIPTION',
        ),
        1 => 
        array (
          'name' => 'lead_source_description',
          'comment' => 'Description of the lead source',
          'label' => 'LBL_LEAD_SOURCE_DESCRIPTION',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'refered_by',
        ),
        1 => 
        array (
          'name' => 'campaign_name',
          'label' => 'LBL_CAMPAIGN',
          'displayParams' => 
          array (
            'initial_filter' => '&status_advanced=Active',
          ),
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'do_not_call',
        ),
        1 => '',
      ),
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
        ),
      ),
    ),
  ),
);