<?php
$module_name = 'GI_Products_Categories';
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
            'name' => 'parent_category_c',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_CATEGORY',
            'displayParams' => 
            array (
              'initial_filter' => '&discontinued_c_advanced=0',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name_with_category_c',
            'label' => 'LBL_NAME_WITH_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'name_in_website_c',
            'label' => 'LBL_NAME_IN_WEBSITE',
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
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
          1 => 
          array (
            'name' => 'image_url_c',
            'label' => 'LBL_IMAGE_URL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'h1_heading_c',
            'label' => 'LBL_H1_HEADING',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'short_description_c',
            'studio' => 'visible',
            'label' => 'LBL_SHORT_DESCRIPTION',
            'customCode' => '<textarea id="short_description_c" name="short_description_c">{$fields.short_description_c.value}</textarea>{literal}<script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js?v=-zpz24wgA9MhfySaiMSz_Q"></script>

<script type="text/javascript" language="Javascript">
<!--
if (!SUGAR.util.isTouchScreen()) {
    tinyMCE.init({"convert_urls":false,"valid_children":"+body[style]","height":300,"width":"100%","theme":"advanced","theme_advanced_toolbar_align":"left","theme_advanced_toolbar_location":"top","theme_advanced_buttons1":"code,help,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,\\n\\t                     \\t\\t\\t\\t\\tjustifyfull,separator,forecolor,backcolor,separator,styleselect,formatselect,fontselect,fontsizeselect,","theme_advanced_buttons2":"cut,copy,paste,pastetext,pasteword,selectall,separator,search,replace,separator,bullist,numlist,separator,outdent,\\n\\t                     \\t\\t\\t\\t\\tindent,separator,ltr,rtl,separator,undo,redo,separator, link,unlink,anchor,image,separator,sub,sup,separator,charmap,\\n\\t                     \\t\\t\\t\\t\\tvisualaid","theme_advanced_buttons3":"tablecontrols,separator,advhr,hr,removeformat,separator,insertdate,inserttime,separator,preview","strict_loading_mode":true,"mode":"exact","language":"en","plugins":"advhr,insertdatetime,table,preview,paste,searchreplace,directionality","elements":"description,short_description_c,features_c","extended_valid_elements":"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]","content_css":"include\\/javascript\\/tiny_mce\\/themes\\/advanced\\/skins\\/default\\/content.css","gecko_spellcheck":"true","cleanup_on_startup":true,"directionality":"ltr"});
	
}
else {    document.getElementById(\'description\').style.width = \'100%\';
    document.getElementById(\'description\').style.height = \'100px\';    document.getElementById(\'short_description_c\').style.width = \'100%\';
    document.getElementById(\'short_description_c\').style.height = \'100px\';}
-->
</script>
{/literal}',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description">{$fields.description.value}</textarea>',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'features_c',
            'studio' => 'visible',
            'label' => 'LBL_FEATURES',
            'customCode' => '<textarea id="features_c" name="features_c">{$fields.features_c.value}</textarea>',
          ),
        ),
      ),
    ),
  ),
);
?>
