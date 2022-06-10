<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Payments {

    function before_save_method($bean, $event, $arguments) {
        updatePayment($bean);
    }
    
    function after_save_method($bean, $event, $arguments) {
        $collection = $bean->get_opportunities();
		if (count($collection) > 0) {
            $opportunity = current($collection);
            $collection = $opportunity->get_line_items();
            if (count($collection) > 0) {
				foreach ($collection as $item) {
	                if ($item->total_price > 0 && in_array($item->status_c, array('Interested_Cold','Interested_Warm','Interested_Hot'))) {
	                    //$item->status_c = 'Suspended';
						$item->status_c = 'Active';
	                    $item->save();
	                }
	            }
            }
            
            // saving opportunity here is important (even if it might get called above when saving a 'modified' lineitem
            $opportunity->save();
        }
        
        $collection = $bean->get_credit_notes();
		if (count($collection) > 0) {
            $credit_note = current($collection);
            $credit_note->save();
        }
    }
    
    function before_delete_method($bean, $event, $arguments) {
        if ($bean->verified_c == 1) {
            $bean->deleted = 0;
			$params = array(
				'module'=> 'GI_Payments',
				'action'=>'DetailView', 
				'record' => $bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT delete this payment (<a href="' . $url . '">' . $bean->name . '</a>) because it is already verified.');
			SugarApplication::redirect($url);
	    }
    }
	
}
?>
