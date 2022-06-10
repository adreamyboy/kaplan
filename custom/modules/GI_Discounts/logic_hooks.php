<?php

$hook_version = 1;$hook_array = Array();

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(    
	0,
	'If opportunity is added, add the line item amount',
	'custom/modules/GI_Discounts/logic_hooks/logic_hooks_GI_Discounts.php',
	'logic_hooks_GI_Discounts',
	'before_save_method'
);

?>