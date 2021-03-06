<?php
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
            'name' => 'name_in_website_c',
            'label' => 'LBL_NAME_IN_WEBSITE',
          ),
        ),
        2 => 
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
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'website_url_c',
            'label' => 'LBL_WEBSITE_URL',
          ),
          1 => 
          array (
            'name' => 'image_url_c',
            'label' => 'LBL_IMAGE_URL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'h1_heading_c',
            'label' => 'LBL_H1_HEADING',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'short_description_c',
            'studio' => 'visible',
            'label' => 'LBL_SHORT_DESCRIPTION',
            'customCode' => '<textarea id="short_description_c" name="short_description_c">{$fields.short_description_c.value}</textarea>{literal}<script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js?v=aST3Ybrs8AeBx8pAPWWrtQ"></script>

<script type="text/javascript" language="Javascript">
<!--
if (!SUGAR.util.isTouchScreen()) {
    tinyMCE.init({"convert_urls":false,"valid_children":"+body[style]","height":300,"width":"100%","theme":"advanced","theme_advanced_toolbar_align":"left","theme_advanced_toolbar_location":"top","theme_advanced_buttons1":"code,help,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,\\n\\t                     \\t\\t\\t\\t\\tjustifyfull,separator,forecolor,backcolor,separator,styleselect,formatselect,fontselect,fontsizeselect,","theme_advanced_buttons2":"cut,copy,paste,pastetext,pasteword,selectall,separator,search,replace,separator,bullist,numlist,separator,outdent,\\n\\t                     \\t\\t\\t\\t\\tindent,separator,ltr,rtl,separator,undo,redo,separator, link,unlink,anchor,image,separator,sub,sup,separator,charmap,\\n\\t                     \\t\\t\\t\\t\\tvisualaid","theme_advanced_buttons3":"tablecontrols,separator,advhr,hr,removeformat,separator,insertdate,inserttime,separator,preview","strict_loading_mode":true,"mode":"exact","language":"en","plugins":"advhr,insertdatetime,table,preview,paste,searchreplace,directionality","elements":"description,short_description_c,description_1_c,description_2_c,description_3_c,description_4_c,description_5_c,description_6_c,description_7_c,description_8_c,description_9_c","extended_valid_elements":"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]","content_css":"include\\/javascript\\/tiny_mce\\/themes\\/advanced\\/skins\\/default\\/content.css","gecko_spellcheck":"true","cleanup_on_startup":true,"directionality":"ltr"});
	
}
else {    document.getElementById(\'description\').style.width = \'100%\';
    document.getElementById(\'description\').style.height = \'100px\';    document.getElementById(\'short_description_c\').style.width = \'100%\';
    document.getElementById(\'short_description_c\').style.height = \'100px\';    document.getElementById(\'description_8_c\').style.width = \'100%\';
    document.getElementById(\'description_8_c\').style.height = \'100px\';    document.getElementById(\'description_1_c\').style.width = \'100%\';
    document.getElementById(\'description_1_c\').style.height = \'100px\';    document.getElementById(\'description_2_c\').style.width = \'100%\';
    document.getElementById(\'description_2_c\').style.height = \'100px\';    document.getElementById(\'description_3_c\').style.width = \'100%\';
    document.getElementById(\'description_3_c\').style.height = \'100px\';    document.getElementById(\'description_4_c\').style.width = \'100%\';
    document.getElementById(\'description_4_c\').style.height = \'100px\';    document.getElementById(\'description_5_c\').style.width = \'100%\';
    document.getElementById(\'description_5_c\').style.height = \'100px\';    document.getElementById(\'description_6_c\').style.width = \'100%\';
    document.getElementById(\'description_6_c\').style.height = \'100px\';    document.getElementById(\'description_7_c\').style.width = \'100%\';
    document.getElementById(\'description_7_c\').style.height = \'100px\';    document.getElementById(\'description_9_c\').style.width = \'100%\';
    document.getElementById(\'description_9_c\').style.height = \'100px\';}
-->
</script>
{/literal}',
          ),
        ),
        8 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'gi_products_categories_gi_products_catalog_1_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'description_8_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_8',
            'customCode' => '<textarea id="description_8_c" name="description_8_c">{$fields.description_8_c.value}</textarea>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description_1_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_1',
            'customCode' => '<textarea id="description_1_c" name="description_1_c">{$fields.description_1_c.value}</textarea>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description_2_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_2',
            'customCode' => '<textarea id="description_2_c" name="description_2_c">{$fields.description_2_c.value}</textarea>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description_3_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_3',
            'customCode' => '<textarea id="description_3_c" name="description_3_c">{$fields.description_3_c.value}</textarea>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description_6_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_6',
            'customCode' => '<textarea id="description_6_c" name="description_6_c">{$fields.description_6_c.value}</textarea>',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description_7_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_7',
            'customCode' => '<textarea id="description_7_c" name="description_7_c">{$fields.description_7_c.value}</textarea>',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description_4_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_4',
            'customCode' => '<textarea id="description_4_c" name="description_4_c">{$fields.description_4_c.value}</textarea>',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description_5_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_5',
            'customCode' => '<textarea id="description_5_c" name="description_5_c">{$fields.description_5_c.value}</textarea>',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'description_9_c',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION_9',
            'customCode' => '<textarea id="description_9_c" name="description_9_c">{$fields.description_9_c.value}</textarea>',
          ),
        ),
      ),
    ),
  ),
);
?>
