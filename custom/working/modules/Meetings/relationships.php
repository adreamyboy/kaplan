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
  'meetings_modified_user' => 
  array (
    'id' => '1d5f058a-8aeb-73ac-d4ca-54d6eacad13a',
    'relationship_name' => 'meetings_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
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
    'lhs_subpanel' => 'ForMeetings',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_created_by' => 
  array (
    'id' => '1d89757c-7495-e6e8-e537-54d6ea1d4ba6',
    'relationship_name' => 'meetings_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
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
    'lhs_subpanel' => 'ForMeetings',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_assigned_user' => 
  array (
    'id' => '1db30a5d-699b-16ad-681c-54d6ea3c1133',
    'relationship_name' => 'meetings_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
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
    'lhs_subpanel' => 'ForMeetings',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_notes' => 
  array (
    'id' => '1de33162-2a30-75fa-5996-54d6eaa13b83',
    'relationship_name' => 'meetings_notes',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Notes',
    'rhs_table' => 'notes',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Meetings',
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
  'account_meetings' => 
  array (
    'id' => '6c980552-998b-cf64-0c37-54d6eabac7a2',
    'relationship_name' => 'account_meetings',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Accounts',
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
  'meetings_contacts' => 
  array (
    'id' => 'a876ab32-3ebe-74e6-2144-54d6ea60136e',
    'relationship_name' => 'meetings_contacts',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Contacts',
    'rhs_table' => 'contacts',
    'rhs_key' => 'id',
    'join_table' => 'meetings_contacts',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'contact_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'ForMeetings',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_users' => 
  array (
    'id' => 'a8a6bc07-e08f-e636-e01f-54d6eacc7fb5',
    'relationship_name' => 'meetings_users',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Users',
    'rhs_table' => 'users',
    'rhs_key' => 'id',
    'join_table' => 'meetings_users',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'user_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'ForMeetings',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_leads' => 
  array (
    'id' => 'a8d6f73e-a992-2d3e-bbd0-54d6ea8c2d03',
    'relationship_name' => 'meetings_leads',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'join_table' => 'meetings_leads',
    'join_key_lhs' => 'meeting_id',
    'join_key_rhs' => 'lead_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'ForMeetings',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_prospectlists_1' => 
  array (
    'id' => 'ae6fdf3f-caf2-ac28-2c67-54d6ea3e2918',
    'relationship_name' => 'meetings_prospectlists_1',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'ProspectLists',
    'rhs_table' => 'prospect_lists',
    'rhs_key' => 'id',
    'join_table' => 'meetings_prospectlists_1_c',
    'join_key_lhs' => 'meetings_prospectlists_1meetings_ida',
    'join_key_rhs' => 'meetings_prospectlists_1prospectlists_idb',
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
  'securitygroups_meetings' => 
  array (
    'id' => 'b3165690-e1b1-eea6-93c7-54d6eacfc7b6',
    'relationship_name' => 'securitygroups_meetings',
    'lhs_module' => 'SecurityGroups',
    'lhs_table' => 'securitygroups',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'id',
    'join_table' => 'securitygroups_records',
    'join_key_lhs' => 'securitygroup_id',
    'join_key_rhs' => 'record_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => 'module',
    'relationship_role_column_value' => 'Meetings',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => 'default',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'meetings_gi_attempts_1' => 
  array (
    'id' => 'b5d87ced-5545-71f3-3243-54d6ea206532',
    'relationship_name' => 'meetings_gi_attempts_1',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Attempts',
    'rhs_table' => 'gi_attempts',
    'rhs_key' => 'id',
    'join_table' => 'meetings_gi_attempts_1_c',
    'join_key_lhs' => 'meetings_gi_attempts_1meetings_ida',
    'join_key_rhs' => 'meetings_gi_attempts_1gi_attempts_idb',
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
  'meetings_gi_attendance_1' => 
  array (
    'id' => 'b6a3d212-670e-0214-b110-54d6ea18255f',
    'relationship_name' => 'meetings_gi_attendance_1',
    'lhs_module' => 'Meetings',
    'lhs_table' => 'meetings',
    'lhs_key' => 'id',
    'rhs_module' => 'GI_Attendance',
    'rhs_table' => 'gi_attendance',
    'rhs_key' => 'id',
    'join_table' => 'meetings_gi_attendance_1_c',
    'join_key_lhs' => 'meetings_gi_attendance_1meetings_ida',
    'join_key_rhs' => 'meetings_gi_attendance_1gi_attendance_idb',
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
  'gi_products_meetings_1' => 
  array (
    'id' => 'b74d9f33-1973-5513-df8e-54d6ea6a458a',
    'relationship_name' => 'gi_products_meetings_1',
    'lhs_module' => 'GI_Products',
    'lhs_table' => 'gi_products',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'id',
    'join_table' => 'gi_products_meetings_1_c',
    'join_key_lhs' => 'gi_products_meetings_1gi_products_ida',
    'join_key_rhs' => 'gi_products_meetings_1meetings_idb',
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
  'lead_meetings' => 
  array (
    'id' => 'bdf57951-1328-54eb-58bc-54d6eab42a5b',
    'relationship_name' => 'lead_meetings',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Leads',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => 'ForMeetings',
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'case_meetings' => 
  array (
    'id' => 'c354192d-049b-3d53-b785-54d6ead200d4',
    'relationship_name' => 'case_meetings',
    'lhs_module' => 'Cases',
    'lhs_table' => 'cases',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Cases',
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
  'bug_meetings' => 
  array (
    'id' => 'c7a2ee84-1d18-4c70-7304-54d6ea3eb8f7',
    'relationship_name' => 'bug_meetings',
    'lhs_module' => 'Bugs',
    'lhs_table' => 'bugs',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Bugs',
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
  'projects_meetings' => 
  array (
    'id' => 'ce9bc190-8ed4-9fda-4195-54d6eabe48fb',
    'relationship_name' => 'projects_meetings',
    'lhs_module' => 'Project',
    'lhs_table' => 'project',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Project',
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
  'project_tasks_meetings' => 
  array (
    'id' => 'd2d843f1-4a42-e0d4-107f-54d6ea0e59fd',
    'relationship_name' => 'project_tasks_meetings',
    'lhs_module' => 'ProjectTask',
    'lhs_table' => 'project_task',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'ProjectTask',
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
  'opportunity_meetings' => 
  array (
    'id' => 'd97707a9-9f66-52a3-f14c-54d6eae5b6b3',
    'relationship_name' => 'opportunity_meetings',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Opportunities',
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
  'prospect_meetings' => 
  array (
    'id' => 'e15878f2-eda1-4144-0fa8-54d6eab104d3',
    'relationship_name' => 'prospect_meetings',
    'lhs_module' => 'Prospects',
    'lhs_table' => 'prospects',
    'lhs_key' => 'id',
    'rhs_module' => 'Meetings',
    'rhs_table' => 'meetings',
    'rhs_key' => 'parent_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => 'parent_type',
    'relationship_role_column_value' => 'Prospects',
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
  'meetings_gi_surveys_1' => 
  array (
    'lhs_module' => 'Meetings',
    'rhs_module' => 'GI_Surveys',
    'relationship_type' => 'one-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'meetings_gi_surveys_1',
  ),
);