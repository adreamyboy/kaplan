<?php
// created: 2017-01-04 13:42:41
$viewdefs['ProspectLists']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'closeFormBeforeCustomButtons' => true,
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 
        array (
          'customCode' => '<input title="{$APP.LBL_EXPORT}"  class="button" type="button" name="opp_to_quote_button" id="export_button" value="{$APP.LBL_EXPORT}" onclick="document.location.href = \'index.php?entryPoint=export&module=ProspectLists&uid={$fields.id.value}&members=1\'">',
        ),
        4 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module=KReports&action=DetailView&record=8b525de4-387a-9e61-ba70-5419875d5b99\', \'_blank\');" type="submit" value="Go to Target List Creator">',
        ),
        5 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=PopulateByEmailAddresses\', \'_self\');" type="submit" value="Populate Contacts By Email Addresses">',
        ),
        6 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=PopulateByMobilePhones\', \'_self\');" type="submit" value="Populate Persons By Mobile Phones (testing... do not use)">',
        ),
        7 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=SendEmail\');" type="submit" value="Send Email to Contacts">',
        ),
        8 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=SendLogins\', \'_blank\');" type="submit" value="Generate/Send Password (new) & Send Same Password (existing) (testing... do DONT use this option)">',
        ),
        9 => 
        array (
          'customCode' => '<input class="button" onclick="window.open(\'index.php?module={$module}&record={$id}&action=GenerateLineItemsForTargetList\', \'_blank\');" type="submit" value="Create Line Items (testing... action)">',
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
      'LBL_PANEL_ASSIGNMENT' => 
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
        0 => 'name',
        1 => 
        array (
          'name' => 'entry_count',
          'label' => 'LBL_ENTRIES',
        ),
      ),
      1 => 
      array (
        0 => 'list_type',
        1 => 'domain_name',
      ),
      2 => 
      array (
        0 => 'description',
      ),
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      0 => 
      array (
        0 => 'assigned_user_name',
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
          'name' => 'date_entered',
          'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
        ),
      ),
    ),
  ),
);