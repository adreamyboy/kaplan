<?php

$pluginmetadata = array(
    'id' => 'standardwp', 
    'displayname' => 'LBL_STANDARDWPREVIEW',
    'type' => 'presentation', 
    'phpinclude' => 'standardwpreviewviewinclude.php',
    'pluginpanel' => 'K.kreports.standardwpreviewviewpanel.panel',
    'includes' => array(
        'edit' => 'standardwpreviewviewpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);

?>
