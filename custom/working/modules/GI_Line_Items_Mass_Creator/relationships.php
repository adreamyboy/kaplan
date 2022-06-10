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
  'gi_line_items_mass_creator_gi_products_1' => 
  array (
    'id' => '541276e9-3356-c90d-a9f5-56436822ed1f',
    'relationship_name' => 'gi_line_items_mass_creator_gi_products_1',
    'lhs_module' => 'GI_Line_Items_Mass_Creator',
    'lhs_table' => 'gi_line_items_mass_creator',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Products',
    'rhs_table' => 'gi_products',
    'rhs_key' => 'id',
    'join_table' => 'gi_line_items_mass_creator_gi_products_1_c',
    'join_key_lhs' => 'gi_line_itbb2fcreator_ida',
    'join_key_rhs' => 'gi_line_items_mass_creator_gi_products_1gi_products_idb',
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
  'gi_line_items_mass_creator_prospectlists_1' => 
  array (
    'id' => '54c4dbd4-529a-08ba-eb8a-5643688e0b8d',
    'relationship_name' => 'gi_line_items_mass_creator_prospectlists_1',
    'lhs_module' => 'GI_Line_Items_Mass_Creator',
    'lhs_table' => 'gi_line_items_mass_creator',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'id',
    'join_table' => 'gi_line_items_mass_creator_prospectlists_1_c',
    'join_key_lhs' => 'gi_line_it1a94creator_ida',
    'join_key_rhs' => 'gi_line_items_mass_creator_prospectlists_1prospectlists_idb',
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
  'gi_line_items_mass_creator_users_1' => 
  array (
    'id' => '5c2edd3a-2da6-b4d7-e217-5643684c91a3',
    'relationship_name' => 'gi_line_items_mass_creator_users_1',
    'lhs_module' => 'GI_Line_Items_Mass_Creator',
    'lhs_table' => 'gi_line_items_mass_creator',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'join_table' => 'gi_line_items_mass_creator_users_1_c',
    'join_key_lhs' => 'gi_line_items_mass_creator_users_1gi_line_items_mass_creator_ida',
    'join_key_rhs' => 'gi_line_items_mass_creator_users_1users_idb',
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
  'gi_line_items_mass_creator_modified_user' => 
  array (
    'id' => 'e60fb456-edfc-77aa-a0ba-5643688f5f9e',
    'relationship_name' => 'gi_line_items_mass_creator_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Line_Items_Mass_Creator',
    'rhs_table' => 'gi_line_items_mass_creator',
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
  'gi_line_items_mass_creator_created_by' => 
  array (
    'id' => 'e6416782-cec3-cda9-de0c-56436844bc43',
    'relationship_name' => 'gi_line_items_mass_creator_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Line_Items_Mass_Creator',
    'rhs_table' => 'gi_line_items_mass_creator',
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
  'gi_line_items_mass_creator_assigned_user' => 
  array (
    'id' => 'e672e81f-3ceb-3690-739b-564368f8182e',
    'relationship_name' => 'gi_line_items_mass_creator_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Line_Items_Mass_Creator',
    'rhs_table' => 'gi_line_items_mass_creator',
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
  'gi_line_items_mass_creator_notes_1' => 
  array (
    'rhs_label' => 'Notes',
    'lhs_label' => 'Line Items Mass Creator',
    'lhs_subpanel' => 'default',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GI_Line_Items_Mass_Creator',
    'rhs_module' => 'Notes',
    'relationship_type' => 'many-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gi_line_items_mass_creator_notes_1',
  ),
);