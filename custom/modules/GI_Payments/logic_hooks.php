<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Payments/logic_hooks/logic_hooks_GI_Payments.php',
    'logic_hooks_GI_Payments',
    'after_save_method'
);

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Payments/logic_hooks/logic_hooks_GI_Payments.php',
    'logic_hooks_GI_Payments',
    'before_save_method'
);

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Payments/logic_hooks/logic_hooks_GI_Payments.php',
    'logic_hooks_GI_Payments',
    'before_delete_method'
);

?>