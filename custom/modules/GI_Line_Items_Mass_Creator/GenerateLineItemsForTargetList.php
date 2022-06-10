<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

/*
This action is used to mass-create lineitems (and opportunities) for a selected list of Contacts, for certain Product(s), 
and will assign/distribute opportunities among certain users.
*/

// Prepare a default redirect URL.
$bean = $this->bean;
$params = array(
    'module'=> 'GI_Line_Items_Mass_Creator',
    'action'=>'DetailView', 
    'record' => $bean->id,
);
$redirect_url = 'index.php?' . http_build_query($params);


// If "Not Admin", don't allow this action.
/*
global $current_user;
if (!is_admin($current_user)) {
    SugarApplication::appendErrorMessage('You can NOT create line items for this target lists because you do NOT have Admin permissions.');
    SugarApplication::redirect($redirect_url);
}
*/

// Get the list of Products,  Contacts, and Assigned Users, in the form of arrays which has beans.
$products = $bean->get_products();
$contacts = $bean->get_contacts();
$assigned_users = $bean->get_assigned_users();


// Before continuing the process, if a "Corporate Opportunity" is selected, make sure that the selected 
// opportunity actually belongs to a "Corporate Account".
if ($bean->opportunity_id_c != '') {
    $opportunity = new Opportunity();
    $opportunity->retrieve($bean->opportunity_id_c);
    if ($opportunity->id != '') {
        $account = new Account();
        $account->retrieve($opportunity->account_id);
        if ($account->id == '' || $account->individual_c != '0') {
            $opportunity_error = 'The opportunity is NOT billed to a corporate account.';
        }
    } else {
        $opportunity_error = 'The selected opportunity does NOT really exist.';
    }
}
// If the selected opportunity doesn't exist, or if it is NOT billed to a "Corporate account", stop the process.
if ($opportunity_error != '') {
    die($opportunity_error);
    SugarApplication::appendErrorMessage($opportunity_error);
    SugarApplication::redirect($redirect_url);
}


// If all required inputs (Products, Contacts, Assignees) are provided, then continue the process.
if (count($contacts) > 0 && count($products) > 0 && count($assigned_users) > 0) {
    
    $line_items = array();
    $users = array_keys($assigned_users);
    
    // Create an "multi-dimentional" array which holds unique combintations of existing lineitems: product_id, contact_id, line_item_id.
    // This array will be used to ensure that the process does NOT create duplicate lineitems if they already exist 
    // (when "create_line_item_if_exists_c" is unchecked).
    $link = 'gi_products_gi_line_items_1';
    // Iterate over all retrieved products & their line items, to create the array.
    foreach ($products as $product) {
        if ($product->load_relationship($link)) {
            $collection = $product->$link->getBeans();
            foreach ($collection as $line_item) {
                $line_items[$product->id][$line_item->contacts_gi_line_items_1contacts_ida] = $line_item->id;
            }
        }
    }
    
    /*
    echo 'ddd';
    echo '<pre>';
    print_r($line_items);
    echo '</pre>';
    die();
    */
    
    // Iterate over all the retrieved contacts...
    $i = 0;
    foreach ($contacts as $contact) {
        
        // If this mass-creation is for "Individuals" (i.e. no "Corporate Opportunity" is selected), set opportunity to null by default.
        if ($bean->opportunity_id_c == '') {
            unset($opportunity);
        }
        
        // Iterate over all the retrieved products for each contact...
        foreach ($products as $product) {
            
            // If we don't care about having duplicate lineitem for the contact OR if a duplicate lineitem doesn't already exist, proceed...
            if ($bean->create_line_item_if_exists_c == 1 || !array_key_exists($contact->id, $line_items[$product->id])) {
                
                // If there is no Opportunity bean created yet for this contact (when we're still creating the first lineitem for contact),
                // create a new opportunity & add a "Note".
                if (!isset($opportunity)) {
                    $i++;
                    $user_no = ($i % count($users));
                    
                    // Create a new opportunity
                    $individual_account = $contact->get_individual_account();
                    $opportunity = new Opportunity();
                    $opportunity->account_id = $individual_account->id;
                    $opportunity->campaign_id = $bean->campaign_id_c;
                    $opportunity->description = $bean->description;
                    $opportunity->assigned_user_id = $users[$user_no];
                    $opportunity->mass_created_c = 1;
                    $opportunity->save();
                    $opportunity->retrieve($opportunity->id);
                    
                    // Create a new "Note" under this opportunity
                    $note = new Note();
                    $note->name = "Opportunity and line items created by mass-upload.";
                    $note->parent_type = 'Opportunities';
                    $note->parent_id = $opportunity->id;
                    $note->parent_name = $opportunity->name;
                    $note->contact_id = $contact->id;
                    $note->contact_name = $contact->name;
                    $note->description = "Opportunity and its line items were created by a mass-upload action.";
                    $note->save();
                }
                
                // Create new line items under this opportunity (for the "Contact" & "Product" being iterated), 
                // and apply the manually requested discounts.
                $line_item = new GI_Line_Items();
                $line_item->opportunities_gi_line_items_1opportunities_ida = $opportunity->id;
                $line_item->gi_products_gi_line_items_1gi_products_ida = $product->id;
                $line_item->contacts_gi_line_items_1contacts_ida = $contact->id;
                if ($bean->unit_price_zero_c == 1) {
                    $line_item->unit_price = '0';
                } else {
                    $line_item->unit_price = $product->price;
                }
                if ($bean->auto_discount_c != 1) {
                    $line_item->discount_type_c = $bean->discount_type_c;
                    $line_item->discount_ratio_c = $bean->discount_ratio_c;
                }
                $line_item->save();
                
                // Log a "message" to be shown on front-end once the process is completed.
                $params = array(
                    'module'=> 'GI_Line_Items',
                    'action'=>'DetailView', 
                    'record' => $line_item->id,
                );
                $url = 'index.php?' . http_build_query($params);
                SugarApplication::appendErrorMessage("<a href='{$url}'>{$contact->name} -- {$product->name} -- {$users[$user_no]} -- {$line_item->name}</a>");
            }
        }
        
        // By now, all line items are created successfully in the opportunity for the "Contact" being iterated.
        // If "auto_discount_c" is checked, auto-calculate discounts on lineitems.
        if (isset($opportunity)) {
            if ($bean->auto_discount_c == 1) {
                $opportunity->auto_discount_c = $bean->auto_discount_c;
            }
            $opportunity->save();
        }
    
    }
    
// If there are no (Products, Contacts, or Assignees) selected, show an error message to front-end and stop the process before it even starts.
} else {
    SugarApplication::appendErrorMessage('Line items were NOT created.  Make sure that you have selected (at least) 1 assigned user, 1 product, and 1 target list.');
}

SugarApplication::redirect($redirect_url);

?>