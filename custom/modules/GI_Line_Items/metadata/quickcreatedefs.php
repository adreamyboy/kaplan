<?php
$module_name = 'GI_Line_Items';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
      ),
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
            'label' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_PRODUCTS_TITLE',
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
            'label' => 'LBL_OPPORTUNITIES_GI_LINE_ITEMS_1_FROM_OPPORTUNITIES_TITLE',
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
            'label' => 'LBL_CONTACTS_GI_LINE_ITEMS_1_FROM_CONTACTS_TITLE',
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
            'name' => 'exam_result_c',
            'studio' => 'visible',
            'label' => 'LBL_EXAM_RESULT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'discount_ratio_c',
            'label' => 'LBL_DISCOUNT_RATIO',
          ),
          1 => 'assigned_user_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
