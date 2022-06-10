<?php

/*
Use:
- Download the training calender (in PDF format) for a list of filtered products.

Input Params:
- product_type: the type of the products ("Good" or "Service") to be included in the generated training calender.
- product_name: the "Name" of the products to be included in the generated training calender. It follows SQL's LIKE syntax.
- product_code: the "Code" of the products to be included in the generated training calender. It follows SQL's LIKE syntax.
- operator: specify if the products' filter must match both "product_name" & "product_code" together, or just anyone of them.

Output Params:
- Downloading the training calendar in PDF format.
*/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

// https://www.kaplangenesis.com/crm/index.php?entryPoint=downloadTrainingCalendarEntryPoint&product_name=level%%20cfa%pro%&product_type=Service&operator=Or&product_code=

require_once('custom/modules/gi_functions_custom.php');
require_once('include/Sugarpdf/Sugarpdf.php');

class GI_ProductsSugarpdfcalender extends Sugarpdf
{
    /**
     * Override
     */
    
    function process($v1, $v2, $v3, $v4){
        $this->display($v1, $v2, $v3, $v4);
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
        
        $html = <<<PDF
<table border="0">
    <tr>
        <td valign="top">
            <img width="200" src={$logo}></img>
        </td>
        <td valign="top">
            <ul>
                <li></li>
                <li></li>
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
    function display($product_name, $product_type, $operator, $product_code)
    {
        //add a display page
        $this->AddPage();
        $this->setPageOrientation('P', true, 45);
        $this->SetFont(PDF_FONT_NAME_MAIN,'',9);//PDF_FONT_SIZE_MAIN);
        $this->SetY(50);
        $this->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT, 100);
        
        $bg = '#f2eee9';
        
        // Show 'Sessions' list
        
        $html = <<<PDF
<h3>Training Calendar</h3>
<table border="1" cellspacing="0" cellpadding="3">
	<tbody>
		<tr style="background-color: {$bg}">
			<td width="30"><b>No.</b></td>
			<td width="260"><b>Product</b></td>
			<td width="70"><b>Start Date</b></td>
			<td width="90"><b>Duration (Days)</b></td>
			<!--
			<td width="100"><b>Term</b></td>
			<td width="100"><b>Location</b></td>
			-->
			<td width="40"><b>Price (AED)</b></td>
			<td width="45"><b>Action</b></td>
		</tr>
PDF;
        $i = 0;
        
        global $db;
        global $sugar_config;
        $joomla_url = $sugar_config['joomla_url'];
        
        $module = 'GI_Products';
        
        $bean1 = BeanFactory::newBean($module);
        
        // Always include "Web Hidden = 0" products.
        $where = " gi_products.web_hidden = 0 ";
        
        // Set the "Type" filter.
        if ($product_type != '') {
            $where .= " AND gi_products.type = '{$product_type}' ";
        }
        
        // Set the "Code" & "Name" filter, using the right operator.
        $filter = array();
        if ($product_name != '') {
            $filter[] = "gi_products.name LIKE('{$product_name}')";
        }
        if ($product_code != '') {
            $filter[] = "gi_products.code LIKE('{$product_code}')";
        }
        $name_code_filter = ($operator == 'And') ? implode(' AND ', $filter) : implode(' OR ', $filter);
        if ($name_code_filter != '') {
            $where .= " AND ({$name_code_filter}) ";
        }
        
        // Set "ORDER BY".
        $order_by = ' date_start_c ASC, name ASC ';
        //$order_by = ' date_start_c ASC ';
        
        $fields = array();
        $params = array();
        $show_deleted = 0;
        $join_type = '';
        $return_array = true;
        $parentbean = null;
        $singleSelect = false;
        
        $query = $bean1->create_new_list_query($order_by, $where, $fields, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect);
        $sql = "{$query['select']} {$query['from']} {$query['where']} {$query['order_by']}";
        $result = $bean1->process_list_query($sql, 0, 1000, 1000, '');
        //$result = $bean1->process_list_query($sql);
        
        $collection = $result['list'];
        
        foreach ($collection as $product) {
            
            $i++;
            
            $product_date_start = ($product->date_start_c == '') ? '' : date("d M Y", strtotime($product->date_start_c));
            $product_date_end = date("d M Y", strtotime($product->date_end_c));
            $product_price = number_format($product->price, 0, ".", ",");;
            
            $product_duration_days = '';
            if ($product->number_of_sessions_c != '') {
                $product_duration_days = $product->number_of_sessions_c . ' days';
            }
            if ($product->days_c != '') {
            
                $days_array = array(
                    1 => 'Sun',
                    2 => 'Mon',
                    3 => 'Tue',
                    4 => 'Wed',
                    5 => 'Thu',
                    6 => 'Fri',
                    7 => 'Sat',
                );
                $days_num = explode(',', str_replace('^', '', $product->days_c));
                $days = array();
                foreach ($days_num as $key=>$value) {
                    $days[] = $days_array[$value];
                }
                $product_duration_days = $product_duration_days . ' (' . implode(',', $days) . ')';
            }
            
            if ($product->hide_add_to_cart_c == '1') {
                $add_to_cart_link = "";
            } else {
                $joomla_url = $sugar_config['joomla_url'];
                $add_to_cart_link = "<a href='{$joomla_url}/index.php?option=com_genesisreview&view=register&product_id={$product->id}' target='_blank'>Register</a>";
            }
            
            $html .= <<<PDF
        <tr>
            <td valign="top" width="30">
                <p>{$i}</p>
            </td>
            <td valign="top" width="260">
                <!--<p><a href="{$joomla_url}/index.php?option=com_genesisreview&view=register&product_id={$product->id}">{$product->name}</a></p>-->
                <p>{$product->name}</p>
                
            </td>
            <td valign="top" width="70">
                <p>{$product_date_start}</p>
            </td>
            <td valign="top" width="90">
                <p>{$product_duration_days}</p>
            </td>
            <!--
            <td valign="top" width="100">
                <p>{$product->gi_terms_gi_products_1_name}</p>
            </td>
            <td valign="top" width="100">
                <p>{$product->gi_locations_gi_products_1_name}</p>
            </td>
            -->
            <td valign="top" width="40">
                <p>{$product_price}</p>
            </td>
            <td valign="top" width="45">
                <p>{$add_to_cart_link}</p>
            </td>
        </tr>
PDF;
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
        $this->Output($this->fileName, 'I');
        return true;
    }
    
    static function sort_collection_by_meeting_date($a, $b) {
        $name_a = $a->date_start_c;
        $name_b = $b->date_start_c;
        return strcmp($name_a, $name_b);
    }
}

$pdf = new GI_ProductsSugarpdfcalender();
ob_end_clean();
$pdf->process($_REQUEST['product_name'], $_REQUEST['product_type'], $_REQUEST['operator'], $_REQUEST['product_code']);

?>
