<?php

require_once('modules/KReports/Plugins/prototypes/kreportintegrationplugin.php');

class kpublishing extends kreportintegrationplugin {

    public function __construct() {
        $this->pluginName = 'Publish Report';
    }

    public function checkAccess($thisReport) {
        return true;
    }

    public function getMenuItem() {
        return '';
    }

    /*
     * Function that adds all related reports that are published as subpanels
     * for a specific module to the layoutdefs
     * 
     * gets called from include/SubPanel/SubPanelDefinition.php
     */

    static function addToLayoutDefs(&$layout_defs, $layout_def_key) {
        global $db;

        //$queryRes = $db->query("SELECT id, name, publishoptions FROM kreports WHERE deleted='0' AND publishoptions LIKE '%\"publishSubpanelModule\":\"" . $layout_def_key . "\"%'");
        $queryRes = $db->query("SELECT id, name, integration_params FROM kreports WHERE deleted='0' AND integration_params LIKE '%\"kpublishing\":\"1\"%' AND integration_params like '%\"subpanelModule\":\"" . $layout_def_key . "\"%'");

        if ($db->getRowCount($queryRes) > 0) {
            while ($thisReportDetails = $db->fetchByAssoc($queryRes)) {
                $integration_params = json_decode(html_entity_decode($thisReportDetails ['integration_params'], ENT_QUOTES, 'UTF-8'));

                if ($integration_params->kpublishing->subpanelPresentation == 'on') {
                    $layout_defs ['subpanel_setup'] ['kreporterpres' . $thisReportDetails ['id']] = array('reportId' => $thisReportDetails ['id'], 'top_buttons' => array(), 'subpanel_name' => 'default', 'order' => $integration_params->kpublishing->subpanelSequence, 'module' => 'KReports', 'title_key' => $thisReportDetails ['name']);
                }

                if ($integration_params->kpublishing->subpanelVisualization == 'on') {
                    $layout_defs ['subpanel_setup'] ['kreportervisu' . $thisReportDetails ['id']] = array('reportId' => $thisReportDetails ['id'], 'top_buttons' => array(), 'subpanel_name' => 'default', 'order' => $integration_params->kpublishing->subpanelSequence, 'module' => 'KReports', 'title_key' => $thisReportDetails ['name']);
                }
            }
        }
    }

    /*
     * function that sorts subpanels into tabs
     * called from include/SubPanel/SubPanelTilesTabs.php
     */

    static function addToTabs(&$tabs, &$groups, &$found, &$tabStructure) {
        global $db;

        foreach ($tabs as $tabId) {
            if (strstr($tabId, 'kreporterpres') !== false || strstr($tabId, 'kreportervisu') !== false) {
                $queryRes = $db->query("SELECT id, name, integration_params FROM kreports WHERE deleted='0' AND id = '" . substr($tabId, 13) . "'");
                if ($db->getRowCount($queryRes) > 0) {
                    $thisReportDetails = $db->fetchByAssoc($queryRes);
                    $integration_params = json_decode(html_entity_decode($thisReportDetails ['integration_params'], ENT_QUOTES, 'UTF-8'));
                    if ($integration_params->kpublishing->subpanelTab != '') {
                        $groups[translate($integration_params->kpublishing->subpanelTab)]['modules'][] = $tabId;
                        $found[$tabId] = true;
                    }
                }
            }
        }
    }

    static function renderSubpanel($subPanel, $parentBean = null) {
        // presentation html view
        if (strpos($subPanel->subpanel_id, 'kreporterpres') !== false) {
            require_once('custom/modules/KReports/Plugins/Integration/kpublishing/khtmlreport.php');
            $khtmlReport = new khtmlreport();
            $reportId = str_replace('kreportervisu', '', str_replace('kreporterpres', '', $subPanel->subpanel_id));

            $reportStart = (!empty($_REQUEST[$subPanel->subpanel_id . '_report_start']) ? $subPanel[$this->subpanel_id . '_report_start'] : 0 );

            return $khtmlReport->renderReport($reportId, $reportStart, 10, 'SubPanel', array('parentbean' => $parentBean, 'subpanelname' => $subPanel->subpanel_id, 'module' => $subPanel->parent_module, 'recordid' => $subPanel->parent_record_id));
        }
        // graphical view
        if (strpos($subPanel->subpanel_id, 'kreportervisu') !== false) {
            require_once('modules/KReports/KReport.php');
            require_once('modules/KReports/KReportVisualizationManager.php');
            
            $reportId = str_replace('kreportervisu', '', $subPanel->subpanel_id);
            $thisReport = new KReport();
            $thisReport->retrieve($reportId);

            $ss = new Sugar_Smarty();

            // build the langiage strings
            $mod_lang = return_module_language($current_language, 'KReports');
            foreach ($mod_lang as $id => $value) {
                $languageArray[] = array('lblid' => $id, 'value' => $value);
            }
            $ss->assign('jsonlanguage', json_encode($languageArray));

            $pluginManager = new KReportPluginManager();
            $ss->assign('visualizationpluginjs', $pluginManager->getIntegrationPlugins($thisReport));

            $thisVisualizationManager = new KReportVisualizationManager();
            $ss->assign('visualization', $thisVisualizationManager->renderVisualization(html_entity_decode($thisReport->visualization_params, ENT_QUOTES, 'UTF-8'), $thisReport, array('parentbean' => $parentBean)));

            // set if the Reporter is in DebugMode
            if ($GLOBALS['sugar_config']['KReports']['debug']) {
                $jsVariables .= "var kreportDebug=true;";
                $ss->assign('kreportDebug', true);
            } else {
                $jsVariables .= "var kreportDebug=false;";
                $ss->assign('kreportDebug', false);
            }

            return $ss->fetch('custom/modules/KReports/Plugins/Integration/kpublishing/tpls/kvisualizationpublish.tpl'); 
        }
    }

}

?>
