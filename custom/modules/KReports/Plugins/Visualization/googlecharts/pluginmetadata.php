<?php

$pluginmetadata = array(
    'id' => 'googlecharts',
    'displayname' => 'LBL_GOOGLECHARTS',
    'type' => 'visualization',
    'visualization' => array(
        'include' => 'kGoogleCharts.php',
        'class' => 'kGoogleChart'
    ),
    'pluginpanel' => 'K.kreports.googlechartspanel.panel',
    'includes' => array(
        'edit' => 'googlechartspanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);
?>
