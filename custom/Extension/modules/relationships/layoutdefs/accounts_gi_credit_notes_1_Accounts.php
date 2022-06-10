<?php
 // created: 2014-05-29 08:27:28
$layout_defs["Accounts"]["subpanel_setup"]['accounts_gi_credit_notes_1'] = array (
  'order' => 100,
  'module' => 'GI_Credit_Notes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_GI_CREDIT_NOTES_1_FROM_GI_CREDIT_NOTES_TITLE',
  'get_subpanel_data' => 'accounts_gi_credit_notes_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
