<?php

/*
This file contains all the functions used to perform server-side pre-defined verification on records being saved, to ensure that data are logically correct (before they get saved).

The functions here are mostly called by the "Logic Hooks" of the used modules (Contacts, Accounts, Discounts, Opportunities, Products).

We've used many "flag" fields in records to initiate perform certain actions when a record is saved. For example:
- In "Contact", we have "generate_new_password_c" field. If "true", CRM will generate a password, then it will re-set this field to "false".
- In "Lead", we have "send_email_verification_link_c" field. If "true", CRM will send a verification email to customer, then it will re-set this field to "false".
- In "Opportunity", we have "send_invoice_via_email_c" field. If "true", CRM will send an Invoice/Quote email to customer, then it will re-set this field to "false".
- In "Payment", we have "send_payment_via_email_c" field. If "true", CRM will send a Receipt email to customer, then it will re-set this field to "false".

It also has few "supporting" functions to format variables/arrays.

It also has few functions used to control the integration between CRM and Moodle.

It also has functions to send email messages to customers.
*/


/**************************************/
/******* SERVER-SIDE VALIDATION *******/
/**************************************/

/*
Use: It updates the contact's record based on some pre-defined server validation.  It is usually called before the contact is saved.
Inputs: $contact - the bean of the Contact to be updated.
Outputs: No returned data
*/
function updateContact($contact) {
    // Remove spaces from around "first & last name".
    $contact->last_name = trim($contact->last_name);
    $contact->first_name = trim($contact->first_name);
    
    // If "first name" is blank, set it the same as "last name".
    if ($contact->first_name == '') {
        $contact->first_name = trim($contact->last_name);
    }
    
    // Update the "name" field.
    $contact->name = trim($contact->first_name . ' ' . $contact->last_name);
    
    // Set email address to lowercase.
    $contact->email1 = trim(strtolower($contact->email1)); // This is important because 'username' must be in LOWERCASE...
    
    // If the contact is new (i.e. "id" is blank), set an "id" for it (before it is saved).
    $contact->id = ($contact->id == '') ? create_guid() : $contact->id;
    
    // Generate new password (if requested).
    generateNewPassword($contact);
    
    // Send login details to contact (if requested).
    sendContactLogin($contact);
    
    // Send "Reset Password" email to contact (if requested).
    sendContactPasswordReset($contact);
}


/*
Use: It updates the discount's record based on some pre-defined server validation.  It is usually called before a discount is saved.
Inputs: $discount - the bean of the Discount to be updated.
Outputs: No returned data
*/
function updateDiscount($discount) {
    // Set the "Rate" field properly, in the form of "30" (if type is "Amount"), or in the form of "30%" (if type is "Percentage").
    if ($discount->ratio_type_c == 'Amount') {
        $discount->rate_c = $discount->ratio_c;
    } else {
        $discount->rate_c = $discount->ratio_c . '%';
    }
}


/*
Use: It updates the lead's record based on some pre-defined server validation.  It is usually called before a lead is saved.
Inputs: $lead - the bean of the Lead to be updated.
Outputs: No returned data
*/
function updateLead($lead) {
    
    // Auto-change the status of an existing lead, from "New" to "Assigned" when the assignee is changed.
    $web_user_id = '53a77649-1254-10b1-f46c-53e9c1579b22';
    if (
        $lead->fetched_row['status'] == 'New' &&
        $lead->status == 'New' &&
        $lead->fetched_row['assigned_user_id'] != "" &&
        $lead->fetched_row['assigned_user_id'] != $lead->assigned_user_id &&
        $lead->assigned_user_id != '' &&
        $lead->assigned_user_id != $web_user_id
        )
    {
        $lead->status = 'Assigned';
    }
    
    // Check if we need to send the "email-address" verification to the custmoer(to, later on, send the lead auto-conversion email).
    if ($lead->send_email_verification_link_c == 1 && 
        $lead->contact_id == '')
    {
        // Send email to student...
        $email_template_id = 'bea32727-1004-03f1-d042-5522777c851c';
        sendLeadEmailVerificationLinkViaEmail($lead, $email_template_id);
        
        // Update the lead's fields
        $lead->email_verification_date_sent_c = $GLOBALS['timedate']->nowDb();
            
        // Reset "initiating" fields.
        $lead->send_email_verification_link_c = 0;
    }
    
    // Check if we need to send the "Coupon" to the customer when the lead is saved.
    if ($lead->send_coupon_via_email_c == 1) {
        $email_template_id = '64863173-4bb0-1b7b-b1b2-5836a2519394';
        sendCouponCodeOnEmailVerification($lead, $email_template_id);
        $lead->send_coupon_via_email_c = 0;
    }
}


