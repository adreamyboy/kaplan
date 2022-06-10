<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Line_Items {

	function after_relationship_add_method($bean, $event, $arguments) {
		$link = $arguments['link'];
		if (in_array($link, array('gi_products_gi_line_items_1', 'contacts_gi_line_items_1'))) {
		}
    }
    
    function before_relationship_delete_method($bean, $event, $arguments) {
        $link = $arguments['link'];
		if (in_array($link, array('gi_products_gi_line_items_1', 'contacts_gi_line_items_1'))) {
		}
    }
	
    function before_save_method($bean, $event, $arguments) {
		updateLineItem($bean);        
    }

    function after_save_method($bean, $event, $arguments) {
        $collection = $bean->get_opportunities();
		if (count($collection) > 0) {
            $opportunity = current($collection);
            $opportunity->save();
            
	        $collection = $bean->get_contacts();
			if (count($collection) == 0) {
		       // $collection = $opportunity->get_accounts();
		        $opportunity->load_relationship('accounts');
                $collection = $opportunity->accounts->getBeans();
		        foreach ($collection as $item) {
		            if ($item->individual_c == true) {
		                $contact = current($item->get_contacts());
			            $link = 'contacts_gi_line_items_1';
			            if ($bean->load_relationship($link)) {
							$bean->$link->add($contact->id);
			            }
			        }
		        }
		    }
        }
    }
}
?>
