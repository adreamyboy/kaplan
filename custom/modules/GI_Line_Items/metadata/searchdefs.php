<?php
$module_name = 'GI_Line_Items';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'gi_products_gi_line_items_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
        'id' => 'GI_PRODUCTS_GI_LINE_ITEMS_1GI_PRODUCTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_products_gi_line_items_1_name',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
      'provisional_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PROVISIONAL',
        'width' => '10%',
        'name' => 'provisional_c',
      ),
      'created_by' => 
      array (
        'type' => 'assigned_user_name',
        'label' => 'LBL_CREATED',
        'width' => '10%',
        'default' => true,
        'name' => 'created_by',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'unit_price' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_UNIT_PRICE',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'unit_price',
      ),
      'vat_c' => 
      array (
        'type' => 'decimal',
        'default' => true,
        'label' => 'LBL_VAT',
        'width' => '10%',
        'name' => 'vat_c',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        'width' => '10%',
        'name' => 'status_c',
      ),
      'exam_result_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EXAM_RESULT',
        'width' => '10%',
        'name' => 'exam_result_c',
      ),
      'delivery_mode_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DELIVERY_MODE',
        'width' => '10%',
        'name' => 'delivery_mode_c',
      ),
      'shipment_details_c' => 
      array (
        'type' => 'text',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_DETAILS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_details_c',
      ),
      'date_delivered_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATE_DELIVERED',
        'width' => '10%',
        'name' => 'date_delivered_c',
      ),
      'date_shipped_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATE_SHIPPED',
        'width' => '10%',
        'name' => 'date_shipped_c',
      ),
      'gi_discounts_gi_line_items_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
        'id' => 'GI_DISCOUNTS_GI_LINE_ITEMS_1GI_DISCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_discounts_gi_line_items_1_name',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
