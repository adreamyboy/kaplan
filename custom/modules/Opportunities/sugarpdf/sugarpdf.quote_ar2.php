<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');

class OpportunitiesSugarpdfquote_ar extends Sugarpdf
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
        
        // set some language dependent data:
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $lg['a_meta_dir'] = 'rtl';

        // set some language-dependent strings (optional)
        $this->setLanguageArray($lg);
        
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = '#f2eee9';
        $opportunity = $this->bean;
        $account = current($opportunity->get_accounts());
        $contact = current($opportunity->get_contacts_list());
        //$opportunity_date = ($opportunity->date_closed != '') ? date("d M Y", strtotime($opportunity->date_closed)) : date("d M Y", strtotime($opportunity->date_entered));
        $opportunity_date = ($opportunity->date_closed != '') ? date("d M Y", strtotime($opportunity->date_closed)) : date("d M Y");
        
        if ($opportunity->status_c == 'Opportunity') {
            $type = 'فاتورة مبدئية';  // Proforma
        } else {
            $type = 'فاتورة ضريبية';  // Invoice
        }
		
		/*
		if ($contact->primary_address_country != '') $primary_address[] = $contact->primary_address_country;
		if ($contact->primary_address_city != '') $primary_address[] = $contact->primary_address_city;
		if ($contact->primary_address_street != '') $primary_address[] = implode(',', explode('<br />',nl2br($contact->primary_address_street)));
		if ($contact->primary_address_postalcode != '') $primary_address[] = $contact->primary_address_postalcode;
		$account_billing_address = implode(', ', $primary_address);
		*/
		
		if ($account->billing_address_country != '') $billing_address[] = $account->billing_address_country;
		if ($account->billing_address_city != '') $billing_address[] = $account->billing_address_city;
		if ($account->billing_address_street != '') $billing_address[] = implode(',', explode('<br />',nl2br($account->billing_address_street)));
		if ($account->billing_address_postalcode != '') $billing_address[] = $account->billing_address_postalcode;
		$account_billing_address = implode('، ', $billing_address);
		
        $html = <<<PDF
<table border="0">
	<tr>
		<td valign="top">
			<img width="200" src={$logo}></img>
		</td>
		<td valign="top">
			<ul>
				<li>التاريخ:&nbsp;<span dir='ltr'>{$opportunity_date}</span></li>
				<li>رقم الفاتورة:&nbsp;<span dir='ltr'>{$opportunity->name}</span></li>
				<li>اسم الحساب:&nbsp;<span dir='ltr'>{$account->name}</span></li>
				<li>العنوان:&nbsp;<span dir='ltr'>{$account_billing_address}</span></li>
				<li>لعناية:&nbsp;<span dir='ltr'>{$contact->name}</span></li>
				<li>الوظيفة:&nbsp;<span dir='ltr'>{$contact->title}</span></li>
			</ul>
		</td>
	</tr>
