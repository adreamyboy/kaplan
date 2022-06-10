<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');

class GI_PaymentsSugarpdfpayment extends Sugarpdf
{
    /**
     * Override
     */
    function process(){
        $this->display();
        $this->buildFileName();
    }

    /**
     * Custom header
     */
    public function Header()
    {
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = '#f2eee9';
		$payment = $this->bean;
        //$transaction_date = date("d M Y");
        $transaction_date = date("d M Y", strtotime($payment->date_paid));
        $opportunity = current($payment->get_opportunities());
        
        $html = <<<PDF
<table border="0">
	<tr>
		<td valign="top">
			<img width="200" src={$logo}></img>
		</td>
		<td valign="top">
			<ul>
				<li>{$payment->type} Date: {$transaction_date}</li>
				<li>{$payment->type} No: {$payment->name}</li>
				<li>Billed Account: {$opportunity->account_name}</li>
			</ul>
		</td>
	</tr>
</table>
PDF;

        $this->SetY(10);
        $this->SetFont(PDF_FONT_NAME_MAIN, 'B', 10);
		$this->writeHTML($html, true, false, false, false, '');
        $this->drawLine();
    }

    /**
     * Custom footer
     */
    public function Footer()
    {
        $pages = '<p>Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages() . '</p>';
        $signature = '<p style="text-align: center;">THIS IS A COMPUTER-GENERATED DOCUMENT AND IT DOES NOT REQUIRE A SIGNATURE.<br />THIS DOCUMENT SHALL NOT BE INVALIDATED SOLELY ON THE GROUND THAT IT IS NOT SIGNED.</p>';
		$address = '<p style="text-align: center;">Kaplan Genesis, Office 2401, Vision Tower, Business Bay, Dubai, United Arab Emirates<br />Tel: +971 4 554 6184, Fax: +971 4 554 6194, P.O. Box: 416639, Email: <a href="mailto:info@kaplangenesis.com">info@kaplangenesis.com</a></p>';
		
        $this->SetFont(PDF_FONT_NAME_MAIN, '', 9);
        $this->SetY(-40);
		$this->writeHTML($signature, true, false, false, false, '');
        $this->drawLine();
		$this->writeHTML($address, true, false, false, false, '');
		$this->writeHTML($pages, true, false, false, false, '');
    }

    /**
     * Predisplay content
     */
    function preDisplay()
    {
        //Adds a predisplay page
        $this->AddPage();
        $this->SetFont(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN);
        $this->Ln();
        $this->MultiCell(0,0,'Predisplay Content',0,'C');
    }

    /**
     * Main content
     */
    function display()
    {
		ob_start();
		
        //add a display page
        $this->AddPage();
        $this->setPageOrientation('P', true, 45);
        $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetY(50);
        $this->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT, 100);
        
        $bg = '#f2eee9';
        $payment = $this->bean;
        
        $due_date = date("d M Y", strtotime($payment->date_paid));
        
        $opportunity = current($payment->get_opportunities());
        
        
        // Prepare 'Reference' status
        if ($payment->reference_no_c != '') {
            $reference = ", reference {$payment->reference_no_c}";
        } else {
            $reference = "";
        }
        
        $payment_amount = number_format($payment->amount, 2, ".", ",");
        $opportunity_total_unpaid = number_format($opportunity->total_unpaid_c, 2, ".", ",");
        
        // Prepare 'Invoice' status
        if ($opportunity->total_unpaid_c <= 0) {
            $invoice = "<p>Invoice is fully paid.</p>";
        } elseif ($opportunity->total_unpaid_c > 0) {
            if ($payment->comments == '') {
                $invoice = "<p>As of the date of this transaction, there is an outstanding amount of {$opportunity_total_unpaid} still to be paid on this invoice.</p>";
            } else {
                $invoice = "";
            }
        }
        
        // Show 'Payment' details
        $html = <<<PDF
<h2>{$payment->type}</h2>
<p>All amounts in {$opportunity->currency_name}</p>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="400"><b>Description</b></td>
			<td width="140"><b>Amount</b></td>
		</tr>
		<tr>
			<td valign="top" width="400">
				<p>{$payment->type} against {$opportunity->name}, due on {$due_date}.</p>
				<p>Paid by {$payment->mode}{$reference}.</p>
				{$invoice}
				<p>{$payment->comments}</p>
			</td>
			<td align="right" valign="top" width="140">
				<p>{$payment_amount}</p>
			</td>
		</tr>
	</tbody>
</table>
PDF;

		ob_end_clean();
		
