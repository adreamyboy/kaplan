<?php

$pluginmetadata = array(
    'id' => 'tree', 
    'displayname' => 'LBL_TREEVIEW',
    'type' => 'presentation', 
    'phpinclude' => 'treeviewinclude.php',
    'pluginpanel' => 'K.kreports.treeviewpanel.panel',
    'includes' => array(
        'edit' => 'treeviewpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    ), 
    'actions' => array(
        
    )
);

?>
