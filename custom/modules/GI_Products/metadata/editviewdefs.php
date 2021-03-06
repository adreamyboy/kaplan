<?php
$module_name = 'GI_Products';
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
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
          0 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gi_products_catalog_gi_products_1_name',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
              'field_to_name_array' => 
              array (
                'id' => 'gi_products_catalog_gi_products_1gi_products_catalog_ida',
                'name' => 'gi_products_catalog_gi_products_1_name',
                'price' => 'price',
                'currency_id' => 'currency_id',
              ),
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gi_terms_gi_products_1_name',
            'displayParams' => 
            array (
              'required' => true,
              'initial_filter' => '&discontinued_advanced=0',
            ),
          ),
          1 => 
          array (
            'name' => 'accounts_gi_products_1_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gi_locations_gi_products_1_name',
            'displayParams' => 
            array (
              'initial_filter' => '&discontinued_advanced=0',
            ),
          ),
          1 => 
          array (
            'name' => 'web_hidden',
            'label' => 'LBL_WEB_HIDDEN',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hide_instructor_c',
            'label' => 'LBL_HIDE_INSTRUCTOR',
          ),
          1 => 
          array (
            'name' => 'hide_add_to_cart_c',
            'label' => 'LBL_HIDE_ADD_TO_CART',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
            'customCode' => '<textarea id="description" name="description">{$fields.description.value}</textarea>{literal}<script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js?v=yJFWjmLwT32vDUWlwT4pXQ"></script>

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
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'capacity_c',
            'label' => 'LBL_CAPACITY',
          ),
          1 => 
          array (
            'name' => 'number_of_targeted_c',
            'label' => 'LBL_NUMBER_OF_TARGETED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'revenues_budgeted_c',
            'label' => 'LBL_REVENUES_BUDGETED',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'gi_line_items_change_requests_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'gi_line_items_change_requests_gi_products_2_name',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'gi_exam_results_gi_products_1_name',
          ),
          1 => 
          array (
            'name' => 'add_line_item_to_opp_id_c',
            'label' => 'LBL_ADD_LINE_ITEM_TO_OPP_ID',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'default_line_item_status_c',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_LINE_ITEM_STATUS',
          ),
          1 => 
          array (
            'name' => 'redirect_url_c',
            'label' => 'LBL_REDIRECT_URL',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
          1 => 
          array (
            'name' => 'vat_c',
            'label' => 'LBL_VAT',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'provisional_c',
            'label' => 'LBL_PROVISIONAL',
          ),
          1 => 
          array (
            'name' => 'batch_c',
            'label' => 'LBL_BATCH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'number_of_sessions_c',
            'label' => 'LBL_NUMBER_OF_SESSIONS',
          ),
          1 => 
          array (
            'name' => 'days_c',
            'studio' => 'visible',
            'label' => 'LBL_DAYS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_start_c',
            'label' => 'LBL_DATE_START',
          ),
          1 => 
          array (
            'name' => 'date_end_c',
            'label' => 'LBL_DATE_END',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'refund_expiry_terms_c',
            'studio' => 'visible',
            'label' => 'LBL_REFUND_EXPIRY_TERMS',
          ),
          1 => 'assigned_user_name',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'has_elearning_c',
            'label' => 'LBL_HAS_ELEARNING',
          ),
          1 => 
          array (
            'name' => 'synch_lineitems_immediately_c',
            'label' => 'LBL_SYNCH_LINEITEMS_IMMEDIATELY',
          ),
        ),
      ),
    ),
  ),
);
?>
