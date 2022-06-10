<?php

$pluginmetadata = array(
    'id' => 'ktargetlistexport', 
    'type' => 'integration', 
    'category' => 'export',
    'displayname' => 'LBL_TARGETLIST_EXPORT',
    'integration' => array(
        'include' => 'ktargetlistexport.php',
        'class' => 'ktargetlistexport',
    ), 
    'includes' => array(
        'edit' => 'ktargetlistexport' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
        'editPanel' => 'K.kreports.ktargetlistexport.exportPanel'
    )
);
?>