/*
Use: It updates the opportunity's record based on some pre-defined server validation.  It is usually called before the opportunity is saved.
Inputs: $opportunity - the bean of the Opportunity to be updated.
Outputs: No returned data
*/
function updateOpportunity($opportunity) {
    // TO-DO: If currency is different, the calculations will be wrong.
    //echo $opportunity->reference_c; die;
    $has_payment = false;
    $has_free_line_item = false;
    $has_payable_line_item = false;
    $has_elearning = false;
    
    // Calculate discounts, if "auto_discount_c" is checked, then uncheck it.
    if ($opportunity->auto_discount_c == 1) {
		//echo"Yes";
        calculateDiscounts($opportunity);//die;
        $opportunity->auto_discount_c = 0;
    }
    
    // Update: name
    $opportunity->name = 'IN-' . sprintf('%08d', $opportunity->reference_c);
    
    // Update: amount_before & discount & amount_after & cash_flow
    $amount = 0;
    $total_before_discounts = 0;
    $total_discounts = 0;
    $total_before_vat = 0;
    $total_vat_amount = 0;
   // $collection = $opportunity->get_line_items();
    $opportunity->load_relationship('opportunities_gi_line_items_1');
  $collection = $opportunity->opportunities_gi_line_items_1->getBeans();
   // print_r($collection);die;
    if (count($collection) > 0) {
        foreach ($collection as $item) {
            $product = new GI_Products();
            $product->retrieve($item->gi_products_gi_line_items_1gi_products_ida);
            if($product->has_elearning_c == 1) {
                $has_elearning = true;
            }
            if (0 == $item->unit_price) {
                $has_free_line_item = true;
            } else {
                $has_payable_line_item = true;
            }
            //if (!$item->excluded_from_invoice_c) {
            if ($item->status_c != 'Cancelled') {
                $amount += $item->total_price_net;
                $total_before_discounts += $item->total_price;
                $total_discounts += $item->total_discount;
                $total_before_vat += $item->total_before_vat_c;
                $total_vat_amount += $item->vat_amount_c;
            }
        }
    }
    $opportunity->amount                   = $amount;
    $opportunity->total_before_discounts_c = $total_before_discounts;
    $opportunity->total_discounts_c        = $total_discounts;
    $opportunity->total_before_vat_c       = $total_before_vat;
    $opportunity->total_vat_amount_c       = $total_vat_amount;
    $opportunity->cash_flow_c              = $amount;
    
    // Update: payments & allocations & refunds & unpaid
    $total_payments               = 0;
    $total_installments           = 0;
    $total_promises               = 0;
    $total_creditnote_allocations = 0;
    $total_refunds                = 0;
    //$collection = $opportunity->get_payments();
    $opportunity->load_relationship('opportunities_gi_payments_1');
    $collection = $opportunity->opportunities_gi_payments_1->getBeans();
    if (count($collection) > 0) {
        $has_payment = true;
        foreach ($collection as $item) {
            switch ($item->type) {
                case 'Receipt':
                    $total_payments += $item->amount;
                    break;
                case 'Installment':
                    $total_installments += $item->amount;
                    break;
                case 'Promise':
                    $total_promises += $item->amount;
                    break;
                case 'Refund':
                    $total_refunds += $item->amount;
                    break;
                case 'Credit_Note_Allocation':
                    $total_creditnote_allocations += $item->amount;
                    break;
            }
        }
    }
    $opportunity->total_payments_c               = $total_payments;
    $opportunity->total_installments_c           = $total_installments;
    $opportunity->total_promises_c               = $total_promises;
    $opportunity->total_refunds_c                = $total_refunds;
    $opportunity->total_creditnote_allocations_c = $total_creditnote_allocations;
    $opportunity->total_unpaid_c = $opportunity->amount - $opportunity->total_payments_c - $opportunity->total_creditnote_allocations_c + $opportunity->total_refunds_c;
    
    // Update: terms_and_conditions_id_c
    if ($opportunity->status_c == 'Opportunity') {
        // if opportunity is still in "Opportunity" status, get the latest effective "T&C" record, and re-link the opportunity to this T&C.
       // $tnc = $opportunity->get_last_active_tnc();
       // $opportunity->gi_terms_and_conditions_id_c = $tnc->id;
        global $db;
       $tncSql = "select id_c from gi_terms_and_conditions_cstm where active_c = 1 ";
       $tncRes = $db->query($tncSql);
	   $row = $db->fetchByAssoc($tncRes);
	   $tncId = $row['id_c'];
       $opportunity->gi_terms_and_conditions_id_c = $tncId;
    }
    
    // Update: sales_stage & probability
    global $timedate;
   /* $sales_stage_temp = $opportunity->sales_stage;
    if (count($collection) > 0 && $opportunity->total_unpaid_c == 0 && $opportunity->amount == 0 && ($total_payments + $total_installments + $total_promises + $total_creditnote_allocations - $total_refunds == 0) && $sales_stage_temp != 'Open') {
   //     echo"1";
        $opportunity->sales_stage = 'Closed Lost';
        $opportunity->probability = 0;
    }
    if ($opportunity->total_unpaid_c != 0 || $opportunity->amount > 0) {
     //    echo"2";
        $opportunity->sales_stage = 'Closed Won';
        $opportunity->probability = 100;
    }
    if (count($collection) == 0 && $opportunity->sales_stage == 'Closed Won') {
       // echo"3";
        $opportunity->sales_stage = 'Open';
        $opportunity->probability = 50;
    }*/
    
    // Update: date_closed
    if ($opportunity->sales_stage == 'Closed Won') {
        if ($opportunity->date_closed == '') {
            if (count($collection) > 0) {
                $payments_dates = array();
                foreach ($collection as $item) {
                    if ( $timedate->check_matching_format($item->date_paid, 'Y-m-d') ) {
                        $payments_dates[] = $item->date_paid;
                    } else {
                        $payments_dates[] = $timedate->to_db_date($item->date_paid, false);
                    }
                }
                // NOTE: array 'payments_dates' must store values as format 2014-06-23... otherwise, min & max will not work.
                $min = min($payments_dates);
                $opportunity->date_closed = $min;
            }
        }
    } else {
        // below line is commented to ensure "date_closed" doesn't change automatically (regardless of payments, lineitems, opp status, sales stage).
        //$opportunity->date_closed = '';
    }
    
    // Update: reason_of_loss
    if ($opportunity->sales_stage != 'Closed Lost') {
        $opportunity->reason_of_loss_c = '';
    }
    
    // Update: status
    $opportunity->status_c = 'Opportunity';
    if ($opportunity->sales_stage == 'Closed Won') {
        if ($opportunity->total_unpaid_c == 0) {
            $opportunity->status_c = 'Invoice_Paid';
        } elseif ($opportunity->total_unpaid_c < 0) {
            $opportunity->status_c = 'Invoice_Overpaid';
        } else {
            $opportunity->status_c = 'Invoice_Unpaid';
        }
    }
    
    // Update: 
    //     - first completed activity date (first_activity_date_c)
    //     - first completed activity type (first_activity_type_c)
    //     - last completed activity date (last_activity_date_c)
    //     - last completed activity type (last_activity_type_c)
    //     - next step date (next_step_date_c)
    //     - next step type (next_step_type_c)
    //     - next step subject (next_step)
    //     - no of completed activities (no_of_completed_activities)
    //     - no of not-held activities (no_of_not_held_activities)
    //     - no of completed interactions (no_of_completed_interactions)
    $opportunity->first_activity_date_c = '';
    $opportunity->first_activity_c = '';
    $opportunity->last_activity_date_c = '';
    $opportunity->last_activity_c = '';
    $opportunity->last_interaction_date_c = '';
    $opportunity->last_interaction_c = '';
    $opportunity->next_step_date_c = '';
    $opportunity->next_step = '';
    $opportunity->no_of_completed_activities_c = 0;
    $opportunity->no_of_not_held_activities_c = 0;
    $opportunity->no_of_completed_interactions_c = 0;
    
    // Create an array of 4 elements (Call, Task, Meetint, Email), and each element will hold all the opportunity's activites for each activity type.
   // $activities['Call'] = $opportunity->get_calls();
    $opportunity->load_relationship('calls');
    $activities['Call'] = $opportunity->calls->getBeans();
  //  $activities['Task'] = $opportunity->get_tasks();  // NOTE: SMS is already saved as "Task" record.
    $opportunity->load_relationship('tasks');
    $activities['Task'] = $opportunity->tasks->getBeans();
  
  //  $activities['Meeting'] = $opportunity->get_meetings();
    $opportunity->load_relationship('meetings');
    $activities['Meeting'] = $opportunity->meetings->getBeans();
    
  //  $activities['Email'] = $opportunity->get_emails();
    $opportunity->load_relationship('emails');
    $activities['Email'] = $opportunity->emails->getBeans();
    
    // Iterate over each of the 4 activity types.
    foreach ($activities as $key => $set) {
        // set the "date_end_field", depending on the activity type being checked.
        switch ($key) {
            case "Call":
                $date_end_field = 'date_end';
                break;
            case "Meeting":
                $date_end_field = 'date_end';
                break;
            case "Email":
                $date_end_field = 'date_sent';
                break;
            case "Task":
                $date_end_field = 'date_due';
                break;
        }
        
        // Iterate over each activity in the actities-type/set.
        foreach ($set as $activity) {
            if ( $timedate->check_matching_format($opportunity->first_activity_date_c, 'Y-m-d H:i:s') ) {
                $first_date = $opportunity->first_activity_date_c;
            } else {
                $first_date = $timedate->to_db($opportunity->first_activity_date_c);
            }
            
            if ( $timedate->check_matching_format($opportunity->last_activity_date_c, 'Y-m-d H:i:s') ) {
                $last_date = $opportunity->last_activity_date_c;
            } else {
                $last_date = $timedate->to_db($opportunity->last_activity_date_c);
            }
            
            if ( $timedate->check_matching_format($opportunity->next_step_date_c, 'Y-m-d H:i:s') ) {
                $next_date = $opportunity->next_step_date_c;
            } else {
                $next_date = $timedate->to_db($opportunity->next_step_date_c);
            }
            
            if ( $timedate->check_matching_format($activity->$date_end_field, 'Y-m-d H:i:s') ) {
                $activity_date = $activity->$date_end_field;
            } else {
                $activity_date = $timedate->to_db($activity->$date_end_field);
            }
            
            if ( (in_array($activity->status, array('Held', 'Completed'))) || (in_array($activity->status, array('sent', 'archived')) && $activity->type == 'out') ) {
                // Set "First Activity" & "First Activity Date".
                if ($opportunity->first_activity_date_c == '' || strtotime($first_date) > strtotime($activity_date)) {
                    $opportunity->first_activity_date_c = $activity_date;
                    $opportunity->first_activity_c = $key . ': ' . $activity->name;
                }
                // Set "Last Activity" & "Last Activity Date".
                if ($opportunity->last_activity_date_c == '' || strtotime($last_date) < strtotime($activity_date)) {
                    $opportunity->last_activity_date_c = $activity_date;
                    $opportunity->last_activity_c = $key . ': ' . $activity->name;
                }
                if (in_array($key, array('Call', 'Meeting'))) {
                    // Set "No. of Completed Interactions".
                    $opportunity->no_of_completed_interactions_c = $opportunity->no_of_completed_interactions_c + 1;
                    // Set "Last Interaction" & "Last Interaction Date".
                    if ($opportunity->last_interaction_date_c == '' || strtotime($last_date) < strtotime($activity_date)) {
                        $opportunity->last_interaction_date_c = $activity_date;
                        $opportunity->last_interaction_c = $key . ': ' . $activity->name;
                    }
                }
                // Set "No. of Completed Activities".
                $opportunity->no_of_completed_activities_c = $opportunity->no_of_completed_activities_c + 1;
                
            } elseif (in_array($activity->status, array('Planned', 'Tentative', 'Not Started', 'In Progress', 'Pending Input', 'Deferred'))) {
                // Set "Next Step" & "Next Step Date".
                if ($opportunity->next_step_date_c == '' || strtotime($next_date) > strtotime($activity_date)) {
                    $opportunity->next_step_date_c = $activity_date;
                    $opportunity->next_step = $key . ': ' . $activity->name;
                }
                
            } elseif ($activity->status == 'Not Held') {
                // Set "No. of Not-Held Activites".
                $opportunity->no_of_not_held_activities_c = $opportunity->no_of_not_held_activities_c + 1;
                
            }
        }
    }
    
    // Send invoice via email (if requested)
    if ($opportunity->send_invoice_via_email_c == 1) {
        if ($has_payable_line_item) {
            $email_template_id = '46fec0f8-c1f6-95a0-2796-55229a8f6987';
           // $email_template_id = '2af303f5-7555-8a4d-998f-54b2d2497b98';
            sendInvoiceViaEmail($opportunity, $email_template_id);
        }
        $opportunity->send_invoice_via_email_c = 0;
    }
   // die;
}


/*
Use: It updates the CreditNote's record based on some pre-defined server validation.  It is usually called before the creditnote is saved.
Inputs: $credit_note - the bean of the CreditNote to be updated.
Outputs: No returned data
*/
function updateCreditNote($credit_note) {
    
    // Update 'totals' of credit notes
    $amount = toNumber($credit_note->amount_c);
    $amount_allocated = 0;
    $amount_refunded = 0;
    $collection = $credit_note->get_payments();
    if (count($collection) > 0) {
        foreach($collection as $item) {
            if ($item->type == 'Credit_Note_Allocation') {
                $amount_allocated += $item->amount;
            } elseif ($item->type == 'Refund') {
                $amount_refunded += $item->amount;
            }
        }
    }
    $credit_note->amount_allocated_c = $amount_allocated;
    $credit_note->amount_refunded_c = $amount_refunded;
    $credit_note->amount_unallocated_c = $amount - ($amount_allocated + $amount_refunded);
    
    // Update 'Cash Flow' of credit note.
    $credit_note->cash_flow_c = $amount * -1;
    
    // Update 'Status' of credit note.
    if ($credit_note->amount_unallocated_c == 0) {
        $credit_note->status_c = 'Allocated';
    } elseif ($credit_note->amount_unallocated_c < 0) {
        $credit_note->status_c = 'Over_Allocated';
    } else {
        $credit_note->status_c = 'Not_Allocated';
    }
}


