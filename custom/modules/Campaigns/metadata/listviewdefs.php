<?php
// created: 2017-01-04 13:53:55
$listViewDefs['Campaigns'] = array (
  'TRACK_CAMPAIGN' => 
  array (
    'width' => '0.01',
    'label' => '&nbsp;',
    'link' => true,
    'customCode' => ' <a title="{$TRACK_CAMPAIGN_TITLE}" href="index.php?action=TrackDetailView&module=Campaigns&record={$ID}"><!--not_in_theme!--><img border="0" src="{$TRACK_CAMPAIGN_IMAGE}" alt="{$TRACK_VIEW_ALT_TEXT}" width="16px" height="16px"></a> ',
    'default' => true,
    'studio' => false,
    'nowrap' => true,
    'sortable' => false,
  ),
  'LAUNCH_WIZARD' => 
  array (
    'width' => '1',
    'label' => '&nbsp;',
    'link' => true,
    'customCode' => ' <a title="{$LAUNCH_WIZARD_TITLE}" href="index.php?action=WizardHome&module=Campaigns&record={$ID}"><!--not_in_theme!--><img border="0" src="{$LAUNCH_WIZARD_IMAGE}"  alt="{$LAUNCH_WIZ_ALT_TEXT}"></a>  ',
    'default' => true,
    'studio' => false,
    'nowrap' => true,
    'sortable' => false,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CAMPAIGN_NAME',
    'link' => true,
    'default' => true,
  ),
  'SHOW_ON_WEB_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_SHOW_ON_WEB',
    'width' => '10%',
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'CAMPAIGN_TYPE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_TYPE',
    'default' => true,
  ),
  'END_DATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_END_DATE',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
);