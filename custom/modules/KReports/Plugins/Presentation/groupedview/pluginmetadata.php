<?php

$pluginmetadata = array(
    'id' => 'grouped', 
    'displayname' => 'LBL_GROUPEDVIEW',
    'type' => 'presentation', 
    'phpinclude' => 'groupedviewinclude.php',
    'pluginpanel' => 'K.kreports.groupedviewpanel.panel',
    'includes' => array(
        'edit' => 'groupedviewpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);

?>