/*
Use: It updates the Product's record based on some pre-defined server validation.  It is usually called before the product is saved.
Inputs: $credit_note - the bean of the Product to be updated.
Outputs: No returned data
*/
function updateProduct($product) {
    
    // Update: 'Product Name'
    // It will simply create an array which holds "Catalog Name", "Term Name", "Location Name", and "Batch".  Then, it will combine them separated by " - ".
    $product->name = '';
    $product_name = array();
    if ($product->gi_products_catalog_gi_products_1_name != '') {
        $product_name[] = $product->gi_products_catalog_gi_products_1_name;
    }
    if ($product->gi_terms_gi_products_1_name != '') {
        $product_name[] = $product->gi_terms_gi_products_1_name;
    }
    if ($product->gi_locations_gi_products_1_name != '') {
        $product_name[] = $product->gi_locations_gi_products_1_name;
    }
    if ($product->batch_c != '') {
        $product_name[] = $product->batch_c;
    }
    $product->name = implode(' - ', $product_name);
    
    // Update: 'Product Code'
    // It will simply create an array which holds "Catalog Code", "Term Code", "Location Code", and "Batch".  Then, it will combine them separated by "-".
    $product->code_c = '';
    $product_code = array();
    $catalog_id = $product->gi_products_catalog_gi_products_1gi_products_catalog_ida;
    if ($catalog_id != '') {
        $catalog = new GI_Products_Catalog();
        $catalog->retrieve($catalog_id);
        $product_code[] = $catalog->code_c;
    }        
    $term_id = $product->gi_terms_gi_products_1gi_terms_ida;
    if ($term_id != '') {
        $term = new GI_Terms();
        $term->retrieve($term_id);
        $product_code[] = $term->code;
    }
    $location_id = $product->gi_locations_gi_products_1gi_locations_ida;
    if ($location_id != '') {
        $location = new GI_Locations();
        $location->retrieve($location_id);
        $product_code[] = $location->code;
    }
    $batch = $product->batch_c;
    if ($batch != '') {
        $product_code[] = $batch;
    }
    $product->code = implode('-', $product_code);
    
    // Update Web Hidden
    switch ($product->status_c) {
        case 'Complete':
            $product->web_hidden = 1;
            break;
        case 'Cancelled':
            $product->web_hidden = 1;
            break;
        case 'Active':
            break;
    }
    
    // Update 'Date Start' & 'Date End' (if the service is NOT provisional)
    if (!$product->provisional_c) {
        global $timedate;
        $dates = array();
        $min = '';
        $max = '';
        $number_of_sessions = '';
        $collection = $product->get_sessions();
        if (count($collection) > 0) {
            foreach ($collection as $item) {
                if ( $timedate->check_matching_format($item->date_start, 'Y-m-d H:i:s') ) {
                    $dates[] = $item->date_start;
                } else {
                    $dates[] = $timedate->to_db($item->date_start);
                }
            }
        }
        // NOTE: array 'dates' must store values as format 2014-06-23... otherwise, min & max will not work.
        if (count($dates) > 0) {
            $min = min($dates);
            $max = max($dates);
            $unique_dates = array();
            foreach ($dates as $date) {
                $unique_date = date('Y-m-d', strtotime($date));
                $unique_dates[$unique_date] = 1;
            }
            $number_of_sessions = count($unique_dates);
        }
        $product->date_start_c = $min;
        $product->date_end_c = $max;
        $product->number_of_sessions_c = $number_of_sessions;
    }
    
    // Update Refund Expiry Date
    if ($product->type == 'Service' && $product->date_start_c != '' && $product->price > 0) {
        switch ($product->refund_expiry_terms_c) {
            case 'before_3rd_session_plus_1':
                // Sort the session dates in this product ascendingly.
                if (!$product->provisional_c) {
                    $uds = array_keys($unique_dates);
                    usort($uds, "sort_array_cmp");
                    // Get the date of the 3rd session in this product.
                    $product->date_refund_expired_c = date('Y-m-d', strtotime($uds[2] . ' +1 day'));
                } else {
                    $product->date_refund_expired_c = '';
                }
                break;
            case 'before_7_days':
                $product->date_refund_expired_c = date('Y-m-d', strtotime($product->date_start_c . ' -7 days'));
                break;
            case 'before_5_days':
                $product->date_refund_expired_c = date('Y-m-d', strtotime($product->date_start_c . ' -5 days'));
                break;
            case 'before_3_days':
                $product->date_refund_expired_c = date('Y-m-d', strtotime($product->date_start_c . ' -3 days'));
                break;
            case 'same_day':
                $product->date_refund_expired_c = $product->date_start_c;
                break;
            default:
                $product->date_refund_expired_c = '';
                break;
        }        
    } else {
        $product->refund_expiry_terms_c = '';
        $product->date_refund_expired_c = '';
    }
    
    // Update Quarter
    if ($product->date_refund_expired_c != '') {
        
        $start_year = date('Y', strtotime($product->date_start_c));
        $start_quarter = ceil(date('m', strtotime($product->date_start_c)) / 3);
        $start_month = $start_quarter * 3; //this equals to the last month of a quarter
        $refund_year = date('Y', strtotime($product->date_refund_expired_c));
        $refund_quarter = ceil(date('m', strtotime($product->date_refund_expired_c)) / 3);
        $refund_month = date('n', strtotime($product->date_refund_expired_c));
        
        if ($product->date_start_c > $product->date_refund_expired_c ||
            $start_quarter == $refund_quarter ||
            (($start_month % 12) + 1) == $refund_month
            )
        {
            $product->quarter_c = "{$start_year}-Q{$start_quarter}";
        } else {
            $product->quarter_c = "{$refund_year}-Q{$refund_quarter}";
        }
    } else {
        $product->quarter_c = '';
    }

}


/*
Use: It updates the Payment's record based on some pre-defined server validation.  It is usually called before the payment is saved.
Inputs: $payment - the bean of the Payment to be updated.
Outputs: No returned data
*/
function updatePayment($payment) {
    
    // Update: name
    $payment->name = 'PT-' . sprintf('%08d', $payment->reference_c);
    
    // Update 'Type' based on the 'Date Cleared'
    if ($payment->date_cleared != '' && in_array($payment->type, array('Installment', 'Promise'))) {
        $payment->type = 'Receipt';
    }
    
    // Update 'Mode' based on the 'Type'
    //if ($payment->type == 'Installment' || $payment->type == 'Promise') {
    if ($payment->type == 'Installment') {
        $payment->mode = 'Cheque';
    }
    
    // Update 'Date Cleared' based on the 'Mode'
    if ($payment->mode != 'Cheque' && $payment->type != 'Promise') {
        $payment->date_cleared = $payment->date_paid;
    }
    
    // Update 'Cash Flow' field
    switch ($payment->type) {
        case 'Receipt':
            $payment->cash_flow_c = $payment->amount * -1;
            break;
        case 'Installment':
            $payment->cash_flow_c = $payment->amount * -1;
            break;
        case 'Promise':
            $payment->cash_flow_c = 0;
            break;
        case 'Refund':
            $payment->cash_flow_c = $payment->amount;
            break;
        case 'Credit_Note_Allocation':
            $payment->cash_flow_c = 0;
            break;
    }
    
    // Update 'Verified' based on the 'Type'
    if ($payment->type == 'Promise') {
        $payment->verified_c = 0;
    }
    
    // Send payment details via email (if requested)
    if ($payment->send_payment_via_email_c == 1) {
        $email_template_id = '8620ac22-ea17-0f28-20f4-552b49b792ab';
        sendPaymentViaEmail($payment, $email_template_id);
        $payment->send_payment_via_email_c = 0;
    }
}


/*
Use: It updates the LineItem's record based on some pre-defined server validation.  It is usually called before the lineitem is saved.
Inputs: $line_item - the bean of the LineItem to be updated.
Outputs: No returned data
*/
function updateLineItem($line_item) {

    // Get the parent product.
    $product = new GI_Products();
    $collection = $line_item->get_products();
    if (count($collection) > 0) {
        $product = current($collection);
    }
    
    // Update: name
    $line_item->name = 'LI-' . sprintf('%08d', $line_item->reference_c);
    
    // Auto-calculate the quantity, unit price, discount, and net
    $line_item->quantity = 1;
    $line_item->total_price = $line_item->quantity * toNumber($line_item->unit_price);
    if ($line_item->discount_type_c == 'Amount') {
        $line_item->total_discount = $line_item->quantity * toNumber($line_item->discount_ratio_c);
        $line_item->discount_rate = $line_item->discount_ratio_c;
    } else {
        $line_item->total_discount = $line_item->total_price * (toNumber($line_item->discount_ratio_c) / 100);
        $line_item->discount_rate = $line_item->discount_ratio_c . '%';
    }
    
    // Auto-calculate the VAT.
    if ($product->type == 'Service') {
        $line_item->vat_c = $product->vat_c;
    } else {
        $collection = $line_item->get_opportunities();
        if (count($collection) > 0) {
            $opportunity = current($collection);
            if ($opportunity->sales_stage != 'Closed Won') {
                $line_item->vat_c = $product->vat_c;
            }
        }
    }
    
    $line_item->total_before_vat_c = $line_item->total_price - $line_item->total_discount;
    $line_item->vat_amount_c = $line_item->total_before_vat_c * $line_item->vat_c / 100;
    
    // Auto-calculate the total net price.
    $line_item->total_price_net = $line_item->total_price - $line_item->total_discount + $line_item->vat_amount_c;
    
    // Auto-set the ZERO-priced lineitems to 'Active' (if the lineitem is getting added now)..
    if ($line_item->total_price == 0 && 
        !isset($line_item->fetched_row['status_c']) && 
        in_array($line_item->status_c, array('Interested_Cold','Interested_Warm','Interested_Hot')))
    {
        $line_item->status_c = 'Active';
    }
    
    // Auto-set the Exclude from Invoice
    if ($line_item->status_c == 'Cancelled' || 
        $line_item->status_c == 'Interested_Cold' ||
        $line_item->status_c == 'Interested_Warm' ||
        $line_item->status_c == 'Interested_Hot' ||
        $line_item->status_c == 'Not_Interested' ||
        toNumber($line_item->unit_price) == 0)
    {
        $line_item->excluded_from_invoice_c = true;
    } else {
        $line_item->excluded_from_invoice_c = false;        
    }
    
    if ($product->id != '') {
        // Auto-set 'Date Shipped' to blank, if "Delivery Mode" is not selected.
        if ($line_item->delivery_mode_c == '') {
            $line_item->date_shipped_c = '';
            $line_item->date_delivered_c = '';
            //SugarApplication::appendErrorMessage("{$line_item->name} - Date Shipped & Date Delivered - changed to blank because Delivery Mode is not selected.");
        }
        
        // Auto-set 'Active' to 'Complete' when product is already complete.
        if ($product->type == 'Good' && $line_item->status_c == 'Suspended' && $line_item->date_shipped_c != '') {
            $line_item->status_c = 'Active';
            //SugarApplication::appendErrorMessage("{$line_item->name} - Status - changed to Active.");
        }
        
        // Auto-set 'Date Delivered' == 'Date Shipped', when the Mode == 'Walk_In'.
        // NOTE: 'In_Class' will not apply here, because it might be shipped to class but student is absent.
        if ($line_item->delivery_mode_c == 'Walk_In') {
            $line_item->date_delivered_c = $line_item->date_shipped_c;
            //SugarApplication::appendErrorMessage("{$line_item->name} - Date Delivered - changed to be the same as the Shipment Date.");
        }
        
        // Auto-set 'Active' to 'Complete' when product is already complete.
        if ($line_item->status_c == 'Active') {
            if ($product->status_c == 'Complete') {
                $line_item->status_c = 'Complete';
                //SugarApplication::appendErrorMessage("{$line_item->name} - Status - changed to Complete.");
            }
        }
    }
    
    // Auto-set 'Active' to 'Complete' when product is already complete.
    if ($line_item->status_c == 'Active') {
        if ($product->id != '') {
            $product = current($collection);
            if ($product->status_c == 'Complete') {
                $line_item->status_c = 'Complete';
            }
        }
    }
    
    // Create a new follow-up task (if user selected to)
    if ($line_item->create_followup_task_c == 1) {
        $collection = $line_item->get_opportunities();
        if (count($collection) > 0) {
        
            global $timedate;
            $date_due = $timedate->asDbDate($timedate->getNow()->modify("+4 days")); // 3 days later!
            $opportunity = current($collection);
            $contact = current($opportunity->get_contacts_list());
            
            $task = new Task();
            $task->name = 'Follow-up to close';
            $task->description = 'Follow up and close if interested.';
            $task->parent_type = 'Opportunities';
            $task->parent_id = $opportunity->id;
            $task->date_due = $date_due;
            $task->priority = 'Medium';
            $task->assigned_user_id = $line_item->assigned_user_id;
            $task->contact_id = $contact->id;
            $task->save();
        }
        $line_item->create_followup_task_c = 0;
    }
}


