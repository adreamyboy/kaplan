<?php
// created: 2017-12-31 13:17:19
$subpanel_layout['list_fields'] = array (
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
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
  'exam_result_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_EXAM_RESULT',
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
  'total_price' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_PRICE',
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
  'total_discount' => 
  array (
    'type' => 'currency',
    'default' => true,
    'vname' => 'LBL_TOTAL_DISCOUNT',
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
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'GI_Line_Items',
    'width' => '4%',
    'default' => true,
  ),
);