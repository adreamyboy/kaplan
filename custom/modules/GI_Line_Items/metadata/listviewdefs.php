<?php
$module_name = 'GI_Line_Items';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'CONTACTS_GI_LINE_ITEMS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
    'id' => 'CONTACTS_GI_LINE_ITEMS_1CONTACTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'GI_PRODUCTS_GI_LINE_ITEMS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
    'id' => 'GI_PRODUCTS_GI_LINE_ITEMS_1GI_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DISCOUNT_RATE' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_DISCOUNT_RATE',
    'width' => '10%',
  ),
  'TOTAL_PRICE' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_PRICE',
    'currency_format' => true,
    'width' => '10%',
  ),
  'TOTAL_BEFORE_VAT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_BEFORE_VAT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'VAT_C' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_VAT',
    'width' => '10%',
  ),
  'VAT_AMOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_VAT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'TOTAL_PRICE_NET' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_PRICE_NET',
    'currency_format' => true,
    'width' => '10%',
  ),
  'EXAM_RESULT_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EXAM_RESULT',
    'width' => '10%',
  ),
  'OPPORTUNITIES_GI_LINE_ITEMS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
    'id' => 'OPPORTUNITIES_GI_LINE_ITEMS_1OPPORTUNITIES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DELIVERY_MODE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DELIVERY_MODE',
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_DETAILS_C' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_DETAILS',
    'sortable' => false,
    'width' => '10%',
  ),
  'DATE_DELIVERED_C' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_DATE_DELIVERED',
    'width' => '10%',
  ),
  'DATE_SHIPPED_C' => 
  array (
    'type' => 'date',
    'default' => false,
    'label' => 'LBL_DATE_SHIPPED',
    'width' => '10%',
  ),
);
?>
