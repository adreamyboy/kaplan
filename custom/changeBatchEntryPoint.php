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
- Move a beneficiary from one product to another, by linking the line item to another product.

Input Params:
- cr_id: ID of the "Batch Select" record. 
- to_id: ID of the "Product" record to which a beneficiary wants to move.  It should already be related to the "cr_id".
- to_id: ID of the "Product" record from which a beneficiary wants to move.  It should already be related to the "cr_id".
- id: ID of the "Line Item" record which must be updated.

Output Params:
- Redirection to a page which shows a success/failure message.
*/

require_once('custom/modules/gi_functions_custom.php');

// Make sure that all input params are received.
if (isset($_REQUEST['cr_id']) && isset($_REQUEST['from_id']) && isset($_REQUEST['to_id']) && isset($_REQUEST['id'])) {
	
	// Retreive the beans of all 4 records.
    $change_request = new GI_Line_Items_Change_Requests();
	$change_request->retrieve($_REQUEST['cr_id']);
	
	$line_item = new GI_Line_Items();
	$line_item->retrieve($_REQUEST['id']);
	
	$from_product = new GI_Products();
	$from_product->retrieve($_REQUEST['from_id']);
	
	$to_product = new GI_Products();
	$to_product->retrieve($_REQUEST['to_id']);
	
	// Check if:
    // "Batch Selection" record is still active &
    // "From Product" is related to the "Batch Selection" &
    // "To Product" is related to the "Batch Selection" & is "Active" &
    // "Line Item" is actually related to the "From Product" & is "Active" or "Suspended"
    if ($change_request->discontinued == 0 && 
		$from_product->gi_line_itcd35equests_ida == $change_request->id &&
		$to_product->gi_line_it60abequests_ida == $change_request->id && 
		$to_product->status_c == 'Active' &&
		$line_item->gi_products_gi_line_items_1gi_products_ida == $from_product->id &&
		in_array($line_item->status_c, array('Active', 'Suspended'))
		)
	{
		
		// Calculate the total number of Active+Suspended line items in the "To Product".
        $count_all = count($to_product->get_line_items('Active')) + count($to_product->get_line_items('Suspended'));
		
		// If a batch is already full, log a failure Note.
        if ($change_request->limit_to_capacity_c == 1 && $to_product->capacity_c <= $count_all) {
			
			$note = new Note();
			$note->name = "Changing batch is rejected (self-service)";
			$note->parent_type = 'Opportunities';
			$note->parent_id = $line_item->opportunities_gi_line_items_1opportunities_ida;
			$note->parent_name = $line_item->opportunities_gi_line_items_1_name;
			$note->description = "For line item ({$line_item->name}), the selected batch ({$to_product->name}) has reached its maximum limit of ({$to_product->capacity_c}).";
			$note->contact_id = $line_item->contacts_gi_line_items_1contacts_ida;
			$note->save();
			
			$msg = "Sorry!  Unfortunately the newly selected batch ({$to_product->name}) is full now, and you cannot join it.";
			
		} else {
            
            // If a batch is not full yet, link the line item to the "To Product" & log a success Note.
			$line_item->gi_products_gi_line_items_1gi_products_ida = $to_product->id;
			$line_item->save();
			
			$note = new Note();
			$note->name = "Changing batch is approved (self-service)";
			$note->parent_type = 'Opportunities';
			$note->parent_id = $line_item->opportunities_gi_line_items_1opportunities_ida;
			$note->parent_name = $line_item->opportunities_gi_line_items_1_name;
			$note->description = "For line item ({$line_item->name}), contact has changed batch from ({$from_product->name}) to ({$to_product->name}).";
			$note->contact_id = $line_item->contacts_gi_line_items_1contacts_ida;
			$note->save();
		
			$msg = "Your request is processed successfully.";
		}
		
	} else {
		
		$msg = "This link seems to be invalid.";
		
	}
	
} else {
	$msg = "This action seems to be invalid.";
}

global $sugar_config;
$joomla_url = $sugar_config['joomla_url'];
header("location:{$joomla_url}/index.php?option=com_genesisreview&view=current&msg={$msg}");

?>