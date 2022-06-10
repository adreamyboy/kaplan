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
require_once('modules/GI_Discounts/GI_Discounts_sugar.php');
class GI_Discounts extends GI_Discounts_sugar {
	
	function GI_Discounts(){	
		parent::GI_Discounts_sugar();
	}
	
	// Use: returns all the target lists related to the current discount (to which this discount will be available).
	function get_target_lists() {
		$link = 'gi_discounts_prospectlists_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
	// Use: returns all the products related to the current discount (on which this discount will be applicable).
    function get_products() {
		$link = 'gi_discounts_gi_products_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
	// Use: returns all the products catlaogs related to the curent discount (on which this discount will be applicable).
    function get_catalogs() {
		$link = 'gi_discounts_gi_products_catalog_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
	// Use: confirms whether the current discounts is applicable on a certain account OR contact, on a certain product.
    function isDiscountApplicable($account_id, $contact_id, $product) {
		
		// Reject, if discount is "Discontinued"
		if ($this->discontinued_c == 1) {
			return false;
		}
		
		// Get today's date
		$today = date('Y-m-d');
		
		// Reject, if discount is not valid yet (by date)
		if ($this->valid_from_date_c != '' && $today < $this->valid_from_date_c) {
			return false;
		}
		
		// Reject, if discount is expired (by date)
		if ($this->expires_on_date_c != '' && $today > $this->expires_on_date_c) {
			return false;
		}
		
		// Reject, if discount is not valid yet (by number of days)
		$valid_from_days = $this->valid_from_days_c;
		if ($valid_from_days != '') {
			$validity_date = date("Y-m-d", strtotime($product->date_start_c . " -{$valid_from_days} day"));
			if ($today < $validity_date) {
				return false;
			}
		}
		
		// Reject, if discount is expired (by number of days)
		$expires_on_days = $this->expires_on_days_c;
		if ($expires_on_days != '') {
			$expiry_date = date("Y-m-d", strtotime($product->date_start_c . " -{$expires_on_days} day"));
			if ($today > $expiry_date) {
				return false;
			}
		}
		
		// Reject, if Contact and/or Account is not assigned to the related target lists (if any)
		$target_lists = $this->get_target_lists();
		if (count($target_lists) > 0) {
			
			$db = $GLOBALS['db'];
			
			// $found: is used to confirm if a Contact or Account is found in any of the target lists.  By default, it is set to "false" (i.e. not found).
            $found = false;

			// Iterate over each target list, one-by-one.
            foreach($target_lists as $target_list) {
				
				// Use SQL to check if the passed Contact exists in the target list being iterated.  If found, set "$found" as "true".
                $sql = "SELECT COUNT(id) AS num
							FROM prospect_lists_prospects 
							WHERE prospect_list_id = '{$target_list->id}' 
							AND related_id = '{$contact_id}'
							AND related_type = 'Contacts'
							AND deleted = 0";
				$result = $db->query($sql, true, "Grabbing the number of matching contacts in a prospect_list");
				$row = $db->fetchByAssoc($result);
				if ($row['num'] != 0) {
					$found = true;
					break;
				}
				
				// Use SQL to check if the passed Account exists in the target list being iterated.  If found, set "$found" as "true".
				$sql = "SELECT COUNT(id) AS num
							FROM prospect_lists_prospects 
							WHERE prospect_list_id = '{$target_list->id}' 
							AND related_id = '{$account_id}'
							AND related_type = 'Accounts'
							AND deleted = 0";
				$result = $db->query($sql, true, "Grabbing the number of matching accounts in a prospect_list");
				$row = $db->fetchByAssoc($result);
				if ($row['num'] != 0) {
					$found = true;
					break;
				}
			}
			
			if (!$found) {
				return false;
			}
		}
		
		return true;
	}
	
}
?>