<?php

require_once('modules/KReports/Plugins/prototypes/kreportintegrationplugin.php');

class kqueryanalizer extends kreportintegrationplugin {

    public function __construct() {
        $this->pluginName = 'Query Analizer';
    }
    
    public function checkAccess($thisReport){
        return true;
    }

    public function getMenuItem() {
          return array(
            'jsFile' => 'custom/modules/KReports/Plugins/Integration/kqueryanalizer/kqueryanalizer' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
            'menuItem' => array(
                'icon' => $this->wrapText('modules/KReports/images/sql.png'),
                'text' => $this->wrapText($this->pluginName),
                'handler' => $this->wrapFunction('K.kreports.kqueryanalizer.window.show')
                ));
    }

}

?>
