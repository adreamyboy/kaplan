<?php

$pluginmetadata = array(
    'id' => 'fusioncharts',
    'displayname' => 'LBL_FUSIONCHARTS',
    'type' => 'visualization',
    'visualization' => array(
        'include' => 'kFusionCharts.php',
        'class' => 'kFusionChart'
    ),
    'pluginpanel' => 'K.kreports.fusionchartspanel.panel',
    'includes' => array(
        'edit' => 'fusionchartspanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);
?>
