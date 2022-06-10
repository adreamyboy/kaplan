<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_relationship_add'] = Array(); 
$hook_array['after_relationship_add'][] = Array(0, 'If opportunity is added, add the line item amount', 'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php','logic_hooks_Opportunities', 'after_relationship_add_method'); 
$hook_array['after_relationship_add'][] = Array(77, 'addRelationship', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'addRelationship'); 
$hook_array['after_relationship_delete'] = Array(); 
$hook_array['after_relationship_delete'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php','logic_hooks_Opportunities', 'after_relationship_delete_method'); 
$hook_array['after_relationship_delete'][] = Array(77, 'deleteRelationship', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'deleteRelationship'); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php','logic_hooks_Opportunities', 'before_delete_method'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php','logic_hooks_Opportunities', 'after_save_method'); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 
$hook_array['after_save'][] = Array(78, 'updateRelatedProjectGeocodeInfo', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'updateRelatedProjectGeocodeInfo'); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(0, 'If opportunity is deleted, delete the line item completely from database', 'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php','logic_hooks_Opportunities', 'before_save_method'); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Opportunities/OpportunitiesJjwg_MapsLogicHook.php','OpportunitiesJjwg_MapsLogicHook', 'updateGeocodeInfo'); 



?>