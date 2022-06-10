<?php
// created: 2014-05-29 06:25:07
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1"] = array (
  'name' => 'opportunities_gi_payments_1',
  'type' => 'link',
  'relationship' => 'opportunities_gi_payments_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_gi_payments_1opportunities_ida',
);
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1_name"] = array (
  'name' => 'opportunities_gi_payments_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_gi_payments_1opportunities_ida',
  'link' => 'opportunities_gi_payments_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["GI_Payments"]["fields"]["opportunities_gi_payments_1opportunities_ida"] = array (
  'name' => 'opportunities_gi_payments_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_gi_payments_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
);
