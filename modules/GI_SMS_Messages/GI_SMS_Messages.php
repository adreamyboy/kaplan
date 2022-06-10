<?PHP
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

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/GI_SMS_Messages/GI_SMS_Messages_sugar.php');
class GI_SMS_Messages extends GI_SMS_Messages_sugar {
	
	function GI_SMS_Messages(){	
		parent::GI_SMS_Messages_sugar();
	}
	
	/*
    Use: 
    This function returns the list of both (Contacts & Prospects) that exist under the target lists related to the current "SMS Message" bean.
    
    NOTES:
    - This function doesn't explicity differentiate between the returned Contacts & Prospects.  Instead, it stores them both in the same returned array.
    - We have changed the code from using SugarCRM's "getBeans" function, to using MySQL "SELECT" queries (to support big target lists & improve performance).
    
    TO-DO:
    - splite the function "get_contacts" into 2 functions:  "get_contacts" and "get_prospects".
    */
    function get_contacts() {
		$contacts = array();
		
        // Identify the target lists that are related to this "SMS Message" bean.
        $link = 'gi_sms_messages_prospectlists_1';
        if ($this->load_relationship($link)) {
			$lists = $this->$link->getBeans();
			
            // Iterate over each and every target list that is related to this "SMS Message" bean.
			foreach ($lists as $list) {
				
				// retrieve Contacts ==> NOTE: we moved to using SQL queries (instead of beans) to support big target lists.
				$sql = "SELECT c.id, c.first_name, c.last_name, c.phone_mobile 
						FROM contacts AS c
						INNER JOIN prospect_lists_prospects AS p ON c.id = p.related_id
						LEFT JOIN contacts_cstm AS cc ON c.id = cc.id_c
						WHERE c.deleted = 0
						AND p.deleted = 0
						AND p.related_type = 'Contacts'
						AND p.prospect_list_id = '{$list->id}'
						AND (cc.do_not_sms_c != 1 OR ISNULL(cc.do_not_sms_c))"; // NOTE: added ISNULL to include ones who don't have records yet in (contacts_cstm) table
						
                // Iterative over each and every contact under the target list being iterated.
                $result = $GLOBALS["db"]->query($sql);
				while ( $contact = $GLOBALS["db"]->fetchByAssoc($result) ) {
                    
                    // If a contact is found with a mobile number, create an "object", and store it in the "$contacts" array.
					if ($contact['phone_mobile'] != '') {
						$object = new stdClass();
						$object->id = $contact['id'];
						$object->name = trim($contact['first_name'] . ' ' . $contact['last_name']);
						$object->phone_mobile = $contact['phone_mobile'];
						$contacts[$contact['id']] = $object;
					}
				}
				
				// retrieve Prospects ==> NOTE: we moved to using SQL queries (instead of beans) to support big target lists.
				// TO-DO: we may need (later on) to apply the "Do Not SMS" feature to the "Prospects" too.
				$sql = "SELECT c.id, c.first_name, c.last_name, c.phone_mobile 
						FROM prospects AS c
						INNER JOIN prospect_lists_prospects AS p
						ON c.id = p.related_id
						WHERE c.deleted = 0
						AND p.deleted = 0
						AND p.related_type = 'Prospects'
						AND p.prospect_list_id = '{$list->id}'";
						
                // Iterative over each and every prospect under the target list being iterated.
				$result = $GLOBALS["db"]->query($sql);
				while ( $contact = $GLOBALS["db"]->fetchByAssoc($result) ) {
                    // If a prospect is found with a mobile number, create an "object", and store it in the "$contacts" array.
					if ($contact['phone_mobile'] != '') {
						$object = new stdClass();
						$object->id = $contact['id'];
						$object->name = trim($contact['first_name'] . ' ' . $contact['last_name']);
						$object->phone_mobile = $contact['phone_mobile'];
						$contacts[$contact['id']] = $object;
					}
				}
				
				/*
				// NOTE:
                // We moved to using SQL queries (instead of beans) to support big target lists (as shown above).
                // The "old" code below is left here just for reference purposes only.
				
				$link = 'contacts';
				if ($list->load_relationship($link)) {
					$list_contacts = $list->$link->getBeans();
					//$contacts = array_merge($contacts, $list_contacts);
					foreach ($list_contacts as $key => $contact) {
					    if ($contact->phone_mobile != '') {
					        $contacts[$key] = $contact;
						}
					}
				}
				
				$link = 'prospects';
				if ($list->load_relationship($link)) {
					$list_prospects = $list->$link->getBeans();
					//$contacts = array_merge($contacts, $list_prospects);
				    foreach ($list_prospects as $key => $prospect) {
					    if ($prospect->phone_mobile != '') {
					        $contacts[$key] = $prospect;
						}
					}
				}
				*/
			}
			
			return $contacts;
		}
	}
	
}
?>