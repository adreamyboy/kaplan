<?php

$hook_version = 1;
$hook_array = Array();

$hook_array['before_save'] = Array();

$hook_array['before_save'][] = Array(
	1, 
	'before_save example',
	'custom/modules/GI_Products/productUpdate.php',
	'productUpdate',
	'before_save_method'
);


?>