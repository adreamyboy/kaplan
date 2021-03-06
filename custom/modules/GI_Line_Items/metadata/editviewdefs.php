<?php
$module_name = 'GI_Line_Items';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/GI_Line_Items/js/script.js',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_gi_line_items_1_name',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&status_c_advanced=Active',
              'field_to_name_array' => 
              array (
                'id' => 'gi_products_gi_line_items_1gi_products_ida',
                'name' => 'gi_products_gi_line_items_1_name',
                'price' => 'unit_price',
                'currency_id' => 'currency_id',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'opportunities_gi_line_items_1_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'contacts_gi_line_items_1_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'unit_price',
            'label' => 'LBL_UNIT_PRICE',
          ),
          1 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'discount_type_c',
            'studio' => 'visible',
            'label' => 'LBL_DISCOUNT_TYPE',
          ),
          1 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'discount_ratio_c',
            'label' => 'LBL_DISCOUNT_RATIO',
          ),
          1 => 
          array (
            'name' => 'provisional_c',
            'label' => 'LBL_PROVISIONAL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'gi_discounts_gi_line_items_1_name',
            'label' => 'LBL_GI_DISCOUNTS_GI_LINE_ITEMS_1_FROM_GI_DISCOUNTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'prospectlists_gi_line_items_1_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'delivery_mode_c',
            'studio' => 'visible',
            'label' => 'LBL_DELIVERY_MODE',
          ),
          1 => 
          array (
            'name' => 'date_shipped_c',
            'label' => 'LBL_DATE_SHIPPED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'shipment_details_c',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_DETAILS',
          ),
          1 => 
          array (
            'name' => 'date_delivered_c',
            'label' => 'LBL_DATE_DELIVERED',
          ),
        ),
      ),
    ),
  ),
);
?>
