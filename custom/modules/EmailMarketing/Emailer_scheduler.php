<?php
global $db;
$SQL = "SELECT * FROM email_marketing WHERE deleted=0";
$RES = $db->query($SQL);

while($ROW = $db->fetchByAssoc($RES)){
	$date_start  = $ROW['date_start'];
    $campaign_id = $ROW['campaign_id'];
	$dateStart = strtotime($date_start);
	
	$currentDate = Date('Y-m-d h:i:s a');
    $current_Date = strtotime($currentDate);
	

	//if($current_Date == $dateStart)
	//{
		//echo $campaign_id;
		//echo"STRING";
		$campObj = BeanFactory::getBean('Campaigns', $campaign_id); 
		//print_r($campObj);
	    $campObj->load_relationship('prospectlists'); 
	    $targetlist = $campObj->prospectlists->getBeans();
       // echo"=========================================================================================================";
     // print_r($targetlist);
	 // die;
    foreach ($targetlist as $value)
    {
	   
	  $target_list_name  = $value->name;
	  $target_list_entry = $value->entry_count;
	  
	  //Contacts
	  $contactrelation   = $value->load_relationship('contacts');
      $contacts_info     = $value->contacts->getBeans();
     
       foreach($contacts_info as $val)
       {
             $tos =  $val->email1 ;     		     
             $name =  $val->first_name;     		     
		     $subject = 'Activity Management System Login Details';
			 $body= '';
			 $body= "Dear  <br><br>Welcome to Union Insurance Activity Management System. <br>";
			 sendSugarPHPMail($tos, $subject, $body); 
	   }
       //Accounts
        $account_relation  =  $value->load_relationship('accounts');
        $accounts_info     =  $value->accounts->getBeans();
	  
	  
	  foreach ($accounts_info as $account)
	  {
			 $tos =  $account->email1 ;     		     
             $name =  $account->name;     		     
		     $subject = 'Activity Management System Login Details';
			 $body= '';
			 $body= "Dear  <br><br>Welcome to Union Insurance Activity Management System. <br>";
			 sendSugarPHPMail($tos, $subject, $body); 
	 }		 
			
		//Leads
		$leads_relation  =  $value->load_relationship('leads');
        $leads_info      =  $value->leads->getBeans();
	  
	  foreach ($leads_info as $lead)
	  {
				$tos =  $lead->email1 ;     		     
             $name =  $lead->first_name;     		     
		     $subject = 'Activity Management System Login Details';
			 $body= '';
			 $body= "Dear  <br><br>Welcome to Union Insurance Activity Management System. <br>";
			 sendSugarPHPMail($tos, $subject, $body); 
			
	  }	
											  
	} //foreach										
																				
  //}	//if							
	
}//while

//die;



function sendSugarPHPMail($tos, $subject, $body)
							{
							    require_once 'include/SugarPHPMailer.php';
							    require_once 'modules/Administration/Administration.php';
							    global $current_user;
							    $mail = new SugarPHPMailer();
							    $admin = new Administration();
							    $admin->retrieveSettings();
							    if ($admin->settings['mail_sendtype'] == "SMTP") {
							        $mail->Host = $admin->settings['mail_smtpserver'];
							        $mail->Port = $admin->settings['mail_smtpport'];
							        if ($admin->settings['mail_smtpauth_req']) {
							            $mail->SMTPAuth = TRUE;
							            $mail->Username = $admin->settings['mail_smtpuser'];
							            $mail->Password = $admin->settings['mail_smtppass'];
							        }
							        $mail->Mailer = "smtp";
							        $mail->SMTPKeepAlive = true;
							    } else {
							        $mail->mailer = 'sendmail';
							    }
							    $mail->IsSMTP();
							    // send via SMTP
							    if ($admin->settings['mail_smtpssl'] == '2') {
							        $mail->SMTPSecure = "tls";
							    } elseif ($admin->settings['mail_smtpssl'] == '1') {
							        $mail->SMTPSecure = "ssl";
							    }
							    $mail->CharSet = 'UTF-8';
							    $mail->From = $admin->settings['notify_fromaddress'];
							    $mail->FromName = $admin->settings['notify_fromname'];
							    $mail->ContentType = "text/html";
							    //"text/plain"
							    $mail->IsHTML(true);
							    $mail->Subject = $subject;
							    $mail->Body = $body;
							    foreach ($tos as $name => $address) {
							        $mail->AddAddress("{$address}", "{$name}");
							    }
							    if (!$mail->send()) {
							        $GLOBALS['log']->info("sendSugarPHPMail - Mailer error: " . $mail->ErrorInfo);
							        return false;
							    } else {
							        return true;
							    }
							}






?>

