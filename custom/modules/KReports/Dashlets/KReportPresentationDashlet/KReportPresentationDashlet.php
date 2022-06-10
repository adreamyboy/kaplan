<?php

if (!defined('sugarEntry') || !sugarEntry)
   die('Not A Valid Entry Point');

require_once('include/Dashlets/Dashlet.php');
require_once('custom/modules/KReports/Plugins/Integration/kpublishing/khtmlreport.php');
require_once('modules/KReports/KReport.php');

class KReportPresentationDashlet extends Dashlet {

   function KReportPresentationDashlet($id, $def = null) {

      parent::Dashlet($id, $def);

      if (empty($def['title']))
         $this->title = 'KReports Presentation';
      else
         $this->title = $def['title'];

      if ($def['report'] != '') {
         // 2013-04-12 test if report exists, bug #466
         $testReport = new KReport();
         $testReport->retrieve($def['report']);
         $this->report = $testReport->id;
      }
      // 2013-02-27 added numer of entries
      if (!empty($def['cntEntries']))
         $this->cntEntries = $def['cntEntries'];
      else
         $this->cntEntries = 10;

      $this->isConfigurable = true; // dashlet is configurable
      $this->hasScript = false;  // dashlet has javascript attached to it
   }

   function display() {
      if ($this->report != '') {
         $thisHtmlReport = new khtmlreport($this);
         $str = $thisHtmlReport->renderReport($this->report, 0, $this->cntEntries);
         return parent::display() . $str . '<br />'; // return parent::display for title and such
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
      $repQuery .= ' WHERE integration_params LIKE \'%"dashletPresentation":"on"%\' AND integration_params LIKE \'%"kpublishing":"1"%\' AND deleted = 0';

      $repObject = $db->query($repQuery);
      $options = '';
      while ($repEntry = $db->fetchByAssoc($repObject)) {
         $options .= '<option' . ($repEntry['id'] == $this->report ? ' SELECTED ' : ' ') . 'value="' . $repEntry['id'] . '">' . $repEntry['name'] . '</option>';
      }
      $ss->assign('reports', $options);

      $ss->assign('titleLbl', $modLang['LBL_PUBLISH_DASHLETTITLE']);
      $ss->assign('reportLbl', $modLang['LBL_PUBLISH_DASHLETREPORT']);
      $ss->assign('cntEntriesLbl', $modLang['LBL_PUBLISH_CNTENTRIES']);
      $ss->assign('cntEntries', get_select_options_with_id(array(5 => '5', 10 => '10', 15 => '15', 20 => '20', 50 => '50', 100 => '100'), $this->cntEntries));
      $ss->assign('saveLbl', $app_strings['LBL_SAVE_BUTTON_LABEL']);
      $ss->assign('clearLbl', $app_strings['LBL_CLEAR_BUTTON_LABEL']);
      $ss->assign('title', $this->title);
      $ss->assign('height', $this->height);
      $ss->assign('id', $this->id);

      return $ss->fetch('custom/modules/KReports/Dashlets/KReportPresentationDashlet/KReportPresentationDashletOptions.tpl');
   }

   function saveOptions($req) {

      $options = array();
      $options['title'] = $req['title'];
      $options['report'] = $req['report'];
      $options['cntEntries'] = $req['cntEntries'];

      return $options;
   }

}

?>
