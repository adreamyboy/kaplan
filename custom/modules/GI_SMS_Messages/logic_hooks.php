<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_SMS_Messages/logic_hooks/logic_hooks_GI_SMS_Messages.php',
    'logic_hooks_GI_SMS_Messages',
    'after_save_method'
);

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
	//Processing index. For sorting the array.
	10,
   
	//Label. A string value to identify the hook.
	'To send single SMS.',
   
	//The PHP file where your class is located.
	'custom/modules/GI_SMS_Messages/send_sms_class.php',
   
	//The class the method is in.
	'send_sms_class',
   
	//The method to call.
	'before_save_send_sms'
);


?>