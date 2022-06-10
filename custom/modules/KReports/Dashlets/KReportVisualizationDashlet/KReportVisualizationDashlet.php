<?php

if (!defined('sugarEntry') || !sugarEntry)
   die('Not A Valid Entry Point');

require_once('include/Dashlets/Dashlet.php');
require_once('modules/KReports/KReport.php');
require_once('modules/KReports/KReportVisualizationManager.php');

class KReportVisualizationDashlet extends Dashlet {

   function KReportVisualizationDashlet($id, $def = null) {

      parent::Dashlet($id, $def);

      if (empty($def['title']))
         $this->title = 'KReports Visualization';
      else
         $this->title = $def['title'];

      if ($def['report'] != '') {
         // 2013-04-12 test if report exists, bug #466
         $testReport = new KReport();
         $testReport->retrieve($def['report']);
         $this->report = $testReport->id;
      }

      $this->isConfigurable = true; // dashlet is configurable
      $this->hasScript = false;  // dashlet has javascript attached to it
   }

   function display() {
      if ($this->report != '') {
         $thisReport = new KReport();
         // $thisReport->retrieve('e13a95fb-39a2-f6cf-d53a-507e90de7b73');
         $thisReport->retrieve($this->report);

         $ss = new Sugar_Smarty();
         $ss->assign('id', $this->report); // Added by Tawfeeq Jaafar: used in generating 'View full report' link in Visualization dashlet.

         // build the langiage strings
         $mod_lang = return_module_language($current_language, 'KReports');
         foreach ($mod_lang as $id => $value) {
            $languageArray[] = array('lblid' => $id, 'value' => $value);
         }
         $ss->assign('jsonlanguage', json_encode_kinamu($languageArray));

         $pluginManager = new KReportPluginManager();
         $ss->assign('visualizationpluginjs', $pluginManager->getIntegrationPlugins($thisReport));

         $thisVisualizationManager = new KReportVisualizationManager();
         $ss->assign('visualization', $thisVisualizationManager->renderVisualization(html_entity_decode($thisReport->visualization_params, ENT_QUOTES, 'UTF-8'), $thisReport));

         // set if the Reporter is in DebugMode
         if ($GLOBALS['sugar_config']['KReports']['debug']) {
            $jsVariables .= "var kreportDebug=true;";
            $ss->assign('kreportDebug', true);
         } else {
            $jsVariables .= "var kreportDebug=false;";
            $ss->assign('kreportDebug', false);
         }

         return parent::display() . $ss->fetch('custom/modules/KReports/Dashlets/KReportVisualizationDashlet/KReportVisualizationDashlet.tpl'); // return parent::display for title and such
      }
      else
         return parent::display() . 'please select a Report';
   }

   function displayScript() {
      
   }

   function displayOptions() {
      global $app_strings, $db;

      //2012-11-29 ... create a report Object required in PRO
      $thisReport = new KReport();

      // get the module Language
      $modLang = return_module_language($_SESSION['authenticated_user_language'], 'KReports');

      $ss = new Sugar_Smarty();

      $repQuery = 'SELECT * FROM kreports ';
      if ($GLOBALS['sugar_flavor'] != 'CE')
         $thisReport->add_team_security_where_clause($repQuery, 'kreports');
      $repQuery .= ' WHERE integration_params LIKE \'%"dashletVisualization":"on"%\' AND integration_params LIKE \'%"kpublishing":"1"%\' AND deleted = 0';

      $repObject = $db->query($repQuery);
      $options = '';
      while ($repEntry = $db->fetchByAssoc($repObject)) {
         $options .= '<option' . ($repEntry['id'] == $this->report ? ' SELECTED ' : ' ') . 'value="' . $repEntry['id'] . '">' . $repEntry['name'] . '</option>';
      }
      $ss->assign('reports', $options);

      $ss->assign('titleLbl', $modLang['LBL_PUBLISH_DASHLETTITLE']);
      $ss->assign('reportLbl', $modLang['LBL_PUBLISH_DASHLETREPORT']);
      $ss->assign('heightLbl', $this->dashletStrings['LBL_CONFIGURE_HEIGHT']);
      $ss->assign('saveLbl', $app_strings['LBL_SAVE_BUTTON_LABEL']);
      $ss->assign('clearLbl', $app_strings['LBL_CLEAR_BUTTON_LABEL']);
      $ss->assign('title', $this->title);
      $ss->assign('height', $this->height);
      $ss->assign('id', $this->id);

      return $ss->fetch('custom/modules/KReports/Dashlets/KReportVisualizationDashlet/KReportVisualizationDashletOptions.tpl');
   }

   function saveOptions($req) {
      global $sugar_config, $timedate, $current_user, $theme;

      $options = array();
      $options['title'] = $req['title'];
      $options['report'] = $req['report'];

      if (is_numeric($_REQUEST['height'])) {
         if ($_REQUEST['height'] > 0 && $_REQUEST['height'] <= 300)
            $options['height'] = $_REQUEST['height'];
         elseif ($_REQUEST['height'] > 300)
            $options['height'] = '300';
         else
            $options['height'] = '100';
      }

      return $options;
   }

}

?>
