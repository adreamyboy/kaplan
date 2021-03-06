<?php
// created: 2017-12-31 13:18:08
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'excluded_from_invoice_c' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_EXCLUDED_FROM_INVOICE',
    'width' => '5%',
  ),
  'gi_products_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_GI_LINE_ITEMS_1GI_PRODUCTS_IDA',
    'width' => '30%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Products',
    'target_record_key' => 'gi_products_gi_line_items_1gi_products_ida',
  ),
  'unit_price' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_UNIT_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'discount_rate' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_DISCOUNT_RATE',
    'width' => '10%',
  ),
  'gi_discounts_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
    'id' => 'GI_DISCOUNTS_GI_LINE_ITEMS_1GI_DISCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'GI_Discounts',
    'target_record_key' => 'gi_discounts_gi_line_items_1gi_discounts_ida',
  ),
  'total_discount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_DISCOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'total_before_vat_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_BEFORE_VAT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'vat_c' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'vname' => 'LBL_VAT',
    'width' => '10%',
  ),
  'vat_amount_c' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_VAT_AMOUNT',
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
  'contacts_gi_line_items_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_LINE_ITEMS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contacts_gi_line_items_1contacts_ida',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'modified_by_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'modified_user_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Line_Items',
    'width' => '4%',
    'default' => true,
  ),
);