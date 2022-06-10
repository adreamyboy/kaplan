<?php

$pluginmetadata = array(
    'id' => 'kpdrillown', 
    'type' => 'integration', 
    'displayname' => 'LBL_KPDRILLDOWN',
    'integration' => array(
        'include' => 'kpdrilldown.php',
        'class' => 'kpdrilldown',
    ), 
    'includes' => array(
        'edit' => 'kpdrilldown' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
        'editPanel' => 'K.kreports.pdrilldown.thePanel'
    )
);
?>
