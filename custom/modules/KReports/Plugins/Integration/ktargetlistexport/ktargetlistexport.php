<?php

require_once('modules/KReports/Plugins/prototypes/kreportintegrationplugin.php');

class ktargetlistexport extends kreportintegrationplugin {

    public function __construct() {
        $this->pluginName = 'Targetlist';
    }
    
    public function checkAccess($thisReport){


        require_once('modules/ProspectLists/ProspectList.php');
        $newProspectList = new ProspectList();

        // fill with results:
        $newProspectList->load_relationships();
		//echo $thisReport->report_module;exit;
        $linkedFields = $newProspectList->get_linked_fields();

        $foundModule = false;

        foreach ($linkedFields as $linkedField => $linkedFieldData) {
            if ($newProspectList->$linkedField->_relationship->rhs_module == $thisReport->report_module) {
                $foundModule = true;
            }
        }

        return ($foundModule) ? true : true;
    }

    public function getMenuItem() {
        return array(
            'jsFile' => 'custom/modules/KReports/Plugins/Integration/ktargetlistexport/ktargetlistexport' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js',
            'menuItem' => array(
                'icon' => $this->wrapText('modules/KReports/images/targetlist.png'),
                'text' => $this->wrapText($this->pluginName),
                'handler' => $this->wrapFunction('K.kreports.ktargetlistexport.exportPopup.show')
                ));
    }

}

?>
