<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class GI_Line_ItemsViewDetail extends ViewDetail  {
	
	function display() {
		
		$line_item = $this->bean;
		
		$product_id = $line_item->gi_products_gi_line_items_1gi_products_ida;
		$product = new GI_Products();
		$product->retrieve($product_id);
		
		if (isset($product->gi_exam_results_gi_products_1gi_exam_results_ida)) {
			$this->ss->assign('exam_id', $product->gi_exam_results_gi_products_1gi_exam_results_ida);
		}
		
		parent::display();
	}
	
}
?>
