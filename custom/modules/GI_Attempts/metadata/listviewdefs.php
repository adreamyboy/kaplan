<?php
$module_name = 'GI_Attempts';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CONTACTS_GI_ATTEMPTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_ATTEMPTS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'MEETINGS_GI_ATTEMPTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_MEETINGS_TITLE',
    'id' => 'MEETINGS_GI_ATTEMPTS_1MEETINGS_IDA',
    'width' => '25%',
    'default' => true,
  ),
  'GI_SURVEYS_GI_ATTEMPTS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_SURVEYS_TITLE',
    'id' => 'GI_SURVEYS_GI_ATTEMPTS_1GI_SURVEYS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
