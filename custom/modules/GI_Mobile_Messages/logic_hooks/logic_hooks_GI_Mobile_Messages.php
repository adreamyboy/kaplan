<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Mobile_Messages {
    
    function before_save_method($bean, $event, $arguments) {
        if ($bean->send_immediately_c == 1) {
			$bean->send_immediately_c = 0;
			$bean->send_push_notification();
		}
    }
	
}
?>