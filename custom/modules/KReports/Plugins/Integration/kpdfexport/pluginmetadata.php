<?php

$pluginmetadata = array(
    'id' => 'kpdfexport', 
    'type' => 'integration', 
    'category' => 'export',
    'displayname' => 'LBL_PDF_EXPORT',
    'integration' => array(
        'include' => 'kpdfexport.php',
        'class' => 'kpdfexport'
    ),
    'includes' => array(
        'edit' => 'kpdfexportpanel' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
        'editPanel' => 'K.kreports.kpdfexport.exportPanel'
    )
);
?>
