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
It servers 2 purposes:
- Update the "Exam Result" of a one line item, which is called from the CRM (using the "Set as Passed/Failed/Did Not Attend" actions).
- Update the "Exam Result" for a certin Contact with line items which are related to products added under a specific "Exam Results" record.

Input Params:
*** Option (1): used by CRM ***
- line_item_id: ID of the line item to be be updated.
*** Option (2): used by Joomla ***
- contact_id: ID of the contact which we need to update his/her Exam Result.
- email: Email Address of the contact which we need to update his/her Exam Result.
- exam_id: ID of the "Exam Results" record which we need to look into to get the products, and accordingly get the contact's line-items which are related to these products.

Output Params:
- Redirection to a suitable page (passed / failed / didn't attend), to show a suitable Call-to-Action.
*/

// http://www.kaplangenesis.com/crm/index.php?entryPoint=updateExamResultEntryPoint&result=Failed&contact_id=3e539a7d-81ce-ab91-f246-54d32ca3adf1&exam_id=a48c9291-c4a2-eae6-94ab-559d0d7d52b1
// http://www.kaplangenesis.com/crm/index.php?entryPoint=updateExamResultEntryPoint&result=Failed&line_item_id=1605db6b-9256-5cb4-a0a0-5588cd5d2e84&return_module=GI_Line_Items&return_action=DetailView&return_id=1605db6b-9256-5cb4-a0a0-5588cd5d2e84
// http://www.kaplangenesis.com/crm/index.php?entryPoint=updateExamResultEntryPoint&result=Failed&email=tjaafar@gmail.com&exam_id=a48c9291-c4a2-eae6-94ab-559d0d7d52b1

require_once('custom/modules/gi_functions_custom.php');

/*
// THIS FUNCTIONALITY IS DISABLED -- Update the "contact_id" based on the email address received.
if (isset($_REQUEST['first_name']) && isset($_REQUEST['last_name']) && isset($_REQUEST['contact_id'])) {
	$db = $GLOBALS['db'];
	$sql = "SELECT eab.bean_id 
			FROM email_addresses ea, email_addr_bean_rel eab 
			WHERE ea.email_address LIKE '{$_REQUEST['email']}' 
			AND eab.email_address_id=ea.id 
			AND eab.bean_module = 'Contacts' 
			AND ea.opt_out = 0 
			AND ea.deleted = 0 
			AND eab.deleted = 0";
	$result = $db->query($sql);
	if ($row = $db->fetchByAssoc($result)) {
		$_REQUEST['contact_id'] = $contact->id;
	}
}
*/

// Check if a "line item" ID is received... This is mainly used by the "Set as Passed/Failed/Did Not Attend" actions in CRM (in lineitem's DetailView).
if (isset($_REQUEST['line_item_id'])) {
	
	// Retreive the bean of the line item.
    $line_item = new GI_Line_Items();
	$line_item->retrieve($_REQUEST['line_item_id']);
	
	// If line item is related to a Beneficiary...
    if (isset($line_item->contacts_gi_line_items_1contacts_ida)) {
		
		// Update the "contact_id" and "email" params with the Beneficiary data.
        $contact_id = $line_item->contacts_gi_line_items_1contacts_ida;
		$contact = new Contact();
		$contact->retrieve($contact_id);
		$_REQUEST['contact_id'] = $line_item->contacts_gi_line_items_1contacts_ida;
		$_REQUEST['email'] = $contact->email1;
		
		// Check if line item is related to a product that has a parent "Exam Results" record.  If yes, update the "exam_id" param.
        $product_id = $line_item->gi_products_gi_line_items_1gi_products_ida;
		$product = new GI_Products();
		$product->retrieve($product_id);
        
		if (isset($product->gi_exam_results_gi_products_1gi_exam_results_ida)) {
			$_REQUEST['exam_id'] = $product->gi_exam_results_gi_products_1gi_exam_results_ida;
		}
	
	// If line item is NOT related to a Beneficiary...
	} else {
		
		// Update the "Exam Result" field for that line item.
        if (in_array($_REQUEST['result'], array('Passed', 'Failed', 'Did_Not_Appear', 'Did_Not_Disclose'))) {
			$line_item->exam_result_c = $_REQUEST['result'];
			$line_item->save();
			$result_updated = true;
		}
	}
}


// If "contact_id" param is set (either via Joomla or CRM), retreive the bean of the Contact.
$contact = new Contact();
$contact->retrieve($_REQUEST['contact_id']);

// Check if:
// - "Contact" is valid, and 
// - Received email address matches the contact's email address, and 
// - "exam_id" is received, and 
// - Received result is one of the acceptables values...
if (isset($_REQUEST['contact_id']) && isset($_REQUEST['email']) && ($contact->email1 == $_REQUEST['email']) && isset($_REQUEST['exam_id']) && 
	in_array($_REQUEST['result'], array('Passed', 'Failed', 'Did_Not_Appear', 'Did_Not_Disclose')))
{
        
	$line_items = $contact->get_line_items();

	$exam = new GI_Exam_Results();
	$exam->retrieve($_REQUEST['exam_id']);
	$products = $exam->get_products();

    // By default, do not log a "Note" in CRM, unless (at least) one line item's Result is updated.
    $result_updated = false;

	// Iterate over the contact's line items (which are related products under the "Exam Result" record), and update Result accordingly.
    foreach ($line_items as $line_item) {
		if (array_key_exists($line_item->gi_products_gi_line_items_1gi_products_ida, $products)) {
			$line_item->exam_result_c = $_REQUEST['result'];
			$line_item->save();
			$result_updated = true;
		}
	}

	// Set the right "Message" (to be displayed on redirection) & right "URL" to which student will be forwarded.
    switch ($_REQUEST['result']) {
		case "Passed":
			$msg = $exam->message_passed_c;
			$base_url = $exam->url_passed_c;
			break;
		case "Failed":
			$msg = $exam->message_failed_c;
			$base_url = $exam->url_failed_c;
			break;
		default:
			$msg = $exam->message_did_not_appear_c;
			$base_url = $exam->url_did_not_appear_c;
			break;
	}

	// If Result is changed, log a "Note" record in CRM.
    if ($result_updated) {
		$note = new Note();
		$note->name = "Exam result for {$exam->name} was updated to {$_REQUEST['result']}.";
		$note->parent_type = 'GI_Exam_Results';
		$note->parent_id = $exam->id;
		$note->parent_name = $exam->name;
		$note->description = "Exam result for {$exam->name} was updated to {$_REQUEST['result']}.";
		$note->contact_id = $contact->id;
		$note->save();
	}
	
// If "Contact" doesn't exist, Email is blank, Email doesn't match the Contact's email address, no "exam_id" is received, or invalid Result value is received...
} else {
	$msg = "This action seems to be invalid.";
}


// If user is updating the result from within the CRM, redirect user to the right screen in CRM.
if (isset($_REQUEST['return_module']) && isset($_REQUEST['return_id']) && isset($_REQUEST['return_action'])) {
	$params = array(
		'module'=> $_REQUEST['return_module'],
		'action'=>$_REQUEST['return_action'], 
		'record' => $_REQUEST['return_id'],
	);
	$base_url = 'index.php';
    
// If student is updating the result from Joomla, redirect user to the next suitable screen (which has a suitable Call-to-Action).
} else {
	$params = array(
		//'msg64' => base64_encode($msg),
		'first_name' => $contact->first_name,
		'last_name' => $contact->last_name,
		'title' => $contact->title,
		'email1' => $contact->email1,
		'phone_mobile' => $contact->phone_mobile,
		'title' => $contact->title,
		'program' => $exam->name,
	);
	$base_url = $base_url;
}

$redirect_url = $base_url . '?' . http_build_query($params);
SugarApplication::redirect($redirect_url);

?>