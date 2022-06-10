<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Credit_Notes/logic_hooks/logic_hooks_GI_Credit_Notes.php',
    'logic_hooks_GI_Credit_Notes',
    'before_save_method'
);

$hook_array['after_relationship_add'] = Array();
$hook_array['after_relationship_add'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Credit_Notes/logic_hooks/logic_hooks_GI_Credit_Notes.php',
    'logic_hooks_GI_Credit_Notes',
    'after_relationship_add_method'
);

$hook_array['after_relationship_delete'] = Array();
$hook_array['after_relationship_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Credit_Notes/logic_hooks/logic_hooks_GI_Credit_Notes.php',
    'logic_hooks_GI_Credit_Notes',
    'after_relationship_delete_method'
);

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Credit_Notes/logic_hooks/logic_hooks_GI_Credit_Notes.php',
    'logic_hooks_GI_Credit_Notes',
    'before_delete_method'
);

?>