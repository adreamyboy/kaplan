

<script language="javascript">
{literal}
SUGAR.util.doWhen(function(){
    return $("#contentTable").length == 0;
}, SUGAR.themes.actionMenu);
{/literal}
</script>
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="">
<tr>
<td class="buttons" align="left" NOWRAP width="80%">
<div class="actionsContainer">
<form action="index.php" method="post" name="DetailView" id="formDetailView">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
<input type="hidden" name="sugar_body_only">
</form>
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='GI_Products'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='GI_Products'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='GI_Products'; _form.return_action.value='ListView'; _form.action.value='Delete'; if(confirm('{$APP.NTC_DELETE_CONFIRMATION}')) SUGAR.ajaxUI.submitForm(_form); return false;" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='GI_Products'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li><input class="button" onclick="if(prompt('Are you sure you want to change status to Active? Type YES to confirm.', '') == 'YES') window.open('index.php?module={$module}&record={$id}&action=ChangeStatus&status=Active', '_self');" type="submit" value="Set as Active"/></li><li><input class="button" onclick="if(prompt('Are you sure you want to change status to Cancelled? Type YES to confirm.', '') == 'YES') window.open('index.php?module={$module}&record={$id}&action=ChangeStatus&status=Cancelled', '_self');" type="submit" value="Set as Cancelled"/></li><li><input class="button" onclick="if(prompt('Are you sure you want to change status to Complete? Type YES to confirm.', '') == 'YES') window.open('index.php?module={$module}&record={$id}&action=ChangeStatus&status=Complete', '_self');" type="submit" value="Set as Complete"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=schedule');" type="submit" value="Generate Schedule"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=signinsheet');" type="submit" value="Generate Sign-In Sheet"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=SendEmail');" type="submit" value="Send Email to Students"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=SendLogins');" type="submit" value="Send e-Learning Logins"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=ActivateSuspendedPaid');" type="submit" value="Activate Suspended / Paid Lineitems"/></li><li><input class="button" onclick="window.open('index.php?module={$module}&record={$id}&action=sugarpdf&sugarpdf=certificates&bg=certificate-kapgen');" type="submit" value="Generate Certificates"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=GI_Products", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="GI_Products_detailview_tabs"
>
<div >
<div id='DEFAULT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='detailpanel_1' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.code.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.code.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CODE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.code.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.code.value) <= 0}
{assign var="value" value=$fields.code.default_value }
{else}
{assign var="value" value=$fields.code.value }
{/if} 
<span class="sugar_field" id="{$fields.code.name}">{$fields.code.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.type.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.type.options)}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.options }">
{ $fields.type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.type.name}" value="{ $fields.type.value }">
{ $fields.type.options[$fields.type.value]}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.status_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.status_c.name}" value="{ $fields.status_c.options }">
{ $fields.status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.status_c.name}" value="{ $fields.status_c.value }">
{ $fields.status_c.options[$fields.status_c.value]}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_products_catalog_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_products_catalog_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gi_products_catalog_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_products_catalog_gi_products_1gi_products_catalog_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Products_Catalog&action=DetailView&record={$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_products_catalog_gi_products_1gi_products_catalog_ida" class="sugar_field" data-id-value="{$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida.value}">{$fields.gi_products_catalog_gi_products_1_name.value}</span>
{if !empty($fields.gi_products_catalog_gi_products_1gi_products_catalog_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.web_hidden.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.web_hidden.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WEB_HIDDEN' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.web_hidden.hidden}
{counter name="panelFieldCount"}

{if strval($fields.web_hidden.value) == "1" || strval($fields.web_hidden.value) == "yes" || strval($fields.web_hidden.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.web_hidden.name}" id="{$fields.web_hidden.name}" value="$fields.web_hidden.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.hide_add_to_cart_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.hide_add_to_cart_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HIDE_ADD_TO_CART' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.hide_add_to_cart_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.hide_add_to_cart_c.value) == "1" || strval($fields.hide_add_to_cart_c.value) == "yes" || strval($fields.hide_add_to_cart_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.hide_add_to_cart_c.name}" id="{$fields.hide_add_to_cart_c.name}" value="$fields.hide_add_to_cart_c.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.hide_instructor_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.hide_instructor_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HIDE_INSTRUCTOR' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.hide_instructor_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.hide_instructor_c.value) == "1" || strval($fields.hide_instructor_c.value) == "yes" || strval($fields.hide_instructor_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.hide_instructor_c.name}" id="{$fields.hide_instructor_c.name}" value="$fields.hide_instructor_c.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_locations_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_locations_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gi_locations_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_locations_gi_products_1gi_locations_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Locations&action=DetailView&record={$fields.gi_locations_gi_products_1gi_locations_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_locations_gi_products_1gi_locations_ida" class="sugar_field" data-id-value="{$fields.gi_locations_gi_products_1gi_locations_ida.value}">{$fields.gi_locations_gi_products_1_name.value}</span>
{if !empty($fields.gi_locations_gi_products_1gi_locations_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.accounts_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.accounts_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.accounts_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.accounts_gi_products_1accounts_ida.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.accounts_gi_products_1accounts_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="accounts_gi_products_1accounts_ida" class="sugar_field" data-id-value="{$fields.accounts_gi_products_1accounts_ida.value}">{$fields.accounts_gi_products_1_name.value}</span>
{if !empty($fields.accounts_gi_products_1accounts_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_terms_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_terms_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gi_terms_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_terms_gi_products_1gi_terms_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Terms&action=DetailView&record={$fields.gi_terms_gi_products_1gi_terms_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_terms_gi_products_1gi_terms_ida" class="sugar_field" data-id-value="{$fields.gi_terms_gi_products_1gi_terms_ida.value}">{$fields.gi_terms_gi_products_1_name.value}</span>
{if !empty($fields.gi_terms_gi_products_1gi_terms_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.number_of_targeted_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.number_of_targeted_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER_OF_TARGETED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.number_of_targeted_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.number_of_targeted_c.name}">
{assign var="value" value=$fields.number_of_targeted_c.value }
{$value}
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.currency_id.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.currency_id.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.currency_id.hidden}
{counter name="panelFieldCount"}
<span id='currency_id_span'>
{$fields.currency_id.value}
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.revenues_budgeted_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.revenues_budgeted_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REVENUES_BUDGETED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.revenues_budgeted_c.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.revenues_budgeted_c.name}'>
{sugar_number_format var=$fields.revenues_budgeted_c.value }
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.description.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name}"></span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.capacity_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.capacity_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAPACITY' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.capacity_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.capacity_c.name}">
{sugar_number_format precision=0 var=$fields.capacity_c.value}
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.date_entered.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}


{assign var="value" value=11/26/2021 }
<span class="sugar_field" id="{$fields.date_entered.name}">{$value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.date_modified.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}


{assign var="value" value=11/30/2021 }
<span class="sugar_field" id="{$fields.date_modified.name}">{$value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_line_items_change_requests_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_line_items_change_requests_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_1_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gi_line_items_change_requests_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_line_itcd35equests_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Line_Items_Change_Requests&action=DetailView&record={$fields.gi_line_itcd35equests_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_line_itcd35equests_ida" class="sugar_field" data-id-value="{$fields.gi_line_itcd35equests_ida.value}">{$fields.gi_line_items_change_requests_gi_products_1_name.value}</span>
{if !empty($fields.gi_line_itcd35equests_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.gi_line_items_change_requests_gi_products_2_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_line_items_change_requests_gi_products_2_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_LINE_ITEMS_CHANGE_REQUESTS_GI_PRODUCTS_2_FROM_GI_LINE_ITEMS_CHANGE_REQUESTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.gi_line_items_change_requests_gi_products_2_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_line_it60abequests_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Line_Items_Change_Requests&action=DetailView&record={$fields.gi_line_it60abequests_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_line_it60abequests_ida" class="sugar_field" data-id-value="{$fields.gi_line_it60abequests_ida.value}">{$fields.gi_line_items_change_requests_gi_products_2_name.value}</span>
{if !empty($fields.gi_line_it60abequests_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.refund_expiry_terms_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.refund_expiry_terms_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFUND_EXPIRY_TERMS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.refund_expiry_terms_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.refund_expiry_terms_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.refund_expiry_terms_c.name}" value="{ $fields.refund_expiry_terms_c.options }">
{ $fields.refund_expiry_terms_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.refund_expiry_terms_c.name}" value="{ $fields.refund_expiry_terms_c.value }">
{ $fields.refund_expiry_terms_c.options[$fields.refund_expiry_terms_c.value]}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.date_refund_expired_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_refund_expired_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_REFUND_EXPIRED' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_refund_expired_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.date_refund_expired_c.value) <= 0}
{assign var="value" value=$fields.date_refund_expired_c.default_value }
{else}
{assign var="value" value=$fields.date_refund_expired_c.value }
{/if}
<span class="sugar_field" id="{$fields.date_refund_expired_c.name}">{$value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.quarter_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quarter_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUARTER' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.quarter_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.quarter_c.value) <= 0}
{assign var="value" value=$fields.quarter_c.default_value }
{else}
{assign var="value" value=$fields.quarter_c.value }
{/if} 
<span class="sugar_field" id="{$fields.quarter_c.name}">{$fields.quarter_c.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.gi_exam_results_gi_products_1_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.gi_exam_results_gi_products_1_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GI_EXAM_RESULTS_GI_PRODUCTS_1_FROM_GI_EXAM_RESULTS_TITLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.gi_exam_results_gi_products_1_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_exam_results_gi_products_1gi_exam_results_ida.value)}
{capture assign="detail_url"}index.php?module=GI_Exam_Results&action=DetailView&record={$fields.gi_exam_results_gi_products_1gi_exam_results_ida.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_exam_results_gi_products_1gi_exam_results_ida" class="sugar_field" data-id-value="{$fields.gi_exam_results_gi_products_1gi_exam_results_ida.value}">{$fields.gi_exam_results_gi_products_1_name.value}</span>
{if !empty($fields.gi_exam_results_gi_products_1gi_exam_results_ida.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.default_line_item_status_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.default_line_item_status_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEFAULT_LINE_ITEM_STATUS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.default_line_item_status_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.default_line_item_status_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.default_line_item_status_c.name}" value="{ $fields.default_line_item_status_c.options }">
{ $fields.default_line_item_status_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.default_line_item_status_c.name}" value="{ $fields.default_line_item_status_c.value }">
{ $fields.default_line_item_status_c.options[$fields.default_line_item_status_c.value]}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.redirect_url_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.redirect_url_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REDIRECT_URL' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.redirect_url_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.redirect_url_c.value) <= 0}
{assign var="value" value=$fields.redirect_url_c.default_value }
{else}
{assign var="value" value=$fields.redirect_url_c.value }
{/if} 
<span class="sugar_field" id="{$fields.redirect_url_c.name}">{$fields.redirect_url_c.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='LBL_DETAILVIEW_PANEL3' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_DETAILVIEW_PANEL3' module='GI_Products'}</h4>
<table id='detailpanel_2' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.price.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.price.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRICE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.price.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.price.name}'>
{sugar_number_format var=$fields.price.value }
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.vat_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.vat_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_VAT' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.vat_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.vat_c.name}">
{sugar_number_format var=$fields.vat_c.value precision=7 }
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_DETAILVIEW_PANEL3").style.display='none';</script>
{/if}
<div id='LBL_EDITVIEW_PANEL1' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL1' module='GI_Products'}</h4>
<table id='detailpanel_3' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.batch_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.batch_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BATCH' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.batch_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.batch_c.value) <= 0}
{assign var="value" value=$fields.batch_c.default_value }
{else}
{assign var="value" value=$fields.batch_c.value }
{/if} 
<span class="sugar_field" id="{$fields.batch_c.name}">{$fields.batch_c.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.provisional_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.provisional_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PROVISIONAL' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.provisional_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.provisional_c.value) == "1" || strval($fields.provisional_c.value) == "yes" || strval($fields.provisional_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.provisional_c.name}" id="{$fields.provisional_c.name}" value="$fields.provisional_c.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.number_of_sessions_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.number_of_sessions_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER_OF_SESSIONS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.number_of_sessions_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.number_of_sessions_c.name}">
{sugar_number_format precision=0 var=$fields.number_of_sessions_c.value}
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.date_start_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_start_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_START' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_start_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.date_start_c.value) <= 0}
{assign var="value" value=$fields.date_start_c.default_value }
{else}
{assign var="value" value=$fields.date_start_c.value }
{/if}
<span class="sugar_field" id="{$fields.date_start_c.name}">{$value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.days_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.days_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DAYS' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.days_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.days_c.value) && ($fields.days_c.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.days_c.name}" value="{$fields.days_c.value}">
{multienum_to_array string=$fields.days_c.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.days_c.options.$item }</li>
{/foreach}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.date_end_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_end_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_END' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_end_c.hidden}
{counter name="panelFieldCount"}


{if strlen($fields.date_end_c.value) <= 0}
{assign var="value" value=$fields.date_end_c.default_value }
{else}
{assign var="value" value=$fields.date_end_c.value }
{/if}
<span class="sugar_field" id="{$fields.date_end_c.name}">{$value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.assigned_user_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field" data-id-value="{$fields.assigned_user_id.value}">{$fields.assigned_user_name.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='LBL_DETAILVIEW_PANEL2' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_DETAILVIEW_PANEL2' module='GI_Products'}</h4>
<table id='detailpanel_4' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.has_elearning_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.has_elearning_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_HAS_ELEARNING' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.has_elearning_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.has_elearning_c.value) == "1" || strval($fields.has_elearning_c.value) == "yes" || strval($fields.has_elearning_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.has_elearning_c.name}" id="{$fields.has_elearning_c.name}" value="$fields.has_elearning_c.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.date_sync_with_moodle_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_sync_with_moodle_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_SYNC_WITH_MOODLE' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_sync_with_moodle_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_sync_with_moodle_c.value) <= 0}
{assign var="value" value=$fields.date_sync_with_moodle_c.default_value }
{else}
{assign var="value" value=$fields.date_sync_with_moodle_c.value }
{/if} 
<span class="sugar_field" id="{$fields.date_sync_with_moodle_c.name}">{$fields.date_sync_with_moodle_c.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.moodle_cohort_id_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.moodle_cohort_id_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MOODLE_COHORT_ID' module='GI_Products'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.moodle_cohort_id_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.moodle_cohort_id_c.value) <= 0}
{assign var="value" value=$fields.moodle_cohort_id_c.default_value }
{else}
{assign var="value" value=$fields.moodle_cohort_id_c.value }
{/if} 
<span class="sugar_field" id="{$fields.moodle_cohort_id_c.name}">{$fields.moodle_cohort_id_c.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_DETAILVIEW_PANEL2").style.display='none';</script>
{/if}
</div></div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>