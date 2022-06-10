<?php
$module_name = 'GI_Country';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
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
          1 => 
          array (
            'name' => 'code',
            'label' => 'LBL_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_regions_gi_country_1_name',
            'label' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_REGIONS_TITLE',
          ),
          1 => 
          array (
            'name' => 'discontinued',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
      ),
    ),
  ),
);
?>
