<?php

/*
Use:
Send a PDF version of the Payment to the customer.
*/

require_once('custom/modules/GI_Payments/sugarpdf/sugarpdf.payment.php');

$payment = $this->bean;
$pdf = new GI_PaymentsSugarpdfpayment($payment);
$pdf->action = 'payment';
$pdf->process();
$pdf->emailPDF();

$queryParams = array(
	'module' => 'GI_Payments',
	'action' => 'DetailView',
	'record' => $payment->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));
