<?php

$pluginmetadata = array(
    'id' => 'googlegeo',
    'displayname' => 'LBL_GOOGLEGEO',
    'type' => 'visualization',
    'visualization' => array(
        'include' => 'kGoogleGeo.php',
        'class' => 'kGoogleGeo'
    ),
    'pluginpanel' => 'K.kreports.googlegeopanel.panel',
    'includes' => array(
        'edit' => 'googlegeopanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);
?>
