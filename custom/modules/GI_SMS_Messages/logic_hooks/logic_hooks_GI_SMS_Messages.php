<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_SMS_Messages {
    
    function after_save_method($bean, $event, $arguments) {
        SendBulkSMS($bean);
    }
    
}
?>