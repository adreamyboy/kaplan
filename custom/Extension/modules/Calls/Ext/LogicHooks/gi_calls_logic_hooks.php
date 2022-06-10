<?php

$hook_array['after_save'][] = Array(
    0, 
    'If opportunity is added, add the line item amount', 
    'custom/modules/Calls/logic_hooks/logic_hooks_Calls.php',
    'logic_hooks_Calls', 
    'after_save_method'
); 

?>