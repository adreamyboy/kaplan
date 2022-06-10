<?php

$bean = $this->bean;

// If "Not Admin", don't allow this action.
/*
global $current_user;
$isAdmin = is_admin($current_user);
if (!$isAdmin) {
	$params = array(
		'module'=> 'ProspectLists',
		'action'=>'DetailView', 
		'record' => $bean->id,
	);
	$url = 'index.php?' . http_build_query($params);
	SugarApplication::appendErrorMessage('You can NOT create line items for this target lists because you do NOT have Admin permissions.');
	SugarApplication::redirect($url);
}
*/


// Add contact to list.
if ($_REQUEST['email_addresses'] != '') {
	$email_addresses = explode(',', $_REQUEST['email_addresses']);
	$email = new SugarEmailAddress();
	$link = 'contacts';
	if ($bean->load_relationship($link)) {
		foreach ($email_addresses as $email_address) {
			$contact_ids = $email->getRelatedId(trim($email_address), 'Contacts');
			if ($contact_ids != false) {
				foreach ($contact_ids as $contact_id) {
					$bean->$link->add($contact_id);
				}
			}
		}
	}
	
	$params = array(
		'module'=> 'ProspectLists',
		'action'=>'DetailView', 
		'record' => $bean->id,
	);
	$url = 'index.php?' . http_build_query($params);
	SugarApplication::appendErrorMessage('The matching contacts were added to this target list.');
	SugarApplication::redirect($url);
}

?>

<form method="post">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="PopulateByEmailAddresses" />
	<table>
		<tr><td colspan="2"><h2>You are about to add contacts with following email addresses to this Target List: <?=$bean->name?></h2></td></tr>
		<tr><td colspan="2"><h3>NOTE: Contacts will be added.  Prospects & Leads will not be added.</td></tr>
		<tr><td>Enter the Email Addresses of contacts you want to add [comma-separated]:</td><td><input type="text" id="email_addresses" name="email_addresses" value="<?=$_REQUEST['email_addresses']?>"></td></tr>
		<tr><td colspan="2"><a href="<?=$return_url?>">Return to Target List</a> <input type="submit" value="Populate Now!"></td></tr>
	</table>
</form>