/*
Use: It calculates & applies the pre-defined discounts that can be applied on all lineitems in the opportunity.  It is usually called when "Auto-Discount" is checked in opportunity.
Inputs: $opportunity - the bean of the Opportunity where discounts needs to be applied.
Outputs: No returned data.
*/
function calculateDiscounts($opportunity) {
    
    $db = $GLOBALS['db'];
    
    if ($opportunity->auto_discount_c == 1) {
        
        $contact = current($opportunity->get_contacts_list());
        $account = new Account();
        $account->retrieve($opportunity->account_id);
        $line_items = $opportunity->get_line_items();
        $products = array();
        $catalogs = array();
        $discounts = array();
        $matrix = array();
        
        
        // Reset the discounts on all line items
        foreach ($line_items as $line_item) {
            
            $line_item_discounts = $line_item->get_discounts();
            if (count($line_item_discounts) > 0) {
                $discount = current($line_item_discounts);
                $link = 'gi_discounts_gi_line_items_1';
                if ($line_item->load_relationship($link)) {
                    $line_item->$link->delete($line_item->id, $discount->id);
                }
            }

            $line_item->discount_type_c = 'Percentage';
            $line_item->discount_ratio_c = 0;
            $discount_id = '';
            
            updateLineItem($line_item); // This update does NOT really get saved via the Bean object, but rather just to re-calculate the values
            
            $sql = "UPDATE gi_line_items
                    SET quantity = '{$line_item->quantity}', 
                        total_price = '{$line_item->total_price}',
                        total_discount = '{$line_item->total_discount}',
                        discount_rate = '{$line_item->discount_rate}',
                        total_price_net = '{$line_item->total_price_net}'
                    WHERE id = '{$line_item->id}'
                    ";
            $result = $db->query($sql);
            
            $sql = "UPDATE gi_line_items_cstm
                    SET discount_type_c = '{$line_item->discount_type_c}', 
                        discount_ratio_c = '{$line_item->discount_ratio_c}',
                        vat_c = '{$line_item->vat_c}',
                        vat_amount_c = '{$line_item->vat_amount_c}',
                        total_before_vat_c = '{$line_item->total_before_vat_c}',
                        status_c = '{$line_item->status_c}',
                        excluded_from_invoice_c = '{$line_item->excluded_from_invoice_c}'
                    WHERE id_c = '{$line_item->id}'
                    ";
            $result = $db->query($sql);
        }

        
        // Exclude line items whose status is set to 'Cancelled' or 'Not Interested'
        foreach ($line_items as $line_item) {
            if (in_array($line_item->status_c, array('Cancelled', 'Not_Interested'))) {
                unset($line_items[$line_item->id]);
            }
        }
        
        
        // DISCONTINUED, VALID FROM, EXPIRES ON, TARGETS
        foreach ($line_items as $item) {
            $product = current($item->get_products());
            $catalog = current($product->get_catalog());
            
            foreach ($product->get_discounts() as $discount) {
                if ($discount->isDiscountApplicable($account->id, $contact->id, $product)) {
                    $products[$product->id] = $product;
                    $catalogs[$catalog->id] = $catalog;
                    $discounts[$discount->id] = $discount;
                    $matrix[] = array (
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_price' => $product->price,
                        'product_date_start' => $product->date_start_c,
                        'catalog_id' => $catalog->id,
                        'discount_id' => $discount->id,
                        'discount_name' => $discount->name,
                        'is_combo' => $discount->is_combo_c,
                        'lineitem_id' => $item->id,
                        'ratio_type' => $discount->ratio_type_c,
                        'ratio' => $discount->ratio_c,
                        'rate' => $discount->rate_c,
                        //'priority' => $discount->priority_c,
                        //'mutually_exclusive' => $discount->mutually_exclusive_c,
                    );
                }
            }
            foreach ($catalog->get_discounts() as $discount) {
                if ($discount->isDiscountApplicable($account->id, $contact->id, $product)) {
                    $products[$product->id] = $product;
                    $catalogs[$catalog->id] = $catalog;
                    $discounts[$discount->id] = $discount;
                    $matrix[] = array (
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_price' => $product->price,
                        'product_date_start' => $product->date_start_c,
                        'catalog_id' => $catalog->id,
                        'discount_id' => $discount->id,
                        'discount_name' => $discount->name,
                        'is_combo' => $discount->is_combo_c,
                        'lineitem_id' => $item->id,
                        'ratio_type' => $discount->ratio_type_c,
                        'ratio' => $discount->ratio_c,
                        'rate' => $discount->rate_c,
                        //'priority' => $discount->priority_c,
                        //'mutually_exclusive' => $discount->mutually_exclusive_c,
                    );
                }
            }
        }
        
        // COMBO
        foreach ($matrix as $key=>$m) { 
            if ($m['is_combo'] == 1) {
                foreach ($discounts[$m['discount_id']]->get_products() as $p) {
                    if (!array_key_exists($p->id, $products)) {
                        unset($matrix[$key]);
                    }
                }
                foreach ($discounts[$m['discount_id']]->get_catalogs() as $c) {
                    if (!array_key_exists($c->id, $catalogs)) {
                        unset($matrix[$key]);
                    }
                }
            }
        }
        
        // Calculate & apply the discounts
        $matrix = array_unique($matrix, SORT_REGULAR);
        
        foreach ($line_items as $item) {
            
            $item->discount_type_c = 'Percentage';
            $item->discount_ratio_c = 0;
            $discount_id = '';
            
            foreach ($matrix as $m) {
                if ($item->id == $m['lineitem_id'] && $item->discount_ratio_c < $m['ratio']) {
                    
                    $item->discount_ratio_c = $m['ratio'];
                    $item->discount_type_c = $m['ratio_type'];
                    $discount_id = $m['discount_id'];
                    
                    updateLineItem($item); // This update does NOT really get saved via the Bean object, but rather just to re-calculate the values
                    
                    $sql = "UPDATE gi_line_items
                            SET quantity = '{$item->quantity}', 
                                total_price = '{$item->total_price}',
                                total_discount = '{$item->total_discount}',
                                discount_rate = '{$item->discount_rate}',
                                total_price_net = '{$item->total_price_net}'
                            WHERE id = '{$item->id}'
                            ";
                    $result = $db->query($sql);
                    
                    $sql = "UPDATE gi_line_items_cstm
                            SET discount_type_c = '{$item->discount_type_c}', 
                                discount_ratio_c = '{$item->discount_ratio_c}',
                                vat_c = '{$item->vat_c}',
                                vat_amount_c = '{$item->vat_amount_c}',
                                total_before_vat_c = '{$item->total_before_vat_c}',
                                status_c = '{$item->status_c}',
                                excluded_from_invoice_c = '{$item->excluded_from_invoice_c}'
                            WHERE id_c = '{$item->id}'
                            ";
                    $result = $db->query($sql);
                }
            }
            
            //$item->save();
            $link = 'gi_discounts_gi_line_items_1';
            if ($item->load_relationship($link)) {
                $item->$link->add($discount_id);
            }
        }
        
    }
}


/*********************************/
/******* SUPPORT FUNCTIONS *******/
/*********************************/

/*
Use: It converts Currency (with comma & decimal point) to Number.  It is used to get rid of non-numeric characters in a Currency value.
Inputs: $str - the value in Currency format (with comma & decimal point).
Outputs: a value in number format
*/
function toNumber($str) {
    return preg_replace('/([^0-9\\.])/i', '', $str);
}


/*
Use: It is used as a "user-defined comparison" function that is called by a "usort" PHP function.
Inputs: $str1, $str2 - the 2 values to be compared.
Outputs: returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal.
*/
function sort_array_cmp($str1, $str2){ 
    return strcmp($str1, $str2);
}


/*
Use: It generates a random set of characters (numbers, lowercase letters, uppercase letter, certain symbols).  The length of the string is dynamic set.
Inputs: $length - number of characters to be generated.  By default, 8 characters.
Outputs: a string value.
*/
function getRandomString($length = 8) {
    $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ#@!1234567890";
    $validCharNumber = strlen($validCharacters);
    $result = "";
    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
    return $result;
}


/*********************************************/
/******* MOODLE INTEGRATION ******************/
/*********************************************/

/*
Use: It handles the request to generate a new password for the contact.  It usually called "updateContact" function.
Inputs: $contact - the bean of the Contact to generate password.  Passed "by reference (&)" to instantly change the flag field.
Outputs: No returned data.
*/
function generateNewPassword(&$contact) {
    
    $contact->username_c = $contact->email1;
    
    if ($contact->generate_new_password_c == 1 && $contact->email1 != '' && $contact->deleted == 0) {
        
        // generate a random password
        $contact_password = getRandomString();
        
        // set the login details
        $contact->password_c = $contact_password;
        
    }
    
    // reset "initiating" fields.
    $contact->generate_new_password_c = 0;
}


/*
Use: It handles the request to send login details to the contact.  It usually called "updateContact" function.
Inputs: $contact - the bean of the Contact to send log details.  Passed "by reference (&)" to instantly change the flag field.
Outputs: No returned data.
*/
function sendContactLogin(&$contact) {
    
    // if we want to send the username/password to the contact's email address
    if ($contact->send_login_immediately_c == 1 && $contact->deleted == 0 && $contact->username_c != '' && $contact->password_c != '') {
        
        // send email to student...
        $email_template_id = '8880eb1d-78c5-b65b-e571-552290fb0041'; // This is the ID of Email Template titled (Genesis Institute e-Learning Portal: New user account‏)
        sendLoginViaEmail($contact, $email_template_id);
        
        // update the contact's e-learning fields
        $contact->login_last_date_sent_c = $GLOBALS['timedate']->nowDb();
            
        // reset "initiating" fields.
        $contact->send_login_immediately_c = 0;
    }
}


