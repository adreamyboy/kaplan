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
  'gi_surveys_modified_user' => 
  array (
    'id' => '9410f99b-28d5-17ad-05dd-56290ce276af',
    'relationship_name' => 'gi_surveys_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Surveys',
    'rhs_table' => 'gi_surveys',
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
  'gi_surveys_created_by' => 
  array (
    'id' => '94400146-1345-647c-58c3-56290cae57ab',
    'relationship_name' => 'gi_surveys_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Surveys',
    'rhs_table' => 'gi_surveys',
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
  'gi_surveys_assigned_user' => 
  array (
    'id' => '946b4818-b5c1-6420-d927-56290ce88deb',
    'relationship_name' => 'gi_surveys_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Surveys',
    'rhs_table' => 'gi_surveys',
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
  'gi_surveys_gi_questions_1' => 
  array (
    'id' => 'c393a4d0-c021-f986-c16b-56290c419490',
    'relationship_name' => 'gi_surveys_gi_questions_1',
    'lhs_module' => 'GI_Surveys',
    'lhs_table' => 'gi_surveys',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Questions',
    'rhs_table' => 'gi_questions',
    'rhs_key' => 'id',
    'join_table' => 'gi_surveys_gi_questions_1_c',
    'join_key_lhs' => 'gi_surveys_gi_questions_1gi_surveys_ida',
    'join_key_rhs' => 'gi_surveys_gi_questions_1gi_questions_idb',
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
  'gi_surveys_gi_attempts_1' => 
  array (
    'id' => 'cec25249-be67-a0e3-fc07-56290c6dd234',
    'relationship_name' => 'gi_surveys_gi_attempts_1',
    'lhs_module' => 'GI_Surveys',
    'lhs_table' => 'gi_surveys',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Attempts',
    'rhs_table' => 'gi_attempts',
    'rhs_key' => 'id',
    'join_table' => 'gi_surveys_gi_attempts_1_c',
    'join_key_lhs' => 'gi_surveys_gi_attempts_1gi_surveys_ida',
    'join_key_rhs' => 'gi_surveys_gi_attempts_1gi_attempts_idb',
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
  'gi_surveys_meetings_1' => 
  array (
    'rhs_label' => 'Meetings',
    'lhs_label' => 'Surveys',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GI_Surveys',
    'rhs_module' => 'Meetings',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gi_surveys_meetings_1',
  ),
);