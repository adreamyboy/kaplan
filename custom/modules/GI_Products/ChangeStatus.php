<?php

/*
Use:
This action is used to change the status of the "Product" to:  Active, Cancelled, Complete.
It will accordingly change the status of line items under it.

Input:
$_REQUEST['status'] - the status to which we 

Output:
redirect user to DetailView of the product.
*/

$bean = $this->bean;

$status = $_REQUEST['status'];

$bean->status_c = $status;

$bean->save();

$queryParams = array(
	'module' => 'GI_Products',
	'action' => 'DetailView',
	'record' => $bean->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>