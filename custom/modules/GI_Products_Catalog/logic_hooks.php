	<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Products_Catalog/logic_hooks/logic_hooks_GI_Products_Catalog.php',
    'logic_hooks_GI_Products_Catalog',
    'before_delete_method'
);

?>