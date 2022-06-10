	<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Country/logic_hooks/logic_hooks_GI_Country.php',
    'logic_hooks_GI_Country',
    'before_delete_method'
);

?>