<?php

$pluginmetadata = array(
    'id' => 'pivot', 
    'displayname' => 'LBL_PIVOTVIEW',
    'type' => 'presentation', 
    'phpinclude' => 'kreportpivot.php',
    'pluginpanel' => 'K.kreports.pivotpanel.panel',
    'includes' => array(
        'edit' => 'pivotpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);

?>
