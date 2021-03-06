<?php
$module_name = 'GI_Products';
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
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL1' => 
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
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_catalog_gi_products_1_name',
            'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
              'field_to_name_array' => 
              array (
                'id' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
                'name' => 'gi_products_catalog_gi_products_1_name',
                'price' => 'price',
                'currency_id' => 'currency_id',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gi_terms_gi_products_1_name',
            'label' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
            ),
          ),
          1 => 
          array (
            'name' => 'accounts_gi_products_1_name',
            'label' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gi_locations_gi_products_1_name',
            'label' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
            ),
          ),
          1 => 
          array (
            'name' => 'web_hidden',
            'label' => 'LBL_WEB_HIDDEN',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'number_of_targeted_c',
            'label' => 'LBL_NUMBER_OF_TARGETED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'revenues_budgeted_c',
            'label' => 'LBL_REVENUES_BUDGETED',
          ),
          1 => 
          array (
            'name' => 'date_refund_expired_c',
            'label' => 'LBL_DATE_REFUND_EXPIRED',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'provisional_c',
            'label' => 'LBL_PROVISIONAL',
          ),
          1 => 
          array (
            'name' => 'batch_c',
            'label' => 'LBL_BATCH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'number_of_sessions_c',
            'label' => 'LBL_NUMBER_OF_SESSIONS',
          ),
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_start_c',
            'label' => 'LBL_DATE_START',
          ),
          1 => 
          array (
            'name' => 'date_end_c',
            'label' => 'LBL_DATE_END',
          ),
        ),
      ),
    ),
  ),
);
?>
