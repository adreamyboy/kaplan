<?php

/*
This action is used to delete the lead along with its opportunity (and line items) IF AND ONLY IF the opportunity is not yet converted to an "Invoice".
*/ 

$bean = $this->bean;
$opportunity_id = $bean->opportunity_id;


// If the lead has an opportunity, check if the opportunity is not an "Invoice".
if ($opportunity_id != '') {
	$opportunity = new Opportunity();
	$opportunity->retrieve($opportunity_id);
	
	// If opportunity is an "Invoice", stop the deletion process.
    if ($opportunity->status_c != "Opportunity") {
		SugarApplication::appendErrorMessage('You can NOT delete a lead that is related to an invoice.');
		
	// If opportunity is NOT an "Invoice", delete the lead & opportunity & line items.
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
		
		// delete lead
		$bean->deleted = 1;
		$bean->save();
	}

// If the lead doesn't have an opportunity, just delete the opportunity.	
} else {
	// delete lead
	$bean->deleted = 1;
	$bean->save();
}


// Redirect user to a proper URL.
if ($bean->deleted == 1) {
    // Go to ListView (if lead is deleted)
    $queryParams = array(
        'module' => 'Leads',
        'action' => 'index',
    );
} else {
    // Go to DetailView (if lead is not deleted).
    $queryParams = array(
        'module' => 'Leads',
        'action' => 'DetailView',
        'record' => $bean->id,
    );
}
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>