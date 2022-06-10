<?php
$module_name = 'GI_Attempts';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'meetings_gi_attempts_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_MEETINGS_GI_ATTEMPTS_1_FROM_MEETINGS_TITLE',
        'id' => 'MEETINGS_GI_ATTEMPTS_1MEETINGS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'meetings_gi_attempts_1_name',
      ),
      'contacts_gi_attempts_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_CONTACTS_GI_ATTEMPTS_1_FROM_CONTACTS_TITLE',
        'id' => 'CONTACTS_GI_ATTEMPTS_1CONTACTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'contacts_gi_attempts_1_name',
      ),
      'gi_surveys_gi_attempts_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_SURVEYS_GI_ATTEMPTS_1_FROM_GI_SURVEYS_TITLE',
        'id' => 'GI_SURVEYS_GI_ATTEMPTS_1GI_SURVEYS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_surveys_gi_attempts_1_name',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status_c',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
