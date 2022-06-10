<?php
// created: 2014-05-06 09:59:36
$dictionary["GI_Locations"]["fields"]["gi_locations_gi_regions"] = array (
  'name' => 'gi_locations_gi_regions',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_regions',
  'source' => 'non-db',
  'module' => 'GI_Regions',
  'bean_name' => 'GI_Regions',
  'vname' => 'LBL_GI_LOCATIONS_GI_REGIONS_FROM_GI_REGIONS_TITLE',
  'id_name' => 'gi_locations_gi_regionsgi_regions_ida',
);
$dictionary["GI_Locations"]["fields"]["gi_locations_gi_regions_name"] = array (
  'name' => 'gi_locations_gi_regions_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LOCATIONS_GI_REGIONS_FROM_GI_REGIONS_TITLE',
  'save' => true,
  'id_name' => 'gi_locations_gi_regionsgi_regions_ida',
  'link' => 'gi_locations_gi_regions',
  'table' => 'gi_regions',
  'module' => 'GI_Regions',
  'rname' => 'name',
);
$dictionary["GI_Locations"]["fields"]["gi_locations_gi_regionsgi_regions_ida"] = array (
  'name' => 'gi_locations_gi_regionsgi_regions_ida',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_regions',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LOCATIONS_GI_REGIONS_FROM_GI_LOCATIONS_TITLE',
);
