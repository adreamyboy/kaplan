<?php

$hook_version = 1;
$hook_array = Array();

$hook_array['before_save'] = Array();

$hook_array['before_save'][] = Array(
	1, 
	'before_save example',
	'custom/modules/GI_Line_Items/lineItemUpdate.php',
	'lineItemUpdate',
	'before_save_method'
);


?>