</table>
PDF;

        $this->SetY(10);
        //$this->SetFont(PDF_FONT_NAME_MAIN, 'B', 10);
        $this->SetFont('aealarabiya', 'B', 10);
        $this->setRTL(true);
		$this->writeHTML($html, true, false, false, false, '');
        $this->drawLine();
        $this->setRTL(false);
    }

    /**
     * Custom footer
     */
    public function Footer()
    {
        $this->setRTL(true);
        $this->SetFont('aealarabiya', '', 11);
        $this->SetY(-40);
        
        $signature = '<p style="text-align: center;">هذه الوثيقة قد تم إصدارها إلكترونيا ولا تتطلب توقيعا، ولا يجوز نفي صلاحيتها (فقط) على أساس أنها غير موقّعة.</p>';
		$this->writeHTML($signature, true, false, false, false, '');
        
        $this->drawLine();
		
        $address = '<p style="text-align: center;">كابلان جينيسيس، مكتب 2401، فيجين تاور، دبي، الإمارات العربية المتحدة<br />هاتف: 0097145546184، فاكس: 0097145546194، صندوق بريد: 416639، بريد إلكتروني:&nbsp;<a href="mailto:info@kaplangenesis.com">info@kaplangenesis.com</a></p>';
		$this->writeHTML($address, true, false, false, false, '');
        
        $pages = '<p>صفحة ' . $this->getAliasNumPage() . ' من ' . $this->getAliasNbPages() . '</p>';
		$this->writeHTML($pages, true, false, false, false, '');
        $this->setRTL(false);
    }

    /**
     * Predisplay content
     */
    function preDisplay()
    {
        //Adds a predisplay page
        $this->AddPage();
        //$this->SetFont(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN);
        $this->SetFont('aealarabiya','',PDF_FONT_SIZE_MAIN);
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
        //$this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetFont('aealarabiya','',10);//PDF_FONT_SIZE_MAIN);
        $this->SetY(60);
        $this->SetMargins(PDF_MARGIN_LEFT, 60, PDF_MARGIN_RIGHT, 100);
        
        $bg = '#f2eee9';
        $opportunity = $this->bean;
        
        //$opportunity_total_before_discounts = number_format($opportunity->total_before_discounts_c, 2, ".", ",");
        $opportunity_total_before_discounts = 0;
        //$opportunity_total_discounts = number_format($opportunity->total_discounts_c, 2, ".", ",");
        $opportunity_total_discounts = 0;
        //$opportunity_amount = number_format($opportunity->amount, 2, ".", ",");
        $opportunity_amount = 0;
        
        // Show 'Currency' and 'Line Items'
        if ($opportunity->status_c == 'Opportunity') {
            $type = 'فاتورة مبدئية'; // Proforma
        } else {
            $type = 'فاتورة ضريبية'; // Invoice
        }
        
        $html = <<<PDF
<h2>{$type}</h2>
<p>كل المبالغ المذكورة بعملة&nbsp;<span dir="ltr">{$opportunity->currency_name}</span></p>
<!--<h3>Line Items</h3>-->
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="240"><b>الوصف</b></td>
			<!--td width="30"><b>Qty</b></td-->
			<td width="60"><b>سعر الوحدة</b></td>
			<!--td width="60"><b>Unit Discount</b></td-->
			<td width="60"><b>مجموع الخصم</b></td>
			<td width="60"><b>المجموع قبل ضريبة القيمة المضافة</b></td>
			<td width="60"><b>مبلغ ضريبة القيمة المضافة</b></td>
			<td width="60"><b>المجموع بعد ضريبة القيمة المضافة</b></td>
		</tr>
PDF;
		
		$collection = $opportunity->get_line_items();
		
        foreach ($collection as $item) {
            $product = current($item->get_products());
            $contact = current($item->get_contacts());
            
            if ($item->unit_price > 0) {
	            if ($product->type == 'Service') {
	                $product_details = "<b>{$product->name}</b><br />{$contact->name} ({$product->date_start_c} - {$product->date_end_c})";
	            } else {
	                $product_details = "<b>{$product->name}</b>";
	            }
	            $product_description = html_entity_decode($product->description);
	            
	            $item_unit_price = number_format($item->unit_price, 2, ".", ",");
	            $item_total_discount = number_format($item->total_discount, 2, ".", ",");
	            $item_total_before_vat = number_format($item->total_before_vat_c, 2, ".", ",");
	            $item_vat_amount = number_format($item->vat_amount_c, 2, ".", ",");
	            $item_total_price_net = number_format($item->total_price_net, 2, ".", ",");
	            
	            if ($opportunity->status_c == 'Opportunity' && in_array($item->status_c, array('Interested_Hot', 'Interested_Warm', 'Interested_Cold')) ||
	                $opportunity->status_c != 'Opportunity' && in_array($item->status_c, array('Active', 'Suspended', 'Complete')))
	            {
			        $opportunity_total_before_discounts += ($item->unit_price * $item->quantity);
			        $opportunity_total_discounts += ($item->total_discount);
			        $opportunity_total_before_vat += ($item->total_before_vat_c);
			        $opportunity_total_vat_amount += ($item->vat_amount_c);
	                $opportunity_amount += $item->total_price_net;
			        
$html .= <<<PDF
		<tr>
			<td valign="top" width="240">
				<p>{$product_details}</p>
				{$product_description}
			</td>
			<!--td align="right" valign="top" width="30">
				<p>{$item->quantity}</p>
			</td-->
			<td align="right" valign="top" width="60">
				<p>{$item_unit_price}</p>
			</td>
			<!--td align="right" valign="top" width="60">
				<p>{$item->discount_rate}</p>
			</td-->
			<td align="right" valign="top" width="60">
				<p>{$item_total_discount}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$item_total_before_vat}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$item_vat_amount}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$item_total_price_net}</p>
			</td>
		</tr>
PDF;
                }
            }
        }
        
	    $opportunity_total_before_discounts = number_format($opportunity_total_before_discounts, 2, ".", ",");
	    $opportunity_total_discounts = number_format($opportunity_total_discounts, 2, ".", ",");
        $opportunity_total_before_vat = number_format($opportunity_total_before_vat, 2, ".", ",");
        $opportunity_total_vat_amount = number_format($opportunity_total_vat_amount, 2, ".", ",");
	    $opportunity_amount = number_format($opportunity_amount, 2, ".", ",");
	    
	    if ($opportunity->invoice_comments_c != '') {
			$opportunity_invoice_comments = '<p><b>ملاحظات:</b></p>' . nl2br($opportunity->invoice_comments_c);
	    }
	                
