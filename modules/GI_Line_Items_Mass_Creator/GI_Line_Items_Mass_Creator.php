<?PHP
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

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/GI_Line_Items_Mass_Creator/GI_Line_Items_Mass_Creator_sugar.php');
class GI_Line_Items_Mass_Creator extends GI_Line_Items_Mass_Creator_sugar {
	
	function GI_Line_Items_Mass_Creator(){	
		parent::GI_Line_Items_Mass_Creator_sugar();
	}
	
    // Returns the list of products that are related to the current "LineItem Mass Creator" record.
	function get_products() {
		$link = 'gi_line_items_mass_creator_gi_products_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    // Returns the list of users related to the current "LineItem Mass Creator" record.
	function get_assigned_users() {
		$link = 'gi_line_items_mass_creator_users_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    // Returns the list of all contacts that exist under the target lists related to the current "LineItem Mass Creator" record.
	function get_contacts() {
		
        // Declare an empty array to hold the list of all contacts found in the target lists in this record.
        $contacts = array();
        
        // Iterate over each target list, one-by-one.
		$link = 'gi_line_items_mass_creator_prospectlists_1';
		if ($this->load_relationship($link)) {
			$lists = $this->$link->getBeans();
			foreach ($lists as $list) {
                
                // Iterate over each and every contact in the target list being iterated, and add him/her to the "$contacts" array.
				$link = 'contacts';
				if ($list->load_relationship($link)) {
					$list_contacts = $list->$link->getBeans();
					foreach ($list_contacts as $key => $contact) {
                        // The "key" will hold the "id" of the contact, whereas the "value" will hold the "bean" of the contact.
						$contacts[$key] = $contact;
					}
				}
			}
		}
		return $contacts;
	}
	
}
?>