<?php
// created: 2014-05-06 13:01:24
$dictionary["GI_Locations"]["fields"]["gi_country_gi_locations_1"] = array (
  'name' => 'gi_country_gi_locations_1',
  'type' => 'link',
  'relationship' => 'gi_country_gi_locations_1',
  'source' => 'non-db',
  'module' => 'GI_Country',
  'bean_name' => 'GI_Country',
  'vname' => 'LBL_GI_COUNTRY_GI_LOCATIONS_1_FROM_GI_COUNTRY_TITLE',
  'id_name' => 'gi_country_gi_locations_1gi_country_ida',
);
$dictionary["GI_Locations"]["fields"]["gi_country_gi_locations_1_name"] = array (
  'name' => 'gi_country_gi_locations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_COUNTRY_GI_LOCATIONS_1_FROM_GI_COUNTRY_TITLE',
  'save' => true,
  'id_name' => 'gi_country_gi_locations_1gi_country_ida',
  'link' => 'gi_country_gi_locations_1',
  'table' => 'gi_country',
  'module' => 'GI_Country',
  'rname' => 'name',
);
$dictionary["GI_Locations"]["fields"]["gi_country_gi_locations_1gi_country_ida"] = array (
  'name' => 'gi_country_gi_locations_1gi_country_ida',
  'type' => 'link',
  'relationship' => 'gi_country_gi_locations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_COUNTRY_GI_LOCATIONS_1_FROM_GI_LOCATIONS_TITLE',
);
