<?php
$module_name = 'GI_Discounts';
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
            'name' => 'is_combo_c',
            'label' => 'LBL_IS_COMBO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description">{$fields.description.value}</textarea>{literal}<script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js?v=VcRj8Ac5689-p8Fmb3DbmQ"></script>

<script type="text/javascript" language="Javascript">
<!--
if (!SUGAR.util.isTouchScreen()) {
    tinyMCE.init({"convert_urls":false,"valid_children":"+body[style]","height":300,"width":"100%","theme":"advanced","theme_advanced_toolbar_align":"left","theme_advanced_toolbar_location":"top","theme_advanced_buttons1":"code,help,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,\\n\\t                     \\t\\t\\t\\t\\tjustifyfull,separator,forecolor,backcolor,separator,styleselect,formatselect,fontselect,fontsizeselect,","theme_advanced_buttons2":"cut,copy,paste,pastetext,pasteword,selectall,separator,search,replace,separator,bullist,numlist,separator,outdent,\\n\\t                     \\t\\t\\t\\t\\tindent,separator,ltr,rtl,separator,undo,redo,separator, link,unlink,anchor,image,separator,sub,sup,separator,charmap,\\n\\t                     \\t\\t\\t\\t\\tvisualaid","theme_advanced_buttons3":"tablecontrols,separator,advhr,hr,removeformat,separator,insertdate,inserttime,separator,preview","strict_loading_mode":true,"mode":"exact","language":"en","plugins":"advhr,insertdatetime,table,preview,paste,searchreplace,directionality","elements":"description","extended_valid_elements":"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]","content_css":"include\\/javascript\\/tiny_mce\\/themes\\/advanced\\/skins\\/default\\/content.css","gecko_spellcheck":"true","cleanup_on_startup":true,"directionality":"ltr"});
	
}
else {    document.getElementById(\'description\').style.width = \'100%\';
    document.getElementById(\'description\').style.height = \'100px\';}
-->
</script>
{/literal}',
          ),
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'valid_from_days_c',
            'label' => 'LBL_VALID_FROM_DAYS',
          ),
          1 => 
          array (
            'name' => 'ratio_c',
            'label' => 'LBL_RATIO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'expires_on_days_c',
            'label' => 'LBL_EXPIRES_ON_DAYS',
          ),
          1 => 
          array (
            'name' => 'ratio_type_c',
            'studio' => 'visible',
            'label' => 'LBL_RATIO_TYPE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'valid_from_date_c',
            'label' => 'LBL_VALID_FROM_DATE',
          ),
          1 => 
          array (
            'name' => 'discontinued_c',
            'label' => 'LBL_DISCONTINUED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'expires_on_date_c',
            'label' => 'LBL_EXPIRES_ON_DATE',
          ),
          1 => 
          array (
            'name' => 'sequence_c',
            'label' => 'LBL_SEQUENCE',
          ),
        ),
      ),
    ),
  ),
);
?>
