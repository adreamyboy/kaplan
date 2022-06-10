<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$relationships = array (
  'gi_discounts_modified_user' => 
  array (
    'id' => '8a532a7e-8d9d-d05a-12a1-5461e2e56355',
    'relationship_name' => 'gi_discounts_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Discounts',
    'rhs_table' => 'gi_discounts',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_discounts_created_by' => 
  array (
    'id' => '8a83e895-221b-2afd-01bd-5461e2c1a845',
    'relationship_name' => 'gi_discounts_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Discounts',
    'rhs_table' => 'gi_discounts',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_discounts_assigned_user' => 
  array (
    'id' => '8ab369e9-5292-a9cb-f6b8-5461e20f56c1',
    'relationship_name' => 'gi_discounts_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Discounts',
    'rhs_table' => 'gi_discounts',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_discounts_gi_products_1' => 
  array (
    'id' => 'e0b0f448-52fd-548f-066d-5461e251a834',
    'relationship_name' => 'gi_discounts_gi_products_1',
    'lhs_module' => 'GI_Discounts',
    'lhs_table' => 'gi_discounts',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products',
    'rhs_table' => 'gi_products',
    'rhs_key' => 'id',
    'join_table' => 'gi_discounts_gi_products_1_c',
    'join_key_lhs' => 'gi_discounts_gi_products_1gi_discounts_ida',
    'join_key_rhs' => 'gi_discounts_gi_products_1gi_products_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'gi_discounts_gi_products_catalog_1' => 
  array (
    'id' => 'e456b1b8-9731-ebff-e363-5461e239a0bc',
    'relationship_name' => 'gi_discounts_gi_products_catalog_1',
    'lhs_module' => 'GI_Discounts',
    'lhs_table' => 'gi_discounts',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Catalog',
    'rhs_table' => 'gi_products_catalog',
    'rhs_key' => 'id',
    'join_table' => 'gi_discounts_gi_products_catalog_1_c',
    'join_key_lhs' => 'gi_discounts_gi_products_catalog_1gi_discounts_ida',
    'join_key_rhs' => 'gi_discounts_gi_products_catalog_1gi_products_catalog_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'gi_discounts_prospectlists_1' => 
  array (
    'id' => 'e4b68ca8-5e19-76a6-d889-5461e292b58a',
    'relationship_name' => 'gi_discounts_prospectlists_1',
    'lhs_module' => 'GI_Discounts',
    'lhs_table' => 'gi_discounts',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'id',
    'join_table' => 'gi_discounts_prospectlists_1_c',
    'join_key_lhs' => 'gi_discounts_prospectlists_1gi_discounts_ida',
    'join_key_rhs' => 'gi_discounts_prospectlists_1prospectlists_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'gi_discounts_gi_line_items_1' => 
  array (
    'rhs_label' => 'Interests / Line Items',
    'lhs_label' => 'Discounts',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GI_Discounts',
    'rhs_module' => 'GI_Line_Items',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gi_discounts_gi_line_items_1',
  ),
);