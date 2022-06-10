<?php

/*
This action sends a PDF version to the opportunity to customer.
*/

require_once('custom/modules/Opportunities/sugarpdf/sugarpdf.quote.php');

$opportunity = $this->bean;
$pdf = new OpportunitiesSugarpdfquote($opportunity);
$pdf->action = 'quote';
$pdf->process();
$pdf->emailPDF();

$queryParams = array(
	'module' => 'Opportunities',
	'action' => 'DetailView',
	'record' => $opportunity->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));
