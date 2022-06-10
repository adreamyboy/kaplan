

<script>
    {literal}
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });
    });
    {/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_HEADER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=GI_Products'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_HEADER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=GI_Products", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="EditView_tabs"
>
<div >
<div id="Default_{$module}_Subpanel">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.type.acl < 1}
<td valign="top" id='type_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.type.name}" 
id="{$fields.type.name}" 
title=''       
>
{if isset($fields.type.value) && $fields.type.value != ''}
{html_options options=$fields.type.options selected=$fields.type.value}
{else}
{html_options options=$fields.type.options selected=$fields.type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.type.options }
{capture name="field_val"}{$fields.type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.type.name}" 
id="{$fields.type.name}" 
title=''          
>
{if isset($fields.type.value) && $fields.type.value != ''}
{html_options options=$fields.type.options selected=$fields.type.value}
{else}
{html_options options=$fields.type.options selected=$fields.type.default}
{/if}
</select>
<input
id="{$fields.type.name}-input"
name="{$fields.type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.type.name}-image"></button><button type="button"
id="btn-clear-{$fields.type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.type.name}-input', '{$fields.type.name}');sync_{$fields.type.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.type.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.type.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.type.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.type.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.type.name}{literal}");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.type.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.type.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.type.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.type.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.type.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.currency_id.acl < 1}
<td valign="top" id='currency_id_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<span id='currency_id_span'>
{$fields.currency_id.value}</span>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_products_catalog_gi_products_1_name.acl < 1}
<td valign="top" id='gi_products_catalog_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_products_catalog_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_products_catalog_gi_products_1_name.name}" size="" value="{$fields.gi_products_catalog_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_products_catalog_gi_products_1_name.id_name}" 
id="{$fields.gi_products_catalog_gi_products_1_name.id_name}" 
value="{$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_products_catalog_gi_products_1_name.name}" id="btn_{$fields.gi_products_catalog_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_products_catalog_gi_products_1_name.module}", 
600, 
400, 
"&discontinued_advanced=0", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_products_catalog_gi_products_1gi_products_catalog_ida","name":"gi_products_catalog_gi_products_1_name","price":"price","currency_id":"currency_id"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_products_catalog_gi_products_1_name.name}" id="btn_clr_{$fields.gi_products_catalog_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_products_catalog_gi_products_1_name.name}', '{$fields.gi_products_catalog_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_products_catalog_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_terms_gi_products_1_name.acl < 1}
<td valign="top" id='gi_terms_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_terms_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_terms_gi_products_1_name.name}" size="" value="{$fields.gi_terms_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_terms_gi_products_1_name.id_name}" 
id="{$fields.gi_terms_gi_products_1_name.id_name}" 
value="{$fields.gi_terms_gi_products_1gi_terms_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_terms_gi_products_1_name.name}" id="btn_{$fields.gi_terms_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_terms_gi_products_1_name.module}", 
600, 
400, 
"&discontinued_advanced=0", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_terms_gi_products_1gi_terms_ida","name":"gi_terms_gi_products_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_terms_gi_products_1_name.name}" id="btn_clr_{$fields.gi_terms_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_terms_gi_products_1_name.name}', '{$fields.gi_terms_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_terms_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.accounts_gi_products_1_name.acl < 1}
<td valign="top" id='accounts_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.accounts_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.accounts_gi_products_1_name.name}" size="" value="{$fields.accounts_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.accounts_gi_products_1_name.id_name}" 
id="{$fields.accounts_gi_products_1_name.id_name}" 
value="{$fields.accounts_gi_products_1accounts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts_gi_products_1_name.name}" id="btn_{$fields.accounts_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.accounts_gi_products_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"accounts_gi_products_1accounts_ida","name":"accounts_gi_products_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.accounts_gi_products_1_name.name}" id="btn_clr_{$fields.accounts_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.accounts_gi_products_1_name.name}', '{$fields.accounts_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.accounts_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_locations_gi_products_1_name.acl < 1}
<td valign="top" id='gi_locations_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_locations_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_locations_gi_products_1_name.name}" size="" value="{$fields.gi_locations_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_locations_gi_products_1_name.id_name}" 
id="{$fields.gi_locations_gi_products_1_name.id_name}" 
value="{$fields.gi_locations_gi_products_1gi_locations_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_locations_gi_products_1_name.name}" id="btn_{$fields.gi_locations_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_locations_gi_products_1_name.module}", 
600, 
400, 
"&discontinued_advanced=0", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_locations_gi_products_1gi_locations_ida","name":"gi_locations_gi_products_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_locations_gi_products_1_name.name}" id="btn_clr_{$fields.gi_locations_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_locations_gi_products_1_name.name}', '{$fields.gi_locations_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_locations_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.web_hidden.acl < 1}
<td valign="top" id='web_hidden_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_WEB_HIDDEN' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.web_hidden.value) == "1" || strval($fields.web_hidden.value) == "yes" || strval($fields.web_hidden.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.web_hidden.name}" value="0"> 
<input type="checkbox" id="{$fields.web_hidden.name}" 
name="{$fields.web_hidden.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.hide_instructor_c.acl < 1}
<td valign="top" id='hide_instructor_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_HIDE_INSTRUCTOR' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.hide_instructor_c.value) == "1" || strval($fields.hide_instructor_c.value) == "yes" || strval($fields.hide_instructor_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hide_instructor_c.name}" value="0"> 
<input type="checkbox" id="{$fields.hide_instructor_c.name}" 
name="{$fields.hide_instructor_c.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.hide_add_to_cart_c.acl < 1}
<td valign="top" id='hide_add_to_cart_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_HIDE_ADD_TO_CART' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.hide_add_to_cart_c.value) == "1" || strval($fields.hide_add_to_cart_c.value) == "yes" || strval($fields.hide_add_to_cart_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.hide_add_to_cart_c.name}" value="0"> 
<input type="checkbox" id="{$fields.hide_add_to_cart_c.name}" 
name="{$fields.hide_add_to_cart_c.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.description.acl < 1}
<td valign="top" id='description_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}
<textarea tabindex="0"  id="description" name="description">{$fields.description.value}</textarea>{literal}<script type="text/javascript" language="Javascript" src="include/javascript/tiny_mce/tiny_mce.js?v=yJFWjmLwT32vDUWlwT4pXQ"></script>
<script type="text/javascript" language="Javascript">
<!--
if (!SUGAR.util.isTouchScreen()) {
    tinyMCE.init({"convert_urls":false,"valid_children":"+body[style]","height":300,"width":"100%","theme":"advanced","theme_advanced_toolbar_align":"left","theme_advanced_toolbar_location":"top","theme_advanced_buttons1":"code,help,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,\n\t                     \t\t\t\t\tjustifyfull,separator,forecolor,backcolor,separator,styleselect,formatselect,fontselect,fontsizeselect,","theme_advanced_buttons2":"cut,copy,paste,pastetext,pasteword,selectall,separator,search,replace,separator,bullist,numlist,separator,outdent,\n\t                     \t\t\t\t\tindent,separator,ltr,rtl,separator,undo,redo,separator, link,unlink,anchor,image,separator,sub,sup,separator,charmap,\n\t                     \t\t\t\t\tvisualaid","theme_advanced_buttons3":"tablecontrols,separator,advhr,hr,removeformat,separator,insertdate,inserttime,separator,preview","strict_loading_mode":true,"mode":"exact","language":"en","plugins":"advhr,insertdatetime,table,preview,paste,searchreplace,directionality","elements":"description","extended_valid_elements":"style[dir|lang|media|title|type],hr[class|width|size|noshade],@[class|style]","content_css":"include\/javascript\/tiny_mce\/themes\/advanced\/skins\/default\/content.css","gecko_spellcheck":"true","cleanup_on_startup":true,"directionality":"ltr"});
	
}
else {    document.getElementById('description').style.width = '100%';
    document.getElementById('description').style.height = '100px';}
