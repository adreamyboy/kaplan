<?php
$module_name = 'GI_Venues';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'MAP' => 
  array (
    'type' => 'url',
    'label' => 'LBL_MAP',
    'width' => '10%',
    'default' => true,
  ),
  'GI_LOCATIONS_GI_VENUES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_LOCATIONS_GI_VENUES_1_FROM_GI_LOCATIONS_TITLE',
    'id' => 'GI_LOCATIONS_GI_VENUES_1GI_LOCATIONS_IDA',
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
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
