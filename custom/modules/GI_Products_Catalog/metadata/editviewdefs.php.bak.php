<?php

require_once("include/SugarTinyMCE.php");
$tiny = new SugarTinyMCE();
$tiny->defaultConfig['cleanup_on_startup']=true;
$tinyHtml = $tiny->getInstance('description,short_description_c,description_1_c,description_2_c,description_3_c,description_4_c,description_5_c,description_6_c,description_7_c');

$module_name = 'GI_Products_Catalog';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
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
            'name' => 'code_c',
            'label' => 'LBL_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'web_hidden_c',
            'label' => 'LBL_WEB_HIDDEN',
          ),
          1 => 
          array (
            'name' => 'discontinued',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'short_description_c',
            'studio' => 'visible',
            'label' => 'LBL_SHORT_DESCRIPTION',
            'customCode' => '<textarea id="short_description_c" name="short_description_c">{$fields.short_description_c.value}</textarea>{literal}'. $tinyHtml . '{/literal}',
          ),
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'description_1_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_1',
            'customCode' => '<textarea id="description_1_c" name="description_1_c">{$fields.description_1_c.value}</textarea>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description_2_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_2',
            'customCode' => '<textarea id="description_2_c" name="description_2_c">{$fields.description_2_c.value}</textarea>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description_3_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_3',
            'customCode' => '<textarea id="description_3_c" name="description_3_c">{$fields.description_3_c.value}</textarea>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description_6_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_6',
            'customCode' => '<textarea id="description_6_c" name="description_6_c">{$fields.description_6_c.value}</textarea>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description_7_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_7',
            'customCode' => '<textarea id="description_7_c" name="description_7_c">{$fields.description_7_c.value}</textarea>',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description_4_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_4',
            'customCode' => '<textarea id="description_4_c" name="description_4_c">{$fields.description_4_c.value}</textarea>',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description_5_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_5',
          ),
        ),
      ),
    ),
  ),
);
?>
