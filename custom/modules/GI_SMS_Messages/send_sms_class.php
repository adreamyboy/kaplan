<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class send_sms_class
{
    /*
    This function handles the oveeall process of sending SMS message to a primary "Contact" in an "Opportunity" (from the Activities' subpanel).
    */
    function before_save_send_sms($oSmsMsg, $event, $arguments)
    {
        if(!empty($oSmsMsg->description)
        && !empty($_REQUEST['relate_id']) 
        && $_REQUEST['relate_to'] == 'Opportunities'){
            
            $opportunity_id = $_REQUEST['relate_id'];
            $oOpportunity = new Opportunity();
            $oOpportunity->retrieve($opportunity_id);
            
            $link = 'contacts';
            if ($oOpportunity->load_relationship($link)) {
                $allContacts = $oOpportunity->$link->getBeans();
            }
            $oContact = current($allContacts);
            
            if(!empty($oContact->phone_mobile)){
                $smsResponse = $this->sendSMS($oContact, $oSmsMsg);
                if(!empty($smsResponse)){
                    $this->createTask($oContact, $oSmsMsg, $oOpportunity, $smsResponse);
                }
            }
        }
    }
    
    /*
    This function sends an SMS message, when a message is being sent from the Activities' subpanel.
    */
    function sendSMS($oContact, $oSmsMsg){
        global $sugar_config;
        
        //////////// DO NOT FORGET TO REMOVE FOLLOWING CODE///////////
        //$oSmsMsg->deleted = 1;
        //return "please ignore";
        /////////////////////////////////////////////////////////////
        //if(!empty($oSmsMsg->description) && $oSmsMsg->send_immediately_c == 1){
        if(!empty($oSmsMsg->description)){
            
            $content =  'action=sendsms'.
                        '&user='.rawurlencode($sugar_config['sms_username']).
                        '&password='.rawurlencode($sugar_config['sms_password']).
                        '&to='.rawurlencode($oContact->phone_mobile).
                        '&from='.rawurlencode($sugar_config['sms_sender_id']).
                        '&maxsplit=3'.
                        //'&scheduledatetime='.rawurlencode($scheduledatetime).
                        '&text='.rawurlencode($oSmsMsg->description);
            
            $smsglobal_response = file_get_contents($sugar_config['sms_gateway_url']."".$content);
            if(!empty($smsglobal_response)){
                $oSmsMsg->send_immediately_c = 0;
                $oSmsMsg->deleted = 1;
                return $smsglobal_response;	
            } else {
                $oSmsMsg->deleted = 1;
                return false;
            }
        }
        return false;
    }
    
    /*
    This function logs a "Completed Task" under the "Opportunity", when a message is sent from the Activities' subpanel.
    */
    function createTask($oContact, $oSmsMsg, $oOpportunity, $smsResponse){
        $oTask = new Task();
        $oTask->name = "SMS: ".$oSmsMsg->name;
        $oTask->parent_type = 'Opportunities';
        $oTask->parent_id = $oOpportunity->id;
        $oTask->parent_name = $oSmsMsg->name;
        $oTask->contact_id = $oContact->id;
        $oTask->contact_name = $oContact->name;
        $oTask->status = 'Completed';
        $oTask->date_start = $GLOBALS['timedate']->now();
        $oTask->date_due = $GLOBALS['timedate']->now();
        $oTask->priority = 'Medium';
        $oTask->status = 'Completed';
        $oTask->assigned_user_id = $oSmsMsg->assigned_user_id;
        $oTask->description = "SMS to {$oContact->phone_mobile} - {$oContact->name} \n\n{$smsResponse} \n\n{$oSmsMsg->description}";
        $oTask->save();
    }
}

?>