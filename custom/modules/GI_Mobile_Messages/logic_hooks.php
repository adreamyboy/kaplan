<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Mobile_Messages/logic_hooks/logic_hooks_GI_Mobile_Messages.php',
    'logic_hooks_GI_Mobile_Messages',
    'before_save_method'
);

?>