<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(0, 'If contact is added, add a new Individual Account automatically', 'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php','logic_hooks_Contacts', 'before_save_method'); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Contacts/ContactsJjwg_MapsLogicHook.php','ContactsJjwg_MapsLogicHook', 'updateGeocodeInfo'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(0, 'If contact is added, add a new Individual Account automatically', 'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php','logic_hooks_Contacts', 'after_save_method'); 
$hook_array['after_save'][] = Array(1, 'Update Portal', 'modules/Contacts/updatePortal.php','updatePortal', 'updateUser'); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Contacts/ContactsJjwg_MapsLogicHook.php','ContactsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 

$hook_array['after_save'][] = Array(
    0,
    'updateUsersSuitecrmWoo',
    'custom/modules/Contacts/logic_hooks/woo_crm_users_hook.php',
    'woo_crm_users_hook',
    'updateWooUsersCrm'
);

$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(0, 'If contact is added, add a new Individual Account automatically', 'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php','logic_hooks_Contacts', 'before_delete_method'); 

$hook_array['after_delete'] = Array();
$hook_array['after_delete'][] = Array(
    0,
    'Delete User From Woocommerce Using RESTapi',
    'custom/modules/Contacts/logic_hooks/woo_crm_users_hook.php',
    'woo_crm_users_hook',
    'deleteWooUsersCrm'
);

?>