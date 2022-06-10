<?php

/*
This action sends a email to both "Referring" & "Referred" customers, instructing them to collect the cheque (after completing a course).

It will first performs the following checks:
- Opportunity has a Primary Contact.
- Opportunity's Primary Contact has an email address.
- Opportunity has a referring Contact.
- Opportunity's referring Contact has an email address.
- Opportunity's referral is "Accepted".

If the above checks are passed, it performs the following steps:
- Retrieve the email template for the referral ThankYou.
- Parse Subject & Body HTML
- Prepare the email.
- Send email to referring & referred contacts.
- Add a note under opportunity
*/

$bean = $this->bean;
if (sendReferralChequeCollectionViaEmail($bean, '725ae002-3c80-392d-f2d2-56c2db6ff6f4')) {
} else {
}
$params = array(
	'module'=> 'Opportunities',
	'action'=>'DetailView', 
	'record' => $bean->id,
);
$redirect_url = 'index.php?' . http_build_query($params);
SugarApplication::redirect($redirect_url);


function sendReferralChequeCollectionViaEmail($opportunity, $templateID) {

	// Check if the opportunity DOES NOT have a Contact.
	$link = 'contacts';
	$opportunity->load_relationship($link);
	$contacts = $opportunity->$link->getBeans();
	if (count($contacts) == 0) {
		SugarApplication::appendErrorMessage("The current opportunity (<a href='{$opportunity_url}'>{$opportunity->name}</a>) does NOT have a contact. Please add a contact first.");
		return false;
	}
	
	// Check if the opportunity's contact DOES NOT have an email address.
	$referred_contact = current($contacts);
	if ($referred_contact->email1 == '') {
		$params = array(
			'module'=> 'Contacts',
			'action'=>'DetailView', 
			'record' => $referred_contact->id,
		);
		$referred_contact_url = 'index.php?' . http_build_query($params);
		SugarApplication::appendErrorMessage("The referred contact (<a href='{$referred_contact_url}'>{$referred_contact->name}</a>) does NOT have an email address. Please update the referred contact's email address first.");
		return false;
	}
		
	// Check if the opportunity DOES NOT have a referring Contact.
	$referring_contact = new Contact();
	$referring_contact->retrieve($opportunity->contact_id_c);
	if ($referring_contact->id == '') {
		SugarApplication::appendErrorMessage("To send a referral confirmation email, you must select a referring contact.");
		return false;
	}
	
	// Check if the opportunity's referring Contact DOES NOT have an email address.
	if ($referring_contact->email1 == '') {
		$params = array(
			'module'=> 'Contacts',
			'action'=>'DetailView', 
			'record' => $referring_contact->id,
		);
		$referring_contact_url = 'index.php?' . http_build_query($params);
		SugarApplication::appendErrorMessage("The referring contact (<a href='{$referring_contact_url}'>{$referring_contact->name}</a>) does NOT have an email address. Please update the referring contact's email address first.");
		return false;
	}
	
	// Check if referral is accepted.
	if ($opportunity->referral_status_c != 'Accepted') {
		SugarApplication::appendErrorMessage("The referral is NOT accepted yet.");
		return false;
	}
	
	// Retrieve the email template
	require_once('modules/EmailTemplates/EmailTemplate.php');
	$emailTemp = new EmailTemplate();
	$emailTemp->retrieve($templateID);
	$emailTemp->disable_row_level_security = true;

	// Parse Subject & Body HTML
	$emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject, $opportunity->module_dir, $opportunity);
	$emailTemp->body_html = str_replace(array('$opportunity_referred_by_c', '$opportunity_account_name'), array($opportunity->referred_by_c, $opportunity->account_name), $emailTemp->body_html);
	$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html, $opportunity->module_dir, $opportunity);
	
	// Prepare the email.
	require_once('include/SugarPHPMailer.php');
	$mail = new SugarPHPMailer();
	require_once ('modules/Emails/Email.php');
	$emailObj = new Email();
	$defaults = $emailObj->getSystemDefaultEmail();
	$mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
	$mail->FromName = $defaults['name'];
	$mail->ClearAllRecipients();
	$mail->ClearReplyTos();
	$mail->AddAddress($referring_contact->email1, trim($referring_contact->first_name . ' ' . $referring_contact->last_name));
	//$mail->AddCC($referred_contact->email1, trim($referred_contact->first_name . ' ' . $referred_contact->last_name));
	$mail->Subject = from_html($emailTemp->subject);
	$mail->Body_html = from_html($emailTemp->body_html);
	$mail->Body = wordwrap($emailTemp->body_html, 900);
	$mail->IsHTML(true); // Omit or comment out this line if plain text
	$mail->prepForOutbound();
	$mail->setMailerForSystem();
	
	// Send email.
	if (!$mail->Send()) {
		SugarApplication::appendErrorMessage("An error occured, and referral confirmation was NOT sent. Check with your System Admin.");
		return false;
	}
	
	// Add a note under opportunity
	global $current_user;
	$emailObj->parent_type = 'Opportunities';
	$emailObj->parent_id = $opportunity->id;
	$emailObj->to_addrs = $referring_contact->email1;
	$emailObj->to_addrs_ids = $referring_contact->id;
	//$emailObj->cc_addrs = $referred_contact->email1;
	//$emailObj->cc_addrs_ids = $referred_contact->id;
	$emailObj->type = 'archived';
	$emailObj->deleted = '0';
	$emailObj->name = $mail->Subject;
	$emailObj->description = $mail->Body;
	$emailObj->description_html = $mail->Body_html;
	$emailObj->from_addr = $mail->From;
	$emailObj->date_sent = TimeDate::getInstance()->nowDb();
	$emailObj->modified_user_id = $current_user->id;
	$emailObj->created_by = $current_user->id;
	$emailObj->status = 'sent';
	$emailObj->save();
	
	SugarApplication::appendErrorMessage("The referral confirmation was sent successfully.");
	return true;
}
