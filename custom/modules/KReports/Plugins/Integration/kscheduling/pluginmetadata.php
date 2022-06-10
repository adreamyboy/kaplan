<?php

$pluginmetadata = array(
    'id' => 'kscheduling', 
    'type' => 'integration', 
    'displayname' => 'LBL_SCHEDULE_REPORT',
    'integration' => array(
        'include' => 'kscheduling.php',
        'class' => 'kscheduling',
    ), 
    'includes' => array(
        'edit' => 'kscheduling' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
        'editPanel' => 'K.kreports.schedulingpanel.thePanel'
    )
);
?>
