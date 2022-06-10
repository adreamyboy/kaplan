<?php
ob_end_clean();

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');
require_once('custom/modules/gi_functions_custom.php');
//require_once('modules/Opportunities/sendEmail.php');

class GI_ProductsSugarpdfsigninsheet extends Sugarpdf
{
    /**
     * Override
     */
    function process(){
        //$this->preDisplay();
        $this->display();
        $this->buildFileName();
        //$this->sendAsEmail();
    }

    /**
     * Custom header
     */
    public function Header()
    {
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = '#f2eee9';
        $product_id = $_REQUEST['record'];
        $product = new GI_Products();
        $product->retrieve($product_id);
        
        $html = <<<PDF
<table border="0">
    <tr>
        <td valign="top">
            <img width="200" src={$logo}></img>
        </td>
        <td valign="top">
            <ul>
                <li>Code: {$product->code}</li>
                <li>Name: {$product->name}</li>
            </ul>
        </td>
    </tr>
</table>
<h2>Sign-in Sheet</h2>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="30"><b>No.</b></td>
			<td width="350"><b>Delegate Name</b></td>
			<td width="160"><b>Signature</b></td>
		</tr>
	</tbody>
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
        //$signature = '<p style="text-align: center;">THIS IS A COMPUTER-GENERATED DOCUMENT AND IT DOES NOT REQUIRE A SIGNATURE.<br />THIS DOCUMENT SHALL NOT BE INVALIDATED SOLELY ON THE GROUND THAT IT IS NOT SIGNED.</p>';
		//$address = '<p style="text-align: center;">Kaplan Dubai Limited, 2nd Floor, Rolex Tower, Financial Centre, Sheikh Zayed Road, Dubai, United Arab Emirates<br />Tel: +971 4 554 6184, Fax: +971 4 554 6194, P.O. Box: 416639, Email: <a href="mailto:info@kaplanme.com">info@kaplanme.com</a></p>';
        
        $this->SetFont(PDF_FONT_NAME_MAIN, '', 9);
        $this->SetY(-20);
        //$this->writeHTML($signature, true, false, false, false, '');
        $this->drawLine();
        //$this->writeHTML($address, true, false, false, false, '');
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
        //add a display page
        $this->AddPage();
        $this->setPageOrientation('P', true, 30);
        $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetY(65);
        $this->SetMargins(PDF_MARGIN_LEFT, 60, PDF_MARGIN_RIGHT, false);
        
        $bg = '#f2eee9';
        $product_id = $_REQUEST['record'];
        $product = new GI_Products();
        $product->retrieve($product_id);
        
        
        // Show 'Delegates' list
        
        $html = <<<PDF
<table border="0" cellspacing="0" cellpadding="3">
	<tbody>
PDF;
        $i = 0;
        $price = toNumber($product->price);
        //$collection = $product->get_line_items($product->status_c);
        $collection = $product->get_line_items();
        
		usort($collection, array("GI_ProductsSugarpdfsigninsheet", "sort_collection_by_contact_name"));
		
        foreach ($collection as $item) {
            if (($price == 0 && in_array($item->status_c, array('Interested_Hot', 'Interested_Warm', 'Interested_Cold', 'Suspended', 'Active', 'Complete'))) ||
                ($price > 0 && in_array($item->status_c, array('Active', 'Suspended')))) // for RP
                //($price > 0 && in_array($item->status_c, array('Suspended', 'Active', 'Complete')))) // for non-RP
            {
	            
	            unset($contact);
	            $contacts = $item->get_contacts();
	            if (count($contacts) > 0) {
	                $i++;
	                $contact = current($contacts);
	                
$html .= <<<PDF
        <tr>
            <td valign="top" width="30">
                <p>{$i}</p>
            </td>
            <td valign="top" width="350">
                <p><b>{$contact->first_name} {$contact->last_name}</b></p>
            </td>
            <td valign="top" width="160">
                <p>____________________</p>
                <p>&nbsp;</p>
            </td>
        </tr>
PDF;
	            
	            }
            }
        }

$html .= <<<PDF
    </tbody>
</table>
PDF;
        
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
        $this->fileName = 'schedule-' . date('Y-m-d') . '.pdf';
    }

    protected function sendAsEmail()
    {
        $this->Output($this->fileName, 'I');
        return true;
    }
    
    static function sort_collection_by_contact_name($a, $b) {
        $name_a = $a->fetched_rel_row['contacts_gi_line_items_1_name'];
        $name_b = $b->fetched_rel_row['contacts_gi_line_items_1_name'];
        return strcmp($name_a, $name_b);
    }
}
