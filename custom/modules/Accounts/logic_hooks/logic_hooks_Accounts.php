<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Accounts {

    function after_relationship_add_method($bean, $event, $arguments) {
        //return; // remove this line after finishing merge
        
        $related_module = $arguments['related_module'];
        $related_id = $arguments['related_id'];
        $link = $arguments['link'];
        
        //if ($related_module == "Contacts") {
        if ($link == "contacts") {
	        if ($bean->load_relationship($link)) {
				$contacts = $bean->$link->getBeans();
				if (count($contacts) > 1) {
					$bean->individual_c = false;
					$bean->save();
				}
	        }
	    }
		
        if ($link == "contacts_accounts_1") {
	        if ($bean->load_relationship("contacts")) {
				$bean->contacts->add($related_id);
	        }
	    }
    }
    
    function after_relationship_delete_method($bean, $event, $arguments) {
        //return; // remove this line after finishing merge
        $related_module = $arguments['related_module'];
        $related_id = $arguments['related_id'];
        $link = $arguments['link'];
        
        if ($bean->individual_c) {
	        //if ($related_module == "Contacts") {
			if ($link == "contacts") {
				$bean->deleted = 1;
				$bean->save();
		    }
		}
		
        // if a Contact is removed from an account, and that Contact was the Primary one, remove that primary contact & leave the account without a Primary Contact.
		if ($link == "contacts") {
	        if ($bean->load_relationship("contacts_accounts_1")) {
				$bean->contacts_accounts_1->delete($bean->id, $related_id);
	        }
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
			'members',
			'member_of',
			'prospect_lists',
			'campaign_accounts',
			'contacts_accounts_1',
        );
        
        $contact = new Contact();
        
        foreach ($linked_fields as $name => $value) {
            if (!in_array($name, $ignored_rel)) {
	            if ($bean->load_relationship($name)) {
	                if (count($bean->$name->getBeans()) > 0) {
	                    if ($name == 'contacts') {
	                        if ($bean->individual_c && count($bean->$name->getBeans()) == 1) {
	                            $contact = current($bean->$name->getBeans());
	                        } else {
	                            $stopping_rel[] = $name;
	                        }
	                        
	                    } else {
	                        $stopping_rel[] = $name;
	                    }
	                }
	            }
            }
        }
        
        global $current_user;
        if (count($stopping_rel) > 0 && !is_admin($current_user)) {
			$params = array(
				'module' => 'Accounts', // $bean->module_name,
				'action' => 'DetailView', 
				'record' => $bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT delete this record (<a href="' . $url . '">' . $bean->name . '</a>) because it is already related to other records in: ' . implode(', ', $stopping_rel));
			SugarApplication::redirect($url);
			
        } else {
            if ($bean->individual_c) {
				$contact->deleted = 1;
				$contact->save();
            }
        }
    }
    
}
?>