/*
Use: It handles the request to send a "Forgot Password" email to the contact.  It usually called "updateContact" function.
Inputs: $contact - the bean of the Contact requesting to send a "forget password" email.  Passed "by reference (&)" to instantly change the flag field.
Outputs: No returned data.
*/
function sendContactPasswordReset(&$contact) {
    
    // if we want to send a "Password Reset" link to the contact's email address
    if ($contact->send_reset_link_immediately_c == 1 && $contact->deleted == 0) {
        
        // send email to contact...
        $email_template_id = '5a67cd04-6f0b-84b7-192d-552c89d37b29';  // This is the ID of Email Template titled (Genesis Institute e-Learning Portal: New user account‏)
        sendResetLinkViaEmail($contact, $email_template_id);
        
        // reset "initiating" fields.
        $contact->send_reset_link_immediately_c = 0;
    }
}


/*****************************************/
/******* EMAIL / SMS COMMUNICATION *******/
/*****************************************/

function sendLeadEmailVerificationLinkViaEmail($lead, $templateID) {

    // Get the TO name and e-mail address for the message
    $rcpt_name = $lead->first_name . ' ' . $lead->last_name;
    $rcpt_email = $lead->email1;

    // Check if we need to send the logins immediately via email & whether the lead has an email address...
    if ($lead->send_email_verification_link_c == 1 && $rcpt_email) {

        // Send login details to lead
        require_once('modules/EmailTemplates/EmailTemplate.php');
        $emailTemp = new EmailTemplate();
        //$template_name = 'Genesis Institute e-Learning Portal: New user account‏';
        //$emailTemp->retrieve_by_string_fields(array('name'=>$template_name,'type'=>'email'));
        $emailTemp->retrieve($templateID);
        $emailTemp->disable_row_level_security = true;

        // Parse Subject & Body HTML If we used variable in subject
        $emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$lead->module_dir, $lead);
        $emailTemp->body_html = str_replace(array('$contact_name','$parent_id','$contact_email1','$invoice_id'), array($rcpt_name, $lead->id, $lead->email1, $lead->opportunity_id), $emailTemp->body_html);
        $emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$lead->module_dir, $lead);
        
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        
        require_once ('modules/Emails/Email.php');
        $emailObj = new Email();
        
        $defaults = $emailObj->getSystemDefaultEmail();
        
        $mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->AddAddress($rcpt_email, $rcpt_name);
        $mail->Subject = from_html($emailTemp->subject);
        $mail->Body_html = from_html($emailTemp->body_html);
        $mail->Body = wordwrap($emailTemp->body_html, 900);
        $mail->IsHTML(true); // Omit or comment out this line if plain text
        $mail->prepForOutbound();
        $mail->setMailerForSystem();
        
        // Send the message, log if error occurs
        if (!$mail->Send()) {
            //$GLOBALS['log']->fatal('ERROR: Sending the email address verification link has failed!');
            $params = array(
                'module' => 'Leads',
                'action' => 'DetailView', 
                'record' => $lead->id,
            );
            $url = 'index.php?' . http_build_query($params);
            SugarApplication::appendErrorMessage("FAILED: Could not send the email address verification link to Lead (<a href='{$url}'>{$lead->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
        
        } else {
            // now create email
            global $current_user;
            $emailObj->parent_type = 'Leads';
            $emailObj->parent_id = $lead->id;
            $emailObj->to_addrs = $rcpt_email;
            $emailObj->to_addrs_ids = $lead->id;
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = $mail->Body_html;
            $emailObj->from_addr = $mail->From;
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = $current_user->id;
            $emailObj->created_by = $current_user->id;
            $emailObj->status = 'sent';
            $emailObj->save();
        }
    }
}

function sendCouponCodeOnEmailVerification($lead, $templateID) {

    // Get the TO name and e-mail address for the message
    $rcpt_name = $lead->first_name . ' ' . $lead->last_name;
    $rcpt_email = $lead->email1;

    // Check if we need to send the logins immediately via email & whether the lead has an email address...
    if ($lead->send_coupon_via_email_c == 1 && $rcpt_email) {

        // Send login details to lead
        require_once('modules/EmailTemplates/EmailTemplate.php');
        $emailTemp = new EmailTemplate();
        //$template_name = 'Genesis Institute e-Learning Portal: New user account‏';
        //$emailTemp->retrieve_by_string_fields(array('name'=>$template_name,'type'=>'email'));
        $emailTemp->retrieve($templateID);
        $emailTemp->disable_row_level_security = true;

        // Parse Subject & Body HTML If we used variable in subject
        $emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$lead->module_dir, $lead);
        //$emailTemp->body_html = str_replace(array('$contact_name','$parent_id','$contact_email1','$invoice_id'), array($rcpt_name, $lead->id, $lead->email1, $lead->opportunity_id), $emailTemp->body_html);
        $emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$lead->module_dir, $lead);
        
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        
        require_once ('modules/Emails/Email.php');
        $emailObj = new Email();
        
        $defaults = $emailObj->getSystemDefaultEmail();
        
        $mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->AddAddress($rcpt_email, $rcpt_name);
        $mail->Subject = from_html($emailTemp->subject);
        $mail->Body_html = from_html($emailTemp->body_html);
        $mail->Body = wordwrap($emailTemp->body_html, 900);
        $mail->IsHTML(true); // Omit or comment out this line if plain text
        $mail->prepForOutbound();
        $mail->setMailerForSystem();
        
        // Send the message, log if error occurs
        if (!$mail->Send()) {
            //$GLOBALS['log']->fatal('ERROR: Sending the email address verification link has failed!');
            $params = array(
                'module' => 'Leads',
                'action' => 'DetailView', 
                'record' => $lead->id,
            );
            $url = 'index.php?' . http_build_query($params);
            SugarApplication::appendErrorMessage("FAILED: Could not send the email address verification link to Lead (<a href='{$url}'>{$lead->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
        
        } else {
            // now create email
            global $current_user;
            $emailObj->parent_type = 'Leads';
            $emailObj->parent_id = $lead->id;
            $emailObj->to_addrs = $rcpt_email;
            $emailObj->to_addrs_ids = $lead->id;
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = $mail->Body_html;
            $emailObj->from_addr = $mail->From;
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = $current_user->id;
            $emailObj->created_by = $current_user->id;
            $emailObj->status = 'sent';
            $emailObj->save();
        }
    }
}

function sendLoginViaEmail($contact, $templateID) {

    // Get the TO name and e-mail address for the message
    $rcpt_name = $contact->first_name . ' ' . $contact->last_name;
    $rcpt_email = $contact->email1;

    // Check if we need to send the logins immediately via email & whether the contact has an email address...
    if ($contact->send_login_immediately_c == 1 && $rcpt_email) {

        // Send login details to contact
        require_once('modules/EmailTemplates/EmailTemplate.php');
        $emailTemp = new EmailTemplate();
        //$template_name = 'Genesis Institute e-Learning Portal: New user account‏';
        //$emailTemp->retrieve_by_string_fields(array('name'=>$template_name,'type'=>'email'));
        $emailTemp->retrieve($templateID);
        $emailTemp->disable_row_level_security = true;

        // Parse Subject & Body HTML If we used variable in subject
        $emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$contact->module_dir, $contact);
        $emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$contact->module_dir, $contact);
        
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        
        require_once ('modules/Emails/Email.php');
        $emailObj = new Email();
        
        $defaults = $emailObj->getSystemDefaultEmail();
        
        $mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->AddAddress($rcpt_email, $rcpt_name);
        $mail->Subject = from_html($emailTemp->subject);
        $mail->Body_html = from_html($emailTemp->body_html);
        $mail->Body = wordwrap($emailTemp->body_html, 900);
        $mail->IsHTML(true); // Omit or comment out this line if plain text
        $mail->prepForOutbound();
        $mail->setMailerForSystem();
        
        // Send the message, log if error occurs
        if (!$mail->Send()) {
            //$GLOBALS['log']->fatal('ERROR: Sending the e-Learning login details has failed!');
            $params = array(
                'module' => 'Contacts',
                'action' => 'DetailView', 
                'record' => $contact->id,
            );
            $url = 'index.php?' . http_build_query($params);
            SugarApplication::appendErrorMessage("FAILED: Could not send the login details to Contact (<a href='{$url}'>{$contact->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
        
        } else {
            // now create email
            global $current_user;
            $emailObj->parent_type = 'Contacts';
            $emailObj->parent_id = $contact->id;
            $emailObj->to_addrs = $rcpt_email;
            $emailObj->to_addrs_ids = $contact->id;
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = $mail->Body_html;
            $emailObj->from_addr = $mail->From;
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = $current_user->id;
            $emailObj->created_by = $current_user->id;
            $emailObj->status = 'sent';
            $emailObj->save();
        }
    }
}

function sendResetLinkViaEmail($contact, $templateID) {

    // Get the TO name and e-mail address for the message
    $rcpt_name = $contact->first_name . ' ' . $contact->last_name;
    $rcpt_email = $contact->email1;

    // Check if we need to send the logins immediately via email & whether the contact has an email address...
    if ($contact->send_reset_link_immediately_c == 1 && $rcpt_email) {

        // Send login details to contact
        require_once('modules/EmailTemplates/EmailTemplate.php');
        $emailTemp = new EmailTemplate();
        //$template_name = 'Genesis Institute e-Learning Portal: New user account‏';
        //$emailTemp->retrieve_by_string_fields(array('name'=>$template_name,'type'=>'email'));
        $emailTemp->retrieve($templateID);
        $emailTemp->disable_row_level_security = true;

        // Parse Subject & Body HTML If we used variable in subject
        $emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$contact->module_dir, $contact);
        $emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$contact->module_dir, $contact);
        
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        
        require_once ('modules/Emails/Email.php');
        $emailObj = new Email();
        
        $defaults = $emailObj->getSystemDefaultEmail();
        
        $mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->AddAddress($rcpt_email, $rcpt_name);
        $mail->Subject = from_html($emailTemp->subject);
        $mail->Body_html = from_html($emailTemp->body_html);
        $mail->Body = wordwrap($emailTemp->body_html, 900);
        $mail->IsHTML(true); // Omit or comment out this line if plain text
        $mail->prepForOutbound();
        $mail->setMailerForSystem();
        
        // Send the message, log if error occurs
        if (!$mail->Send()) {
            //$GLOBALS['log']->fatal('ERROR: Sending the password reset link has failed!');
            $params = array(
                'module' => 'Contacts',
                'action' => 'DetailView', 
                'record' => $contact->id,
            );
            $url = 'index.php?' . http_build_query($params);
            SugarApplication::appendErrorMessage("FAILED: Could not send the password reset link to Contact (<a href='{$url}'>{$contact->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
        
        } else {
            // now create email
            global $current_user;
            $emailObj->parent_type = 'Contacts';
            $emailObj->parent_id = $contact->id;
            $emailObj->to_addrs = $rcpt_email;
            $emailObj->to_addrs_ids = $contact->id;
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = $mail->Body_html;
            $emailObj->from_addr = $mail->From;
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = $current_user->id;
            $emailObj->created_by = $current_user->id;
            $emailObj->status = 'sent';
            $emailObj->save();
        }
    }
}

