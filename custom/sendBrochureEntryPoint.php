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
- Send a document (brochure) to the email of a certain lead.  This is triggered after filling the Downloading/Web-to-Lead form.

Input Params:
- document_id: ID of the document to be sent.  This is required.
- lead_id: ID of the lead to which we need to send the document.  This is required.

Output Params:
- Sending the document immediately to the email, then redirection to a "thank-you" page.
*/

global $sugar_config;
$joomla_url = $sugar_config['joomla_url'];

// Retreive the beans of Document & Lead.
$doc = new Document();
$doc->retrieve($_REQUEST['document_id']);

$person = new Lead();
$person->retrieve($_REQUEST['lead_id']);

// Make sure that all bean are valid, and that the lead has an email address.
if ($doc->id != '' && $person->id != '' && $person->email1 != '') {
	
	// Retrieve the latest revision of the document.
	$revision = new DocumentRevision();
	$revision->retrieve($doc->document_revision_id);
	$filename = $revision->filename;
	$file_location = 'upload/' . $revision->id;
	$mime_type = $revision->file_mime_type;
	
	// Get the TO name and e-mail address for the message
	$rcpt_name = $person->first_name . ' ' . $person->last_name;
	$rcpt_email = $person->email1;
	
	// Retrieve the email template
	require_once('modules/EmailTemplates/EmailTemplate.php');
	$emailTemp = new EmailTemplate();
	$templateID = '672bb2e8-f4cd-f78c-7503-5651a18d0623';
	$emailTemp->retrieve($templateID);
	$emailTemp->disable_row_level_security = true;

	// Parse Subject & Body HTML
	$emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject, $person->module_dir, $person);
	$emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject, $doc->module_dir, $doc);
	$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html, $person->module_dir, $person);
	$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html, $doc->module_dir, $doc);
	
	// Message
	require_once ('modules/Emails/Email.php');
	$emailObj = new Email();
	$defaults = $emailObj->getSystemDefaultEmail();
	
	require_once('include/SugarPHPMailer.php');
	$mail = new SugarPHPMailer();
	$mail->From = 'info@kaplangenesis.com';  // $defaults['email']; // always send it from 'info@kaplangenesis.com' (instead of the default 'promotions@kaplangenesis.com')
	$mail->FromName = $defaults['name'];
	$mail->ClearAllRecipients();
	$mail->ClearReplyTos();
	$mail->AddAddress($rcpt_email, $rcpt_name);
	$mail->Subject = from_html($emailTemp->subject);
	$mail->Body_html = from_html($emailTemp->body_html);
	$mail->Body = wordwrap($emailTemp->body_html, 900);
	$mail->IsHTML(true); // Omit or comment out this line if plain text
	$mail->AddAttachment($file_location, $filename, 'base64', $mime_type); //Attach each file to message
	
	// Send the message, log if error occurs
	$mail->prepForOutbound();
	$mail->setMailerForSystem();
	if (!$mail->Send()) {
		die("The request seems to be invalid. Please contact us for any assistance.");
	
	} else {
		// now create email
		$emailObj->parent_type = 'Leads';
		$emailObj->parent_id = $person->id;
		$emailObj->to_addrs = '';
		$emailObj->type = 'archived';
		$emailObj->deleted = '0';
		$emailObj->name = $mail->Subject;
		$emailObj->description = $mail->Body;
		$emailObj->description_html = $mail->Body_html;
		$emailObj->from_addr = $mail->From;
		$emailObj->date_sent = TimeDate::getInstance()->nowDb();
		$emailObj->modified_user_id = '1';
		$emailObj->created_by = '1';
		$emailObj->status = 'sent';
		$emailObj->save();
		//die("Thank you for submitting your request. In the next few minutes, you will receive the requested document.");
		$redirect_url = "{$joomla_url}/thank-you/get-doc";
		SugarApplication::redirect($redirect_url);
	}
	
} else {
	die("It seems you didn't provide a valid email address. Please re-fill the form with a valid email address.");
}

?>