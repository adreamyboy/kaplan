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
require_once('modules/GI_Products/GI_Products_sugar.php');
class GI_Products extends GI_Products_sugar {
	
	function GI_Products(){	
		parent::GI_Products_sugar();
	}
	
    // Returns the list of child lineitems that are related to the current Product.
	function get_line_items($status = null) {
		$link = 'gi_products_gi_line_items_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			if ($status != null) {
				$collection_filtered = array();
				foreach ($collection as $item) {
					if ($item->status_c == $status) {
						$collection_filtered[] = $item;
					}
				}
				return $collection_filtered;
			} else {
				return $collection;
			}
		}
	}
	
    // Returns the products catalogs (in the form of an array) to which the product belongs to.
    // NOTE: The returned value (logically) must always have one element (product catalog) only, as the product belongs always to one catalog.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_catalog() {
		$link = 'gi_products_catalog_gi_products_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    // Returns the list of child meetings/session that are related to the current Product (not sorted by any specific field).
	function get_sessions() {
		$link = 'gi_products_meetings_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    // Returns the list of child meetings/session that are related to the current Product (sorted by the session's start date/time).
    // NOTE: This function is NOT used yet because "get_linked_beans" was just implemented in (SuiteCRM 7.4+ onwords).
	function get_sessions_list() {
		$link = 'gi_products_meetings_1';
		$collection = $this->get_linked_beans($link, 'Meeting', array('date_startss'));
		return $collection;
	}
	
    // Returns the list of discounts that are related to the current Product (directly, and not through its parent Product Catalog).
	function get_discounts() {
		$link = 'gi_discounts_gi_products_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
	/*
	function change_status($status) {
		global $app_list_strings;
		
		if (in_array($status, $app_list_strings['product_status_list'])) {
			$this->status_c = $status;
			$this->save();
			$collection = $this->get_line_items();
			
			foreach ($collection as $item) {
				switch ($status) {
					case 'Complete':
						if ($item->status_c == 'Active') {
							$item->status_c = 'Complete';
						}
						break;
					case 'Cancelled':
						if ($item->status_c == 'Active' || $item->status_c == 'Complete' || $item->status_c == 'Suspended') {
							$item->status_c = 'Cancelled';
						}
						break;
					case 'Active':
						if ($item->status_c == 'Complete') {
							$item->status_c = 'Active';
						}
						break;
				}
				$item->save();
			}
		}
	}
	*/
}
?>