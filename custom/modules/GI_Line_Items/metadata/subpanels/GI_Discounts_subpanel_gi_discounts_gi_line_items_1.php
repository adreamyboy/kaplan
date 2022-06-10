<?php
// created: 2014-11-18 15:19:12
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'total_price' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'total_discount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_DISCOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'total_price_net' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_PRICE_NET',
    'currency_format' => true,
    'width' => '10%',
  ),
  'opportunities_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_LINE_ITEMS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Opportunities',
    'target_record_key' => 'opportunities_gi_line_items_1opportunities_ida',
  ),
  'gi_products_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_GI_LINE_ITEMS_1GI_PRODUCTS_IDA',
    'width' => '25%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products',
    'target_record_key' => 'gi_products_gi_line_items_1gi_products_ida',
  ),
  'contacts_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_LINE_ITEMS_1CONTACTS_IDA',
    'width' => '20%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contacts_gi_line_items_1contacts_ida',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Line_Items',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'GI_Line_Items',
    'width' => '5%',
    'default' => true,
  ),
);