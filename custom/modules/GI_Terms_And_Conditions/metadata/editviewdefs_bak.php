<?php
require_once("include/SugarTinyMCE.php");
$tiny = new SugarTinyMCE();
$tiny->defaultConfig['cleanup_on_startup']=true;
$tinyHtml = $tiny->getInstance('description');

$module_name = 'GI_Terms_And_Conditions';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'active_c',
            'label' => 'LBL_ACTIVE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description">{$fields.description.value}</textarea>{literal}'. $tinyHtml . '{/literal}',
          ),
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
