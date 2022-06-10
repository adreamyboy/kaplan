<?php

$bean = $this->bean;

$line_items = $bean->get_line_items();

foreach ($line_items as $line_item) {
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

$bean->generate_new_password_c = 1;
$bean->send_login_immediately_c = 1;

$bean->save();

$queryParams = array(
	'module' => 'Contacts',
	'action' => 'DetailView',
	'record' => $bean->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>