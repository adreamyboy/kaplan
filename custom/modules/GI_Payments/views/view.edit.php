<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class GI_PaymentsViewEdit extends ViewEdit
{
	public function display()
	{
		global $current_user;
		
		$payment = $this->bean;
		
        // is user an admin?
        $isAdmin = is_admin($current_user);
        
		// hide "acl-fields" fields
		require_once('modules/acl_fields/fields_logic.php');
		$acl = new acl_fields_logic();
		$acl->limit_views($payment, 'before_display');
		
		// if "Verified" and "Not Admin", don't allow editing
		if ($payment->verified_c && !$isAdmin) {
			$params = array(
				'module'=> 'GI_Payments',
				'action'=>'DetailView', 
				'record' => $payment->id,
			);
			$url = 'index.php?' . http_build_query($params);
			SugarApplication::appendErrorMessage('You can NOT edit this record (<a href="' . $url . '">' . $payment->name . '</a>) because it is already verified.');
			SugarApplication::redirect($url);
			
		} else {
			parent::display();
		}
	}
}
?>