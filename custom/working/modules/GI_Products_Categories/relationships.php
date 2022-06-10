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
  'gi_products_categories_modified_user' => 
  array (
    'id' => '5bd60562-9f22-280c-9abb-573d0251b980',
    'relationship_name' => 'gi_products_categories_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Categories',
    'rhs_table' => 'gi_products_categories',
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
  'gi_products_categories_created_by' => 
  array (
    'id' => '5c02fdc7-2e56-77d6-f465-573d02f33bf9',
    'relationship_name' => 'gi_products_categories_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Categories',
    'rhs_table' => 'gi_products_categories',
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
  'gi_products_categories_assigned_user' => 
  array (
    'id' => '5c29b0a2-f6e2-a52f-4e97-573d025bc999',
    'relationship_name' => 'gi_products_categories_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Categories',
    'rhs_table' => 'gi_products_categories',
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
  'gi_products_categories_campaigns_1' => 
  array (
    'id' => 'a2bf345a-0776-d3d7-7cbd-573d02aba575',
    'relationship_name' => 'gi_products_categories_campaigns_1',
    'lhs_module' => 'GI_Products_Categories',
    'lhs_table' => 'gi_products_categories',
    'lhs_key' => 'id',
    'rhs_module' => 'Campaigns',
    'rhs_table' => 'campaigns',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_categories_campaigns_1_c',
    'join_key_lhs' => 'gi_products_categories_campaigns_1gi_products_categories_ida',
    'join_key_rhs' => 'gi_products_categories_campaigns_1campaigns_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'gi_products_catalog_gi_products_categories_1' => 
  array (
    'id' => 'acdb7000-88e4-e05a-2b9a-573d02e9ac55',
    'relationship_name' => 'gi_products_catalog_gi_products_categories_1',
    'lhs_module' => 'GI_Products_Catalog',
    'lhs_table' => 'gi_products_catalog',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Categories',
    'rhs_table' => 'gi_products_categories',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_catalog_gi_products_categories_1_c',
    'join_key_lhs' => 'gi_productbf6ccatalog_ida',
    'join_key_rhs' => 'gi_product4c35egories_idb',
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
  'gi_products_categories_gi_products_catalog_1' => 
  array (
    'rhs_label' => 'Products Catalog',
    'lhs_label' => 'Products Categories',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GI_Products_Categories',
    'rhs_module' => 'GI_Products_Catalog',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gi_products_categories_gi_products_catalog_1',
  ),
);