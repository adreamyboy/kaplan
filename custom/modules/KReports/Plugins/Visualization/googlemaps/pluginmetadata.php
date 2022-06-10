<?php

$pluginmetadata = array(
    'id' => 'googlemaps', 
    'displayname' => 'LBL_GOOGLEMAPSLBL',
    'type' => 'visualization', 
    'visualization' => array(
        'include' => 'kGoogleMaps.php',
        'class' => 'kGoogleMap'
    ),
    'pluginpanel' => 'K.kreports.googlemapspanel.panel',
    'includes' => array(
        'edit' => ($GLOBALS['sugar_config']['KReports']['debug'] ? 'googlemapspanel_debug.js' : 'googlemapspanel.js')
    )
);
?>
