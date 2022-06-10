	<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Regions/logic_hooks/logic_hooks_GI_Regions.php',
    'logic_hooks_GI_Regions',
    'before_delete_method'
);

?>