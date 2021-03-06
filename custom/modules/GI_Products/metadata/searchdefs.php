<?php
$module_name = 'GI_Products';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'gi_products_catalog_gi_products_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
        'id' => 'GI_PRODUCTS_CATALOG_GI_PRODUCTS_1GI_PRODUCTS_CATALOG_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_products_catalog_gi_products_1_name',
      ),
      'gi_terms_gi_products_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
        'id' => 'GI_TERMS_GI_PRODUCTS_1GI_TERMS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_terms_gi_products_1_name',
      ),
      'gi_locations_gi_products_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
        'id' => 'GI_LOCATIONS_GI_PRODUCTS_1GI_LOCATIONS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'gi_locations_gi_products_1_name',
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
      'vat_c' => 
      array (
        'type' => 'decimal',
        'default' => true,
        'label' => 'LBL_VAT',
        'width' => '10%',
        'name' => 'vat_c',
      ),
      'provisional_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_PROVISIONAL',
        'width' => '10%',
        'name' => 'provisional_c',
      ),
      'date_start_c' => 
      array (
        'type' => 'date',
        'default' => true,
        'label' => 'LBL_DATE_START',
        'width' => '10%',
        'name' => 'date_start_c',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
      ),
      'web_hidden' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_WEB_HIDDEN',
        'width' => '10%',
        'name' => 'web_hidden',
      ),
      'number_of_targeted_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_NUMBER_OF_TARGETED',
        'width' => '10%',
        'name' => 'number_of_targeted_c',
      ),
      'revenues_budgeted_c' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_REVENUES_BUDGETED',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'revenues_budgeted_c',
      ),
      'accounts_gi_products_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
        'id' => 'ACCOUNTS_GI_PRODUCTS_1ACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_gi_products_1_name',
      ),
      'has_elearning_c' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_HAS_ELEARNING',
        'width' => '10%',
        'name' => 'has_elearning_c',
      ),
      'refund_expiry_terms_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUND_EXPIRY_TERMS',
        'width' => '10%',
        'name' => 'refund_expiry_terms_c',
      ),
      'quarter_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_QUARTER',
        'width' => '10%',
        'name' => 'quarter_c',
      ),
      'price' => 
      array (
        'type' => 'currency',
        'default' => true,
        'label' => 'LBL_PRICE',
        'currency_format' => true,
        'width' => '10%',
        'name' => 'price',
      ),
      'default_line_item_status_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DEFAULT_LINE_ITEM_STATUS',
        'width' => '10%',
        'name' => 'default_line_item_status_c',
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
        'width' => '10%',
        'default' => true,
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
