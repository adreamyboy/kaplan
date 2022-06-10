<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$layout_defs['Opportunities']['subpanel_setup']['activities']['top_buttons'] = array(
				array('widget_class' => 'SubPanelTopCreateTaskButton'),
				array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
				array('widget_class' => 'SubPanelTopScheduleCallButton'),
				array('widget_class' => 'SubPanelTopComposeEmailButton'),
				array('widget_class' => 'SubPanelTopSendSmsButton'),
			);
