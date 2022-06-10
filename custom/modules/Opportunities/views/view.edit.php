<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

class OpportunitiesViewEdit extends ViewEdit {

 	function __construct(){
 		parent::__construct();
 		$this->useForSubpanel = true;
 	}

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function OpportunitiesViewEdit(){
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if(isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        }
        else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


 	function display() {
		global $app_list_strings;
		$json = getJSONobj();
		$prob_array = $json->encode($app_list_strings['sales_probability_dom']);
		$prePopProb = '';
 		if(empty($this->bean->id) && empty($_REQUEST['probability'])) {
		   $prePopProb = 'document.getElementsByName(\'sales_stage\')[0].onchange();';
		}

    global $current_user,$db;
	 	
     $current_user_id=$current_user->id;


  $query = "SELECT user_id as id FROM acl_roles_users WHERE role_id IN('c1f70882-3164-e3dc-c1e2-57f22a1fb79d','bcafeb77-5e60-a894-386a-5721ccbd980c','db2b13a4-3808-2dc0-4522-5649ec7dfe77','8dc7ca7b-5bdf-c302-1351-5416d9bee8d1','13588635-fc5b-9164-c8d2-53af22262f41','7e5e6855-37ad-008a-1e39-53af1ed7a742','c2807fee-ac8b-4ab8-b395-53af1d2e22b5','878e1ebe-a1f2-4a2f-b252-53af1c6095d4','bc838117-8db9-1e1d-90a4-53af1ab871d7','141c7caa-cff1-fae9-f21c-53ae8fd4ed2c') AND user_id='".$current_user->id."' AND deleted=0";
	 
	 $res   = $db->query($query);
		
		if($db->getRowCount($res)>0){
		
		echo '<script>
		
		 $( document ).ready(function() {
		
 
 
   document.getElementById("currency_id_select").disabled=true;

   //document.getElementById("invoice_comments_c").readOnly = false; 
   //document.getElementById("lead_source_details_c").readOnly = true; 
   
   document.getElementById("customer_lpo_c").readOnly = true;
   
   
   document.getElementById("auto_discount_c").disabled=true; 
    
   document.getElementById("account_name").readOnly = true; 
   document.getElementById("btn_account_name").disabled=true;
   document.getElementById("btn_clr_account_name").disabled=true;
  
  
   //document.getElementById("campaign_name").readOnly = false; 
  //document.getElementById("btn_campaign_name").disabled=true;
  //document.getElementById("btn_clr_campaign_name").disabled=true;
   
   
   document.getElementById("terms_and_conditions_c").readOnly = true; 
   document.getElementById("btn_terms_and_conditions_c").disabled=true;
   document.getElementById("btn_clr_terms_and_conditions_c").disabled=true;
   
   
   document.getElementById("prospectlists_opportunities_1_name").readOnly = true; 
   document.getElementById("btn_prospectlists_opportunities_1_name").disabled=true;
   document.getElementById("btn_clr_prospectlists_opportunities_1_name").disabled=true;
   
   
   
  
   
   document.getElementById("lead_source").disabled=true;
   document.getElementById("currency_id_select").disabled=true;
   //document.getElementById("referral_status_c").disabled=true;
   
    document.getElementById("assigned_user_name").readOnly = true; 
    document.getElementById("btn_assigned_user_name").disabled=true;
   document.getElementById("btn_clr_assigned_user_name").disabled=true;
       });
       
       </script>';

}





$probability_script=<<<EOQ
	<script>
	prob_array = $prob_array;
	document.getElementsByName('sales_stage')[0].onchange = function() {
			if(typeof(document.getElementsByName('sales_stage')[0].value) != "undefined" && prob_array[document.getElementsByName('sales_stage')[0].value]
			&& typeof(document.getElementsByName('probability')[0]) != "undefined"
			) {
				document.getElementsByName('probability')[0].value = prob_array[document.getElementsByName('sales_stage')[0].value];
				SUGAR.util.callOnChangeListers(document.getElementsByName('probability')[0]);

			}
		};
	$prePopProb
	</script>
EOQ;

	    $this->ss->assign('PROBABILITY_SCRIPT', $probability_script);
 		parent::display();
 	}
}
?>
