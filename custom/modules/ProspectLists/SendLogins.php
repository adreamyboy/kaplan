<?php

require_once('custom/modules/gi_functions_custom.php');

$bean = $this->bean;

// If "Not Admin", don't allow this action
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


$link = 'contacts';
if ($bean->load_relationship($link)) {
	$contacts = $bean->$link->getBeans();
	foreach ($contacts as $contact) {
		if ($contact->email1 != '') {
			updateContact($contact);
			if ($contact->username_c == '' || $contact->password_c == '') {
				$contact->generate_new_password_c = 1;
			}
			$contact->send_login_immediately_c = 1;
			$contact->save();
		}
	}
}

$queryParams = array(
	'module' => 'ProspectLists',
	'action' => 'DetailView',
	'record' => $bean->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>	