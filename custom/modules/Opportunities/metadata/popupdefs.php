<?php
$popupMeta = array (
    'moduleMain' => 'Opportunity',
    'varName' => 'OPPORTUNITY',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'opportunities.name',
  'account_name' => 'accounts.name',
  'status_c' => 'opportunities_cstm.status_c',
  'sales_stage' => 'opportunities.sales_stage',
  'assigned_user_id' => 'opportunities.assigned_user_id',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'account_name',
  2 => 'status_c',
  3 => 'sales_stage',
  4 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'account_name' => 
  array (
    'name' => 'account_name',
    'displayParams' => 
    array (
      'hideButtons' => 'true',
      'size' => 30,
      'class' => 'sqsEnabled sqsNoAutofill',
    ),
    'width' => '10%',
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'sales_stage' => 
  array (
    'name' => 'sales_stage',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_OPPORTUNITY_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'module' => 'Accounts',
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'name' => 'account_name',
  ),
  'AMOUNT_USDOLLAR' => 
  array (
    'type' => 'currency',
    'studio' => 
    array (
      'editview' => false,
      'detailview' => false,
      'quickcreate' => false,
    ),
    'label' => 'LBL_AMOUNT_USDOLLAR',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'amount_usdollar',
  ),
  'TOTAL_UNPAID_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_UNPAID',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'total_unpaid_c',
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
),
);
