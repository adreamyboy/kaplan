<?php

/*
This action allows Admin to delete the opportunity (and their line items, in one shot) IF AND ONLY IF the opportunity is not yet an "Invoice".
*/

$opportunity = $this->bean;

// If "Not Admin", don't allow this action
global $current_user;
$isAdmin = is_admin($current_user);

if (!$isAdmin) {
	SugarApplication::appendErrorMessage('You do NOT have Admin permissions.');
	
} else {
	if ($opportunity->status_c != "Opportunity") {
		SugarApplication::appendErrorMessage('You can NOT delete an invoice.');
		
	} else {
		
		// delete lineitems
		$line_items = $opportunity->get_line_items();
		foreach ($line_items as $line_item) {
			$line_item->deleted = 1;
			$line_item->save();
		}
		
		// delete opportunity
		$opportunity->deleted = 1;
		$opportunity->save();
	}	
}

$queryParams = array(
	'module' => 'Opportunities',
	'action' => 'index',
	//'action' => 'DetailView',
	//'record' => $opportunity->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>