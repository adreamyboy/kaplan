<?php
  
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $db, $current_user;
//print_r($_POST);die;
$OppID         = $_POST['oppID'];
$invoiceAmount = $_POST['invoiceAmount'];
$userID        = $_POST['userID'];



$SQL = "UPDATE 
			opportunities 
			SET 
				edit_amount = '".$invoiceAmount."',
				payment_link_sent_date = '".date("Y-m-d h:i:s")."'
			WHERE id = '".$OppID."'";
		$RES = $db->query($SQL);
 
 
 //Send Mail
 
 $userObj = BeanFactory::getBean('Users',$userID);
 $userEmail = $userObj->email1;

$opp_Obj = BeanFactory::getBean('Opportunities',$OppID);
$opp_Obj->load_relationship('contacts');
$objContact = $opp_Obj->contacts->getBeans();
 
 	   
   foreach ($opp_Obj->contacts->getBeans() as $value)
   {
	
	$con_email = $value->email1;
	
   
 


//Send Email Template 
require_once('include/SugarPHPMailer.php');
$mail = new SugarPHPMailer();

//Attach template from email template  module
//require_once("include/phpmailer/class.phpmailer.php");
require_once("modules/Administration/Administration.php");
require_once("modules/EmailTemplates/EmailTemplate.php");

$emailtemplate = new EmailTemplate();
$emailtemplate = BeanFactory::getBean('EmailTemplates','2af303f5-7555-8a4d-998f-54b2d2497b98'); 

$emailtemplate->parsed_entities = null;
$temp = array();

$template_data = $emailtemplate->parse_email_template
(
array(
	  "subject" => $emailtemplate->subject,
	  "body_html" => $emailtemplate->parse_template_bean($emailtemplate->body_html,'Opportunities', $opp_Obj),
	  "body" => $emailtemplate->body,	
	),
	  'Opportunities',
	  $opp_Obj,
	  $temp
);

$email_body = $template_data["body_html"];
$email_body = str_replace('##BillList##',$billString,$template_data["body_html"]);
$email_subject = $template_data["subject"];

$admin  = new Administration();
$admin->retrieveSettings();
if ($admin->settings['mail_sendtype'] == "SMTP") {
	$mail->Host    = $admin->settings['mail_smtpserver'];
	$mail->Port     = $admin->settings['mail_smtpport'];
	if($admin->settings['mail_smtpssl']==1){
		$mail->SMTPSecure    = 'ssl';
	}
	if($admin->settings['mail_smtpssl']==2){
		$mail->SMTPSecure    = 'tls';
	}
	if($admin->settings['mail_smtpauth_req']) {
		$mail->SMTPAuth = TRUE;
		$mail->Username = $admin->settings['mail_smtpuser'];
		$mail->Password = $admin->settings['mail_smtppass'];
	}
	$mail->Mailer       = "smtp";
	$mail->SMTPKeepAlive     = true;
}
else{
	$mail->mailer         = 'sendmail';
}
  
$mail->From             = $userEmail;
//$mail->From             = $admin->settings['notify_fromaddress'];
//$mail->From = 'info@genesisreview.com'; 
$mail->FromName         = $admin->settings['notify_fromname'];
$mail->ContentType      = "text/html"; //"text/plain"
$mail->Subject          = $email_subject;
$mail->Body             = from_html($email_body);


// code for pdf attachment with mail         
	$to[$con_email]=$con_email;
	//$to[$con_email]= 'guptaanchal41@gmail.com';
	$mail->Subject = $email_subject;           
	
	
   foreach ($to as $name => $address){   			           
		$mail->AddAddress("{$address}", "{$name}");
	}
	if ($mail->send()) {
				//('Location: index.php?action=DetailView&module=Opportunities&record='.$opp_Obj->id.' ');
				
				
		// Create an Email bean.
			require_once ('modules/Emails/Email.php');
			$emailObj = new Email();
			$emailObj->id = create_guid();
			$emailObj->new_with_id = true;
			$defaults = $emailObj->getSystemDefaultEmail();
				
				
				
				// Save the Email bean.
				global $current_user;
				$emailObj->parent_type = 'Opportunities';
				$emailObj->parent_id = $opp_Obj->id;
				$emailObj->to_addrs = $con_email;
				$emailObj->to_addrs_ids = $value->id;
				$emailObj->type = 'archived';
				$emailObj->deleted = '0';
				$emailObj->name = $mail->Subject;
				$emailObj->description = $emailtemplate->body;
				$emailObj->description_html = $email_body;
				$emailObj->from_addr = $mail->From;
				$emailObj->date_sent = TimeDate::getInstance()->nowDb();
				$emailObj->modified_user_id = $userID;
				$emailObj->assigned_user_id = $userID;
				$emailObj->created_by = $userID;
				$emailObj->status = 'sent';
				$emailObj->save();
				
				SugarApplication::appendErrorMessage("Invoice email was sent successfully.");die;
                return true;
            }else{
				//header('Location: index.php?action=DetailView&module=Opportunities&record='.$opp_Obj->id.' ');
				$GLOBALS['log']->info("sendSugarPHPMail - Mailer error: " . $mail->ErrorInfo);
                return false;   
            } 

}
 
 
 //header('Location: index.php?module=Opportunities&action=DetailView&record=".$OppID."');

?>
