<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

/*
Use:
- Fix the status of Contact's "Suspended" line items in those opportunities whose payments are already secured, by changing the line item's status from "Suspended" to "Active".

Input Params:
- contact: ID of the Contact which we need to activate/fix its "Suspended" line items status.

Output Params:
- Redirection to a page which shows a success/failure message.
*/

// Make sure that all input params are received.
if (isset($_REQUEST['contact'])) {
	
	// Retreive the beans of contact & its line items.
	$contact_id = $_REQUEST['contact'];
	$contact = new Contact();
	$contact->retrieve($contact_id);
	$line_items = $contact->get_line_items();
	
	// Iterate over every "Suspended" line items.
    foreach ($line_items as $line_item) {
		
		if (in_array($line_item->status_c, array('Suspended'))) {
			
			// Check if the line item's parent opportunity is secured by payments.
            $opportunities = $line_item->get_opportunities();
			
			if (count($opportunities) > 0) {
				$opportunity = current($opportunities);
				
				$payments = $opportunity->get_payments();
				
				$amount = 0;
				foreach ($payments as $payment) {
					if ($payment->date_cleared != '' || $payment->date_paid >= date('m/d/Y')) {
						$amount += $payment->amount;
					}
				}
			}
            
            // If secured, change the line item's status to "Active".
			if ($opportunity->sales_stage == 'Closed Won' && ($opportunity->amount - $amount <= 0)) {
				$line_item->status_c = 'Active';
				$line_item->save();
			}
		}
	}
	$msg = "We have attempted to automatically fix your e-Learning access (if any). Please check your e-Learning Portal again. If you're still facing difficulty in accessing your e-Learning course(s), please contact us.";
}

global $sugar_config;
$joomla_url = $sugar_config['joomla_url'];
header("location:{$joomla_url}/index.php?option=com_genesisreview&view=current&msg={$msg}");

?>