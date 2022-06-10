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
require_once('modules/GI_Payments/GI_Payments_sugar.php');
class GI_Payments extends GI_Payments_sugar {
	
	function GI_Payments(){	
		parent::GI_Payments_sugar();
	}
	
	/*
    Use:
    In the ListView of Payments:
    - Show the lineitem's "Type" color-coded, and 
    */
    function get_list_view_data() {
		$payments_fields = $this->get_list_view_array();
		switch ($this->type) {
			case 'Receipt':
				$payments_fields['TYPE'] = "<font style='color:green'>" . $payments_fields['TYPE'] . "</font>";
				break;
			case 'Installment':
				$payments_fields['TYPE'] = "<font style='color:blue'>" . $payments_fields['TYPE'] . "</font>";
				break;
			case 'Refund':
				$payments_fields['TYPE'] = "<font style='color:red'>" . $payments_fields['TYPE'] . "</font>";
				break;
			case 'Credit_Note_Allocation':
				$payments_fields['TYPE'] = "<font style='color:orange'>" . $payments_fields['TYPE'] . "</font>";
				break;
		}
		return $payments_fields;
	}
	
	
    // Returns the opportunities (in the form of an array) to which the payment belongs to.
    // NOTE: The returned value (logically) must always have one element (opportunity) only, as the payment belongs always to one opportunity.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_opportunities() {
		$link = 'opportunities_gi_payments_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
	
    // Returns the credit notes (in the form of an array) to which the payment belongs to.
    // NOTE: The returned value (logically) must always have one element (credit note) only, as the payment may belong to only one credit note.
    //       Thus, the calling function must use the function "current(xxx)" to get that single record.
	function get_credit_notes() {
		$link = 'gi_credit_notes_gi_payments_1';
		if ($this->load_relationship($link)) {
			$collection = $this->$link->getBeans();
			return $collection;
		}
	}
	
}
?>