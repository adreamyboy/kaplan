<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Leads/logic_hooks/logic_hooks_Leads.php','logic_hooks_Leads', 'after_save_method'); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Leads/logic_hooks/logic_hooks_Leads.php','logic_hooks_Leads', 'before_save_method'); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Leads/LeadsJjwg_MapsLogicHook.php','LeadsJjwg_MapsLogicHook', 'updateGeocodeInfo'); 



?>