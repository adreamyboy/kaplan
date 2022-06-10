<?php
$dashletData['GI_Line_ItemsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'name' => 
  array (
    'default' => '',
  ),
  'gi_products_gi_line_items_1_name' => 
  array (
    'default' => '',
  ),
  'total_price_net' => 
  array (
    'default' => '',
  ),
  'status_c' => 
  array (
    'default' => '',
  ),
  'excluded_from_invoice_c' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
);
$dashletData['GI_Line_ItemsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'gi_products_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_GI_LINE_ITEMS_1GI_PRODUCTS_IDA',
    'width' => '25%',
    'default' => true,
    'name' => 'gi_products_gi_line_items_1_name',
  ),
  'contacts_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_LINE_ITEMS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'contacts_gi_line_items_1_name',
  ),
  'opportunities_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_LINE_ITEMS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'opportunities_gi_line_items_1_name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'total_price_net' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_PRICE_NET',
    'currency_format' => true,
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
