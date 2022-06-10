<?php 
 //WARNING: The contents of this file are auto-generated



$hook_array['after_relationship_add'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php',
    'logic_hooks_Opportunities',
    'after_relationship_add_method'
);

$hook_array['after_relationship_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php',
    'logic_hooks_Opportunities',
    'after_relationship_delete_method'
);

$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php',
    'logic_hooks_Opportunities',
    'before_delete_method'
);

$hook_array['after_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php',
    'logic_hooks_Opportunities',
    'after_save_method'
);

$hook_array['before_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/Opportunities/logic_hooks/logic_hooks_Opportunities.php',
    'logic_hooks_Opportunities',
    'before_save_method'
);


?>