		$this->writeHTML($html, true, false, false, false, '');
    }

    /**
     * This method draw an horizontal line with a specific style.
     */
    protected function drawLine()
    {
        $this->SetLineStyle(array('width' => 0.85 / $this->getScaleFactor(), 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(220, 220, 220)));
        $this->MultiCell(0, 0, '', 'T', 0, 'C');
    }
    
    /**
     * Build filename
     */
    function buildFileName()
    {
        $this->fileName = $this->bean->name . '-' . date('Y-m-d-H-i') . '.pdf';
    }

    function emailPDF()
    {
		global $sugar_config;
		$payment = $this->bean;
		$opportunity = current($payment->get_opportunities());
		
		// Get the TO name and e-mail address for the message
		//$contacts = $opportunity->get_contacts_list();
		 $opportunity->load_relationship('contacts');
    $contacts = $opportunity->contacts->getBeans();
		if (count($contacts) > 0) {
			$person = current($contacts);
		} else {
			//$leads = $opportunity->get_leads();
			$opportunity->load_relationship('leads');
    $leads = $opportunity->leads->getBeans();
			if (count($leads) > 0) {
				$person = current($leads);
			}
		}
		$rcpt_name = $person->first_name . ' ' . $person->last_name;
		$rcpt_email = $person->email1;

		// Check if we need to send the logins immediately via email & whether the lead has an email address...
		if ($rcpt_email != '') {
			
			// Generate PDF invoice, and store file in the "upload" folder.
			$file_name = $this->fileName;
			// IMPORTANT NOTE: when we call the "Output" function, it changes the fileName to blank ''. Thus, we store the file name in a variable.
			try {
				$fp = fopen($sugar_config['upload_dir'].$file_name, 'wb');
				fclose($fp);
				$this->Output($sugar_config['upload_dir'].$file_name, 'F');


			} catch(Exception $e) {
				echo $e;
			}
		
			// Retrieve the email template.
			require_once('modules/EmailTemplates/EmailTemplate.php');
			$templateID = '8620ac22-ea17-0f28-20f4-552b49b792ab';
			$emailTemp = new EmailTemplate();
			$emailTemp->retrieve($templateID);
			$emailTemp->disable_row_level_security = true;

			// Parse Subject & Body HTML If we used variable in subject.
			$emailTemp->body_html = str_replace(array('$opportunity_account_name'), array($opportunity->account_name), $emailTemp->body_html);
			$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$opportunity->module_dir, $opportunity);
			$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$payment->module_dir, $payment);
			
			// Create an Email bean.
			require_once ('modules/Emails/Email.php');
			$emailObj = new Email();
			$emailObj->id = create_guid();
			$emailObj->new_with_id = true;
			$defaults = $emailObj->getSystemDefaultEmail();
			
			// Create a PHP email.
			require_once('include/SugarPHPMailer.php');
			$mail = new SugarPHPMailer();
			$mail->From = 'info@genesisreview.com';  // $defaults['email']; // always send it from 'info@genesisreview.com' (instead of the default 'promotions@genesisreview.com')
			$mail->FromName = $defaults['name'];
			$mail->ClearAllRecipients();
			$mail->ClearReplyTos();
			$mail->AddAddress($rcpt_email, $rcpt_name);
			$mail->Subject = from_html($emailTemp->subject);
			$mail->Body_html = from_html($emailTemp->body_html);
			$mail->Body = wordwrap($emailTemp->body_html, 900);
			$mail->IsHTML(true); // Omit or comment out this line if plain text
			
			// Attach PDF invoice to the mail.
			$mail->AddAttachment($sugar_config['upload_dir'].$file_name, $file_name, 'base64', 'application/pdf');
				
			// Send the message, log if error occurs
			$mail->prepForOutbound();
			$mail->setMailerForSystem();
			if (!$mail->Send()) {
				SugarApplication::appendErrorMessage("FAILED: Could not send the payment email to (<a href='{$url}'>{$payment->name} / {$rcpt_email}</a>).  Please check with your System Administrator.");
			
			} else {
				// Save the Email bean.
				global $current_user;
				$emailObj->parent_type = 'Opportunities';
				$emailObj->parent_id = $opportunity->id;
				$emailObj->to_addrs = $rcpt_email;
				$emailObj->to_addrs_ids = $person->id;
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
				
				// Create note, link it to the opportunity.
				$note = new Note();
				$note->modified_user_id = $current_user->id;
				$note->created_by = $current_user->id;
				$note->name = $file_name;
				$note->parent_type = 'Emails';
				$note->parent_id = $emailObj->id;
				$note->file_mime_type = 'application/pdf';
				$note->filename = $file_name;
				$note->save();
				
				// Rename the file (in "upload" folder) to attach it to the note.
				rename($sugar_config['upload_dir'].$file_name, $sugar_config['upload_dir'].$note->id);
				
				SugarApplication::appendErrorMessage("Invoice email was sent successfully.");
			}
		} else {

			SugarApplication::appendErrorMessage("FAILED: Could not send the invoice email to (<a href='{$url}'>{$opportunity->name} / {$rcpt_email}</a>).  Make sure that the contact has a primary email entered.");
		}
	}
	
}
