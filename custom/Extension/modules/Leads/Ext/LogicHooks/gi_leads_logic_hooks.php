<?php

$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Leads/logic_hooks/logic_hooks_Leads.php',
    'logic_hooks_Leads',
    'after_save_method'
);

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Leads/logic_hooks/logic_hooks_Leads.php',
    'logic_hooks_Leads',
    'before_save_method'
);

?>