$html .= <<<PDF
		<tr>
			<td valign="top" width="240">
				<p>المجموع</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$opportunity_total_before_discounts}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$opportunity_total_discounts}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$opportunity_total_before_vat}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p>{$opportunity_total_vat_amount}</p>
			</td>
			<td align="right" valign="top" width="60">
				<p><b>{$opportunity_amount}</b></p>
			</td>
		</tr>
	</tbody>
</table>
<p>{$opportunity_invoice_comments}</p>
PDF;

/*
$html .= <<<PDF
		<tr>
			<td colspan="3" width="420">
				<p>Total Before Discounts</p>
			</td>
			<td colspan="2" align="right" valign="top" width="120">
				<p>{$opportunity_total_before_discounts}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="420">
				<p>Total Discounts</p>
			</td>
			<td colspan="2" align="right" valign="top" width="120">
				<p>{$opportunity_total_discounts}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="420">
				<p>Total Before VAT</p>
			</td>
			<td colspan="2" align="right" valign="top" width="120">
				<p>{$opportunity_total_before_vat}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="420">
				<p>Total VAT</p>
			</td>
			<td colspan="2" align="right" valign="top" width="120">
				<p>{$opportunity_total_vat_amount}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="420">
				<p>Total After VAT</p>
			</td>
			<td colspan="2" align="right" valign="top" width="120">
				<p><b>{$opportunity_amount}</b></p>
			</td>
		</tr>
	</tbody>
</table>
<p>{$opportunity_invoice_comments}</p>
PDF;
*/
        
        // Show 'Payments'
        /*
        $opportunity_total_payments = number_format($opportunity->total_payments_c, 2, ".", ",");
        $opportunity_total_installments = number_format($opportunity->total_installments_c, 2, ".", ",");
        $opportunity_total_refunds = number_format($opportunity->total_refunds_c, 2, ".", ",");
        $opportunity_total_creditnote_allocations = number_format($opportunity->total_creditnote_allocations_c, 2, ".", ",");
        $opportunity_total_unpaid = number_format($opportunity->total_unpaid_c, 2, ".", ",");
        
        $html .= <<<PDF
<p>&nbsp;</p>
<h3>Payments</h3>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="100"><b>Type</b></td>
			<td width="140"><b>Mode</b></td>
			<td width="100"><b>Amount</b></td>
			<td width="100"><b>Date Paid</b></td>
			<td width="100"><b>Date Cleared</b></td>
		</tr>
PDF;
		
		$collection = $opportunity->get_payments();
        foreach ($collection as $item) {
            if ($item->type != 'Installment') {
                $item_amount = number_format($item->amount, 2, ".", ",");
                
$html .= <<<PDF
		<tr>
			<td valign="top" width="100">
				<p>{$item->type}</p>
			</td>
			<td align="right" valign="top" width="140">
				<p>{$item->mode}</p>
			</td>
			<td align="right" valign="top" width="100">
				<p>{$item_amount}</p>
			</td>
			<td align="right" valign="top" width="100">
				<p>{$item->date_paid}</p>
			</td>
			<td align="right" valign="top" width="100">
				<p>{$item->date_cleared}</p>
			</td>
		</tr>
PDF;
            }
        }
$html .= <<<PDF
		<tr>
			<td colspan="3" width="340">
				<p>Total Payments</p>
			</td>
			<td colspan="2" align="right" valign="top" width="200">
				<p>{$opportunity_total_payments}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="340">
				<p>Total Installments</p>
			</td>
			<td colspan="2" align="right" valign="top" width="200">
				<p>{$opportunity_total_installments}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="340">
				<p>Total Refunds</p>
			</td>
			<td colspan="2" align="right" valign="top" width="200">
				<p>{$opportunity_total_refunds}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="340">
				<p>Total Credit Note Allocations</p>
			</td>
			<td colspan="2" align="right" valign="top" width="200">
				<p>{$opportunity_total_creditnote_allocations}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="340">
				<p>Total Unpaid</p>
			</td>
			<td colspan="2" align="right" valign="top" width="200">
				<p><b>{$opportunity_total_unpaid}</b></p>
			</td>
		</tr>
	</tbody>
</table>
PDF;
		*/
        
        // Show 'Payment Terms'
        
