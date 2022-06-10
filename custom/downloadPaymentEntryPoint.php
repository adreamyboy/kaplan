<?php

/*
Use:
- Download the payment in PDF version.

Input Params:
- payment_id: ID of the payment to be downloaded.

Output Params:
- Downloading the payment in PDF version.
*/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/GI_Payments/sugarpdf/sugarpdf.payment.php');

$payment = new GI_Payments();

if (isset($_REQUEST['payment_id'])) {
    $payment_id = $_REQUEST['payment_id'];
    $payment->retrieve($payment_id);
    
    $pdf = new GI_PaymentsSugarpdfpayment($payment);
    $pdf->action = 'payment';
    $pdf->process();
    
    $pdf->Output($pdf->fileName, 'I');
}
?>