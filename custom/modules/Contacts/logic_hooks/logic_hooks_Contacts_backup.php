<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Contacts {

    private static $contact_in_workflow = 0;
	
    function before_save_method($bean, $event, $arguments){
        updateContact($bean);
    }
    
    function after_save_method($bean, $event, $arguments){
        
		$link = 'accounts';
		$contact_id = $bean->id;
		
		if ($bean->load_relationship($link)) {
		
			// Check if Individual account already exists
			$accounts = $bean->$link->getBeans();
			$individual_account_exists = false;
            $account = new Account();
            
			foreach($accounts as $temp_account) {
				if ($temp_account->individual_c) {
					$individual_account_exists = true;
					$account->retrieve($temp_account->id);
					break;
				}
			}
			
			// Create/Update the Individual account
            $account->name = $bean->name;
            $account->individual_c = true;
            $account->phone_office = $bean->phone_work;
            $account->phone_fax = $bean->phone_fax;
            $account->description = $bean->description;
            $account->billing_address_street = $bean->primary_address_street;
            $account->billing_address_street_2 = $bean->primary_address_street_2;
            $account->billing_address_street_3 = $bean->primary_address_street_3;
            $account->billing_address_city = $bean->primary_address_city;
            $account->billing_address_state = $bean->primary_address_state;
            $account->billing_address_postalcode = $bean->primary_address_postalcode;
            $account->billing_address_country = $bean->primary_address_country;
            $account->shipping_address_street = $bean->alt_address_street;
            $account->shipping_address_street_2 = $bean->alt_address_street_2;
            $account->shipping_address_street_3 = $bean->alt_address_street_3;
            $account->shipping_address_city = $bean->alt_address_city;
            $account->shipping_address_country = $bean->alt_address_country;
            $account->shipping_address_postalcode = $bean->alt_address_postalcode;
            $account->shipping_address_state = $bean->alt_address_state;
            $account->assigned_user_id = $bean->assigned_user_id;
            $account->assigned_user_name = $bean->assigned_user_name;
            $account->campaign_id = $bean->campaign_id;
            //$account->email1 = $bean->email1;
            //$account->email2 = $bean->email2;
            $account_id = $account->save();
            
			if (!$individual_account_exists) {
	            $bean->$link->add($account_id);
            } else {
            }
		}
		
		if (self::$contact_in_workflow == 0) {
			//$GLOBALS['log']->fatal("contact_in_workflow: " . self::$contact_in_workflow);
			self::$contact_in_workflow++;
			$line_items = $bean->get_line_items();
		}
    }
    
    function before_delete_method($bean, $event, $arguments){
        //return; // remove this line after finishing merge
        $linked_fields=$bean->get_linked_fields();
        $stopping_rel = array();
        $ignored_rel = array(
			'created_by_link',
			'modified_user_link',
			'assigned_user_link',
			'email_addresses_primary',
			'email_addresses',
			'emails',
			'reports_to_link',
			'direct_reports',
			'user_sync',
			'campaigns',
			'campaign_contacts',
			'prospect_lists',
			'contacts_accounts_1',
        );
        
        $individual_account = new Account();
        
        foreach ($linked_fields as $name => $value) {
            if (!in_array($name, $ignored_rel)) {
	            if ($bean->load_relationship($name)) {
	                if (count($bean->$name->getBeans()) > 0) {
	                    if ($name == 'accounts') {
	                        $accounts = $bean->$name->getBeans();
	                        foreach ($accounts as $account) {
	                            if ($account->individual_c) {
	                                $individual_account = $account;
	                                if (!$this->can_delete_account($individual_account)) {
                                        $stopping_rel[] = $name;
	                                }
	                                break;
	                            }
	                        }
	                        
	                    } else {
                            $stopping_rel[] = $name;
                        }
	                }
	            }
            }
        }
        
        if (count($stopping_rel) > 0) {
			$params = array(
				'module' => 'Contacts', // $bean->module_name,
				'action' => 'DetailView', 
				'record' => $bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT delete this record (<a href="' . $url . '">' . $bean->name . '</a>) because it is already related to other records in: ' . implode(', ', $stopping_rel));
			SugarApplication::redirect($url);
        }
    }
    
    function can_delete_account($account) {
        
        $linked_fields=$account->get_linked_fields();
        
		/*
		echo '<pre>';
		print_r($linked_fields);
		echo '</pre>';
		die();
		*/
		
        $stopping_rel = array();
        $stopping_rel[] = "test";
        $ignored_rel = array(
			'created_by_link',
			'modified_user_link',
			'assigned_user_link',
			'email_addresses_primary',
			'email_addresses',
			'members',
			'member_of',
			'prospect_lists',
			'campaign_accounts',
			'contact_accounts_1',
        );
        
        foreach ($linked_fields as $name => $value) {
            if (!in_array($name, $ignored_rel)) {
	            if ($account->load_relationship($name)) {
	                if (count($account->$name->getBeans()) > 0) {
	                    if ($name == 'contacts') {
	                        if ($account->individual_c && count($account->$name->getBeans()) == 1) {
	                        } else {
	                            return false;
	                        }
	                        
	                    } else {
	                        return false;
	                    }
	                }
	            }
            }
        }
        return true;
    }    
    
    function get_individual_account($contact) {
    
		$link = 'accounts';
		if ($contact->load_relationship($link)) {
			$collection = $contact->$name->getBeans();
			foreach ($collection as $item) {
				if ($item->individual_c) {
					return $item;
				}
			}
		}
		return;
    }
    
}
?>