<?php

/*
Use: 

(NOTE: This function is "Depreciated" now, as "Mandrill" has stopped offering this service, and instead merged it with "MailChimp").

This action integrates the CRM with "Mandrill.com" Email System, to synchronize the Email Address status (when email bounces).

It basically retrieves the "invalid" emails which appear in Mandrill as:
- Hard-bounced
- Soft-bounced
- Spam

Then, it finds all "Contacts" which have these "Email Addresses" in CRM, and updates their emails status to "Invalid".

Then, it saves a "Note" for each updated contact/email address.

Finally, it shows you a count for the number of invalid email addresses processed.
*/

$bean = $this->bean;
require_once 'src/Mandrill.php'; // Not required with Composer

try {
    
    // Connect to "Mandrill" using the token/api-key generated from Mandrill's admin interface.
    $mandrill = new Mandrill('En5IgQXkNLjY85kouj4Q4A');
    
    // Retrieve the list of "Hard-bounced", "Soft-bounced", and "Spam" emails.
    // Mandrill also requires receiving a start & end dates between which emails will be retrieved.
    $query = 'state:bounced OR state:soft-bounced OR state:spam';
    $date_from = '2016-01-01';
    $date_to = '2018-01-01';
    $tags = array();
    $senders = array('promotions@genesisreview.com');
    $api_keys = array('En5IgQXkNLjY85kouj4Q4A');
    $limit = 1000;
    $result = $mandrill->messages->search($query, $date_from, $date_to, $tags, $senders, $api_keys, $limit);
    
    // TO-DO: add a separate code to process "spam" (as "Opted Out" status) instead of "Invalid" status.
	require_once('modules/Campaigns/ProcessBouncedEmails.php');
	$count = 0;
    
    // Iterate over each email message/address received from Mandrill.
    foreach ($result as $msg) {
        $email = $msg['email'];
        $state = $msg['state'];
        $sea = new SugarEmailAddress();
        $email_guid = $sea->getEmailGUID($email);
        $sea->retrieve($email_guid);
        
        if ($sea->invalid_email != 1) {
            // Get the list of contacts which are linked to the email address being checked
            $contacts = $sea->getRelatedId($email, 'Contacts');
            
            // If a matching contact(s) is found, add a "Note" that is related the Contact.
            if (count($contacts) > 0) {
	            foreach ($contacts as $key=>$value) {
				    $note = new Note();
			        $note->name = "Email address is flagged as invalid ($state): $email";
			        $note->description = "State: {$msg['state']}\nBounce Description: {$msg['bounce_description']}\nDiagnosis:{$msg['diag']}\nSubject: {$msg['subject']}\nEmail Address: {$msg['email']}\nSender: {$msg['sender']}";
			        $note->contact_id = $value;
			        $note->save();
			        markEmailAddressInvalid($email);
                    $count++;
	            }
                
            // If "NO" matching contact(s) found, add a "Note" without linking it to a Contact.
	        } else {
			    $note = new Note();
		        $note->name = "Email address is flagged as invalid ($state): $email";
		        $note->description = "State: {$msg['state']}\nBounce Description: {$msg['bounce_description']}\nDiagnosis:{$msg['diag']}\nSubject: {$msg['subject']}\nEmail Address: {$msg['email']}\nSender: {$msg['sender']}";
		        $note->save();
		        markEmailAddressInvalid($email);
		        $count++;
	        }
	    }
    }
    
    die("{$count} email address(es) set to invalid.");
    
	/*
    //***** DEBUGING *****
    $emails = array();
    foreach ($result as $msg) {
        $emails[] = $msg['email'];
    }
    echo '<pre>';
    print_r($emails);
    echo '</pre>';
    die();
    */
	
	/*
    $queryParams = array(
		'module' => 'Campaigns',
		'action' => 'DetailView',
		'record' => $bean->id,
	);
	SugarApplication::redirect('index.php?' . http_build_query($queryParams));
    */
    
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_ServiceUnavailable - Service Temporarily Unavailable
    throw $e;
}

?>