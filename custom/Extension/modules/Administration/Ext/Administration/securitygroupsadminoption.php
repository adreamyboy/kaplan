<?php

global $sugar_version, $sugar_flavor, $server_unique_key, $current_language, $app_strings;


$sugaroutfitters_url = "https://www.sugaroutfitters.com/start?utm_sugarcrm_version={$sugar_version}&utm_sugarcrm_edition={$sugar_flavor}&utm_sugarcrm_lang={$current_language}";
$sugaroutfitters_url .= "&tag=eggsurplus";

$admin_option_defs=array();

  

$admin_option_defs['Administration']['securitygroup_upgrade_info']= array('Upgrade','LBL_SECURITYGROUPS_UPGRADE_INFO_TITLE','LBL_SECURITYGROUPS_UPGRADE_INFO','https://www.sugaroutfitters.com/docs/securitysuite/go-premium?tag=eggsurplus');
$admin_option_defs['Administration']['securitygroup_sugaroutfitters']= array('SugarOutfitters','LBL_SECURITYGROUPS_SUGAROUTFITTERS_TITLE','LBL_SECURITYGROUPS_SUGAROUTFITTERS',"{$sugaroutfitters_url}");

$admin_option_defs['Administration']['securitygroup_management']= array('SecurityGroups','LBL_MANAGE_SECURITYGROUPS_TITLE','LBL_MANAGE_SECURITYGROUPS','./index.php?module=SecurityGroups&action=index');
$admin_option_defs['Administration']['securitygroup_config']= array('SecurityGroups','LBL_CONFIG_SECURITYGROUPS_TITLE','LBL_CONFIG_SECURITYGROUPS','./index.php?module=SecurityGroups&action=config');

$admin_option_defs['Administration']['securitygroup_dashletpush']= array('icon_home','LBL_SECURITYGROUPS_DASHLETPUSH_TITLE','LBL_SECURITYGROUPS_DASHLETPUSH','./index.php?module=SecurityGroups&action=DashletPush');
$admin_option_defs['Administration']['securitygroup_hookup']= array('PatchUpgrades','LBL_SECURITYGROUPS_HOOKUP_TITLE','LBL_SECURITYGROUPS_HOOKUP','./index.php?module=SecurityGroups&action=Hookup');

$admin_option_defs['Administration']['securitygroup_info']= array('helpInline','LBL_SECURITYGROUPS_INFO_TITLE','LBL_SECURITYGROUPS_INFO','https://www.sugaroutfitters.com/docs/securitysuite');





  

$admin_group_header[]= array('LBL_SECURITYGROUPS','',false,$admin_option_defs, '');


