<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');
require_once('modules/Opportunities/sendEmail.php');

class GI_Credit_NotesSugarpdfcreditnote extends Sugarpdf
{
    /**
     * Override
     */
    function process(){
        //$this->preDisplay();
        $this->display();
        $this->buildFileName();
        $this->sendAsEmail();
    }

    /**
     * Custom header
     */
    public function Header()
    {
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = 'orange';
        $credit_note_id = $_REQUEST['record'];
        $credit_note = new GI_Credit_Notes();
        $credit_note->retrieve($credit_note_id);
        
        $html = <<<PDF
<table border="0">
	<tr>
		<td valign="top">
			<img width="200" src={$logo}></img>
		</td>
		<td valign="top">
			<ul>
				<li>Credit Note Date: {$credit_note->date_issued_c}</li>
				<li>Credit Note No: {$credit_note->name}</li>
				<li>Account: {$credit_note->accounts_gi_credit_notes_1_name}</li>
				<li>Related Invoice: {$credit_note->invoice_c}</li>
			</ul>
		</td>
	</tr>
</table>
PDF;

        $this->SetY(10);
        $this->SetFont(PDF_FONT_NAME_MAIN, 'B', 10);
		$this->writeHTML($html, true, false, false, false, '');
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
        
        $bg = 'orange';
        $credit_note_id = $_REQUEST['record'];
        $credit_note = new GI_Credit_Notes();
        $credit_note->retrieve($credit_note_id);
        
        // Show 'Currency' and 'Line Items'
        $currency = new Currency();
        $currency->retrieve($credit_note->currency_id);
        
        $html = <<<PDF
<h2>CREDIT NOTE</h2>
<p>All amounts in {$currency->name}</p>
PDF;
        
        // Show 'Payments'
        
        $html .= <<<PDF
<p>&nbsp;</p>
<h3>Payments</h3>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="180"><b>Type</b></td>
			<td width="90"><b>Mode</b></td>
			<td width="90"><b>Amount</b></td>
			<td width="90"><b>Date Paid</b></td>
			<td width="90"><b>Date Cleared</b></td>
		</tr>
PDF;
		
		$collection = $credit_note->get_payments();
        foreach ($collection as $item) {
            if ($item->type == 'Refund' || $item->type == 'Credit_Note_Allocation') {
                $item_amount = number_format($item->amount, 2, ".", ",");
$html .= <<<PDF
		<tr>
			<td valign="top" width="180">
				<p>{$item->type}<br />against invoice: {$item->opportunities_gi_payments_1_name}</p>
			</td>
			<td valign="top" width="90">
				<p>{$item->mode}</p>
			</td>
			<td align="right" valign="top" width="90">
				<p>{$item_amount}</p>
			</td>
			<td align="right" valign="top" width="90">
				<p>{$item->date_paid}</p>
			</td>
			<td align="right" valign="top" width="90">
				<p>{$item->date_cleared}</p>
			</td>
		</tr>
PDF;
            }
        }
        
        $credit_note_amount = number_format($credit_note->amount_c, 2, ".", ",");
        $credit_note_amount_allocated = number_format($credit_note->amount_allocated_c, 2, ".", ",");
        $credit_note_amount_refunded = number_format($credit_note->amount_refunded_c, 2, ".", ",");
        $credit_note_amount_unallocated = number_format($credit_note->amount_unallocated_c, 2, ".", ",");
        
$html .= <<<PDF
		<tr>
			<td colspan="3" width="360">
				<p>Credit Note Amount</p>
			</td>
			<td colspan="2" align="right" valign="top" width="180">
				<p>{$credit_note_amount}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="360">
				<p>Amount Allocated</p>
			</td>
			<td colspan="2" align="right" valign="top" width="180">
				<p>{$credit_note_amount_allocated}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="360">
				<p>Amount Refunded</p>
			</td>
			<td colspan="2" align="right" valign="top" width="180">
				<p>{$credit_note_amount_refunded}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="360">
				<p>Amount Unallocated</p>
			</td>
			<td colspan="2" align="right" valign="top" width="180">
				<p><b>{$credit_note_amount_unallocated}</b></p>
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
        $this->fileName = 'creditnote-' . date('Y-m-d') . '.pdf';
    }

    protected function sendAsEmail()
    {
        $this->Output($this->fileName, 'I');
        return true;
		
		//ob_clean();
		
        $credit_note_id = $_REQUEST['record'];
        $credit_note = new GI_Credit_Notes();
        $credit_note->retrieve($credit_note_id);
		$collection = $credit_note->get_contacts_list();
		
		if (count($collection) > 0) {
			$contact = current($collection);
			try
			{
				//die('Throwing "die" from.... sugarpdf.quote.php');
				global $sugar_config;
				$fp = fopen($sugar_config['upload_dir'] . $this->fileName, 'wb');
				fclose($fp);
				$this->Output($sugar_config['upload_dir'].$this->fileName, 'F');
				sendEmail::send_email($contact, $credit_note, '', $this->fileName, true);
				
			} catch(Exception $e) {
				echo $e;
			}
			
		} else {
			$this->Output($this->fileName, 'D');
		}
	}
	
}