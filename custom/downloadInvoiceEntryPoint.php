<?php

/*
Use:
- Download the Invoice in PDF version.

Input Params:
- invoice_id: ID of the invoice to be downloaded.

Output Params:
- Downloading the invoice in PDF version.
*/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/Opportunities/sugarpdf/sugarpdf.quote.php');

$opportunity = new Opportunity();

if (isset($_REQUEST['invoice_id'])) {
    $invoice_id = $_REQUEST['invoice_id'];
    $opportunity->retrieve($invoice_id);
    
    $pdf = new OpportunitiesSugarpdfquote($opportunity);
    $pdf->action = 'quote';
    $pdf->process();
    
    $pdf->Output($pdf->fileName, 'I');
}
?>