<?php
$module_name = 'GI_Venues';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
            'name' => 'discontinued',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_locations_gi_venues_1_name',
            'displayParams' =>
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
            )
          ),
          1 => 
          array (
            'name' => 'map',
            'label' => 'LBL_MAP',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
