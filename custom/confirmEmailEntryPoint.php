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
- Confirm the contact's request to reset his/her password. It is called after the person fills the "Forget Password?" form (in Joomla registration form), and an email is sent to student with a link, and student clicks the link.

Input Params:
- contact: ID of the Contact being verified.
- email: Email Address of the contact which is being verified. It should match the Email Address of the received Contact's ID.

Output Params:
- Redirection to a page which shows a success/failure message.
*/

require_once('custom/modules/gi_functions_custom.php');

// Make sure that all input params are received.
if (isset($_REQUEST['contact']) && isset($_REQUEST['email'])) {
	
	// Retreive the bean of the Contact.
	$contact_id = $_REQUEST['contact'];
	$email = $_REQUEST['email'];
	$contact = new Contact();
	$contact->retrieve($contact_id);
	
	// Check if:
    // "Contact" exists &
    // "Email Address" receives is matching the email address of the retrieved Contact.
	if ($contact->id == $contact_id && $contact->email1 == $email) {
		
        // Instruct CRM to generate a new password & send login details immediately to the contact's email address.
        $contact->generate_new_password_c = 1;
		$contact->send_login_immediately_c = 1;
		updateContact($contact);
		$contact->save();
		$msg = "Within the next few minutes, you shall receive an email from us with the new password. Just in case, please check your Junk mails too.";
		
	} else {
		$msg = "This link seems to be invalid or expired. If you still want to reset your password, please use the 'Forgot Password' section.";
	}
	
} else {
	$msg = "This link seems to be invalid or expired. If you still want to reset your password, please use the 'Forgot Password' section.";
}

global $sugar_config;
$joomla_url = $sugar_config['joomla_url'];
header("location:{$joomla_url}/index.php?option=com_genesisreview&view=register&msg={$msg}");

?>