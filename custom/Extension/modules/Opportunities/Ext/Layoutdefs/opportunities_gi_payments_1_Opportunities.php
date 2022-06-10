<?php
 // created: 2014-05-29 06:25:06
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_gi_payments_1'] = array (
  'order' => 100,
  'module' => 'GI_Payments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_GI_PAYMENTS_1_FROM_GI_PAYMENTS_TITLE',
  'get_subpanel_data' => 'opportunities_gi_payments_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
      //'widget_class' => 'SubPanelTopButton',
      //'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    /*
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
    */
  ),
);
