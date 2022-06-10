<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Attempts {

    function before_delete_method($bean, $event, $arguments) {
		
		$collection = $bean->get_responses();
		
		if (count($collection) > 0) {
            foreach ($collection as $item) {
				$item->deleted = 1;
				$item->save();
			}
	    }
    }
	
}
?>