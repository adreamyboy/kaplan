<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
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
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class OpportunitiesViewDetail extends ViewDetail {

 	function OpportunitiesViewDetail(){
 		parent::ViewDetail();
 	}
 	
 	function display() {
	    global $sugar_config, $current_user;
	    $currency = new Currency();
	    if(isset($this->bean->currency_id) && !empty($this->bean->currency_id))
	    {
	    	$currency->retrieve($this->bean->currency_id);
	    	if( $currency->deleted != 1){
	    		$this->ss->assign('CURRENCY', $currency->iso4217 .' '.$currency->symbol);
	    	}else {
	    	    $this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());	
	    	}
	    }else{
	    	$this->ss->assign('CURRENCY', $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol());
	    }
		$id = $this->bean->id;
		$site_url = $sugar_config['site_url'];
		
			
	 global $current_user,$db;
	 	
            $current_user_id=$current_user->id;
           $user_obj = BeanFactory::getBean('Users',$current_user_id);
           
           $is_admin=$user_obj->is_admin;
           
           
     /* if($is_admin==1 )
      
      {
		  
		echo '<script>
		
		 $( document ).ready(function() {
		 
             $("#edit_button").show();
 
       });
		</script>';  
		  
		  
		  } 
		  

	

	 $query = "SELECT user_id as id FROM acl_roles_users WHERE role_id IN('c1f70882-3164-e3dc-c1e2-57f22a1fb79d','bcafeb77-5e60-a894-386a-5721ccbd980c','db2b13a4-3808-2dc0-4522-5649ec7dfe77','8dc7ca7b-5bdf-c302-1351-5416d9bee8d1','13588635-fc5b-9164-c8d2-53af22262f41','7e5e6855-37ad-008a-1e39-53af1ed7a742','c2807fee-ac8b-4ab8-b395-53af1d2e22b5','878e1ebe-a1f2-4a2f-b252-53af1c6095d4','bc838117-8db9-1e1d-90a4-53af1ab871d7','141c7caa-cff1-fae9-f21c-53ae8fd4ed2c')AND user_id='".$current_user->id."' AND deleted=0";
	 
	 $res   = $db->query($query);
		
		
	if($db->getRowCount($res)>0){
		
		echo '<script>
		
		 $( document ).ready(function() {
		
  
    //document.getElementById("edit_button").style.visibility ="hidden";
    
    $("#edit_button").hide();
 
       });
		</script>';
		
		
	  } 
	  else{
		  echo '<script>
		
		 $( document ).ready(function() {
		 
  
    $("#edit_button").show();
 
       });
		</script>';
		  }*/
		
		
$checkJs = <<<EOQ
<script>
   /*check for related contact - If contact consist mobile number or not*/
	function mobileCheck(id)
	{
		var url = "$site_url"+'/index.php?entryPoint=checkMobile';
		/*Ajax call starts here for checking mobile number*/
		$.ajax({//create an ajax request to php file
			type: "POST",
			async: false,
			url: url,
			data:
			{ 		
				id: id,
			},	//parameters
			success: function(resp)
			{
				if(resp == 'error' || resp == 'undefined'){
					$('#formformGI_SMS_Messages').hide();
				}
			}
		});
		/*Ajax call ends here*/
			
	}
	var opp_id = "$id";
	$(document).ready(function(){
		mobileCheck(opp_id);
	});
</script>
EOQ;
	   	 
	   	 
	   	   
	   	   
	   	   $OPPID = $_GET["record"];
	
	 echo'<form name="AmountForm" id="AmountForm">						  
			<input type="hidden" name="opp_id" id="opp_id" value="'.$this->bean->id.'"> 
			<input type="hidden" name="user_id" id="user_id" value="'.$current_user->id.'"> 	
			<div id="myModal" class="modal fade" >
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title">Confirm Payment Amount</h4>
			</div>
			<div class="modal-body">
		    <label name="amount_lbl" id="amount_lbl">Amount</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="edit_amount" id="edit_amount" value="'.$this->bean->amount.'"> 
			</div>
			<div class="modal-footer">
			<input id="submit_button" class="button submit" type="button" value="Send Link" name="Submit"  accesskey="" title="Submit"  onclick="SaveAmount();">            
		    <input id="close-btn1" style="float:right;" type="button" data-dismiss="modal" value="Cancel" name="Close"  accesskey="" title="Close">
		    </div>
		    </div>
			</div>
		    </div>
            </form>';
            
  echo "
      <script type='text/javascript'>         
            function  EditAmount(){
		
		      $('#myModal').modal();
    
    return false;  
    }  
    
    
   
    
      function SaveAmount(){
		val=document.getElementById('edit_amount').value;
		

					var invoiceAmount= $('#edit_amount').val();
					var oppID= $('#opp_id').val();
					var userID= $('#user_id').val();
					
						if(val!=''){
							
							$.ajax({
								
								url: 'index.php?entryPoint=SendEmail',
								method: 'POST',
								data: { oppID : oppID, invoiceAmount : invoiceAmount, userID : userID},
							    
								success     : function(msg) {
								if(msg!= ''){
								   alert(msg);
								   //return false;
							    }
								
								$('#myModal').modal('hide');
								 $('#myModal').fadeOut();
								 $('.modal-backdrop').fadeOut();
								
								
								  window.location.href='index.php?module=Opportunities&action=DetailView&record=".$OPPID."';
								
								
																							
								}
							});
						}				

				
	}
    
</script>
";
	
	  	   
	   	   
	   	    
 		parent::display();
		echo $checkJs;
 	}
}
?>
