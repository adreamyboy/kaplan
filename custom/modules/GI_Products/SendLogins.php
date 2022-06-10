<?php

/*
This action sends the username/password to all "Active" students, who have not received their login details yet.
*/

$bean = $this->bean;

// Ensure the product has "e-Learning" enabled.
// TO-DO: This condition may need to be deleted, as login details are also used for Mobile App (attendance, tickets, feedback, profiles).
if ($bean->has_elearning_c == 1) {
    
    // Iterate over every "Active" line item in this product.
    // TO-DO: We may need to also include "Suspended" line items, as login details are also used for Mobile App (attendance, tickets, feedback, profiles).
    $line_items = $bean->get_line_items();
    foreach ($line_items as $line_item) {
        if (in_array($line_item->status_c, array('Active'))) {
            // If a "beneficiary" has not received login details, send it to him/her immediately.
            $contacts = $line_item->get_contacts();
            if (count($contacts) > 0) {
                $delegate = current($contacts);
                if ($delegate->email1 != '' && ($delegate->username_c == '' || $delegate->password_c == '')) {
                    $delegate->generate_new_password_c = 1;
                    $delegate->send_login_immediately_c = 1;
                    $delegate->save();
                }
            }
        }
    }
    
// Show an error message on front-end screen to user, asking him to enable "e-Learning" for this product.
} else {
    SugarApplication::appendErrorMessage('You can NOT send the e-Leaning logins to the students in (<a href="' . $url . '">' . $bean->name . '</a>) because e-Learning is NOT enabled in this product yet.  Please contact the System Administrator.');
}

// Redirect user to the product's DetailView.
$queryParams = array(
    'module' => 'GI_Products',
    'action' => 'DetailView',
    'record' => $bean->id,
);
SugarApplication::redirect('index.php?' . http_build_query($queryParams));

?>