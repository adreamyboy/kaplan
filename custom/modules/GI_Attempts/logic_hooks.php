<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Attempts/logic_hooks/logic_hooks_GI_Attempts.php',
    'logic_hooks_GI_Attempts',
    'before_delete_method'
);

?>