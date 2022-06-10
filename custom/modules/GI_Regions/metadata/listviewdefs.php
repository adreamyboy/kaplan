<?php
$module_name = 'GI_Regions';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'DISCONTINUED' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_DISCONTINUED',
    'width' => '10%',
  ),
);
?>
