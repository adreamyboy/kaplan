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
- Verify the email address of a contact to automatically "process" a lead (i.e. convert lead to Contact, Account, and Opportunity).  This action is called after a person completes the checkout process, an email is sent to the person's email (with a link), and recipient clicks on the link.

Input Params:
- id: ID of the Lead to be processed & verified.
- email: Email Address of the lead being verified. It should match the Email Address of the received Lead ID.

Output Params:
- Redirection to a page which shows a success/failure message.
*/

//require_once('custom/modules/gi_functions_custom.php');

global $sugar_config;
$joomla_url = $sugar_config['joomla_url'];

// Make sure that all input params are received.
if (isset($_REQUEST['id']) && isset($_REQUEST['email'])) {
	
	$lead_id = $_REQUEST['id'];
	$email = $_REQUEST['email'];
	
	// Retreive the bean of the Contact.
	$lead = new Lead();
	$lead->retrieve($lead_id);
	
	$opportunity = new Opportunity();
	$opportunity->retrieve($lead->opportunity_id);
	
	// If the lead is not "processed" yet...
    if ($lead->id != '' && $opportunity->id != '' && $lead->email1 == $email && $lead->contact_id == '') {
		
		$email_add = new EmailAddress();
		$beans = $email_add->getBeansByEmailAddress($email);
		
		$no_of_contacts = 0;
		foreach ($beans as $bean) {
			if ($bean->id != '' && $bean->module_dir == 'Contacts') {
				$no_of_contacts = $no_of_contacts + 1;
				if ($no_of_contacts == 1) {
					$contact_id = $bean->id;
				}
			}
		}
		
		$contact = new Contact();
		if ($contact_id != '') {
			$contact->retrieve($contact_id);
			if ($contact->username_c == '' || $contact->password_c == '') {
				$contact->generate_new_password_c = 1;
			//} else {
			//	$contact->generate_new_password_c = 0;
			}
			//$contact->send_login_immediately_c = 1;  // do not send login details on email verification..
		} else {
			$contact->lead_source = $lead->lead_source;
			$contact->campaign_id = $lead->campaign_id;
			$contact->generate_new_password_c = 1;
			//$contact->send_login_immediately_c = 1;  // do not send login details on email verification..
		}
		
		$fields = array(
			'primary_address_country',
			'primary_address_city',
			'primary_address_street',
			'primary_address_street_2',
			'primary_address_street_3',
			'primary_address_postalcode',
			'first_name',
			'last_name',
			'title',
			'email1',
			'phone_mobile',
		);
		
		foreach ($fields as $field) {
			if (trim($lead->$field) != '') {
				$contact->$field = $lead->$field;
			}
		}
		
		// Create the corporate account (if provided)
		$account_corporate = new Account();
		if ($lead->account_id == '' && $lead->account_name != '') {
			$sql = "SELECT id
					FROM accounts, accounts_cstm
					WHERE id = id_c
					AND deleted = '0'
					AND individual_c = '0'
					AND name = '{$lead->account_name}'"; // This will match the exact company name (if it exists)
					
			$result = $GLOBALS['db']->getOne($sql);
			if ($result != '') {
				$account_corporate->retrieve($result);
			} else {
				$account_corporate->name = $lead->account_name;
				$account_corporate->individual_c = 0;
				$account_corporate->campaign_id = $lead->campaign_id;
				$account_corporate->save();
			}
		}		
		
		// Enable the change-log on all the fields
		if ($account_corporate->id != '') {
			$contact->account_id = $account_corporate->id;
		}
		$contact->save();
		$account = $contact->get_individual_account();

		// Link the opportunity to the right contact & account
		$opportunity->contact_id = $contact->id;
		$opportunity->account_id = $account->id;
		$opportunity->save();
		
		// Update the lineitems' contacts
		$line_items = $opportunity->get_line_items();
		foreach ($line_items as $line_item) {
			$line_item->save();
		}
		
		// Link the lead to the right contact & account
		$lead->contact_id = $contact->id;
		$lead->account_id = $account->id;
		$lead->email_verified_by_customer_c = 1;
		$lead->status = 'Converted';
		$lead->save();
		
		$msg = "Thank you for confirming your email address.";
		
		// Enforce the loggout somehow!
		header("location:{$joomla_url}/component/genesisreview/?task=process&action=LOGOUT&msg={$msg}");
		
	// If the lead is already "processed"...
	} else {
		$msg = "This link seems to be invalid, expired, or already processed. Please contact us to check this issue for you.";
	}
	
} else {
	$msg = "This link seems to be invalid, expired, or already processed. Please contact us to check this issue for you.";
}

header("location:{$joomla_url}/index.php?option=com_genesisreview&view=register&msg={$msg}");

?>