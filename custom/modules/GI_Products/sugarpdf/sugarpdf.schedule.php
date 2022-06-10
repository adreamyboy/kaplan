<?php
ob_end_clean();

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');
//require_once('modules/Opportunities/sendEmail.php');

class GI_ProductsSugarpdfschedule extends Sugarpdf
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
        
		if ($product->hide_instructor_c == 1) {
			$instructor = "";
			$session_name_width = "260";
		} else {
			$instructor = "<td valign='top' width='80'><b>Instructor</b></td>";
			$session_name_width = "180";
		}
		
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
<h2>Schedule</h2>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="25"><b>No.</b></td>
			<td width="90"><b>Date</b></td>
			<td width="35"><b>Time</b></td>
			<td width="{$session_name_width}"><b>Session</b></td>
			<td width="65"><b>Duration</b></td>
			{$instructor}
			<td width="85"><b>Location</b></td>
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
        $pages = '<p>Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages() . '                       (Schedules are tentative and subject to change)</p>';
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
        $this->setPageOrientation('P', true, 37);
        $this->AddPage();
        $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetY(60);
        $this->SetMargins(8, 60, 8, 30);
        
        $bg = '#f2eee9';
        $product_id = $_REQUEST['record'];
        $product = new GI_Products();
        $product->retrieve($product_id);
        
        // Show 'Sessions' list
        
        $html = <<<PDF
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
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
                
                $item_date_start_date = date("D, M j, Y", strtotime($item->date_start));
                $item_date_start_time = date("H:i", strtotime($item->date_start));
                $item_date_start = date("D, M j, Y @ H:i", strtotime($item->date_start));
                
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
            <td valign="top" width="85">
                <p>{$item_location}</p>
            </td>
        </tr>
PDF;
                $item_date_start_date_previous = date("D, M j, Y", strtotime($item->date_start));
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
       $product_id = $_REQUEST['record'];
       $product = new GI_Products();
       $product->retrieve($product_id);
       //$this->fileName = 'schedule-' . $product->code . '-' date('Y-m-d') . '.pdf';
       $this->fileName = 'schedule-' . $product->code . '.pdf';
    }

    protected function sendAsEmail()
    {
        $this->Output($this->fileName, 'I');
        return true;
    }
    
    static function sort_collection_by_meeting_date($a, $b) {
        $name_a = $a->date_start;
        $name_b = $b->date_start;
        //return strcmp($name_a, $name_b);
		return (strtotime($name_a) < strtotime($name_b)) ? -1 : 1;
    }
}
