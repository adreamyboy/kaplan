<?php

$emails = array();
$bean = $this->bean;
$link = 'contacts';

if ($bean->load_relationship($link)) {
	$contacts = $bean->$link->getBeans();
	foreach ($contacts as $contact) {
		if ($contact->email1 != '') {
			$emails[] = $contact->email1;
		}
	}
	$to_email_addrs = implode(',', $emails);
	$queryParams = array(
		'module' => 'Emails',
		'action' => 'Compose',
		'to_email_addrs' => $to_email_addrs,
		'parent_type' => 'GI_Products',
		'parent_id' => $bean->id,
		'parent_name' => $bean->name,
	);
	SugarApplication::redirect('index.php?' . http_build_query($queryParams));
}

?>