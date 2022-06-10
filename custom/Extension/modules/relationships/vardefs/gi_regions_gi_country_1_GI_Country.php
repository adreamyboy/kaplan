<?php
// created: 2014-05-06 13:00:13
$dictionary["GI_Country"]["fields"]["gi_regions_gi_country_1"] = array (
  'name' => 'gi_regions_gi_country_1',
  'type' => 'link',
  'relationship' => 'gi_regions_gi_country_1',
  'source' => 'non-db',
  'module' => 'GI_Regions',
  'bean_name' => 'GI_Regions',
  'vname' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_REGIONS_TITLE',
  'id_name' => 'gi_regions_gi_country_1gi_regions_ida',
);
$dictionary["GI_Country"]["fields"]["gi_regions_gi_country_1_name"] = array (
  'name' => 'gi_regions_gi_country_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_REGIONS_TITLE',
  'save' => true,
  'id_name' => 'gi_regions_gi_country_1gi_regions_ida',
  'link' => 'gi_regions_gi_country_1',
  'table' => 'gi_regions',
  'module' => 'GI_Regions',
  'rname' => 'name',
);
$dictionary["GI_Country"]["fields"]["gi_regions_gi_country_1gi_regions_ida"] = array (
  'name' => 'gi_regions_gi_country_1gi_regions_ida',
  'type' => 'link',
  'relationship' => 'gi_regions_gi_country_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GI_REGIONS_GI_COUNTRY_1_FROM_GI_COUNTRY_TITLE',
);
