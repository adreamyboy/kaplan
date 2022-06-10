<?php

$pluginmetadata = array(
    'id' => 'standardws', 
    'displayname' => 'LBL_STANDARDWSUMMARY',
    'type' => 'presentation', 
    'phpinclude' => 'standardwsummaryviewinclude.php',
    'pluginpanel' => 'K.kreports.standardwsummaryviewpanel.panel',
    'includes' => array(
        'edit' => 'standardwsummaryviewpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);

?>
