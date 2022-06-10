<?php
ob_end_clean();

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');

//require_once('modules/Opportunities/sendEmail.php');

class MeetingsSugarpdfqrcode extends Sugarpdf
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
    }

    /**
     * Custom footer
     */
    public function Footer()
    {
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
        $this->setPageOrientation('L', true, 25);
        $this->AddPage();
        $this->SetFont(PDF_FONT_NAME_MAIN,'',11);//PDF_FONT_SIZE_MAIN);
        $this->SetY(63);
        $this->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT, 20);
        
        $logo = 'custom/themes/default/images/company_logo.png';
        $bg = 'orange';
		
        $meeting_id = $_REQUEST['record'];
        $meeting = new Meeting();
        $meeting->retrieve($meeting_id);
		$meeting_date_start = date("l, d M Y @ H:i", strtotime($meeting->date_start));
		
        $html = <<<PDF
<table border="1" cellspacing="5" cellpadding="5">
	<tr>
        <!--
		<td valign="middle" width="100" rowspan="4" align="center">
            <img width="100" src={$logo}></img>
        </td>
		-->
		<td width="100"><strong>Session Date</strong></td>
		<td width="600">{$meeting_date_start}</td>
	</tr>
	<tr>
		<td width="100"><strong>Subject</strong></td>
		<td width="600">{$meeting->name}</td>
	</tr>
	<tr>
		<td width="100"><strong>Batch</strong></td>
		<td width="600">{$meeting->gi_products_meetings_1_name}</td>
	</tr>
	<tr>
		<td width="100"><strong>Survey Form</strong></td>
		<td width="600">{$meeting->gi_surveys_meetings_1_name}</td>
	</tr>
</table>
PDF;
		
		$this->SetY(10);
        //$this->SetFont(PDF_FONT_NAME_MAIN, 'B', 11);
        
		// set style for barcode
		$style = array(
			'border' => 2,
			'vpadding' => 'auto',
			'hpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);
		
        $this->writeHTML($html, true, false, false, false, '');
		
		// QRCODE,L : QR-CODE Low error correction
		//$this->write2DBarcode("http://www.genesisreview.com/portal/index.php?option=com_genesisreview&view=attendance&id={$meeting_id}", 'QRCODE,L', 90, 10, 50, 50, $style, 'N');
		if ($meeting->gi_surveys_meetings_1gi_surveys_ida != '') {
			$this->write2DBarcode($meeting_id, 'QRCODE,L', 80, 60, 100, 100, $style, 'N');
		} else {
			$this->writeHTML("<h1>QR Code can not be shown now, because a (Survey Template) is not yet selected.</h1><h2>Please check with Operations.</h2>", true, false, false, false, '');
		}
		//$this->Text(20, 25, 'QRCODE L');
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
		$meeting_id = $_REQUEST['record'];
		$meeting = new Meeting();
		$meeting->retrieve($meeting_id);
		$meeting_date_start = date("Y-m-d", strtotime($meeting->date_start));
		$this->fileName = "QR Code - {$meeting->name} - {$meeting_date_start}.pdf";
    }
}