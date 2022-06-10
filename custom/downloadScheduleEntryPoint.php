<?php

/*
Use:
- Download the products' schedule (in PDF format).

Input Params:
- product_id: the "ID" of the product which we need to generate its schedule.
- dtype: indicates how you want to download the PDF file:  "I" (default) opens the PDF within the browser itself, or "D" (backward compatibility) downloads the PDF locally.

Output Params:
- Downloading the product's schedule in PDF format.
*/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

// http://localhost/crm3/index.php?entryPoint=downloadScheduleEntryPoint&product_id=S-1658

require_once('include/Sugarpdf/Sugarpdf.php');
require_once('modules/GI_Products/GI_Products.php');

class GI_ProductsSugarpdfschedule extends Sugarpdf
{
    /**
     * Override
     */
    
    var $product;
    
    function process(){
        $this->display();
        $this->buildFileName();
        $this->download();
    }

    /**
     * Custom header
     */
    public function Header()
    {
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = '#f2eee9';
        $product = $this->product;
        
        $html = <<<PDF
<table border="0">
    <tr>
        <td valign="top" width="220">
            <img width="200" src={$logo}></img>
        </td>
        <td valign="top" width="330">
            <ul>
                <li>Code: {$product->code}</li>
                <li>Name: {$product->name}</li>
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
        //$signature = '<p style="text-align: center;">THIS IS A COMPUTER-GENERATED DOCUMENT AND IT DOES NOT REQUIRE A SIGNATURE.<br />THIS DOCUMENT SHALL NOT BE INVALIDATED SOLELY ON THE GROUND THAT IT IS NOT SIGNED.</p>';
        $signature = '';
        $address = '<p style="text-align: center;">Kaplan Dubai Limited, 2nd Floor, Rolex Tower, Financial Centre, Sheikh Zayed Road, Dubai, United Arab Emirates<br />Tel: +971 4 554 6184, Fax: +971 4 554 6194, Email: <a href="mailto:info@kaplanme.com">info@kaplanme.com</a></p>';
        
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
        //add a display page
        $this->AddPage();
        $this->setPageOrientation('P', true, 45);
        $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetY(40);
        $this->SetMargins(8, 50, 8, 100);
        
        $bg = '#f2eee9';
        $product = $this->product;
        
        if ($product->hide_instructor_c == 1) {
            $instructor = "";
            $session_name_width = "260";
        } else {
            $instructor = "<td valign='top' width='80'><b>Instructor</b></td>";
            $session_name_width = "180";
        }
        
        // Show 'Sessions' list
        
        $html = <<<PDF
<h3>Sessions</h3>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="25"><b>No.</b></td>
			<td width="90"><b>Date</b></td>
			<td width="35"><b>Time</b></td>
			<td width="{$session_name_width}"><b>Session</b></td>
			<td width="65"><b>Duration</b></td>
			{$instructor}
			<td width="95"><b>Location</b></td>
		</tr>
PDF;
        $i = 0;
        $collection = $product->get_sessions();
        
        usort($collection, array("GI_ProductsSugarpdfschedule", "sort_collection_by_meeting_date"));
        
        foreach ($collection as $item) {
            
			if ($item->web_hidden_c != 1) {
                
                $duration1 = array();
                
                if ($item->duration_hours > 0) {
                    $duration1[] = $item->duration_hours . ' hr';
                }
                if ($item->duration_minutes > 0) {
                    $duration1[] = $item->duration_minutes . ' min';
                }
                
                $duration = implode(', ', $duration1);
                
                //$duration = $item->duration_hours . ':' . str_pad($item->duration_minutes, 2, '0', STR_PAD_LEFT);
                
                $item_date_start_date = date("D, M j, Y", strtotime($item->date_start . "+ 4 hours"));
                $item_date_start_time = date("H:i", strtotime($item->date_start . "+ 4 hours"));
                $item_date_start = date("D, M j, Y @ H:i", strtotime($item->date_start . "+ 4 hours"));
                
                if ($item_date_start_date_previous == $item_date_start_date) {
                    //$item_date_start = '';
                    $item_date_start_date = '';
                    $count = '';
                } else {
                    $i++;
                    $count = $i;
                }
                
                
                $item_location = ($item->location == '') ? "TBD" : $item->location;
                
                if ($product->hide_instructor_c == 1) {
                    $instructor = "";
                    $session_name_width = "260";
                } else {
                    $instructor = "<td valign='top' width='80'><p>{$item->assigned_user_name}</p></td>";
                    $session_name_width = "180";
                }
                
        $html .= <<<PDF
            <tr>
                <td valign="top" width="25">
                    <p>{$count}</p>
                </td>
                <td valign="top" width="90">
                    <p>{$item_date_start_date}</p>
                </td>
                <td valign="top" width="35">
                    <p>{$item_date_start_time}</p>
                </td>
                <td valign="top" width="{$session_name_width}">
                    <p>{$item->name}</p>
                </td>
                <td valign="top" width="65">
                    <p>{$duration}</p>
                </td>
                {$instructor}
                <td valign="top" width="95">
                    <p>{$item_location}</p>
                </td>
            </tr>
PDF;
                $item_date_start_date_previous = date("D, M j, Y", strtotime($item->date_start . "+ 4 hours"));
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

    protected function download()
    {
        $download_type = ($_REQUEST['dtype'] == 'D') ? 'D' : 'I';
        $this->Output($this->fileName, $download_type);
        return true;
    }
    
    static function sort_collection_by_meeting_date($a, $b) {
        $name_a = $a->date_start;
        $name_b = $b->date_start;
        //return strcmp($name_a, $name_b);
        return (strtotime($name_a) < strtotime($name_b)) ? -1 : 1;
    }
}

$product = new GI_Products();

if (isset($_REQUEST['product_id'])) {
    $product_id = $_REQUEST['product_id'];
    $product->retrieve($product_id);
    $pdf = new GI_ProductsSugarpdfschedule();
    $pdf->product = $product;
    ob_end_clean();
    $pdf->process();
}
?>
