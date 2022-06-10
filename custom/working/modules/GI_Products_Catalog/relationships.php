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
  'gi_products_catalog_modified_user' => 
  array (
    'id' => '846261f7-a355-d46d-f58f-54e2c8f1a5b3',
    'relationship_name' => 'gi_products_catalog_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Catalog',
    'rhs_table' => 'gi_products_catalog',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_products_catalog_created_by' => 
  array (
    'id' => '848f45b4-26a5-76e4-87ac-54e2c87fd1b0',
    'relationship_name' => 'gi_products_catalog_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Catalog',
    'rhs_table' => 'gi_products_catalog',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_products_catalog_assigned_user' => 
  array (
    'id' => '84bc96a2-2c2a-1c38-56a0-54e2c8150b67',
    'relationship_name' => 'gi_products_catalog_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Catalog',
    'rhs_table' => 'gi_products_catalog',
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
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'gi_products_catalog_documents_1' => 
  array (
    'id' => 'b24e4f27-2ec1-742b-d752-54e2c8fbb5d9',
    'relationship_name' => 'gi_products_catalog_documents_1',
    'lhs_module' => 'GI_Products_Catalog',
    'lhs_table' => 'gi_products_catalog',
    'lhs_key' => 'id',
    'rhs_module' => 'Documents',
    'rhs_table' => 'documents',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_catalog_documents_1_c',
    'join_key_lhs' => 'gi_products_catalog_documents_1gi_products_catalog_ida',
    'join_key_rhs' => 'gi_products_catalog_documents_1documents_idb',
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
  'gi_products_catalog_users_1' => 
  array (
    'id' => 'b2856549-d7ca-1d99-e653-54e2c8ef3d2e',
    'relationship_name' => 'gi_products_catalog_users_1',
    'lhs_module' => 'GI_Products_Catalog',
    'lhs_table' => 'gi_products_catalog',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_catalog_users_1_c',
    'join_key_lhs' => 'gi_products_catalog_users_1gi_products_catalog_ida',
    'join_key_rhs' => 'gi_products_catalog_users_1users_idb',
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
  'gi_products_catalog_gi_products_catalog_1' => 
  array (
    'id' => 'b4046a53-24da-ad85-3b97-54e2c8b54d43',
    'relationship_name' => 'gi_products_catalog_gi_products_catalog_1',
    'lhs_module' => 'GI_Products_Catalog',
    'lhs_table' => 'gi_products_catalog',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products_Catalog',
    'rhs_table' => 'gi_products_catalog',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_catalog_gi_products_catalog_1_c',
    'join_key_lhs' => 'gi_products_catalog_gi_products_catalog_1gi_products_catalog_ida',
    'join_key_rhs' => 'gi_products_catalog_gi_products_catalog_1gi_products_catalog_idb',
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
    'id' => 'b83d6e3e-bfd4-62ce-dc84-54e2c878d24a',
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
  'gi_products_catalog_gi_products_categories_1' => 
  array (
    'id' => 'b9717626-248e-bd5b-8a00-54e2c8621c04',
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
  'gi_products_catalog_gi_products_1' => 
  array (
    'id' => 'ba2666ca-8bc6-cca4-79a9-54e2c81e6ba8',
    'relationship_name' => 'gi_products_catalog_gi_products_1',
    'lhs_module' => 'GI_Products_Catalog',
    'lhs_table' => 'gi_products_catalog',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products',
    'rhs_table' => 'gi_products',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_catalog_gi_products_1_c',
    'join_key_lhs' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
    'join_key_rhs' => 'gi_products_catalog_gi_products_1gi_products_idb',
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
  'gi_products_catalog_gi_testimonials_1' => 
  array (
    'rhs_label' => 'Testimonials',
    'lhs_label' => 'Products Catalog',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GI_Products_Catalog',
    'rhs_module' => 'GI_Testimonials',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gi_products_catalog_gi_testimonials_1',
  ),
);