function sendInvoiceViaEmail($opportunity, $templateID) {
    require_once('custom/modules/Opportunities/sugarpdf/sugarpdf.quote.php');

    $pdf = new OpportunitiesSugarpdfquote($opportunity);
    $pdf->action = 'quote';
    $pdf->process();
    $pdf->emailPDF();
}

function sendPaymentViaEmail($payment, $templateID) {
    require_once('custom/modules/GI_Payments/sugarpdf/sugarpdf.payment.php');

    $pdf = new GI_PaymentsSugarpdfpayment($payment);
    $pdf->action = 'payment';
    $pdf->process();
    $pdf->emailPDF();
}

function sendRegistrationsViaEmail($opportunity, $templateID) {

    // Get the TO name and e-mail address for the message
    $contacts = $opportunity->get_contacts_list();
    if (count($contacts) > 0) {
        $person = current($contacts);
    } else {
        $leads = $opportunity->get_leads();
        if (count($leads) > 0) {
            $person = current($leads);
        }
    }
    $rcpt_name = $person->first_name . ' ' . $person->last_name;
    $rcpt_email = $person->email1;

    // Check if we need to send the logins immediately via email & whether the lead has an email address...
    if ($opportunity->send_invoice_via_email_c == 1 && $rcpt_email != '') {
        
        $line_items = $opportunity->get_line_items();
        if (count($line_items) > 0) {
            $i = 0;
            foreach ($line_items as $line_item) {
                if (
                    $opportunity->status_c != 'Opportunity' && in_array($line_item->status_c, array('Active', 'Suspended')) ||
                    $opportunity->status_c == 'Opportunity' && in_array($line_item->status_c, array('Active', 'Suspended', 'Interested_Hot', 'Interested_Warm', 'Interested_Cold'))
                )
                {
                    $i++;
                    $product = new GI_Products();
                    $product->retrieve($line_item->gi_products_gi_line_items_1gi_products_ida);
                    $product_start_date = ($product->date_start_c == '') ? '' : ('Starts on ' . date('l, F j, Y', strtotime($product->date_start_c)) . '<br />');
                    //$product_end_date = ($product->date_end_c == '') ? '' : ' to ' . date('l, F j, Y', strtotime($product->date_end_c));
                    if ($product->type == 'Service') {
                        $schedule = ($product->provisional_c == 1) ? ' <em>(provisional)</em>' : "<a href='http://www.genesisreview.com/crm/index.php?entryPoint=downloadScheduleEntryPoint&product_id={$product->id}'>View Schedule</a>";
                    }
                    
                    $opportunity_line_items .= "
                        <p>
                            <strong>{$line_item->gi_products_gi_line_items_1_name}</strong><br />
                            {$product_start_date}
                            {$schedule}
                        </p>
                    ";
                }
            }
        }

        // Send login details to lead
        require_once('modules/EmailTemplates/EmailTemplate.php');
        $emailTemp = new EmailTemplate();
        //$template_name = 'Genesis Institute e-Learning Portal: New user account‏';
        //$emailTemp->retrieve_by_string_fields(array('name'=>$template_name,'type'=>'email'));
        $emailTemp->retrieve($templateID);
        $emailTemp->disable_row_level_security = true;

        // Parse Subject & Body HTML If we used variable in subject
        $emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$opportunity->module_dir, $opportunity);
        $emailTemp->body_html = str_replace(array('$contact_name','$parent_id','$opportunity_line_items'), array($rcpt_name, $opportunity->id, $opportunity_line_items), $emailTemp->body_html);
        $emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$opportunity->module_dir, $opportunity);
        
        require_once('include/SugarPHPMailer.php');
        $mail = new SugarPHPMailer();
        
        require_once ('modules/Emails/Email.php');
        $emailObj = new Email();
        
        $defaults = $emailObj->getSystemDefaultEmail();
        
        // Message
        $mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
        $mail->FromName = $defaults['name'];
        $mail->ClearAllRecipients();
        $mail->ClearReplyTos();
        $mail->AddAddress($rcpt_email, $rcpt_name);
        $mail->Subject = from_html($emailTemp->subject);
        $mail->Body_html = from_html($emailTemp->body_html);
        $mail->Body = wordwrap($emailTemp->body_html, 900);
        $mail->IsHTML(true); // Omit or comment out this line if plain text
        
        // Attachments
        require_once('modules/Notes/Note.php');
        $note = new Note();
        $where = "notes.parent_id = '{$templateID}' "; 
        $attach_list = $note->get_full_list("", $where, true); //Get all Notes entries associated with email template
        //$GLOBALS['log']->fatal('Attachments: ' . http_build_query($attach_list));
        $attachments = array();
        $attachments = array_merge($attachments, $attach_list);
        foreach ($attachments as $attached) {
            $filename = $attached->filename;
            $file_location = 'upload/' . $attached->id;
            $mime_type = $attached->file_mime_type;
            $mail->AddAttachment($file_location, $filename, 'base64', $mime_type); //Attach each file to message
        }
        
        // Send the message, log if error occurs
        $mail->prepForOutbound();
        $mail->setMailerForSystem();
        if (!$mail->Send()) {
            //$GLOBALS['log']->fatal('ERROR: Sending the email address verification link has failed!');
            $params = array(
                'module' => 'Opportunities',
                'action' => 'DetailView', 
                'record' => $opportunity->id,
            );
            $url = 'index.php?' . http_build_query($params);
            SugarApplication::appendErrorMessage("FAILED: Could not send the email address verification link to Lead (<a href='{$url}'>{$opportunity->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
        
        } else {
            // now create email
            $emailObj->parent_type = 'Opportunities';
            $emailObj->parent_id = $opportunity->id;
            $emailObj->to_addrs = '';
            $emailObj->type = 'archived';
            $emailObj->deleted = '0';
            $emailObj->name = $mail->Subject;
            $emailObj->description = $mail->Body;
            $emailObj->description_html = $mail->Body_html;
            $emailObj->from_addr = $mail->From;
            $emailObj->date_sent = TimeDate::getInstance()->nowDb();
            $emailObj->modified_user_id = '1';
            $emailObj->created_by = '1';
            $emailObj->status = 'sent';
            $emailObj->save();
        }
    }
}


function SendBulkSMS($sms) {
    
    global $sugar_config;

    //return;
    
    // TO-DO 01: remove duplicate mobile numbers before sending SMS.
    // TO-DO 02: let SMSGlobal send a confirmation to "entrypoint" to confirm the message status.
    // http://support.sugarcrm.com/02_Documentation/04_Sugar_Developer/Sugar_Developer_Guide_6.5/02_Application_Framework/Entry_Points/02_Creating_Custom_Entry_Points/
    // http://www.smsglobal.com/docs/HTTP.pdf
    // https://www.smsglobal.com/http-api
    
    
    if ($sms->send_immediately_c == 1) {
        
        $sms->sender_id_c = $sugar_config['sms_sender_id'];
        
        /*
        global $timedate;
          if ( $timedate->check_matching_format($sms->date_scheduled_c, 'Y-m-d H:i:s') ) {
            $scheduledatetime = $sms->date_scheduled_c;
        } else {
            $scheduledatetime = $timedate->to_db($sms->date_scheduled_c);
        }
        */
        
        $contacts = $sms->get_contacts();
        
        /*
        echo '<pre>';
        echo count($contacts);
        print_r($contacts);
        echo '</pre>';
        die();
        */
        
        /********** APPROACH 1: 1 "Note" is stored per Contact **********/
        $sent_numbers = array();
        
        foreach ($contacts as $contact) {
            
            if (!in_array($contact->phone_mobile, $sent_numbers)) {
                
                $content =  'action=sendsms'.
                            '&user='.rawurlencode($sugar_config['sms_username']).
                            '&password='.rawurlencode($sugar_config['sms_password']).
                            '&to='.rawurlencode($contact->phone_mobile).
                            '&from='.rawurlencode($sugar_config['sms_sender_id']).
                            '&maxsplit=3'.
                            //'&scheduledatetime='.rawurlencode($scheduledatetime).
                            '&text='.rawurlencode($sms->description);
                
                //die($content);
                $smsglobal_response = file_get_contents($sugar_config['sms_gateway_url']."".$content);
                
                $sent_numbers[] = $contact->phone_mobile;
                
                //Sample Response
                //OK: 0; Sent queued message ID: 04b4a8d4a5a02176 SMSGlobalMsgID:6613115713715266 
                
                /*
                $explode_response = explode('SMSGlobalMsgID:', $smsglobal_response);
                if(count($explode_response) == 2) { // Message Success
                    $status = 'Sent';
                } else { //Message Failed
                    $status = 'Failed';
                }
                */
                
                // Save a note for each contact.
                $note = new Note();
                $note->name = "SMS Message";
                $note->parent_type = 'GI_SMS_Messages';
                $note->parent_id = $sms->id;
                $note->parent_name = $sms->name;
                $note->contact_id = $contact->id;
                $note->contact_name = $contact->name;
                $note->description = "SMS to {$contact->phone_mobile} - {$contact->name} \n\n{$smsglobal_response} \n\n{$sms->description}";
                $note->save();
            }
        }
        
        /********** APPROACH 2: All messages are stored as 1 "Note" **********/
        /*
        $mobiles = array();
        
        foreach ($contacts as $contact) {
            $id = $contact->id;
            $mobiles[$id] = $contact->phone_mobile;
        }
        $mobiles_str = implode(',', $mobiles);
        
        $content =  'action=sendsms'.
                    '&user='.rawurlencode($sugar_config['sms_username']).
                    '&password='.rawurlencode($sugar_config['sms_password']).
                    '&to='.rawurlencode($mobiles_str).
                    '&from='.rawurlencode($sugar_config['sms_sender_id']).
                    //'&scheduledatetime='.rawurlencode($scheduledatetime).
                    '&text='.rawurlencode($sms->description);
        
        die('http://www.smsglobal.com.au/http-api.php?'.$content);
        $smsglobal_response = file_get_contents($sugar_config['sms_gateway_url']."".$content);
        
        //Sample Response
        //OK: 0; Sent queued message ID: 04b4a8d4a5a02176 SMSGlobalMsgID:6613115713715266 
        
        $note = new Note();
        $note->name = "SMS";
        $note->parent_name = $sms->name;
        $note->parent_type = 'GI_SMS_Messages';
        $note->parent_id = $sms->id;
        $note->description = "{$smsglobal_response}\n\nMessage to be sent to:\n" . implode("\n", $mobiles);
        $note->save();
        */
        
        $sms->send_immediately_c = 0;
        $sms->save();
    }
}


