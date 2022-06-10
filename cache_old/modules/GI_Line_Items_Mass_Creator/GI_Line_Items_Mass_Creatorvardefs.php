<?php 
 $GLOBALS["dictionary"]["GI_Line_Items_Mass_Creator"]=array (
  'table' => 'gi_line_items_mass_creator',
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
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
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
      'comments' => 'Full text of the note',
      'merge_filter' => 'disabled',
      'required' => true,
      'audited' => true,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_created_by',
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
      'relationship' => 'gi_line_items_mass_creator_modified_user',
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
      'relationship' => 'gi_line_items_mass_creator_assigned_user',
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
    'gi_line_items_mass_creator_gi_products_1' => 
    array (
      'name' => 'gi_line_items_mass_creator_gi_products_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_gi_products_1',
      'source' => 'non-db',
      'module' => 'GI_Products',
      'bean_name' => 'GI_Products',
      'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_GI_PRODUCTS_1_FROM_GI_PRODUCTS_TITLE',
    ),
    'gi_line_items_mass_creator_notes_1' => 
    array (
      'name' => 'gi_line_items_mass_creator_notes_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_notes_1',
      'source' => 'non-db',
      'module' => 'Notes',
      'bean_name' => 'Note',
      'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_NOTES_1_FROM_NOTES_TITLE',
    ),
    'gi_line_items_mass_creator_prospectlists_1' => 
    array (
      'name' => 'gi_line_items_mass_creator_prospectlists_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_prospectlists_1',
      'source' => 'non-db',
      'module' => 'ProspectLists',
      'bean_name' => 'ProspectList',
      'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_PROSPECTLISTS_1_FROM_PROSPECTLISTS_TITLE',
    ),
    'gi_line_items_mass_creator_users_1' => 
    array (
      'name' => 'gi_line_items_mass_creator_users_1',
      'type' => 'link',
      'relationship' => 'gi_line_items_mass_creator_users_1',
      'source' => 'non-db',
      'module' => 'Users',
      'bean_name' => 'User',
      'vname' => 'LBL_GI_LINE_ITEMS_MASS_CREATOR_USERS_1_FROM_USERS_TITLE',
    ),
    'auto_discount_c' => 
    array (
      'labelValue' => 'Auto Discount?',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'auto_discount_c',
      'vname' => 'LBL_AUTO_DISCOUNT',
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
      'id' => 'GI_Line_Items_Mass_Creatorauto_discount_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'campaign_c' => 
    array (
      'labelValue' => 'Campaign',
      'required' => true,
      'source' => 'non-db',
      'name' => 'campaign_c',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
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
      'id_name' => 'campaign_id_c',
      'ext2' => 'Campaigns',
      'module' => 'Campaigns',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'GI_Line_Items_Mass_Creatorcampaign_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'corporate_opportunity_c' => 
    array (
      'labelValue' => 'Corporate Opportunity',
      'required' => false,
      'source' => 'non-db',
      'name' => 'corporate_opportunity_c',
      'vname' => 'LBL_CORPORATE_OPPORTUNITY',
      'type' => 'relate',
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
      'id_name' => 'opportunity_id_c',
      'ext2' => 'Opportunities',
      'module' => 'Opportunities',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'id' => 'GI_Line_Items_Mass_Creatorcorporate_opportunity_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'create_line_item_if_exists_c' => 
    array (
      'labelValue' => 'Create line item even if it exists?',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'create_line_item_if_exists_c',
      'vname' => 'LBL_CREATE_LINE_ITEM_IF_EXISTS',
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
      'id' => 'GI_Line_Items_Mass_Creatorcreate_line_item_if_exists_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'discount_ratio_c' => 
    array (
      'labelValue' => 'Discount Ratio',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'discount_ratio_c',
      'vname' => 'LBL_DISCOUNT_RATIO',
      'type' => 'decimal',
      'massupdate' => '0',
      'default' => '0.00',
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
      'len' => '18',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => '2',
      'id' => 'GI_Line_Items_Mass_Creatordiscount_ratio_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'discount_type_c' => 
    array (
      'labelValue' => 'Discount Type',
      'required' => true,
      'source' => 'custom_fields',
      'name' => 'discount_type_c',
      'vname' => 'LBL_DISCOUNT_TYPE',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => 'Amount',
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
      'options' => 'discount_type_list',
      'studio' => 'visible',
      'dependency' => false,
      'id' => 'GI_Line_Items_Mass_Creatordiscount_type_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'unit_price_zero_c' => 
    array (
      'labelValue' => 'Unit Price Zero?',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'unit_price_zero_c',
      'vname' => 'LBL_UNIT_PRICE_ZERO',
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
      'id' => 'GI_Line_Items_Mass_Creatorunit_price_zero_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'campaign_id_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'campaign_id_c',
      'vname' => 'LBL_CAMPAIGN_CAMPAIGN_ID',
      'type' => 'id',
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
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'GI_Line_Items_Mass_Creatorcampaign_id_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
    'opportunity_id_c' => 
    array (
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'opportunity_id_c',
      'vname' => 'LBL_CORPORATE_OPPORTUNITY_OPPORTUNITY_ID',
      'type' => 'id',
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
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => '36',
      'size' => '20',
      'id' => 'GI_Line_Items_Mass_Creatoropportunity_id_c',
      'custom_module' => 'GI_Line_Items_Mass_Creator',
    ),
  ),
  'relationships' => 
  array (
    'gi_line_items_mass_creator_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Line_Items_Mass_Creator',
      'rhs_table' => 'gi_line_items_mass_creator',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'gi_line_items_mass_creator_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Line_Items_Mass_Creator',
      'rhs_table' => 'gi_line_items_mass_creator',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'gi_line_items_mass_creator_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'GI_Line_Items_Mass_Creator',
      'rhs_table' => 'gi_line_items_mass_creator',
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
      'name' => 'gi_line_items_mass_creatorpk',
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