<?php

/*
This is an Controller file, which extends the Meeting's module with 3 new actions.
*/

class MeetingsController extends SugarController{

    /*
    This action imports the beneficiaries from lineitems that are related to this meeting's parent product.
    - If product is free (price = 0), it imports beneficiaries of: Active, Suspended, Interested_Hot, Interested_Warm, Interested_Cold line items.
    - If product is not free (price > 0), it imports beneficiaries of: Active, Suspended line items.
    */
    function action_import_contacts_from_product() {
        $product_id = $this->bean->gi_products_meetings_1gi_products_ida;
        if ($product_id != '') {
            $product = new GI_Products();
            $product->retrieve($product_id);
            $collection = $product->get_line_items();
			foreach ($collection as $item) {
				if ($product->price > 0) {
					if (in_array($item->status_c, array('Active','Suspended'))) {
						$contacts = $item->get_contacts();
						if (count($contacts) > 0) {
							$contact = current($contacts);
							$this->bean->contacts->add($contact->id);
						}
					}
				} else {
					if (in_array($item->status_c, array('Active','Suspended','Interested_Hot','Interested_Warm','Interested_Cold'))) {
						$contacts = $item->get_contacts();
						if (count($contacts) > 0) {
							$contact = current($contacts);
							$this->bean->contacts->add($contact->id);
						}
					}
				}
			}
			
			$params = array(
				'module'=> 'Meetings',
				'action'=>'DetailView', 
				'record' => $this->bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::redirect($url);

		}        
    }
    
    /*
    This action imports the beneficiaries from lineitems that are related to this meeting's parent product, and marks them as "Attended".
    - If product is free (price = 0), it imports beneficiaries of: Active, Suspended, Interested_Hot, Interested_Warm, Interested_Cold line items.
    - If product is not free (price > 0), it imports beneficiaries of: Active, Suspended line items.
    */
    function action_import_contacts_from_product_as_attended() {
        $product_id = $this->bean->gi_products_meetings_1gi_products_ida;
        if ($product_id != '') {
            $product = new GI_Products();
            $product->retrieve($product_id);
            $collection = $product->get_line_items();
			foreach ($collection as $item) {
				if ($product->price > 0) {
					if (in_array($item->status_c, array('Active','Suspended'))) {
						$contacts = $item->get_contacts();
						if (count($contacts) > 0) {
							$contact = current($contacts);
							//$this->bean->contacts->add($contact->id);
							$this->bean->set_accept_status($contact, 'attended');
						}
					}
				} else {
					if (in_array($item->status_c, array('Active','Suspended','Interested_Hot','Interested_Warm','Interested_Cold'))) {
						$contacts = $item->get_contacts();
						if (count($contacts) > 0) {
							$contact = current($contacts);
							//$this->bean->contacts->add($contact->id);
							$this->bean->set_accept_status($contact, 'attended');
						}
					}
				}
			}
			
			$params = array(
				'module'=> 'Meetings',
				'action'=>'DetailView', 
				'record' => $this->bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::redirect($url);

		}        
    }
    
    /*
    This action imports the contacts from targetlists that are related to this meeting.
    */
    function action_import_contacts_from_target_lists() {
        $target_lists = $this->bean->get_linked_beans('meetings_prospectlists_1', 'ProspectList');
		foreach ($target_lists as $list) {
			$contacts = $list->get_linked_beans('contacts', 'Contact');
			foreach ($contacts as $contact) {
				$this->bean->contacts->add($contact->id);
			}
		}
			
		$params = array(
			'module'=> 'Meetings',
			'action'=>'DetailView', 
			'record' => $this->bean->id,
		);
		$url = 'index.php?' . http_build_query($params);
		SugarApplication::redirect($url);
		
    }
    
}

?>