$html .= <<<PDF
<p>&nbsp;</p>
<h3>تفاصيل التسجيل الضريبي</h3>
<ul>
    <li>هذه الشركة مسجلة تحت اسم&nbsp;<span dir='ltr'>Kaplan Dubai Limited Dubai Branch</span>.</li>
    <li>رقم التسجيل التضريبي هو: 100331643500003</li>
</ul>
<h3>شروط الدفع</h3>
<ul>
    <li>يتم الدفع خلال 7 أيام من تاريخ الفاتورة.</li>
    <li>يجب أن يتم الدفع باسم&nbsp;<span dir='ltr'>"Kaplan Dubai Limited Dubai Branch"</span>.</li>
    <li>وفقا للقواعد واللوائح الصادرة عن الهيئة الاتحادية للضرائب (في دولة الإمارات العربية المتحدة)، يتعين على الشركات فرض ضريبة القيمة المضافة على جميع السلع والخدمات المقدمة اعتبارا من 1 يناير 2018.</li>
    <li>من خلال التسجيل فإنك توافق على الشروط أعلاه.</li>
</ul>
<h3>تفاصيل التحويل البنكي</h3>
<ul>
	<li>اسم الحساب:&nbsp;<span dir='ltr'>Kaplan Dubai Limited Dubai Branch</span></li>
	<li>رقم الحساب: 1015293493301</li>
	<li>رقم IBAN: AE440260001015293493301</li>
	<li>البنك:&nbsp;<span dir='ltr'>Emirates NBD - Jebel Ali - Dubai</span></li>
	<li>رمز السويفت: EBILAEAD</li>
</ul>
PDF;

		$tnc = html_entity_decode($opportunity->get_tnc_text());
		
		ob_end_clean();
		
        $this->setRTL(true);
		$this->writeHTML($html, true, false, false, false, '');
        $this->setRTL(false);
		if ($tnc != '' && $_REQUEST['hide_tnc'] != 1) {
            $this->setRTL(true);
			$this->writeHTML('<p>&nbsp;</p><p>* يرجى الرجوع إلى كافة <strong>&nbsp;الشروط والأحكام&nbsp;</strong> الواردة في الصفحات التالية.</p>', true, false, false, false, '');
            $this->setRTL(false);
			$this->addPage();
            $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
			$this->writeHTML($tnc, true, false, false, false, '');
		}
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
		$opportunity = $this->bean;
		
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
		if ($rcpt_email != '') {
			
			// Generate HTML variables to be parsed in the email template.
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
			$templateID = '46fec0f8-c1f6-95a0-2796-55229a8f6987';
			$emailTemp = new EmailTemplate();
			$emailTemp->retrieve($templateID);
			$emailTemp->disable_row_level_security = true;

			// Parse Subject & Body HTML If we used variable in subject.
			$emailTemp->subject = $emailTemp->parse_template_bean($emailTemp->subject,$opportunity->module_dir, $opportunity);
			$emailTemp->body_html = str_replace(array('$contact_name','$parent_id','$opportunity_line_items'), array($rcpt_name, $opportunity->id, $opportunity_line_items), $emailTemp->body_html);
			$emailTemp->body_html = $emailTemp->parse_template_bean($emailTemp->body_html,$opportunity->module_dir, $opportunity);
			
			// Create an Email bean.
			require_once ('modules/Emails/Email.php');
			$emailObj = new Email();
			$emailObj->id = create_guid();
			$emailObj->new_with_id = true;
			$defaults = $emailObj->getSystemDefaultEmail();
			
			// Create a PHP email.
			require_once('include/SugarPHPMailer.php');
			$mail = new SugarPHPMailer();
			$mail->From = 'info@kaplangenesis.com';  // $defaults['email']; // always send it from 'info@kaplangenesis.com' (instead of the default 'promotions@kaplangenesis.com')
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
				SugarApplication::appendErrorMessage("FAILED: Could not send the invoice email to (<a href='{$url}'>{$opportunity->name} / {$rcpt_email}</a>).  Please check with your System Administrator.");
			
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