-->
</script>
{/literal}

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.capacity_c.acl < 1}
<td valign="top" id='capacity_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_CAPACITY' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.capacity_c.value) <= 0}
{assign var="value" value=$fields.capacity_c.default_value }
{else}
{assign var="value" value=$fields.capacity_c.value }
{/if}  
<input type='text' name='{$fields.capacity_c.name}' 
id='{$fields.capacity_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.number_of_targeted_c.acl < 1}
<td valign="top" id='number_of_targeted_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER_OF_TARGETED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.number_of_targeted_c.value) <= 0}
{assign var="value" value=$fields.number_of_targeted_c.default_value }
{else}
{assign var="value" value=$fields.number_of_targeted_c.value }
{/if}  
<input type='text' name='{$fields.number_of_targeted_c.name}' 
id='{$fields.number_of_targeted_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'    >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.revenues_budgeted_c.acl < 1}
<td valign="top" id='revenues_budgeted_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_REVENUES_BUDGETED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

{if strlen($fields.revenues_budgeted_c.value) <= 0}
{assign var="value" value=$fields.revenues_budgeted_c.default_value }
{else}
{assign var="value" value=$fields.revenues_budgeted_c.value }
{/if}  
<input type='text' name='{$fields.revenues_budgeted_c.name}' 
id='{$fields.revenues_budgeted_c.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_line_items_change_requests_gi_products_1_name.acl < 1}
<td valign="top" id='gi_line_items_change_requests_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_line_items_change_requests_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_line_items_change_requests_gi_products_1_name.name}" size="" value="{$fields.gi_line_items_change_requests_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_line_items_change_requests_gi_products_1_name.id_name}" 
id="{$fields.gi_line_items_change_requests_gi_products_1_name.id_name}" 
value="{$fields.gi_line_itcd35equests_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_line_items_change_requests_gi_products_1_name.name}" id="btn_{$fields.gi_line_items_change_requests_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_line_items_change_requests_gi_products_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_line_itcd35equests_ida","name":"gi_line_items_change_requests_gi_products_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_line_items_change_requests_gi_products_1_name.name}" id="btn_clr_{$fields.gi_line_items_change_requests_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_line_items_change_requests_gi_products_1_name.name}', '{$fields.gi_line_items_change_requests_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_line_items_change_requests_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.gi_line_items_change_requests_gi_products_2_name.acl < 1}
<td valign="top" id='gi_line_items_change_requests_gi_products_2_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_line_items_change_requests_gi_products_2_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_line_items_change_requests_gi_products_2_name.name}" size="" value="{$fields.gi_line_items_change_requests_gi_products_2_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_line_items_change_requests_gi_products_2_name.id_name}" 
id="{$fields.gi_line_items_change_requests_gi_products_2_name.id_name}" 
value="{$fields.gi_line_it60abequests_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_line_items_change_requests_gi_products_2_name.name}" id="btn_{$fields.gi_line_items_change_requests_gi_products_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_line_items_change_requests_gi_products_2_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_line_it60abequests_ida","name":"gi_line_items_change_requests_gi_products_2_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_line_items_change_requests_gi_products_2_name.name}" id="btn_clr_{$fields.gi_line_items_change_requests_gi_products_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_line_items_change_requests_gi_products_2_name.name}', '{$fields.gi_line_items_change_requests_gi_products_2_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_line_items_change_requests_gi_products_2_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_exam_results_gi_products_1_name.acl < 1}
<td valign="top" id='gi_exam_results_gi_products_1_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.gi_exam_results_gi_products_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.gi_exam_results_gi_products_1_name.name}" size="" value="{$fields.gi_exam_results_gi_products_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.gi_exam_results_gi_products_1_name.id_name}" 
id="{$fields.gi_exam_results_gi_products_1_name.id_name}" 
value="{$fields.gi_exam_results_gi_products_1gi_exam_results_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_exam_results_gi_products_1_name.name}" id="btn_{$fields.gi_exam_results_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.gi_exam_results_gi_products_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"gi_exam_results_gi_products_1gi_exam_results_ida","name":"gi_exam_results_gi_products_1_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.gi_exam_results_gi_products_1_name.name}" id="btn_clr_{$fields.gi_exam_results_gi_products_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.gi_exam_results_gi_products_1_name.name}', '{$fields.gi_exam_results_gi_products_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.gi_exam_results_gi_products_1_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.add_line_item_to_opp_id_c.acl < 1}
<td valign="top" id='add_line_item_to_opp_id_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ADD_LINE_ITEM_TO_OPP_ID' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.add_line_item_to_opp_id_c.value) <= 0}
{assign var="value" value=$fields.add_line_item_to_opp_id_c.default_value }
{else}
{assign var="value" value=$fields.add_line_item_to_opp_id_c.value }
{/if}  
<input type='text' name='{$fields.add_line_item_to_opp_id_c.name}' 
id='{$fields.add_line_item_to_opp_id_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.default_line_item_status_c.acl < 1}
<td valign="top" id='default_line_item_status_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DEFAULT_LINE_ITEM_STATUS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.default_line_item_status_c.name}" 
id="{$fields.default_line_item_status_c.name}" 
title=''       
>
{if isset($fields.default_line_item_status_c.value) && $fields.default_line_item_status_c.value != ''}
{html_options options=$fields.default_line_item_status_c.options selected=$fields.default_line_item_status_c.value}
{else}
{html_options options=$fields.default_line_item_status_c.options selected=$fields.default_line_item_status_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.default_line_item_status_c.options }
{capture name="field_val"}{$fields.default_line_item_status_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.default_line_item_status_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.default_line_item_status_c.name}" 
id="{$fields.default_line_item_status_c.name}" 
title=''          
>
{if isset($fields.default_line_item_status_c.value) && $fields.default_line_item_status_c.value != ''}
{html_options options=$fields.default_line_item_status_c.options selected=$fields.default_line_item_status_c.value}
{else}
{html_options options=$fields.default_line_item_status_c.options selected=$fields.default_line_item_status_c.default}
{/if}
</select>
<input
id="{$fields.default_line_item_status_c.name}-input"
name="{$fields.default_line_item_status_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.default_line_item_status_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.default_line_item_status_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.default_line_item_status_c.name}-input', '{$fields.default_line_item_status_c.name}');sync_{$fields.default_line_item_status_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.default_line_item_status_c.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.default_line_item_status_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.default_line_item_status_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.default_line_item_status_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.default_line_item_status_c.name}{literal}");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.default_line_item_status_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.default_line_item_status_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.default_line_item_status_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.default_line_item_status_c.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.default_line_item_status_c.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.redirect_url_c.acl < 1}
<td valign="top" id='redirect_url_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_REDIRECT_URL' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.redirect_url_c.value) <= 0}
{assign var="value" value=$fields.redirect_url_c.default_value }
{else}
{assign var="value" value=$fields.redirect_url_c.value }
{/if}  
<input type='text' name='{$fields.redirect_url_c.name}' 
id='{$fields.redirect_url_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL3">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL3' module='GI_Products'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.price.acl < 1}
<td valign="top" id='price_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_PRICE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.price.value) <= 0}
{assign var="value" value=$fields.price.default_value }
{else}
{assign var="value" value=$fields.price.value }
{/if}  
<input type='text' name='{$fields.price.name}' 
id='{$fields.price.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.vat_c.acl < 1}
<td valign="top" id='vat_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_VAT' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.vat_c.value) <= 0}
{assign var="value" value=$fields.vat_c.default_value }
{else}
{assign var="value" value=$fields.vat_c.value }
{/if}  
<input type='text' name='{$fields.vat_c.name}'
id='{$fields.vat_c.name}'
size='30'
maxlength='18'value='{sugar_number_format var=$value precision=7 }'
title=''
tabindex='0'
>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL1">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL1' module='GI_Products'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.provisional_c.acl < 1}
<td valign="top" id='provisional_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_PROVISIONAL' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.provisional_c.value) == "1" || strval($fields.provisional_c.value) == "yes" || strval($fields.provisional_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.provisional_c.name}" value="0"> 
<input type="checkbox" id="{$fields.provisional_c.name}" 
name="{$fields.provisional_c.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.batch_c.acl < 1}
<td valign="top" id='batch_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_BATCH' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.batch_c.value) <= 0}
{assign var="value" value=$fields.batch_c.default_value }
{else}
{assign var="value" value=$fields.batch_c.value }
{/if}  
<input type='text' name='{$fields.batch_c.name}' 
id='{$fields.batch_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.number_of_sessions_c.acl < 1}
<td valign="top" id='number_of_sessions_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER_OF_SESSIONS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.number_of_sessions_c.value) <= 0}
{assign var="value" value=$fields.number_of_sessions_c.default_value }
{else}
{assign var="value" value=$fields.number_of_sessions_c.value }
{/if}  
<input type='text' name='{$fields.number_of_sessions_c.name}' 
id='{$fields.number_of_sessions_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.days_c.acl < 1}
<td valign="top" id='days_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DAYS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<input type="hidden" id="{$fields.days_c.name}_multiselect"
name="{$fields.days_c.name}_multiselect" value="true">
{multienum_to_array string=$fields.days_c.value default=$fields.days_c.default assign="values"}
<select id="{$fields.days_c.name}"
name="{$fields.days_c.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
{html_options options=$fields.days_c.options selected=$values}
</select>
{else}
{assign var="field_options" value=$fields.days_c.options }
{capture name="field_val"}{$fields.days_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.days_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<input type="hidden" id="{$fields.days_c.name}_multiselect"
name="{$fields.days_c.name}_multiselect" value="true">
{multienum_to_array string=$fields.days_c.value default=$fields.days_c.default assign="values"}
<select style='display:none' id="{$fields.days_c.name}"
name="{$fields.days_c.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
{html_options options=$fields.days_c.options selected=$values}
</select>
<input
id="{$fields.days_c.name}-input"
name="{$fields.days_c.name}-input"
size="60"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button">
<img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.days_c.name}-image">
</button>
<button type="button"
id="btn-clear-{$fields.days_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.days_c.name}-input', '{$fields.days_c.name};');SUGAR.AutoComplete.{$ac_key}.inputNode.updateHidden()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		YUI().use('datasource', 'datasource-jsonschema', function (Y) {
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
					    source: function (request) {
					    	var selectElem = document.getElementById("{/literal}{$fields.days_c.name}{literal}");
					    	var ret = [];
					    	for (i=0;i<selectElem.options.length;i++)
					    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
					    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
					    	return ret;
					    }
					});
				});
		{/literal}
	
	{literal}
	YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters","node-event-simulate", function (Y) {
		{/literal}
		
	    SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.days_c.name}-input');
	    SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.days_c.name}-image');
	    SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.days_c.name}');

					SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
			SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
			if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
				{/literal}
				SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
				SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
				{literal}
			}
			{/literal}
			if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
				{/literal}
				SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
				SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
				{literal}
			}
			{/literal}
				
				{literal}
	    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
	        activateFirstItem: true,
	        allowTrailingDelimiter: true,
			{/literal}
	        minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
	        queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
	        queryDelimiter: ',',
	        zIndex: 99999,

						{literal}
			source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
			
	        resultTextLocator: 'text',
	        resultHighlighter: 'phraseMatch',
	        resultFilters: 'phraseMatch',
	        // Chain together a startsWith filter followed by a custom result filter
	        // that only displays tags that haven't already been selected.
	        resultFilters: ['phraseMatch', function (query, results) {
		        // Split the current input value into an array based on comma delimiters.
	        	var selected = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
	        
	            // Convert the array into a hash for faster lookups.
	            selected = Y.Array.hash(selected);

	            // Filter out any results that are already selected, then return the
	            // array of filtered results.
	            return Y.Array.filter(results, function (result) {
	               return !selected.hasOwnProperty(result.text);
	            });
	        }]
	    });
		{/literal}{literal}
		if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		    // expand the dropdown options upon focus
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
		        SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
		    });
		}

				    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden = function() {
				var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);

				var selectElem = document.getElementById("{/literal}{$fields.days_c.name}{literal}");

				var oTable = {};
		    	for (i=0;i<selectElem.options.length;i++){
		    		if (selectElem.options[i].selected)
		    			oTable[selectElem.options[i].value] = true;
		    	}

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
				}

				var nTable = {};

				for (i=0;i<index_array.length;i++){
					var key = index_array[i];
					for (c=0;c<selectElem.options.length;c++)
						if (selectElem.options[c].innerHTML == key){
							selectElem.options[c].selected=true;
							nTable[selectElem.options[c].value]=1;
						}
				}

				//the following two loops check to see if the selected options are different from before.
				//oTable holds the original select. nTable holds the new one
				var fireEvent=false;
				for (n in nTable){
					if (n=='')
						continue;
		    		if (!oTable.hasOwnProperty(n))
		    			fireEvent = true; //the options are different, fire the event
		    	}
		    	
		    	for (o in oTable){
		    		if (o=='')
		    			continue;
		    		if (!nTable.hasOwnProperty(o))
		    			fireEvent=true; //the options are different, fire the event
		    	}

		    	//if the selected options are different from before, fire the 'change' event
		    	if (fireEvent){
		    		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
		    	}
		    };

		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText = function() {
		    	//get last option typed into the input widget
		    	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set(SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'));
				var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
				//create a string ret_string as a comma-delimited list of text from selectElem options.
				var selectElem = document.getElementById("{/literal}{$fields.days_c.name}{literal}");
				var ret_array = [];

                if (selectElem==null || selectElem.options == null)
					return;

				for (i=0;i<selectElem.options.length;i++){
					if (selectElem.options[i].selected && selectElem.options[i].innerHTML!=''){
						ret_array.push(selectElem.options[i].innerHTML);
					}
				}

				//index array - array from input
				//ret array - array from select

				var sorted_array = [];
				var notsorted_array = [];
				for (i=0;i<index_array.length;i++){
					for (c=0;c<ret_array.length;c++){
						if (ret_array[c]==index_array[i]){
							sorted_array.push(ret_array[c]);
							ret_array.splice(c,1);
						}
					}
				}
				ret_string = ret_array.concat(sorted_array).join(', ');
				if (ret_string.match(/^\s*$/))
					ret_string='';
				else
					ret_string+=', ';
				
				//update the input widget
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set('value', ret_string);
		    };

		    function updateTextOnInterval(){
		    	if (document.activeElement != document.getElementById("{/literal}{$fields.days_c.name}-input{literal}"))
		    		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    	setTimeout(updateTextOnInterval,100);
		    }

		    updateTextOnInterval();
		
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
			});
			
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		});
	
	    // when they click on the arrow image, toggle the visibility of the options
	    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.on('click', function () {
			if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
			}
			else{
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
			}
	    });
	
		if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
		      SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
		      SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    });
		} else {
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    });
		}
	});
	</script>
{/literal}
{/if}

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.date_start_c.acl < 1}
<td valign="top" id='date_start_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_START' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.date_start_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_start_c.name}" id="{$fields.date_start_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.date_start_c.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.date_start_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.date_start_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.date_end_c.acl < 1}
<td valign="top" id='date_end_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_END' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.date_end_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.date_end_c.name}" id="{$fields.date_end_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.date_end_c.name}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.date_end_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.date_end_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.refund_expiry_terms_c.acl < 1}
<td valign="top" id='refund_expiry_terms_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_REFUND_EXPIRY_TERMS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.refund_expiry_terms_c.name}" 
id="{$fields.refund_expiry_terms_c.name}" 
title=''       
>
{if isset($fields.refund_expiry_terms_c.value) && $fields.refund_expiry_terms_c.value != ''}
{html_options options=$fields.refund_expiry_terms_c.options selected=$fields.refund_expiry_terms_c.value}
{else}
{html_options options=$fields.refund_expiry_terms_c.options selected=$fields.refund_expiry_terms_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.refund_expiry_terms_c.options }
{capture name="field_val"}{$fields.refund_expiry_terms_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.refund_expiry_terms_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.refund_expiry_terms_c.name}" 
id="{$fields.refund_expiry_terms_c.name}" 
title=''          
>
{if isset($fields.refund_expiry_terms_c.value) && $fields.refund_expiry_terms_c.value != ''}
{html_options options=$fields.refund_expiry_terms_c.options selected=$fields.refund_expiry_terms_c.value}
{else}
{html_options options=$fields.refund_expiry_terms_c.options selected=$fields.refund_expiry_terms_c.default}
{/if}
</select>
<input
id="{$fields.refund_expiry_terms_c.name}-input"
name="{$fields.refund_expiry_terms_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.refund_expiry_terms_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.refund_expiry_terms_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.refund_expiry_terms_c.name}-input', '{$fields.refund_expiry_terms_c.name}');sync_{$fields.refund_expiry_terms_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.refund_expiry_terms_c.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.refund_expiry_terms_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.refund_expiry_terms_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.refund_expiry_terms_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.refund_expiry_terms_c.name}{literal}");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.refund_expiry_terms_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.refund_expiry_terms_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.refund_expiry_terms_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.refund_expiry_terms_c.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.refund_expiry_terms_c.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.assigned_user_name.acl < 1}
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
		enableQS
);
</script>

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL2">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL2' module='GI_Products'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.has_elearning_c.acl < 1}
<td valign="top" id='has_elearning_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_HAS_ELEARNING' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.has_elearning_c.value) == "1" || strval($fields.has_elearning_c.value) == "yes" || strval($fields.has_elearning_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.has_elearning_c.name}" value="0"> 
<input type="checkbox" id="{$fields.has_elearning_c.name}" 
name="{$fields.has_elearning_c.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}

