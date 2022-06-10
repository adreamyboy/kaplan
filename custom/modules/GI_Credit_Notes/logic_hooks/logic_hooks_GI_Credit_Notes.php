<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_GI_Credit_Notes {

	function before_save_method($bean, $event, $arguments) {
		updateCreditNote($bean);
    }
    
	function after_relationship_add_method($bean, $event, $arguments) {
		updateCreditNote($bean);
		$bean->save();
    }
    
	function after_relationship_delete_method($bean, $event, $arguments) {
        if ($bean->deleted == 0) {
			updateCreditNote($bean);
			$bean->save();
		}
    }
    
    function before_delete_method($bean, $event, $arguments) {
        if (count($bean->get_payments()) > 0) {
            $bean->deleted = 0;
			$params = array(
				'module'=> 'GI_Credit_Notes',
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