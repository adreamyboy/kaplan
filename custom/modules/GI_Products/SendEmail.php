<?php

/*
Use:
This action is used to send a custom email to the beneficiaries in a certain product.
It first retrieves the email addresses of all beneficiaries in this product (Active, Suspended, Complete), and adds them to "TO" recipients.
Then it forwards the user to the "Compose Email" screen.
*/

$bean = $this->bean;

// Retrieve the email addresses of all beneficiaries in this product (Active, Suspended, Complete), and add them to "TO" recipients.
$emails = array();
$line_items = $bean->get_line_items(); // Retrieve all line items.
foreach ($line_items as $line_item) { // Iterative over line items, one-by-one
	if (in_array($line_item->status_c, array('Active','Suspended','Complete'))) {  // If lineitem status is: Active, Suspended, Complete...
        // Get the contact and add his/her email (if avaiable).
        $contacts = $line_item->get_contacts();
		if (count($contacts) > 0) {
			$delegate = current($contacts);
			$emails[] = $delegate->email1;
		}
	}
}
$to_email_addrs = implode(',', $emails);

// Redirect user to the "Compose Email" screen.
$queryParams = array(
	'module' => 'Emails',
	'action' => 'Compose',
	'to_email_addrs' => $to_email_addrs,
	'parent_type' => 'GI_Products',
	'parent_id' => $bean->id,
	'parent_name' => $bean->name,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>