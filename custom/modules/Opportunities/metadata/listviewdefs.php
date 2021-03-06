<?php
$listViewDefs ['Opportunities'] = 
array (
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_OPPORTUNITY_NAME',
    'link' => true,
    'default' => true,
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'module' => 'Accounts',
    'link' => true,
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'contextMenu' => 
    array (
      'objectType' => 'sugarAccount',
      'metaData' => 
      array (
        'return_module' => 'Contacts',
        'return_action' => 'ListView',
        'module' => 'Accounts',
        'parent_id' => '{$ACCOUNT_ID}',
        'parent_name' => '{$ACCOUNT_NAME}',
        'account_id' => '{$ACCOUNT_ID}',
        'account_name' => '{$ACCOUNT_NAME}',
      ),
    ),
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
  ),
  'SALES_STAGE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_SALES_STAGE',
    'default' => true,
  ),
  'AMOUNT_USDOLLAR' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_AMOUNT_USDOLLAR',
    'align' => 'right',
    'default' => true,
    'currency_format' => true,
  ),
  'TOTAL_UNPAID_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_UNPAID',
    'currency_format' => true,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'WEB_ORDER_CONFIRMED_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_WEB_ORDER_CONFIRMED',
    'width' => '10%',
  ),
  'DATE_CLOSED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_DATE_CLOSED',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'FIRST_ACTIVITY_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_FIRST_ACTIVITY_DATE',
    'width' => '10%',
  ),
  'LAST_ACTIVITY_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_LAST_ACTIVITY_DATE',
    'width' => '10%',
  ),
  'LAST_INTERACTION_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_LAST_INTERACTION_DATE',
    'width' => '10%',
  ),
  'NEXT_STEP_DATE_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_NEXT_STEP_DATE',
    'width' => '10%',
  ),
  'NO_OF_COMPLETED_ACTIVITIES_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_NO_OF_COMPLETED_ACTIVITIES',
    'width' => '10%',
  ),
  'NO_OF_COMPLETED_INTERACTIONS_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_NO_OF_COMPLETED_INTERACTIONS',
    'width' => '10%',
  ),
  'NO_OF_NOT_HELD_ACTIVITIES_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_NO_OF_NOT_HELD_ACTIVITIES',
    'width' => '10%',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'OPPORTUNITY_TYPE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TYPE',
    'default' => false,
  ),
  'LEAD_SOURCE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => false,
  ),
  'NEXT_STEP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NEXT_STEP',
    'default' => false,
  ),
  'PROBABILITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PROBABILITY',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
  'LAST_ACTIVITY_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_LAST_ACTIVITY',
    'width' => '10%',
  ),
  'LAST_INTERACTION_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_LAST_INTERACTION',
    'width' => '10%',
  ),
  'REASON_OF_LOSS_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_REASON_OF_LOSS',
    'width' => '10%',
  ),
);
?>
