<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Discounts {

    function before_save_method($bean, $event, $arguments) {
		updateDiscount($bean);        
    }

}
?>