/**********************************/
/***** DEPRECIATED FUNCTIONS ******/
/**********************************/

// require_once('rest_moodle/rest_api_moodle.php');

/*
// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function synchMoodleProduct($product) {
    deleteProductCohort($product);
    updateProductCohort($product);
    createProductCohort($product);
    $product->save();
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function deleteProductCohort(&$product) {
    
    if ($product->deleted == 1 || $product->has_elearning_c == 0 || $product->status_c == 'Cancelled' || $product->status_c == 'Complete') {
    
        // delete the related cohort (if any)
        if ($product->moodle_cohort_id_c != '') {
            delete_cohort($product->moodle_cohort_id_c);
        }
        
        // update product's e-learning fields
        $product->has_elearning_c = 0;
        $product->moodle_cohort_id_c = '';
        $product->date_sync_with_moodle_c = '';
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function updateProductCohort(&$product) {
    
    // if a cohort is set...
    if ($product->has_elearning_c == 1 && $product->status_c == 'Active' && $product->deleted == 0 && $product->moodle_cohort_id_c != '') {
    
        $result = update_cohort($product->moodle_cohort_id_c, $product->name, $product->id, "");
        
        // update product's e-learning fields & handle error
        if (!isset($result->errorcode)) {
            $product->date_sync_with_moodle_c = $GLOBALS['timedate']->nowDb();
            
        } else {
            $note = new Note();
            $note->name = "Cohort update on Moodle failed.";
            $note->parent_type = 'GI_Products';
            $note->parent_id = $product->id;
            $note->parent_name = $product->name;
            $note->description = "Product ID: {$product->id}\n\nCohort ID: {$product->moodle_cohort_id_c}\n\n{$result->message}";
            $note->save();
            $product->moodle_cohort_id_c = '';
            $product->date_sync_with_moodle_c = '';
        }
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function createProductCohort(&$product) {

    // if this product "has e-learning"...
    if ($product->has_elearning_c == 1 && $product->status_c == 'Active' && $product->deleted == 0 && $product->moodle_cohort_id_c == '') {
    
        // create a new cohort on Moodle with the name/id on CRM
        $result = create_cohort($product->name, $product->id, "");
        
        // update product's e-learning fields & handle error
        if (!isset($result->errorcode)) {
            $cohort = $result[0];
            $product->moodle_cohort_id_c = $cohort->id;
            $product->date_sync_with_moodle_c = $GLOBALS['timedate']->nowDb();
            
        } else {
            $note = new Note();
            $note->name = "Cohort creation on Moodle failed.";
            $note->parent_type = 'GI_Products';
            $note->parent_id = $product->id;
            $note->parent_name = $product->name;
            $note->description = "Product ID: {$product->id}\n\nCohort ID: {$product->moodle_cohort_id_c}\n\n{$result->message}";
            $note->save();
        }
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function processProductLineItemsStatus(&$product, &$line_items) {
    
    foreach ($line_items as $item) {
        switch ($product->status_c) {
            case 'Complete':
                if ($item->status_c == 'Active') {
                    $item->status_c = 'Complete';
                }
                break;
            case 'Cancelled':
                if ($item->status_c == 'Active' || $item->status_c == 'Complete') {
                    $item->status_c = 'Cancelled';
                }
                break;
            case 'Active':
                if ($item->status_c == 'Complete') {
                    $item->status_c = 'Active';
                }
                break;
        }
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function synchMoodleLineItemMembers(&$line_items) {
    foreach ($line_items as $line_item) {
        synchMoodleLineItemMember($line_item);
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function synchMoodleLineItemMember(&$line_item) {
    
    $line_item_moodle_cohort_id = $line_item->moodle_cohort_id_c;
    $line_item_moodle_user_id = $line_item->moodle_user_id_c;
    $line_item_date_sync_with_moodle = $line_item->date_sync_with_moodle_c;
    
    deleteLineItemMember($line_item);
    createLineItemMember($line_item);
    
    if ($line_item_date_sync_with_moodle != $line_item->date_sync_with_moodle_c ||
        $line_item_moodle_user_id != $line_item->moodle_user_id_c ||
        $line_item_date_sync_with_moodle != $line_item->date_sync_with_moodle_c)
    {
        $line_item->save();
    }
}

// This function MUST be called AFTER AND ONLY AFTER the product is saved... not before saving, and not before/after changing the relationships
function deleteLineItemMember(&$line_item) {

    //$GLOBALS['log']->fatal("---- LI: 01 ---- {$line_item->id}");
    if ($line_item->moodle_cohort_id_c != '' && $line_item->moodle_user_id_c != '') {
        
        //$GLOBALS['log']->fatal("---- LI: 02 ---- {$line_item->id}");
        $products = $line_item->get_products();
        $contacts = $line_item->get_contacts();
        
        if (count($products) > 0 && count($contacts) > 0) {
            //$GLOBALS['log']->fatal("---- LI: 03 ---- {$line_item->id}");
            $product = current($products);
            $contact = current($contacts);
            $line_item->moodle_user_id_c = $contact->moodle_user_id_c;
            $line_item->moodle_cohort_id_c = $product->moodle_cohort_id_c;
        }
        
        if ($product->deleted == 1 || 
            $product->has_elearning_c == 0 || 
            $product->status_c != 'Active' || 
            $product->moodle_cohort_id_c == '' || 
            $contact->deleted == 1 || 
            $contact->moodle_user_id_c == '' || 
            $line_item->deleted == 1 || 
            $line_item->status_c != 'Active')
        {
            //$GLOBALS['log']->fatal("---- LI: 04 ---- {$line_item->id}");
        
            // before deleting a cohort member, make sure that no other "Active" lineitems exist for the same contact & product.
            // start
            $found_active = false;
        
            $contact_line_items = $contact->get_line_items('Active');
            foreach ($contact_line_items as $contact_line_item) {
                //$GLOBALS['log']->fatal("---- LI: 05 ---- {$line_item->id}");
                //$GLOBALS['log']->fatal("---- LI: 05 ---- {$contact_line_item->gi_products_gi_line_items_1gi_products_ida} -- {$product->id}");
                //$GLOBALS['log']->fatal("---- LI: 05 ---- {$line_item->id} -- {$contact_line_item->id}");
                if ($contact_line_item->gi_products_gi_line_items_1gi_products_ida == $product->id && $line_item->id != $contact_line_item->id) {
                    $found_active = true;
                    break;
                }
            }
            
            //$GLOBALS['log']->fatal("---- LI: 06 ---- {$line_item->id}");
            if (!$found_active) {
                //$GLOBALS['log']->fatal("---- LI: 07 ---- {$line_item->id}");
                delete_cohort_members($line_item->moodle_cohort_id_c, $line_item->moodle_user_id_c);
                //$GLOBALS['log']->fatal("---- LI: 08 ---- {$line_item->id}");
            }
            //end
            
            //$GLOBALS['log']->fatal("---- LI: 09 ---- {$line_item->id}");
            $line_item->moodle_user_id_c = '';
            $line_item->moodle_cohort_id_c = '';
            $line_item->date_sync_with_moodle_c = '';
        }


    } else {
        //$GLOBALS['log']->fatal("---- LI: 10 ---- {$line_item->id}");
        //$GLOBALS['log']->fatal("---- LI: 10 ---- {$line_item->id} -- {$line_item->moodle_user_id_c}");
        //$GLOBALS['log']->fatal("---- LI: 10 ---- {$line_item->id} -- {$line_item->moodle_cohort_id_c}");
        $line_item->moodle_user_id_c = '';
        $line_item->moodle_cohort_id_c = '';
        $line_item->date_sync_with_moodle_c = '';
    }
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function createLineItemMember(&$line_item) {

    $products = $line_item->get_products();
    $contacts = $line_item->get_contacts();
    
    //$GLOBALS['log']->fatal("---- LI: 11 ---- {$line_item->id}");
    if (count($products) > 0 && count($contacts) > 0) {
        $product = current($products);
        $contact = current($contacts);
        
        //$GLOBALS['log']->fatal("---- LI: 12 ---- {$line_item->id}");
        if ($product->deleted == 0 && 
            $product->has_elearning_c == 1 && 
            $product->status_c == 'Active' && 
            $product->moodle_cohort_id_c != '' && 
            $contact->deleted == 0 && 
            $contact->moodle_user_id_c != '' && 
            $line_item->deleted == 0 && 
            $line_item->status_c == 'Active')
        {
            
            //$GLOBALS['log']->fatal("---- LI: 13 ---- {$line_item->id}");
            $result = add_member_to_cohort($product->moodle_cohort_id_c, $contact->moodle_user_id_c);
            //$r = http_build_query($result);
            //$GLOBALS['log']->fatal("---- LI: 13 ---- {$line_item->id} -- {$product->moodle_cohort_id_c} -- {$contact->moodle_user_id_c}");
            //$GLOBALS['log']->fatal("---- LI: 14 ---- {$line_item->id}");
            
            // update product's e-learning fields & handle error
            if (!isset($result->errorcode)) {
                //$GLOBALS['log']->fatal("---- LI: 15 ---- {$line_item->id}");
                $line_item->moodle_user_id_c = $contact->moodle_user_id_c;
                $line_item->moodle_cohort_id_c = $product->moodle_cohort_id_c;
                $line_item->date_sync_with_moodle_c = $GLOBALS['timedate']->nowDb();
                
            } else {
                //$GLOBALS['log']->fatal("---- LI: 16 ---- {$line_item->id}");
                $note = new Note();
                $note->name = "Contact assignment in Cohort on Moodle failed.";
                $note->parent_type = 'GI_Products';
                $note->parent_id = $product->id;
                $note->parent_name = $product->name;
                $note->contact_id = $contact->id;
                $note->contact_name = $contact->name;
                $note->description = "Line Item ID: {$line_item->id}\n\nContact ID: {$contact->id}\n\nProduct ID: {$product->id}\n\nCohort ID: {$product->moodle_cohort_id_c}\n\n{$result->message}";
                $note->save();
            }
        }
    }
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function synchMoodleContact(&$contact) {
    deleteContactUser($contact);
    fixContactUser($contact);
    updateContactUser($contact);
    createContactUser($contact);
    sendContactLogin($contact);
    sendContactPasswordReset($contact);
    $contact->save();
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function deleteContactUser(&$contact) {
    
    //$GLOBALS['log']->fatal('---- 01 ----');
    // if the contact is deleted in CRM or Email is blank, delete the user in Moodle
    if ($contact->moodle_user_id_c != '' && $contact->email1 == '') {
        
        eddy_mdl_delete_user($contact->moodle_user_id_c);
        
        // update the contact's e-learning fields
        $contact->username_c = '';
        $contact->password_c = '';
        $contact->moodle_user_id_c = '';
        $contact->login_last_date_synch_c = '';
        $contact->login_last_date_sent_c = '';
        //$GLOBALS['log']->fatal('---- 02 ----');
    }
    //$GLOBALS['log']->fatal('---- 03 ----');
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function fixContactUser(&$contact) {
    
    //$GLOBALS['log']->fatal('---- 04 ----');
    if ($contact->moodle_user_id_c != '') {
        $user = eddy_get_mdl_user_by_id($contact->moodle_user_id_c);
        //$GLOBALS['log']->fatal('---- 05 ----');
        if ($user == 0) {
            //$GLOBALS['log']->fatal('---- 06 ----');
            // update the contact's e-learning fields
            $contact->username_c = '';
            $contact->password_c = '';
            $contact->moodle_user_id_c = '';
            $contact->login_last_date_synch_c = '';
            $contact->login_last_date_sent_c = '';
        }
    }
    //$GLOBALS['log']->fatal('---- 07 ----');
    
    if ($contact->email1 != '') {
        $user = eddy_get_mdl_user_by_email($contact->email1);
        //$GLOBALS['log']->fatal('---- 08 ----');
        if ($user != 0) {
            //if (!isset($user->idnumber) || $user->idnumber == '') {  //// What will happen when the USER is linked to another contact?!!!
                //$GLOBALS['log']->fatal('---- 09 ----');
                $contact->moodle_user_id_c = $user->id;
            //}
        }
    }
    //$GLOBALS['log']->fatal('---- 10 ----');
}
        
// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function updateContactUser(&$contact) {
    
    //$GLOBALS['log']->fatal('---- 11 ----');
    if ($contact->moodle_user_id_c != '' && $contact->email1 != '' && $contact->deleted == 0) {
        
        if ($contact->generate_new_password_c == 1) {
            //$GLOBALS['log']->fatal('---- 12 ----');
            $contact_password = getRandomString();
        } else {
            $contact_password = $contact->password_c;
            //$GLOBALS['log']->fatal('---- 13 ----');
        }
        //$GLOBALS['log']->fatal('---- 14 ----');
        
        // update the username/password on Moodle with the username/password on CRM.
        $user = new stdClass();
        $user->id = $contact->moodle_user_id_c;
        $user->firstname = $contact->first_name;
        $user->lastname = $contact->last_name;
        $user->email = $contact->email1;
        $user->username = $contact->email1;
        $user->password = $contact_password;
        $user->auth = 'manual';
        $user->idnumber = $contact->id;
        //$user->city = $contact->primary_address_city;
        $user->city = 'Dubai';
        $user->country = 'AE';
        $result = eddy_mdl_update_user($user);
            
        // update product's e-learning fields & handle error
        if (!isset($result->errorcode)) {
            $user = $result[0];
            $contact->username_c = $contact->email1;
            $contact->password_c = $contact_password;
            $contact->login_last_date_synch_c = $GLOBALS['timedate']->nowDb();
            //$GLOBALS['log']->fatal('---- 15 ----');
            
        } else {
            $note = new Note();
            $note->name = "User update on Moodle failed.";
            //$note->parent_type = 'GI_Products';
            //$note->parent_id = $product->id;
            //$note->parent_name = $product->name;
            $note->contact_id = $contact->id;
            $note->contact_name = $contact->name;
            $note->description = "Contact ID: {$contact->id}\n\n{$result->message}";
            $note->save();
            //$GLOBALS['log']->fatal('---- 16 ----');
        }
        
        // reset "initiating" fields.
        $contact->generate_new_password_c = 0;
        //$GLOBALS['log']->fatal('---- 17 ----');
    }
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function createContactUser(&$contact) {
    
    //$GLOBALS['log']->fatal('---- 18 ----');
    if ($contact->moodle_user_id_c == '' && $contact->generate_new_password_c == 1 && $contact->email1 != '' && $contact->deleted == 0) {
        
        //$GLOBALS['log']->fatal('---- 19 ----');
        $contact_password = getRandomString();
        
        // create the username/password on Moodle with the username/password on CRM.
        $user = new stdClass();
        $user->firstname = $contact->first_name;
        $user->lastname = $contact->last_name;
        $user->email = $contact->email1;
        $user->username = $contact->email1;
        $user->password = $contact_password;
        $user->auth = 'manual';
        $user->idnumber = $contact->id;
        //$user->city = $contact->primary_address_city;
        $user->city = 'Dubai';
        $user->country = 'AE';
        $result = eddy_mdl_create_user($user);
        
        // update product's e-learning fields & handle error
        if (!isset($result->errorcode)) {
            //$GLOBALS['log']->fatal('---- 20 ----');
            $user = $result[0];
            $contact->username_c = $contact->email1;
            $contact->password_c = $contact_password;
            $contact->moodle_user_id_c = $user->id;
            $contact->login_last_date_synch_c = $GLOBALS['timedate']->nowDb();
            
        } else {
            $note = new Note();
            $note->name = "User creation on Moodle failed.";
            //$note->parent_type = 'GI_Products';
            //$note->parent_id = $product->id;
            //$note->parent_name = $product->name;
            $note->contact_id = $contact->id;
            $note->contact_name = $contact->name;
            $note->description = "Contact ID: {$contact->id}\n\n{$result->message}";
            $note->save();
            //$GLOBALS['log']->fatal('---- 21 ----');
        }
        
        // reset "initiating" fields.
        $contact->generate_new_password_c = 0;
        //$GLOBALS['log']->fatal('---- 22 ----');
    }
}

function sendContactLogin(&$contact) {
    // if we want to send the username/password to the contact's email address
    //$GLOBALS['log']->fatal('---- 23 ----');
    if ($contact->send_login_immediately_c == 1 && 
        $contact->deleted == 0 && 
        $contact->username_c != '' && 
        $contact->password_c != '' && 
        $contact->moodle_user_id_c != '')
    {
        // send email to student...
        //$email_template_id = 'e983abff-de90-453e-819e-54873ced973f';  // This is the ID of Email Template titled (Genesis Institute e-Learning Portal: New user account‏)
        $email_template_id = '8880eb1d-78c5-b65b-e571-552290fb0041';
        sendLoginViaEmail($contact, $email_template_id);
        //$GLOBALS['log']->fatal('---- 24 ----');
        
        // update the contact's e-learning fields
        $contact->login_last_date_sent_c = $GLOBALS['timedate']->nowDb();
            
        // reset "initiating" fields.
        $contact->send_login_immediately_c = 0;
    }
}

// This function MUST be called AFTER AND ONLY AFTER the contact is saved... not before saving, and not before/after changing the relationships
function sendContactPasswordReset(&$contact) {

    //$GLOBALS['log']->fatal('---- 25 ----');
    // if we want to send a "Password Reset" link to the contact's email address
    if ($contact->send_reset_link_immediately_c == 1 && $contact->deleted == 0) {
        
        // send email to contact...
        //$email_template_id = 'b5a7ff5a-1134-316d-026d-54b659d5b0e3';  // This is the ID of Email Template titled (Genesis Institute e-Learning Portal: New user account‏)
        $email_template_id = '5a67cd04-6f0b-84b7-192d-552c89d37b29';  // This is the ID of Email Template titled (Genesis Institute e-Learning Portal: New user account‏)
        sendResetLinkViaEmail($contact, $email_template_id);
        //$GLOBALS['log']->fatal('---- 26 ----');
        
        // reset "initiating" fields.
        $contact->send_reset_link_immediately_c = 0;
    }
}

// This function is called to perform server-side validiation on the "Forecasting" record.
function updateForecasting($forecasting) {

    // Auto-calculate the total
    $forecasting->total_c = toNumber($forecasting->q1_c) + toNumber($forecasting->q2_c) + toNumber($forecasting->q3_c) + toNumber($forecasting->q4_c);
    
}

// This function is called to perform server-side validiation on the "Target Alloction" record.
function updateTargetAllocation($target_allocation) {

    $target_allocation->name = $target_allocation->assigned_user_name;
    
    // Auto-calculate the amounts (based on percentages)
    $collection = $target_allocation->get_forecastings();
    
    if (count($collection) > 0) {
        $forecasting = current($collection);
        $target_allocation->q1_amount_c = toNumber($forecasting->q1_c) * toNumber($target_allocation->q1_percentage_c) / 100;
        $target_allocation->q2_amount_c = toNumber($forecasting->q2_c) * toNumber($target_allocation->q2_percentage_c) / 100;
        $target_allocation->q3_amount_c = toNumber($forecasting->q3_c) * toNumber($target_allocation->q3_percentage_c) / 100;
        $target_allocation->q4_amount_c = toNumber($forecasting->q4_c) * toNumber($target_allocation->q4_percentage_c) / 100;
    }
    
}
*/

?>
