<?php
$module_name = 'GI_Country';
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
  'GI_REGIONS_GI_COUNTRY_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_REGIONS_TITLE',
    'id' => 'GI_REGIONS_GI_COUNTRY_1GI_REGIONS_IDA',
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
