<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/gi_functions_custom.php');

class logic_hooks_Meetings {

	function after_save_method($bean, $event, $arguments) {
		
		// When an activitiy is added, update the opportunity's first/last/next activities & their dates
		$link = 'opportunity';
		if ($bean->load_relationship($link)) {
			$collection = $bean->$link->getBeans();
			if (count($collection) > 0) {
				$opportunity = current($collection);
				$opportunity->save();
			}
		}
	}

}
?>