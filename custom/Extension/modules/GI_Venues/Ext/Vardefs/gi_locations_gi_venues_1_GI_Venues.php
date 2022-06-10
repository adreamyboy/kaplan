<?php
// created: 2014-05-06 14:03:51
$dictionary["GI_Venues"]["fields"]["gi_locations_gi_venues_1"] = array (
  'name' => 'gi_locations_gi_venues_1',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_venues_1',
  'source' => 'non-db',
  'module' => 'GI_Locations',
  'bean_name' => 'GI_Locations',
  'vname' => 'LBL_GI_LOCATIONS_GI_VENUES_1_FROM_GI_LOCATIONS_TITLE',
  'id_name' => 'gi_locations_gi_venues_1gi_locations_ida',
);
$dictionary["GI_Venues"]["fields"]["gi_locations_gi_venues_1_name"] = array (
  'name' => 'gi_locations_gi_venues_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_LOCATIONS_GI_VENUES_1_FROM_GI_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'gi_locations_gi_venues_1gi_locations_ida',
  'link' => 'gi_locations_gi_venues_1',
  'table' => 'gi_locations',
  'module' => 'GI_Locations',
  'rname' => 'name',
);
$dictionary["GI_Venues"]["fields"]["gi_locations_gi_venues_1gi_locations_ida"] = array (
  'name' => 'gi_locations_gi_venues_1gi_locations_ida',
  'type' => 'link',
  'relationship' => 'gi_locations_gi_venues_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_LOCATIONS_GI_VENUES_1_FROM_GI_VENUES_TITLE',
);
