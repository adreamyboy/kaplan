<?php

$hook_array['after_relationship_add'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/Accounts/logic_hooks/logic_hooks_Accounts.php',
    'logic_hooks_Accounts',
    'after_relationship_add_method'
);

$hook_array['after_relationship_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/Accounts/logic_hooks/logic_hooks_Accounts.php',
    'logic_hooks_Accounts',
    'after_relationship_delete_method'
);

$hook_array['before_delete'][] = Array(
    0,
    'If contact is added, add a new Individual Account automatically',
    'custom/modules/Accounts/logic_hooks/logic_hooks_Accounts.php',
    'logic_hooks_Accounts',
    'before_delete_method'
);

?>