<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Products {
    
    private static $product_status;
    
    function after_relationship_add_method($bean, $event, $arguments) {
        $link = $arguments['link'];
		if (in_array($link, array('gi_locations_gi_products_1', 'gi_terms_gi_products_1', 'gi_products_catalog_gi_products_1'))) {
			$bean->save();
		}
    }
    
    function after_relationship_delete_method($bean, $event, $arguments) {
        $link = $arguments['link'];
		if (in_array($link, array('gi_locations_gi_products_1', 'gi_terms_gi_products_1', 'gi_products_catalog_gi_products_1'))) {
			$bean->save();
		}
    }
    
    function before_save_method($bean, $event, $arguments) {
        self::$product_status = $bean->fetched_row['status_c'];
        updateProduct($bean);
    }
    
    function after_save_method($bean, $event, $arguments) {
		
		// For Custom / IHT product, (if an opportunity_id is provided) create a new line item automatically.
		if ($bean->add_line_item_to_opp_id_c != '') {
			
			// retrieve the targeted opportunity
			$opportunity = new Opportunity();
			$opportunity->retrieve($bean->add_line_item_to_opp_id_c);
			
			// remove the opportunity_id from the product, to make sure that only 1 line item gets created.
			$bean->add_line_item_to_opp_id_c = '';
			
			// make sure that the opportunity_id is valid.
			if ($opportunity->id != '') {
				
				$iht_line_item = new GI_Line_Items();
				$iht_line_item->opportunities_gi_line_items_1opportunities_ida = $opportunity->id;
				$iht_line_item->gi_products_gi_line_items_1gi_products_ida = $bean->id;
				$iht_line_item->unit_price = $bean->price;
				$iht_line_item->currency_id = $bean->currency_id;
				$iht_line_item->status_c = 'Interested_Warm';
				
				$iht_line_item->save();
			}
		}
		
		if (self::$product_status != $bean->status_c) {
			$line_items = $bean->get_line_items();
			foreach ($line_items as $line_item) {
				$line_item->save();
			}
			self::$product_status = $bean->status_c;
		}
    }
    
    function before_delete_method($bean, $event, $arguments) {
		if (count($bean->get_line_items()) > 0 || count($bean->get_sessions()) > 0) {
            $bean->deleted = 0;
			$params = array(
				'module'=> 'GI_Products',
				'action'=>'DetailView', 
				'record' => $bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT delete this record (<a href="' . $url . '">' . $bean->name . '</a>) because it is already related to other records.');
			SugarApplication::redirect($url);
	    }
    }
    
}
?>