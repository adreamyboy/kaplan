<?php

/*
This action automatically converts the Lead to a "Contact", "Individual Account", "Opportunity", and "Corporate Account" (if to billed to a company).

It will also try to find an existing "Corporate Account" which matches the mentioned company, to link it to (if billed a company).

It will try to find an existing "Contact" which has a matching email address, to link it to.
*/


// Format the lead's primary details.
$lead = $this->bean;
$lead->first_name = trim($lead->first_name);
$lead->last_name = trim($lead->last_name);
$lead->account_name = trim($lead->account_name);
$lead->email1 = trim(strtolower($lead->email1));
$email = $lead->email1;


// Create the corporate account (if provided)
if ($lead->account_id == '' && $lead->account_name != '') {
	$account_corporate = new Account();
	$sql = "SELECT id
			FROM accounts, accounts_cstm
			WHERE id = id_c
			AND deleted = '0'
			AND individual_c = '0'
			AND name LIKE ('%{$lead->account_name}%')
			ORDER BY date_entered ASC";
			//AND name = '{$lead->account_name}'"; // This will match the exact company name (if it exists)
			
	// If a matching "Company" exists, log a "Note" under the lead mentioning the original "Company" name.
    // For example, if "Company" is mentioned as "HSBC", and system found a record of "HSBC Middle East", 
    // the lead will be linked to this account, and a "Note" will mention "HSBC".
    $result = $GLOBALS['db']->getOne($sql);
	if ($result != '') {
		$account_corporate->retrieve($result);
		$note = new Note();
		$note->name = "Auto-generated note - Company in lead is: {$lead->account_name}";
		$note->description = "Auto-generated note - Company in lead is: {$lead->account_name}";
		$note->parent_type = 'Leads';
		$note->parent_id = $lead->id;
		$note->parent_name = $lead->name;
		$note->save();
		
	} else {
		$account_corporate->name = $lead->account_name;
		$account_corporate->individual_c = 0;
		$account_corporate->campaign_id = $lead->campaign_id;
		$account_corporate->save();
	}
}


// Link to and-or create the contact
$contact = new Contact();
if ($lead->contact_id != '') {
	$contact->retrieve($lead->contact_id);
} else {
	if ($lead->email1 != '') {
		$email_add = new EmailAddress();
		$collection = $email_add->getBeansByEmailAddress($email);
		$no_of_contacts = 0;
		foreach ($collection as $record) {
			if ($record->id != '' && $record->module_dir == 'Contacts') {
				$no_of_contacts = $no_of_contacts + 1;
				if ($no_of_contacts == 1) {
					$contact_id = $record->id;
				}
			}
		}
	}
	if ($contact_id != '') {
		$contact->retrieve($contact_id);
	} else {
		$contact->lead_source = $lead->lead_source;
		$contact->campaign_id = $lead->campaign_id;
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
}
if ($account_corporate->id != '') {
	$contact->account_id = $account_corporate->id;
}
if ($contact->username_c == '' || $contact->password_c == '') {
	$contact->generate_new_password_c = 1;
}
//$contact->send_login_immediately_c = 1;  // do not send login details.
$contact->save();


// Identify the account which will be billed
//$account_individual = $contact->get_individual_account();
  $contact->load_relationship('accounts');//die;
  $account_individual = $contact->accounts->getBeans();

if ($lead->account_id != '') {
	$account = new Account();
	$account->retrieve($lead->account_id);
} else {
	if ($lead->company_sponsored_c == 1 && $account_corporate->id != '') {
		$account = $account_corporate;
	} else {
		$account = $account_individual;
	}
}


// Link the opportunity to the right contact & account
$opportunity = new Opportunity();
if ($lead->opportunity_id != '') {
	$opportunity->retrieve($lead->opportunity_id);
}
$opportunity->contact_id = $contact->id;
$opportunity->account_id = $account->id;
$opportunity->lead_source = $lead->lead_source;
$opportunity->lead_source_details_c = $lead->lead_source_description;
$opportunity->campaign_id = $lead->campaign_id;
$opportunity->assigned_user_id = $lead->assigned_user_id;
$opportunity->save();


// Create a new line item (based on the 'gi_product_id_c' field) in the parent opportunity
if ($lead->gi_products_id_c != '') {
	$product = new GI_Products();
	$product->retrieve($lead->gi_products_id_c);

	if ($product->id != '') {
		$line_item = new GI_Line_Items();
		$line_item->gi_products_gi_line_items_1gi_products_ida = $lead->gi_products_id_c;
		$line_item->opportunities_gi_line_items_1opportunities_ida = $opportunity->id;
		$line_item->unit_price = $product->price;
		$line_item->save();
	}
}


// Link the lineitems to the contact
//$line_items = $opportunity->get_line_items();
 $opportunity->load_relationship('opportunities_gi_line_items_1');
  $line_items = $opportunity->opportunities_gi_line_items_1->getBeans();

foreach ($line_items as $line_item) {
	$line_item->save();
}


// Link the lead to the right contact & account
$lead->contact_id = $contact->id;
$lead->account_id = $account->id;
$lead->opportunity_id = $opportunity->id;
$lead->gi_products_id_c = '';
$lead->status = 'Converted';
$lead->save();


// Redirect user to the lead's DetailView, and show an info message.
SugarApplication::appendErrorMessage('This lead was successfully auto-converted.');
$queryParams = array(
	'module' => 'Leads',
	'action' => 'DetailView',
	'record' => $lead->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>
