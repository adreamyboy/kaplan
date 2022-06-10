<?php

/*
Use:
- Return the mobile number of the primary contact in a specific opportunity.  This is called by the "Send SMS" action in "Activities" subpanel in the Opportunity’s DetailView.

Input Params:
- id: the "ID" of Opportunity where we need to find the primary contact & its mobile phone..

Output Params:
- String with a mobile number, or the word "error" (if no mobile is found)
*/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(!empty($_REQUEST['id'])){
	$opportunity_id = $_REQUEST['id'];
	$oOpportunity = new Opportunity();
	$oOpportunity->retrieve($opportunity_id);
	
	$link = 'contacts';
    if ($oOpportunity->load_relationship($link)) {
        $allContacts = $oOpportunity->$link->getBeans();
    }
	$oContact = current($allContacts);
				
	if(!empty($oContact->phone_mobile)){
		echo $oContact->phone_mobile;
	} else {
		echo "error";
	}
}
exit;