{if $bean->field_defs.synch_lineitems_immediately_c.acl < 1}
<td valign="top" id='synch_lineitems_immediately_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_SYNCH_LINEITEMS_IMMEDIATELY' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strval($fields.synch_lineitems_immediately_c.value) == "1" || strval($fields.synch_lineitems_immediately_c.value) == "yes" || strval($fields.synch_lineitems_immediately_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.synch_lineitems_immediately_c.name}" value="0"> 
<input type="checkbox" id="{$fields.synch_lineitems_immediately_c.name}" 
name="{$fields.synch_lineitems_immediately_c.name}" 
value="1" title='' tabindex="0" {$checked} >

{else}
<td>&nbsp;</td><td>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
</div></div>

<script language="javascript">
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
{assign var='place' value="_FOOTER"}
<!-- to be used for id for buttons with custom code in def files-->
<div class="action_buttons">{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE_FOOTER">{/if}  {if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=GI_Products'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL_FOOTER"> {/if} {if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=GI_Products", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}<div class="clear"></div></div>
</td>
<td align='right' class="edit-view-pagination">
</td>
</tr>
</table>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>{$overlibStuff}
<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
</script>{literal}
<script type="text/javascript">
addForm('EditView');addToValidate('EditView', 'name', 'name', false,'{/literal}{sugar_translate label='LBL_NAME' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'code', 'varchar', true,'{/literal}{sugar_translate label='LBL_CODE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'type', 'enum', true,'{/literal}{sugar_translate label='LBL_TYPE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'price', 'currency', true,'{/literal}{sugar_translate label='LBL_PRICE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'currency_id', 'currency_id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'discontinued', 'bool', false,'{/literal}{sugar_translate label='LBL_DISCONTINUED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'web_hidden', 'bool', false,'{/literal}{sugar_translate label='LBL_WEB_HIDDEN' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'revenues_budgeted_c', 'currency', true,'{/literal}{sugar_translate label='LBL_REVENUES_BUDGETED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'accounts_gi_products_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'quarter_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_QUARTER' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_exam_results_gi_products_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'vat_c', 'decimal', false,'{/literal}{sugar_translate label='LBL_VAT' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_line_items_change_requests_gi_products_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_line_items_change_requests_gi_products_2_name', 'relate', false,'{/literal}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'provisional_c', 'bool', false,'{/literal}{sugar_translate label='LBL_PROVISIONAL' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_locations_gi_products_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'redirect_url_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_REDIRECT_URL' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_products_catalog_gi_products_1_name', 'relate', true,'{/literal}{sugar_translate label='LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'refund_expiry_terms_c', 'enum', false,'{/literal}{sugar_translate label='LBL_REFUND_EXPIRY_TERMS' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'gi_terms_gi_products_1_name', 'relate', true,'{/literal}{sugar_translate label='LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_active', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_ACTIVE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_suspended', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_SUSPENDED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_complete', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_COMPLETE' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_not_interested', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_NOT_INTERESTED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_cancelled', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_CANCELLED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_intersted_cold', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_INTERESTED_COLD' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_interested_warm', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_INTERESTED_WARM' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_interested_hot', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_INTERESTED_HOT' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_revenues', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_REVENUES' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'total_discounts', 'kreporter', false,'{/literal}{sugar_translate label='LBL_TOTAL_DISCOUNTS' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'add_line_item_to_opp_id_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ADD_LINE_ITEM_TO_OPP_ID' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'batch_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BATCH' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'capacity_c', 'int', false,'{/literal}{sugar_translate label='LBL_CAPACITY' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'date_end_c', 'date', false,'{/literal}{sugar_translate label='LBL_DATE_END' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'date_refund_expired_c', 'date', false,'{/literal}{sugar_translate label='LBL_DATE_REFUND_EXPIRED' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'date_start_c', 'date', false,'{/literal}{sugar_translate label='LBL_DATE_START' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'date_sync_with_moodle_c_date', 'date', false,'Date Sync with Moodle' );
addToValidate('EditView', 'days_c[]', 'multienum', false,'{/literal}{sugar_translate label='LBL_DAYS' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'default_line_item_status_c', 'enum', true,'{/literal}{sugar_translate label='LBL_DEFAULT_LINE_ITEM_STATUS' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'has_elearning_c', 'bool', false,'{/literal}{sugar_translate label='LBL_HAS_ELEARNING' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'hide_add_to_cart_c', 'bool', false,'{/literal}{sugar_translate label='LBL_HIDE_ADD_TO_CART' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'hide_instructor_c', 'bool', false,'{/literal}{sugar_translate label='LBL_HIDE_INSTRUCTOR' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'moodle_cohort_id_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MOODLE_COHORT_ID' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_sessions_c', 'int', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_SESSIONS' module='GI_Products' for_js=true}{literal}' );
addToValidateRange('EditView', 'number_of_targeted_c', 'int', true, '{/literal}{sugar_translate label='LBL_NUMBER_OF_TARGETED' module='GI_Products' for_js=true}{literal}', 0, false);
addToValidate('EditView', 'status_c', 'enum', true,'{/literal}{sugar_translate label='LBL_STATUS' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'synch_lineitems_immediately_c', 'bool', false,'{/literal}{sugar_translate label='LBL_SYNCH_LINEITEMS_IMMEDIATELY' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'woo_error_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_WOO_ERROR' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'product_url_c', 'url', false,'{/literal}{sugar_translate label='LBL_PRODUCT_URL' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'schedule_upload_c', 'image', false,'{/literal}{sugar_translate label='LBL_SCHEDULE_UPLOAD' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'schedule_url_c', 'url', false,'{/literal}{sugar_translate label='LBL_SCHEDULE_URL' module='GI_Products' for_js=true}{literal}' );
addToValidate('EditView', 'wc_product_id_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_WC_PRODUCT_ID' module='GI_Products' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='GI_Products' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'accounts_gi_products_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE' module='GI_Products' for_js=true}{literal}', 'accounts_gi_products_1accounts_ida' );
addToValidateBinaryDependency('EditView', 'gi_exam_results_gi_products_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_exam_results_gi_products_1gi_exam_results_ida' );
addToValidateBinaryDependency('EditView', 'gi_line_items_change_requests_gi_products_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_line_itcd35equests_ida' );
addToValidateBinaryDependency('EditView', 'gi_line_items_change_requests_gi_products_2_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_line_it60abequests_ida' );
addToValidateBinaryDependency('EditView', 'gi_locations_gi_products_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_locations_gi_products_1gi_locations_ida' );
addToValidateBinaryDependency('EditView', 'gi_products_catalog_gi_products_1_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_products_catalog_gi_products_1gi_products_catalog_ida' );
addToValidateBinaryDependency('EditView', 'gi_terms_gi_products_1_name', 'alpha', true,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='GI_Products' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE' module='GI_Products' for_js=true}{literal}', 'gi_terms_gi_products_1gi_terms_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_gi_products_catalog_gi_products_1_name']={"form":"EditView","method":"query","modules":["GI_Products_Catalog"],"group":"or","field_list":["name","id"],"populate_list":["gi_products_catalog_gi_products_1_name","gi_products_catalog_gi_products_1gi_products_catalog_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_gi_terms_gi_products_1_name']={"form":"EditView","method":"query","modules":["GI_Terms"],"group":"or","field_list":["name","id"],"populate_list":["gi_terms_gi_products_1_name","gi_terms_gi_products_1gi_terms_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_accounts_gi_products_1_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_accounts_gi_products_1_name","accounts_gi_products_1accounts_ida"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_gi_products_1accounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_gi_locations_gi_products_1_name']={"form":"EditView","method":"query","modules":["GI_Locations"],"group":"or","field_list":["name","id"],"populate_list":["gi_locations_gi_products_1_name","gi_locations_gi_products_1gi_locations_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_gi_line_items_change_requests_gi_products_1_name']={"form":"EditView","method":"query","modules":["GI_Line_Items_Change_Requests"],"group":"or","field_list":["name","id"],"populate_list":["gi_line_items_change_requests_gi_products_1_name","gi_line_itcd35equests_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_gi_line_items_change_requests_gi_products_2_name']={"form":"EditView","method":"query","modules":["GI_Line_Items_Change_Requests"],"group":"or","field_list":["name","id"],"populate_list":["gi_line_items_change_requests_gi_products_2_name","gi_line_it60abequests_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_gi_exam_results_gi_products_1_name']={"form":"EditView","method":"query","modules":["GI_Exam_Results"],"group":"or","field_list":["name","id"],"populate_list":["gi_exam_results_gi_products_1_name","gi_exam_results_gi_products_1gi_exam_results_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};</script>{/literal}
