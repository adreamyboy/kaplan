<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Locations {

    function before_delete_method($bean, $event, $arguments) {
        if (count($bean->get_products()) > 0 || count($bean->get_venues()) > 0) {
            $bean->deleted = 0;
			$params = array(
				'module'=> 'GI_Locations',
				'action'=>'DetailView', 
				'record' => $bean->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT delete this record (<a href="' . $url . '">' . $bean->name . '</a>) because it is already related to other records.');
			SugarApplication::redirect($url);
	    }
    }
    
}
?>