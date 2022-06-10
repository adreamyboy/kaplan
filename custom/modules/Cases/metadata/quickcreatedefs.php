<?php
// created: 2017-01-04 13:42:41
$viewdefs['Cases']['QuickCreate'] = array (
  'templateMeta' => 
  array (
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
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 'name',
        1 => 'priority',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'type',
          'comment' => 'The type of issue (ex: issue, feature)',
          'label' => 'LBL_TYPE',
        ),
        1 => '',
      ),
      2 => 
      array (
        0 => 'status',
        1 => 'account_name',
      ),
      3 => 
      array (
        0 => 'assigned_user_name',
      ),
      4 => 
      array (
        0 => 'description',
      ),
    ),
  ),
);