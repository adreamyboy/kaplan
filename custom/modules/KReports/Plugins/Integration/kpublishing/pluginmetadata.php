<?php

$pluginmetadata = array(
    'id' => 'kpublishing', 
    'type' => 'integration', 
    'displayname' => 'LBL_PUBLISH_REPORT',
    'integration' => array(
        'include' => 'kpublishing.php',
        'class' => 'kpublishing',
    ), 
    'includes' => array(
        'edit' => 'kpublishing' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
        'editPanel' => 'K.kreports.publishingpanel.thePanel'
    )
);
?>
