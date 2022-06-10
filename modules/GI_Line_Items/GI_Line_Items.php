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
require_once('modules/GI_Line_Items/GI_Line_Items_sugar.php');
class GI_Line_Items extends GI_Line_Items_sugar {
	
	function GI_Line_Items(){	
		parent::GI_Line_Items_sugar();
	}
	
	/*
    Use:
    In the ListView of line items:
    - Show the lineitem's "Status" color-coded, and 
    - Show the Opportunity's "Status"  show to next to the Opportunity's name.
    */
	function get_list_view_data() {
		$line_items_fields = $this->get_list_view_array();
		
		// Show the lineitem's "Status" color-coded.
        switch ($this->status_c) {
			case 'Complete':
				$line_items_fields['STATUS_C'] = "<font style='color:green'>" . $line_items_fields['STATUS_C'] . "</font>";
				break;
			case 'Active':
				$line_items_fields['STATUS_C'] = "<font style='color:blue'>" . $line_items_fields['STATUS_C'] . "</font>";
				break;
			case 'Suspended':
				$line_items_fields['STATUS_C'] = "<font style='color:orange'>" . $line_items_fields['STATUS_C'] . "</font>";
				break;
			case 'Cancelled':
				$line_items_fields['STATUS_C'] = "<font style='color:red'>" . $line_items_fields['STATUS_C'] . "</font>";
				break;
			case 'Stopped':
				$line_items_fields['STATUS_C'] = "<font style='color:red'>" . $line_items_fields['STATUS_C'] . "</font>";
				break;
		}
		
		// Show the Opportunity's "Status"  show to next to the Opportunity's name.
        $opportunity_id = $line_items_fields['OPPORTUNITIES_GI_LINE_ITEMS_1OPPORTUNITIES_IDA'];
		if (isset($opportunity_id)) {
			$opportunity = new Opportunity();
			$opportunity->retrieve($opportunity_id);
			$line_items_fields['OPPORTUNITIES_GI_LINE_ITEMS_1_NAME'] = $line_items_fields['OPPORTUNITIES_GI_LINE_ITEMS_1_NAME'] . ' (' . $opportunity->status_c . ')';
		}
		
		return $line_items_fields;
	}
    
	
	// Returns the opportunities (in the form of an array) to which the line item belongs to.
    // NOTE: The returned value (logically) must always have one element (opportunity) only, as the line items belongs always to one opportunity.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
    function get_opportunities() {
		$link = 'opportunities_gi_line_items_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    
	// Returns the products (in the form of an array) to which the line item belongs to.
    // NOTE: The returned value (logically) must always have one element (product) only, as the line items belongs always to one product.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_products() {
		$link = 'gi_products_gi_line_items_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    
	// Returns the contacts/beneficiaries (in the form of an array) to which the line item belongs to.
    // NOTE: The returned value (logically) must always have one element (contact) only, as the line items can have a maximum of 1 beneficiry.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_contacts() {
		$link = 'contacts_gi_line_items_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
    
	// Returns the discount (in the form of an array) to which the line item belongs to.
    // NOTE: The returned value (logically) must always have one element (product) only, as the line items can have a maximum of 1 discount applied.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_discounts() {
		$link = 'gi_discounts_gi_line_items_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
}
?>