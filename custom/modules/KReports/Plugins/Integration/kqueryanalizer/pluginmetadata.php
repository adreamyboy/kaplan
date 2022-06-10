<?php

$pluginmetadata = array(
    'id' => 'kqueryanalizer', 
    'type' => 'integration', 
    'category' => 'tool',
    'displayname' => 'LBL_QUERY_ANALIZER',
    'integration' => array(
        'include' => 'kqueryanalizer.php',
        'class' => 'kqueryanalizer'
    ), 
    'includes' => array(
        'detail' => 'kqueryanalizer' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js'
    )
);
?>
