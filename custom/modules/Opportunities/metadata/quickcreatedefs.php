<?php
// created: 2017-01-04 13:42:41
$viewdefs['Opportunities']['QuickCreate'] = array (
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
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'account_name',
        ),
        1 => 'lead_source',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'campaign_name',
          'label' => 'LBL_CAMPAIGN',
          'displayParams' => 
          array (
            'required' => true,
            'initial_filter' => '&status_advanced=Active',
          ),
        ),
        1 => 
        array (
          'name' => 'lead_source_details_c',
          'label' => 'LBL_LEAD_SOURCE_DETAILS',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'currency_id',
        ),
        1 => 
        array (
          'name' => 'assigned_user_name',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'comment' => 'Full text of the note',
          'label' => 'LBL_DESCRIPTION',
        ),
      ),
    ),
  ),
);