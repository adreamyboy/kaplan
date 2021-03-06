<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Opportunities {

    function before_save_method($bean, $event, $arguments) {
		
        updateOpportunity($bean);
       // die;
    }
    
    function after_save_method($bean, $event, $arguments) {
		//echo $bean->reference_c; die;
        //$collection = $bean->get_accounts();
        $bean->load_relationship('accounts');
    $collection = $bean->accounts->getBeans();
        if (count($collection) > 0) {
            $account = current($collection);
	        if ($account->individual_c) {
	            $collection = $account->get_contacts();
	            if (count($collection) > 0) {
	                $contact = current($collection);
	                // Add a condition to see if the "current" Contact matches the "read" Contact.
	                //$bean->set_opportunity_contact_relationship($contact->id);
					//global $app_list_strings;
					//$default = $app_list_strings['opportunity_relationship_type_default_key'];
					$bean->load_relationship('contacts');
					$bean->contacts->add($contact->id, array('contact_role'=>'Primary_Contact'));
	            }
	        }
	    }
       // $collection = $bean->get_line_items();
         $bean->load_relationship('opportunities_gi_line_items_1');
       $collection = $bean->opportunities_gi_line_items_1->getBeans();
        foreach ($collection as $item) {
			$unit_price = toNumber($item->unit_price);
			if (in_array($item->status_c, array('Active','Complete','Suspended')) &&
				$unit_price > 0 &&
				$bean->status_c == 'Opportunity')
			{
                $item->status_c = 'Interested_Hot';
                $item->save();
            }
            /*
			if ($bean->status_c == 'Opportunity') {
				if ($unit_price > 0) {
					if ($bean->sales_stage == 'Closed Lost') {
						$item->status_c = 'Cancelled';
						$item->save();
					} else {
						if ($item->status_c == 'Active' || $item->status_c == 'Complete' || $item->status_c == 'Suspended') {
							$item->status_c = 'Interested';
							$item->save();
						}
					}
				}
			}
			*/
		}
    }
    
	function after_relationship_add_method($bean, $event, $arguments) {
        $link = $arguments['link'];
		if ($link == 'opportunities_gi_line_items_1' || $link == 'opportunities_gi_payments_1') {
			updateOpportunity($bean);
	        $bean->save();
	    }
		
		// Update: 
		//     - first completed activity date (first_activity_date_c)
		//     - first completed activity type (first_activity_type_c)
		//     - last completed activity date (last_activity_date_c)
		//     - last completed activity type (last_activity_type_c)
		//     - next step date (next_step_date_c)
		//     - next step type (next_step_type_c)
		//     - next step subject (next_step)
		
		// This update does NOT really get saved via the Bean object, but rather just to re-calculate the values
		
		// BUG (to-be-fixed): Including 'emails' was causing auto-generated emails to be sent 12 times!
		if (
			$link == 'calls' || 
			$link == 'meetings' || 
			$link == 'tasks' || 
			$link == 'emails'
		) {
			
			$bean->first_activity_date_c = '';
			$bean->first_activity_c = '';
			$bean->last_activity_date_c = '';
			$bean->last_activity_c = '';
			$bean->last_interaction_date_c = '';
			$bean->last_interaction_c = '';
			$bean->next_step_date_c = '';
			$bean->next_step = '';
			$bean->no_of_completed_activities_c = 0;
			$bean->no_of_not_held_activities_c = 0;
			$bean->no_of_completed_interactions_c = 0;
			
			/*$activities['Call'] = $bean->get_calls();
			$activities['Task'] = $bean->get_tasks();
			$activities['Meeting'] = $bean->get_meetings();
			$activities['Email'] = $bean->get_emails();*/
			
			 $bean->load_relationship('calls');
    $activities['Call'] = $bean->calls->getBeans();
  //  $activities['Task'] = $opportunity->get_tasks();  // NOTE: SMS is already saved as "Task" record.
    $bean->load_relationship('tasks');
    $activities['Task'] = $bean->tasks->getBeans();
  
  //  $activities['Meeting'] = $opportunity->get_meetings();
    $bean->load_relationship('meetings');
    $activities['Meeting'] = $bean->meetings->getBeans();
    
  //  $activities['Email'] = $opportunity->get_emails();
    $bean->load_relationship('emails');
    $activities['Email'] = $bean->emails->getBeans();
			
			foreach ($activities as $key => $set) {
				
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
				
				global $timedate; // already declared above!
				
				foreach ($set as $activity) {
					if ( $timedate->check_matching_format($bean->first_activity_date_c, 'Y-m-d H:i:s') ) {
						$first_date = $bean->first_activity_date_c;
					} else {
						$first_date = $timedate->to_db($bean->first_activity_date_c);
					}
					
					if ( $timedate->check_matching_format($bean->last_activity_date_c, 'Y-m-d H:i:s') ) {
						$last_date = $bean->last_activity_date_c;
					} else {
						$last_date = $timedate->to_db($bean->last_activity_date_c);
					}
					
					if ( $timedate->check_matching_format($bean->next_step_date_c, 'Y-m-d H:i:s') ) {
						$next_date = $bean->next_step_date_c;
					} else {
						$next_date = $timedate->to_db($bean->next_step_date_c);
					}
					
					if ( $timedate->check_matching_format($activity->$date_end_field, 'Y-m-d H:i:s') ) {
						$activity_date = $activity->$date_end_field;
					} else {
						$activity_date = $timedate->to_db($activity->$date_end_field);
					}
					
					//$GLOBALS['log']->fatal('opportunity: ' . $opportunity->id);
					//$GLOBALS['log']->fatal('id: ' . $activity->id);
					//$GLOBALS['log']->fatal('status: ' . $activity->status);
					//$GLOBALS['log']->fatal('type: ' . $activity->type);
					
					if ( (in_array($activity->status, array('Held', 'Completed'))) || (in_array($activity->status, array('sent')) && $activity->type == 'out') 	) {
						if ($bean->first_activity_date_c == '' || strtotime($first_date) > strtotime($activity_date)) {
							$bean->first_activity_date_c = $activity_date;
							$bean->first_activity_c = $key . ': ' . $activity->name;
						}
						if ($bean->last_activity_date_c == '' || strtotime($last_date) < strtotime($activity_date)) {
							$bean->last_activity_date_c = $activity_date;
							$bean->last_activity_c = $key . ': ' . $activity->name;
						}
						if (in_array($key, array('Call', 'Meeting')) && ($bean->last_interaction_date_c == '' || strtotime($last_date) < strtotime($activity_date))) {
							$bean->last_interaction_date_c = $activity_date;
							$bean->last_interaction_c = $key . ': ' . $activity->name;
							$bean->no_of_completed_interactions_c = $bean->no_of_completed_interactions_c + 1;
						}
						$bean->no_of_completed_activities_c = $bean->no_of_completed_activities_c + 1;
						
					} elseif (in_array($activity->status, array('Planned', 'Tentative', 'Not Started', 'In Progress', 'Pending Input', 'Deferred'))) {
						if ($bean->next_step_date_c == '' || strtotime($next_date) > strtotime($activity_date)) {
							$bean->next_step_date_c = $activity_date;
							$bean->next_step = $key . ': ' . $activity->name;
						}
						
					} elseif ($activity->status == 'Not Held') {
						$bean->no_of_not_held_activities_c = $bean->no_of_not_held_activities_c + 1;
						
					}
				}
			}
			
			$db = $GLOBALS['db'];
			$sql = "UPDATE opportunities_cstm
					SET first_activity_date_c = '{$bean->first_activity_date_c}',
						first_activity_c = '{$bean->first_activity_c}',
						last_activity_date_c = '{$bean->last_activity_date_c}',
						last_activity_c = '{$bean->last_activity_c}',
						next_step_date_c = '{$bean->next_step_date_c}',
						no_of_completed_activities_c = '{$bean->no_of_completed_activities_c}',
						no_of_not_held_activities_c = '{$bean->no_of_not_held_activities_c}'
					WHERE id_c = '{$bean->id}'";
			$result = $db->query($sql);
			//$GLOBALS['log']->fatal("Task: {$sql}");
			
			
			$sql = "UPDATE opportunities
					SET next_step = '{$bean->next_step}'
					WHERE id = '{$bean->id}'";
			$result = $db->query($sql);
			//$GLOBALS['log']->fatal("Task: {$sql}");
			
		}
    }
    
    function after_relationship_delete_method($bean, $event, $arguments) {
        if ($bean->deleted == 0) {
            updateOpportunity($bean);
            $bean->save();
        }
    }
    
    function before_delete_method($bean, $event, $arguments) {
       // if (count($bean->get_line_items()) > 0 || count($bean->get_payments()) > 0) {
        $bean->load_relationship('opportunities_gi_line_items_1');
        $objline = $bean->opportunities_gi_line_items_1->getBeans();
        $bean->load_relationship('opportunities_gi_payments_1');
        $objP = $bean->opportunities_gi_payments_1->getBeans();
        if (count($bean->opportunities_gi_line_items_1->getBeans()) > 0 || count($bean->opportunities_gi_payments_1->getBeans) > 0) {
            $bean->deleted = 0;
			$params = array(
				'module'=> 'Opportunities',
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
