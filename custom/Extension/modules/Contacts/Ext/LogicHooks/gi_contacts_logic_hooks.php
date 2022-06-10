<?php

$hook_array['before_save'][] = Array(
    0,
    'If contact is added, add a new Individual Account automatically',
    'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php',
    'logic_hooks_Contacts',
    'before_save_method'
);

$hook_array['after_save'][] = Array(
    0,
    'If contact is added, add a new Individual Account automatically',
    'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php',
    'logic_hooks_Contacts',
    'after_save_method'
);

$hook_array['before_delete'][] = Array(
    0,
    'If contact is added, add a new Individual Account automatically',
    'custom/modules/Contacts/logic_hooks/logic_hooks_Contacts.php',
    'logic_hooks_Contacts',
    'before_delete_method'
);

?>