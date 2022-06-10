<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['after_relationship_add'] = Array();
$hook_array['after_relationship_add'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Line_Items/logic_hooks/logic_hooks_GI_Line_Items.php',
    'logic_hooks_GI_Line_Items',
    'after_relationship_add_method'
);

$hook_array['before_relationship_delete'] = Array();
$hook_array['before_relationship_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Line_Items/logic_hooks/logic_hooks_GI_Line_Items.php',
    'logic_hooks_GI_Line_Items',
    'before_relationship_delete_method'
);

$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Line_Items/logic_hooks/logic_hooks_GI_Line_Items.php',
    'logic_hooks_GI_Line_Items',
    'after_save_method'
);

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Line_Items/logic_hooks/logic_hooks_GI_Line_Items.php',
    'logic_hooks_GI_Line_Items',
    'before_save_method'
);

/*
$hook_array['after_delete'] = Array();
$hook_array['after_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Line_Items/logic_hooks/logic_hooks_GI_Line_Items.php',
    'logic_hooks_GI_Line_Items',
    'after_delete_method'
);
*/

?>