<?php
ob_end_clean();

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/Sugarpdf/Sugarpdf.php');
require_once('custom/modules/gi_functions_custom.php');
//require_once('modules/Opportunities/sendEmail.php');

class GI_ProductsSugarpdfcertificates extends Sugarpdf
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
		// get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
		$img_dir = 'custom/modules/GI_Products/sugarpdf/';
		$img_file = ($_REQUEST['bg'] != '') ? ($_REQUEST['bg'] . '.png') : ('certificate.png');
		//die($img_dir . $img_file);
        $this->Image($img_dir . $img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
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
        $this->AddPage('L', 'A4');
        $this->SetFont(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN);
        $this->Ln();
        $this->MultiCell(0,0,'Predisplay Content',0,'C');
    }

    /**
     * Main content
     */
    function display()
    {
        
		$product_id = $_REQUEST['record'];
        $product = new GI_Products();
        $product->retrieve($product_id);
        
        // Show 'Delegates' list
        
        $price = toNumber($product->price);
		$sessions = $product->get_sessions();
        $collection = $product->get_line_items();
        
		usort($collection, array("GI_ProductsSugarpdfcertificates", "sort_collection_by_contact_name"));
		
        foreach ($collection as $item) {
            if (($price == 0 && in_array($item->status_c, array('Interested_Hot', 'Interested_Warm', 'Interested_Cold', 'Suspended', 'Active', 'Complete'))) ||
                ($price > 0 && in_array($item->status_c, array('Active', 'Suspended', 'Complete')))) // for RP
                //($price > 0 && in_array($item->status_c, array('Suspended', 'Active', 'Complete')))) // for non-RP
            {
	            
	            unset($contact);
	            $contacts = $item->get_contacts();
	            if (count($contacts) > 0) {
	                $i++;
	                $contact = current($contacts);
	                
					//add a display page
					$this->AddPage('L', 'A4');
					$this->setPageOrientation('L', true, 30);
					$this->SetFont(PDF_FONT_NAME_MAIN,'', 20);//PDF_FONT_SIZE_MAIN);
					$this->SetY(65);
					$this->SetMargins(PDF_MARGIN_LEFT, 60, PDF_MARGIN_RIGHT, false);
					
					$contact_name = "<p><strong>{$contact->first_name} {$contact->last_name}</strong></p>";
					$this->writeHTMLCell(257, 0, 20, 100, $contact_name, 0, 0, false, true, 'C', false);
					
					if ($_REQUEST['no_catalog'] != 1) {
						$catalog_name = "<p><strong>{$product->gi_products_catalog_gi_products_1_name}</strong></p>";
						$this->writeHTMLCell(257, 0, 20, 130, $catalog_name, 0, 0, false, true, 'C', false);
					}
					
					if ($_REQUEST['no_date'] != 1) {
						if ($product->date_start_c != '') {
							if ($product->date_start_c == $product->date_end_c) {
								$product_date = "<p>on  " . date('F j, Y', strtotime($product->date_start_c)) . "</p>";
							} else if (count($sessions) == 2) {
								$product_date = "<p>on  " . date('M j, Y', strtotime($product->date_start_c)) . "  and  " . date('M j, Y', strtotime($product->date_end_c)) . "</p>";
							} else {
								$product_date = "<p>from  " . date('M j, Y', strtotime($product->date_start_c)) . "  to  " . date('M j, Y', strtotime($product->date_end_c)) . "</p>";
							}
							$this->writeHTMLCell(257, 0, 20, 145, $product_date, 0, 0, false, true, 'C', false);
						}
					}
					
					if ($_REQUEST['no_location'] != 1) {
						$location_name = "<p>held in {$product->gi_locations_gi_products_1_name}</p>";
						$this->writeHTMLCell(257, 0, 20, 160, $location_name, 0, 0, false, true, 'C', false);
					}
	            }
            }
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
        $this->fileName = 'certificates-' . date('Y-m-d') . '.pdf';
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
	
	function addOrdinalNumberSuffix($num) {
		if (!in_array(($num % 100),array(11,12,13))){
			switch ($num % 10) {
				// Handle 1st, 2nd, 3rd
				case 1:  return $num.'st';
				case 2:  return $num.'nd';
				case 3:  return $num.'rd';
			}
		}
		return $num.'th';
	}	
}