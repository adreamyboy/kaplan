<?php
$hook_version = 1;
$hook_array = Array();

$hook_array['after_relationship_add'] = Array();
$hook_array['after_relationship_add'][] = Array(
    0,
    'If opportunity is added, add the line item amount',
    'custom/modules/GI_Products/logic_hooks/logic_hooks_GI_Products.php',
    'logic_hooks_GI_Products',
    'after_relationship_add_method'
);



$hook_array['after_relationship_delete'] = Array();
$hook_array['after_relationship_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Products/logic_hooks/logic_hooks_GI_Products.php',
    'logic_hooks_GI_Products',
    'after_relationship_delete_method'
);

$hook_array['before_delete'] = Array();
$hook_array['before_delete'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Products/logic_hooks/logic_hooks_GI_Products.php',
    'logic_hooks_GI_Products',
    'before_delete_method'
);

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(
    0,
    'If opportunity is deleted, delete the line item completely from database',
    'custom/modules/GI_Products/logic_hooks/logic_hooks_GI_Products.php',
    'logic_hooks_GI_Products',
    'before_save_method'
);




$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(    0,    'If opportunity is deleted, delete the line item completely from database',    'custom/modules/GI_Products/logic_hooks/logic_hooks_GI_Products.php',    'logic_hooks_GI_Products',    'after_save_method');

$hook_array['after_save'][] = Array(
    0,
    'updateProductsSuitecrmWoo',
    'custom/modules/GI_Products/logic_hooks/woo_crm_product_hook.php',
    'woo_crm_product_hook',
    'updateWooProductCrm'
);
 

$hook_array['after_delete'] = Array();
$hook_array['after_delete'][] = Array(
    0,
    'Delete Product From Woocommerce Using RESTapi',
    'custom/modules/GI_Products/logic_hooks/woo_crm_product_hook.php',
    'woo_crm_product_hook',
    'deleteWooProductCrm'
);





?>