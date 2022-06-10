<?php 
 $GLOBALS["dictionary"]["GI_Products"]=array (
  'table' => 'gi_products',
  'audited' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => '255',
      'unified_search' => false,
      'full_text_search' => 
      array (
      ),
      'required' => false,
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'merge_filter' => 'disabled',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => true,
      'comment' => 'Record deletion indicator',
      'comments' => 'Record deletion indicator',
      'merge_filter' => 'disabled',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'gi_products_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'gi_products_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'gi_products_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'code' => 
    array (
      'required' => true,
      'name' => 'code',
      'vname' => 'LBL_CODE',
      'type' => 'varchar',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
    ),
    'type' => 
    array (
      'required' => true,
      'name' => 'type',
      'vname' => 'LBL_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => 'Service',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'product_type_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'price' => 
    array (
      'required' => true,
      'name' => 'price',
      'vname' => 'LBL_PRICE',
      'type' => 'currency',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 26,
      'size' => '20',
      'enable_range_search' => false,
      'precision' => 6,
      'default' => 0,
    ),
    'currency_id' => 
    array (
      'required' => false,
      'name' => 'currency_id',
      'vname' => 'LBL_CURRENCY',
      'type' => 'currency_id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 36,
      'size' => '20',
      'dbType' => 'id',
      'studio' => 'visible',
      'function' => 
      array (
        'name' => 'getCurrencyDropDown',
        'returns' => 'html',
      ),
    ),
    'discontinued' => 
    array (
      'required' => false,
      'name' => 'discontinued',
      'vname' => 'LBL_DISCONTINUED',
      'type' => 'bool',
      'massupdate' => true,
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
    ),
    'web_hidden' => 
    array (
      'required' => false,
      'name' => 'web_hidden',
      'vname' => 'LBL_WEB_HIDDEN',
      'type' => 'bool',
      'massupdate' => true,
      'default' => '1',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
    ),
    'revenues_budgeted_c' => 
    array (
      'labelValue' => 'Revenues Budgeted',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'revenues_budgeted_c',
      'vname' => 'LBL_REVENUES_BUDGETED',
      'type' => 'currency',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '26',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => 6,
      'id' => 'GI_Productsrevenues_budgeted_c',
      'custom_module' => 'GI_Products',
    ),
    'accounts_gi_products_1' => 
    array (
      'name' => 'accounts_gi_products_1',
      'type' => 'link',
      'relationship' => 'accounts_gi_products_1',
      'source' => 'non-db',
      'module' => 'Accounts',
      'bean_name' => 'Account',
      'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
      'id_name' => 'accounts_gi_products_1accounts_ida',
    ),
    'accounts_gi_products_1_name' => 
    array (
      'name' => 'accounts_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE',
      'save' => true,
      'id_name' => 'accounts_gi_products_1accounts_ida',
      'link' => 'accounts_gi_products_1',
      'table' => 'accounts',
      'module' => 'Accounts',
      'rname' => 'name',
    ),
    'accounts_gi_products_1accounts_ida' => 
    array (
      'name' => 'accounts_gi_products_1accounts_ida',
      'type' => 'link',
      'relationship' => 'accounts_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'gi_discounts_gi_products_1' => 
    array (
      'name' => 'gi_discounts_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_discounts_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Discounts',
      'bean_name' => 'GI_Discounts',
      'vname' => 'LBL_GI_DISCOUNTS_GI_PRODUCTS_1_FROM_GI_DISCOUNTS_TITLE',
    ),
    'quarter_c' => 
    array (
      'labelValue' => 'Quarter',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'quarter_c',
      'vname' => 'LBL_QUARTER',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsquarter_c',
      'custom_module' => 'GI_Products',
    ),
    'gi_exam_results_gi_products_1' => 
    array (
      'name' => 'gi_exam_results_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_exam_results_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Exam_Results',
      'bean_name' => 'GI_Exam_Results',
      'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE',
      'id_name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
    ),
    'gi_exam_results_gi_products_1_name' => 
    array (
      'name' => 'gi_exam_results_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE',
      'save' => true,
      'id_name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
      'link' => 'gi_exam_results_gi_products_1',
      'table' => 'gi_exam_results',
      'module' => 'GI_Exam_Results',
      'rname' => 'name',
    ),
    'gi_exam_results_gi_products_1gi_exam_results_ida' => 
    array (
      'name' => 'gi_exam_results_gi_products_1gi_exam_results_ida',
      'type' => 'link',
      'relationship' => 'gi_exam_results_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'vat_c' => 
    array (
      'inline_edit' => '',
      'labelValue' => 'VAT %',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'vat_c',
      'vname' => 'LBL_VAT',
      'type' => 'decimal',
      'massupdate' => '0',
      'default' => '5.0000000',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '18',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => '7',
      'id' => 'GI_Productsvat_c',
      'custom_module' => 'GI_Products',
    ),
    'gi_line_items_change_requests_gi_products_1' => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_change_requests_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Line_Items_Change_Requests',
      'bean_name' => 'GI_Line_Items_Change_Requests',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
      'id_name' => 'gi_line_itcd35equests_ida',
    ),
    'gi_line_items_change_requests_gi_products_1_name' => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
      'save' => true,
      'id_name' => 'gi_line_itcd35equests_ida',
      'link' => 'gi_line_items_change_requests_gi_products_1',
      'table' => 'gi_line_items_change_requests',
      'module' => 'GI_Line_Items_Change_Requests',
      'rname' => 'name',
    ),
    'gi_line_itcd35equests_ida' => 
    array (
      'name' => 'gi_line_itcd35equests_ida',
      'type' => 'link',
      'relationship' => 'gi_line_items_change_requests_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'gi_line_items_change_requests_gi_products_2' => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2',
      'type' => 'link',
      'relationship' => 'gi_line_items_change_requests_gi_products_2',
      'source' => 'non-db',
      'module' => 'GI_Line_Items_Change_Requests',
      'bean_name' => 'GI_Line_Items_Change_Requests',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
      'id_name' => 'gi_line_it60abequests_ida',
    ),
    'gi_line_items_change_requests_gi_products_2_name' => 
    array (
      'name' => 'gi_line_items_change_requests_gi_products_2_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE',
      'save' => true,
      'id_name' => 'gi_line_it60abequests_ida',
      'link' => 'gi_line_items_change_requests_gi_products_2',
      'table' => 'gi_line_items_change_requests',
      'module' => 'GI_Line_Items_Change_Requests',
      'rname' => 'name',
    ),
    'gi_line_it60abequests_ida' => 
    array (
      'name' => 'gi_line_it60abequests_ida',
      'type' => 'link',
      'relationship' => 'gi_line_items_change_requests_gi_products_2',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_PRODUCTS_TITLE',
    ),
    'provisional_c' => 
    array (
      'labelValue' => 'Provisional',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'provisional_c',
      'vname' => 'LBL_PROVISIONAL',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsprovisional_c',
      'custom_module' => 'GI_Products',
    ),
    'gi_line_items_mass_creator_gi_products_1' => 
    array (
      'name' => 'gi_line_items_mass_creator_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Line_Items_Mass_Creator',
      'bean_name' => 'GI_Line_Items_Mass_Creator',
      'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_MASS_CREATOR_TITLE',
    ),
    'gi_locations_gi_products_1' => 
    array (
      'name' => 'gi_locations_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_locations_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Locations',
      'bean_name' => 'GI_Locations',
      'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
      'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
    ),
    'gi_locations_gi_products_1_name' => 
    array (
      'name' => 'gi_locations_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE',
      'save' => true,
      'id_name' => 'gi_locations_gi_products_1gi_locations_ida',
      'link' => 'gi_locations_gi_products_1',
      'table' => 'gi_locations',
      'module' => 'GI_Locations',
      'rname' => 'name',
    ),
    'gi_locations_gi_products_1gi_locations_ida' => 
    array (
      'name' => 'gi_locations_gi_products_1gi_locations_ida',
      'type' => 'link',
      'relationship' => 'gi_locations_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'gi_products_campaigns_1' => 
    array (
      'name' => 'gi_products_campaigns_1',
      'type' => 'link',
      'relationship' => 'gi_products_campaigns_1',
      'source' => 'non-db',
      'module' => 'Campaigns',
      'bean_name' => 'Campaign',
      'side' => 'right',
      'vname' => 'LBL_GI_PRODUCTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
    ),
    'redirect_url_c' => 
    array (
      'labelValue' => 'Redirect URL (experimental)',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'redirect_url_c',
      'vname' => 'LBL_REDIRECT_URL',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsredirect_url_c',
      'custom_module' => 'GI_Products',
    ),
    'gi_products_catalog_gi_products_1' => 
    array (
      'name' => 'gi_products_catalog_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_products_catalog_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Products_Catalog',
      'bean_name' => 'GI_Products_Catalog',
      'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
      'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
    ),
    'gi_products_catalog_gi_products_1_name' => 
    array (
      'name' => 'gi_products_catalog_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE',
      'save' => true,
      'id_name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
      'link' => 'gi_products_catalog_gi_products_1',
      'table' => 'gi_products_catalog',
      'module' => 'GI_Products_Catalog',
      'rname' => 'name',
    ),
    'gi_products_catalog_gi_products_1gi_products_catalog_ida' => 
    array (
      'name' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
      'type' => 'link',
      'relationship' => 'gi_products_catalog_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'refund_expiry_terms_c' => 
    array (
      'labelValue' => 'Refund Expiry Terms',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'refund_expiry_terms_c',
      'vname' => 'LBL_REFUND_EXPIRY_TERMS',
      'type' => 'enum',
      'massupdate' => '1',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'refund_expiry_terms_list',
      'studio' => 'visible',
      'dependency' => false,
      'id' => 'GI_Productsrefund_expiry_terms_c',
      'custom_module' => 'GI_Products',
    ),
    'gi_products_gi_elearning_courses_1' => 
    array (
      'name' => 'gi_products_gi_elearning_courses_1',
      'type' => 'link',
      'relationship' => 'gi_products_gi_elearning_courses_1',
      'source' => 'non-db',
      'module' => 'GI_eLearning_Courses',
      'bean_name' => 'GI_eLearning_Courses',
      'vname' => 'LBL_GI_PRODUCTS_GI_ELEARNING_COURSES_1_FROM_GI_ELEARNING_COURSES_TITLE',
    ),
    'gi_products_gi_line_items_1' => 
    array (
      'name' => 'gi_products_gi_line_items_1',
      'type' => 'link',
      'relationship' => 'gi_products_gi_line_items_1',
      'source' => 'non-db',
      'module' => 'GI_Line_Items',
      'bean_name' => 'GI_Line_Items',
      'side' => 'right',
      'vname' => 'LBL_GI_PRODUCTS_GI_LINE_ITEMS_1_FROM_GI_LINE_ITEMS_TITLE',
    ),
    'gi_products_meetings_1' => 
    array (
      'name' => 'gi_products_meetings_1',
      'type' => 'link',
      'relationship' => 'gi_products_meetings_1',
      'source' => 'non-db',
      'module' => 'Meetings',
      'bean_name' => 'Meeting',
      'side' => 'right',
      'vname' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_MEETINGS_TITLE',
    ),
    'gi_terms_gi_products_1' => 
    array (
      'name' => 'gi_terms_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_terms_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Terms',
      'bean_name' => 'GI_Terms',
      'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
      'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
    ),
    'gi_terms_gi_products_1_name' => 
    array (
      'name' => 'gi_terms_gi_products_1_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE',
      'save' => true,
      'id_name' => 'gi_terms_gi_products_1gi_terms_ida',
      'link' => 'gi_terms_gi_products_1',
      'table' => 'gi_terms',
      'module' => 'GI_Terms',
      'rname' => 'name',
    ),
    'gi_terms_gi_products_1gi_terms_ida' => 
    array (
      'name' => 'gi_terms_gi_products_1gi_terms_ida',
      'type' => 'link',
      'relationship' => 'gi_terms_gi_products_1',
      'source' => 'non-db',
      'reportable' => false,
      'side' => 'right',
      'vname' => 'LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'total_active' => 
    array (
      'name' => 'total_active',
      'vname' => 'LBL_TOTAL_ACTIVE',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Active\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_suspended' => 
    array (
      'name' => 'total_suspended',
      'vname' => 'LBL_TOTAL_SUSPENDED',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Suspended\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_complete' => 
    array (
      'name' => 'total_complete',
      'vname' => 'LBL_TOTAL_COMPLETE',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Complete\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_not_interested' => 
    array (
      'name' => 'total_not_interested',
      'vname' => 'LBL_TOTAL_NOT_INTERESTED',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Not_Interested\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_cancelled' => 
    array (
      'name' => 'total_cancelled',
      'vname' => 'LBL_TOTAL_CANCELLED',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Cancelled\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_intersted_cold' => 
    array (
      'name' => 'total_intersted_cold',
      'vname' => 'LBL_TOTAL_INTERESTED_COLD',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Cold\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_interested_warm' => 
    array (
      'name' => 'total_interested_warm',
      'vname' => 'LBL_TOTAL_INTERESTED_WARM',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Warm\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_interested_hot' => 
    array (
      'name' => 'total_interested_hot',
      'vname' => 'LBL_TOTAL_INTERESTED_HOT',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'int',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				COUNT(li.id)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c = \'Interested_Hot\' 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_revenues' => 
    array (
      'name' => 'total_revenues',
      'vname' => 'LBL_TOTAL_REVENUES',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'currency',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				SUM(li.total_price_net)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'total_discounts' => 
    array (
      'name' => 'total_discounts',
      'vname' => 'LBL_TOTAL_DISCOUNTS',
      'type' => 'kreporter',
      'source' => 'non-db',
      'kreporttype' => 'currency',
      'eval' => 
      array (
        'presentation' => 
        array (
          'eval' => '
			SELECT
				SUM(li.total_discount)
			FROM
				gi_products p 
			LEFT JOIN
				gi_products_cstm as p_c 
					ON p.id = p_c.id_c 
			INNER JOIN
				gi_products_gi_line_items_1_c p_li_c 
					ON p.id=p_li_c.gi_products_gi_line_items_1gi_products_ida 
					AND p_li_c.deleted=0 
			INNER JOIN
				gi_line_items li 
					ON li.id=p_li_c.gi_products_gi_line_items_1gi_line_items_idb 
					AND li.deleted=0 
			LEFT JOIN
				gi_line_items_cstm as li_c 
					ON li.id = li_c.id_c 
			WHERE
				p.deleted = "0" 
				AND li_c.status_c IN (\'Active\' , \'Suspended\', \'Complete\') 
				AND p.id={t}.id 
			GROUP BY
				p.id  
			ORDER BY
				p.id ASC			
			',
        ),
      ),
    ),
    'add_line_item_to_opp_id_c' => 
    array (
      'labelValue' => 'Automatically add a new Line Item to Opportunity ID',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'add_line_item_to_opp_id_c',
      'vname' => 'LBL_ADD_LINE_ITEM_TO_OPP_ID',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsadd_line_item_to_opp_id_c',
      'custom_module' => 'GI_Products',
    ),
    'batch_c' => 
    array (
      'labelValue' => 'Batch',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'batch_c',
      'vname' => 'LBL_BATCH',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsbatch_c',
      'custom_module' => 'GI_Products',
    ),
    'capacity_c' => 
    array (
      'labelValue' => 'Maximum Capacity',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'capacity_c',
      'vname' => 'LBL_CAPACITY',
      'type' => 'int',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => NULL,
      'min' => false,
      'max' => false,
      'id' => 'GI_Productscapacity_c',
      'custom_module' => 'GI_Products',
    ),
    'date_end_c' => 
    array (
      'options' => 'date_range_search_dom',
      'labelValue' => 'Date End',
      'enable_range_search' => '1',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'date_end_c',
      'vname' => 'LBL_DATE_END',
      'type' => 'date',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'id' => 'GI_Productsdate_end_c',
      'custom_module' => 'GI_Products',
    ),
    'date_refund_expired_c' => 
    array (
      'labelValue' => 'Date Refund Expired',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'date_refund_expired_c',
      'vname' => 'LBL_DATE_REFUND_EXPIRED',
      'type' => 'date',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'enable_range_search' => false,
      'id' => 'GI_Productsdate_refund_expired_c',
      'custom_module' => 'GI_Products',
    ),
    'date_start_c' => 
    array (
      'options' => 'date_range_search_dom',
      'labelValue' => 'Date Start',
      'enable_range_search' => '1',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'date_start_c',
      'vname' => 'LBL_DATE_START',
      'type' => 'date',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'id' => 'GI_Productsdate_start_c',
      'custom_module' => 'GI_Products',
    ),
    'date_sync_with_moodle_c' => 
    array (
      'labelValue' => 'Date Sync with Moodle',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'date_sync_with_moodle_c',
      'vname' => 'LBL_DATE_SYNC_WITH_MOODLE',
      'type' => 'datetimecombo',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'enable_range_search' => false,
      'dbType' => 'datetime',
      'id' => 'GI_Productsdate_sync_with_moodle_c',
      'custom_module' => 'GI_Products',
    ),
    'days_c' => 
    array (
      'labelValue' => 'Days',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'days_c',
      'vname' => 'LBL_DAYS',
      'type' => 'multienum',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'size' => '20',
      'options' => 'dom_cal_day_short',
      'studio' => 'visible',
      'isMultiSelect' => true,
      'id' => 'GI_Productsdays_c',
      'custom_module' => 'GI_Products',
    ),
    'default_line_item_status_c' => 
    array (
      'labelValue' => 'Default Line Item Status (experimental)',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'default_line_item_status_c',
      'vname' => 'LBL_DEFAULT_LINE_ITEM_STATUS',
      'type' => 'enum',
      'massupdate' => '1',
      'default' => 'Interested_Cold',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'line_item_status_list',
      'studio' => 'visible',
      'dependency' => NULL,
      'id' => 'GI_Productsdefault_line_item_status_c',
      'custom_module' => 'GI_Products',
    ),
    'has_elearning_c' => 
    array (
      'labelValue' => 'Has eLearning',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'has_elearning_c',
      'vname' => 'LBL_HAS_ELEARNING',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productshas_elearning_c',
      'custom_module' => 'GI_Products',
    ),
    'hide_add_to_cart_c' => 
    array (
      'labelValue' => 'Hide (Add to Cart) in website',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'hide_add_to_cart_c',
      'vname' => 'LBL_HIDE_ADD_TO_CART',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productshide_add_to_cart_c',
      'custom_module' => 'GI_Products',
    ),
    'hide_instructor_c' => 
    array (
      'labelValue' => 'Hide Instructor in PDF',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'hide_instructor_c',
      'vname' => 'LBL_HIDE_INSTRUCTOR',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productshide_instructor_c',
      'custom_module' => 'GI_Products',
    ),
    'moodle_cohort_id_c' => 
    array (
      'labelValue' => 'Moodle Cohort ID',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'moodle_cohort_id_c',
      'vname' => 'LBL_MOODLE_COHORT_ID',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productsmoodle_cohort_id_c',
      'custom_module' => 'GI_Products',
    ),
    'number_of_sessions_c' => 
    array (
      'labelValue' => 'Number of Sessions',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'number_of_sessions_c',
      'vname' => 'LBL_NUMBER_OF_SESSIONS',
      'type' => 'int',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => '',
      'min' => false,
      'max' => false,
      'id' => 'GI_Productsnumber_of_sessions_c',
      'custom_module' => 'GI_Products',
    ),
    'number_of_targeted_c' => 
    array (
      'labelValue' => 'Number of Targeted',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'number_of_targeted_c',
      'vname' => 'LBL_NUMBER_OF_TARGETED',
      'type' => 'int',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'enable_range_search' => false,
      'disable_num_format' => '1',
      'min' => 0,
      'max' => false,
      'validation' => 
      array (
        'type' => 'range',
        'min' => 0,
        'max' => false,
      ),
      'id' => 'GI_Productsnumber_of_targeted_c',
      'custom_module' => 'GI_Products',
    ),
    'status_c' => 
    array (
      'labelValue' => 'Status',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'status_c',
      'vname' => 'LBL_STATUS',
      'type' => 'enum',
      'massupdate' => '1',
      'default' => 'Active',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'product_status_list',
      'studio' => 'visible',
      'dependency' => NULL,
      'id' => 'GI_Productsstatus_c',
      'custom_module' => 'GI_Products',
    ),
    'synch_lineitems_immediately_c' => 
    array (
      'labelValue' => 'Synch LineItems Immediately?',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'synch_lineitems_immediately_c',
      'vname' => 'LBL_SYNCH_LINEITEMS_IMMEDIATELY',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productssynch_lineitems_immediately_c',
      'custom_module' => 'GI_Products',
    ),
    'woo_error_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'woo error',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'woo_error_c',
      'vname' => 'LBL_WOO_ERROR',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productswoo_error_c',
      'custom_module' => 'GI_Products',
    ),
    'product_url_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'product_url_c',
      'vname' => 'LBL_PRODUCT_URL',
      'type' => 'url',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'dbType' => 'varchar',
      'gen' => '',
      'link_target' => '_blank',
      'id' => 'GI_Productsproduct_url_c',
      'custom_module' => 'GI_Products',
    ),
    'schedule_upload_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'schedule_upload_c',
      'vname' => 'LBL_SCHEDULE_UPLOAD',
      'type' => 'image',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 255,
      'size' => '20',
      'studio' => 'visible',
      'dbType' => 'varchar',
      'border' => '',
      'width' => '120',
      'height' => '',
      'id' => 'GI_Productsschedule_upload_c',
      'custom_module' => 'GI_Products',
    ),
    'schedule_url_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'schedule_url_c',
      'vname' => 'LBL_SCHEDULE_URL',
      'type' => 'url',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'dbType' => 'varchar',
      'gen' => '',
      'link_target' => '_blank',
      'id' => 'GI_Productsschedule_url_c',
      'custom_module' => 'GI_Products',
    ),
    'wc_product_id_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'wc_product_id_c',
      'vname' => 'LBL_WC_PRODUCT_ID',
      'type' => 'varchar',
      'massupdate' => '0',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '255',
      'size' => '20',
      'id' => 'GI_Productswc_product_id_c',
      'custom_module' => 'GI_Products',
    ),
  ),
  'relationships' => 
  array (
    'gi_products_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'gi_products_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'gi_products_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Products',
      'rhs_table' => 'gi_products',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'gi_productspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => true,
);