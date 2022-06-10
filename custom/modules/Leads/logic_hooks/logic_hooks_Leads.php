<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Leads {

	function before_save_method($bean, $event, $arguments) {
		
		global $db;
		
		//start for duplicate records 
		
		
		
		$lastname = $bean->last_name ;
		$opportunity_id = $bean->opportunity_id ;
		$first_name = $bean->first_name ;
		$phone_mobile = $bean->phone_mobile ;
	
		//$updatedlname = $bean->last_name.'-dup'; 
		
	
		
		/*$dupesql_mngr = "Select * from leads where first_name= '".trim($first_name)."' and phone_mobile= '".trim($phone_mobile)."'and last_name =  '".trim($lastname)."' and opportunity_id = '".$opportunity_id."' and deleted=0 ";
		/*$dupesql_mngr = "SELECT opportunity_id, first_name, last_name, phone_mobile, DATE(date_entered), count(*) FROM `leads` group by
opportunity_id, first_name, last_name, phone_mobile, DATE(date_entered) having count(*) >1";*/
		/*$duperaw_mngr = $db->query($dupesql_mngr);
		$row_mngr = $db->fetchByAssoc($duperaw_mngr);			
			
			if($duperaw_mngr->num_rows>0){
				  //$usrUp = "Update leads SET last_name = '".$updatedlname ."'  WHERE id = '".$leadID."' ";  	
				  //$RObj  = $db->query($usrUp);	
				  //$bean->last_name = $updatedlname;
				  $bean->deleted= 1;
				  //$bean->save();
				  			
				
			}*/
		//end
		
		
		
		
		
		
		
		
		
		// resolve the spam emails from (mobile: 123456 & company: google)
		$spam_mobile = '8';
		$spam_account = 'google';
		
		// check if account name matches, and if mobile starts with some value...
		if ($bean->account_name == $spam_account && 0 === strpos($bean->phone_mobile, $spam_mobile)) {
			$GLOBALS['log']->fatal("Spam Lead ==> id: {$bean->id} | account_name: {$bean->account_name} | phone_mobile: {$bean->phone_mobile}");
			die('Ok!');
		}
        
        // check if campaign is "blank" or "Unknown"... if yes:
        $UNKNOWN_campaign_id = '3a7404cf-7311-3625-8301-53fb14090684';
        
        if ( in_array($bean->campaign_id, array('', $UNKNOWN_campaign_id)) ) {
            
            // if referral URL relates to Google...
            if (strpos($bean->referral_url_c, 'https://www.google.') === 0 ||
                strpos($bean->referral_url_c, 'android-app://com.google.') === 0 ||
                strpos($bean->referral_url_c, 'http://www.googleadservices.') === 0
                )
            {
                $bean->campaign_id = '1';
            }
            
            // if referral URL relates to LinkedIn...
            if (strpos($bean->referral_url_c, 'http://lnkd.in') === 0 || 
                strpos($bean->referral_url_c, 'https://ae.linkedin.') === 0 ||
                strpos($bean->referral_url_c, 'https://om.linkedin.') === 0 ||
                strpos($bean->referral_url_c, 'android-app://com.linkedin') === 0 ||
                strpos($bean->referral_url_c, 'https://www.linkedin.') === 0
                )
            {
                $bean->campaign_id = '1474544c-3254-7941-96c4-5a35e5222a40';
            }
            
            // if referral URL relates to Facebook...
            if (strpos($bean->referral_url_c, 'http://m.facebook.') === 0 || 
                strpos($bean->referral_url_c, 'https://m.facebook.') === 0 || 
                strpos($bean->referral_url_c, 'http://www.facebook.') === 0 || 
                strpos($bean->referral_url_c, 'https://www.facebook.') === 0 ||
                strpos($bean->referral_url_c, 'https://l.facebook.') === 0 ||
                strpos($bean->referral_url_c, 'https://lm.facebook.') === 0
                )
            {
                $bean->campaign_id = 'cdd280b7-fe26-7174-f396-5a35e555a20b';
            }
            
            // if referral URL relates to Laimoon...
            if (strpos($bean->referral_url_c, 'http://courses.laimoon.') === 0 ||
                strpos($bean->referral_url_c, 'https://courses.laimoon.') === 0
                ) 
            {
                $bean->campaign_id = '5';
            }
            
            // if referral URL relates to Bing...
            if (strpos($bean->referral_url_c, 'http://www.bing.') === 0 ||
                strpos($bean->referral_url_c, 'https://www.bing.') === 0
                )
            {
                $bean->campaign_id = 'eb30968c-9236-b74b-77f4-5a35f19d3a45';
            }
            
            // if referral URL relates to IMA...
            if (strpos($bean->referral_url_c, 'http://dubai.imanet.') === 0 ||
                strpos($bean->referral_url_c, 'http://imamiddleeast.org') === 0
                )
            {
                $bean->campaign_id = '6';
            }
            
            // if referral URL relates to IMA...
            if (strpos($bean->referral_url_c, 'http://www.schweser.') === 0 ||
                strpos($bean->referral_url_c, 'https://www.schweser.') === 0
                )
            {
                $bean->campaign_id = '57';
            }
            
        }
		
		updateLead($bean);
	}
	
	function after_save_method($bean, $event, $arguments) {
		
		global $db;
		$admin_user_id = '1';
		$web_user_id = '53a77649-1254-10b1-f46c-53e9c1579b22';
		$web_order_account_id = '6c9e6bf9-8b24-2297-b00c-5416e872a311';
		
		
		
		$opportunity_updated = 0;
		
		$opportunity = new Opportunity();
		if ($bean->opportunity_id != '') {
			$opportunity->retrieve($bean->opportunity_id);
		}
		
		/*
		if ($bean->gi_products_id_c != '') {
			if ($bean->first_name == 'Tawfeeq' && $bean->last_name == 'Gmail') {
				
				$product = new GI_Products();
				$product->retrieve($bean->gi_products_id_c);
				
				// create new opportunity
				if ($opportunity->id == '') {
					$opportunity->account_id = $web_order_account_id;
					$opportunity->auto_discount_c = 1;
					$opportunity->save();
				}
				
				// new new line item
				$line_item = new GI_Line_Items();
				$line_item->opportunities_gi_line_items_1opportunities_ida = $opportunity->id;
				$line_item->gi_products_gi_line_items_1gi_products_ida = $product->id;
				$line_item->unit_price = $product->price;
				$line_item->save();
				
				//***** BUG: when a lead is create via "FREE EVENT REGISTRATION FORM", it throws an error *****
				// update current lead
				$bean->gi_products_id_c = '';
				if (in_array($bean->assigned_user_id, array('', $admin_user_id, $web_user_id))) {
					$bean->assigned_user_id = $product->assigned_user_id;
				}
				if ($bean->opportunity_id == '') {
					$bean->opportunity_id = $opportunity->id;
				}
				$bean->save();
				
				$opportunity_updated = 1;
			}
		}
		*/
		
		if ($opportunity->id != '') {
			
			// IF the lead has an assignee (other than '', admin, or website), THEN update the opportunity's assignee accordingly
			if (!in_array($bean->assigned_user_id, array('', $admin_user_id, $web_user_id))) {
				if ($opportunity->assigned_user_id != $bean->assigned_user_id) {
					$opportunity->assigned_user_id = $bean->assigned_user_id;
					$opportunity_updated = 1;
				}
			}
			
			// IF the lead's status is "Duplicate", change the opportunity's status to "Closed Lost" & reason to "Opportunity Merged"
			if ($bean->status == "Duplicate") {
				if ($opportunity->sales_stage != "Closed Lost" || $opportunity->reason_of_loss_c != "Opportunity_Merged") {
					$opportunity->sales_stage = "Closed Lost";
					$opportunity->reason_of_loss_c = "Opportunity_Merged";
					$opportunity_updated = 1;
				}
			}
			
			// Save the opportunity if updated.
			if ($opportunity_updated == 1) {
				$opportunity->save();
			}
		}
	}
}
	
?>
