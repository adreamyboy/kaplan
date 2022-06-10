<?php

/*
Use:
In some case, the line item's status is set automatically to "Suspended", even after a full payment is made.
Assuming that a full payment is made, you can use this actually to easily change the status of all "Suspended" line items to "Active".
If the opportunity containing the line item is not fully paid, this action will not be applied on this line item.
*/

// Get all the lineitems under this product.
$bean = $this->bean;
$line_items = $bean->get_line_items();

// Iterate over every lineitem in this product...
foreach ($line_items as $line_item) {
	
    // If a lineitem is suspended, check if belongs to a fully-secured opportunity, and activate it accordingly.
    if (in_array($line_item->status_c, array('Suspended'))) {
		$opportunities = $line_item->get_opportunities();
		if (count($opportunities) > 0) {
			$opportunity = current($opportunities);
			if ($opportunity->sales_stage == 'Closed Won' && ($opportunity->amount - $opportunity->total_payments_c - $opportunity->total_installments_c - $opportunity->total_promises_c - $opportunity->total_creditnote_allocations_c + $opportunity->total_refunds_c <= 0)) {
				$line_item->status_c = 'Active';
				$line_item->save();
			}
		}
	}
}

$bean->save();  // TO-DO: Check if calling "save" is still needed here.

// Redirect user to the DetailView of the product.
$queryParams = array(
	'module' => 'GI_Products',
	'action' => 'DetailView',
	'record' => $bean->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>