<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	
require_once('modules/Accounts/views/view.edit.php');

class CustomAccountsViewEdit extends AccountsViewEdit
{
	public function display()
	{
		$account = $this->bean;
		if ($account->individual_c) {
			$link        = 'contacts';
			$contacts    = $account->load_relationship($link);
			$contact     = current($account->$link->getBeans());
			$queryParams = array(
				'module' => 'Contacts',
				'action' => 'EditView',
				'record' => $contact->id,
				'return_module' => 'Accounts',
				'return_action' => 'DetailView',
				'return_id' => $account->id,
			);
			SugarApplication::redirect('index.php?' . http_build_query($queryParams));
			
		} else {
			parent::display();
		}
	}
}
?>