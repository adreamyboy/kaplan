

{assign var=preForm value="<table width='100%' border='1' cellspacing='0' cellpadding='0' class='converted_account'><tr><td><table width='100%'><tr><td>"}
{assign var=displayPreform value=false}
{if isset($bean->contact_id) && !empty($bean->contact_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_CONTACT}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Contacts&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->contact_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$bean->contact_name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td><td>"}
{if ($bean->converted=='1') && isset($bean->account_id) && !empty($bean->account_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_ACCOUNT}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Accounts&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->account_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$bean->account_name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td><td>"}
{if isset($bean->opportunity_id) && !empty($bean->opportunity_id)}
{assign var=displayPreform value=true}
{assign var=preForm value=$preForm|cat:$MOD.LBL_CONVERTED_OPP}
{assign var=preForm value=$preForm|cat:"&nbsp;<a href='index.php?module=Opportunities&action=DetailView&record="}
{assign var=preForm value=$preForm|cat:$bean->opportunity_id}
{assign var=preForm value=$preForm|cat:"'>"}
{assign var=preForm value=$preForm|cat:$bean->opportunity_name}
{assign var=preForm value=$preForm|cat:"</a>"}
{/if}
{assign var=preForm value=$preForm|cat:"</td></tr></table></td></tr></table>"}
{if $displayPreform}
{$preForm}
<br>
{/if}

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
<ul id="detail_header_action_menu" class="clickMenu fancymenu" ><li class="sugar_action_button" >{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='EditView';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} <ul id class="subnav" ><li>{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='DetailView'; _form.isDuplicate.value=true; _form.action.value='EditView'; _form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} </li><li>{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" class="button" onclick="var _form = document.getElementById('formDetailView'); _form.return_module.value='Leads'; _form.return_action.value='DetailView'; _form.return_id.value='{$id}'; _form.action.value='Step1'; _form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(_form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} </li><li><input class="button" onclick="if(prompt('Are you absolutely sure you want to copy the lead details into the selected Contact? Type YES to confirm.', '') == 'YES') window.open('index.php?module={$module}&record={$id}&action=ProcessWebLead', '_self');" type="submit" value="Process Web-Based Lead"/></li><li><input class="button" onclick="if(prompt('Are you absolutely sure you want to delete the lead and its opportunity and line items? Type YES to confirm.', '') == 'YES') window.open('index.php?module={$module}&record={$id}&action=DeleteWebLead', '_self');" type="submit" value="Delete Lead, Opportunity, Line Items"/></li><li><input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" id="manage_subscriptions_button" onclick="var _form = document.getElementById('formDetailView');_form.return_module.value='Leads'; _form.return_action.value='DetailView';_form.return_id.value='{$fields.id.value}'; _form.action.value='Subscriptions'; _form.module.value='Campaigns'; _form.module_tab.value='Leads';_form.submit();" name="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" type="button" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}"/></li><li>{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Leads", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}</li></ul></li></ul>
</div>
</td>
<td align="right" width="20%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="Leads_detailview_tabs"
>
<div >
<div id='LBL_CONTACT_INFORMATION' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_CONTACT_INFORMATION' module='Leads'}</h4>
<table id='detailpanel_1' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.first_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.first_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FIRST_NAME' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.first_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.first_name.value) <= 0}
{assign var="value" value=$fields.first_name.default_value }
{else}
{assign var="value" value=$fields.first_name.value }
{/if} 
<span class="sugar_field" id="{$fields.first_name.name}">{$fields.first_name.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.last_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.last_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LAST_NAME' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.last_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.last_name.value) <= 0}
{assign var="value" value=$fields.last_name.default_value }
{else}
{assign var="value" value=$fields.last_name.value }
{/if} 
<span class="sugar_field" id="{$fields.last_name.name}">{$fields.last_name.value}</span>
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

{if $bean->field_defs.email1.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.email1.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_ADDRESS' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.email1.hidden}
{counter name="panelFieldCount"}
<span id='email1_span'>
{$fields.email1.value}
</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.phone_mobile.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.phone_mobile.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MOBILE_PHONE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.phone_mobile.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_mobile.value)}
{assign var="phone_value" value=$fields.phone_mobile.value }
{sugar_phone value=$phone_value usa_format="0"}
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

{if $bean->field_defs.phone_work.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.phone_work.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OFFICE_PHONE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.phone_work.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_work.value)}
{assign var="phone_value" value=$fields.phone_work.value }
{sugar_phone value=$phone_value usa_format="0"}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.phone_fax.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.phone_fax.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX_PHONE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  class="phone">
{if !$fields.phone_fax.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.phone_fax.value)}
{assign var="phone_value" value=$fields.phone_fax.value }
{sugar_phone value=$phone_value usa_format="0"}
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

{if $bean->field_defs.department.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.department.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPARTMENT' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.department.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.department.value) <= 0}
{assign var="value" value=$fields.department.default_value }
{else}
{assign var="value" value=$fields.department.value }
{/if} 
<span class="sugar_field" id="{$fields.department.name}">{$fields.department.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.title.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.title.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TITLE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.title.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.title.value) <= 0}
{assign var="value" value=$fields.title.default_value }
{else}
{assign var="value" value=$fields.title.value }
{/if} 
<span class="sugar_field" id="{$fields.title.name}">{$fields.title.value}</span>
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

{if $bean->field_defs.account_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.account_name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.account_name.value) <= 0}
{assign var="value" value=$fields.account_name.default_value }
{else}
{assign var="value" value=$fields.account_name.value }
{/if} 
<span class="sugar_field" id="{$fields.account_name.name}">{$fields.account_name.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.company_sponsored_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.company_sponsored_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_COMPANY_SPONSORED' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.company_sponsored_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.company_sponsored_c.value) == "1" || strval($fields.company_sponsored_c.value) == "yes" || strval($fields.company_sponsored_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.company_sponsored_c.name}" id="{$fields.company_sponsored_c.name}" value="$fields.company_sponsored_c.value" disabled="true" {$checked}>
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
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">{$fields.description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.form_url_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.form_url_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FORM_URL' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.form_url_c.hidden}
{counter name="panelFieldCount"}

{capture name=getLink assign=link}{$fields.form_url_c.value}{/capture}
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="{$fields.form_url_c.name}">
<a href='{$link|to_url}' target='_self' >{$link}</a>
</span>
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

{if $bean->field_defs.primary_address_country.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.primary_address_country.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_COUNTRY' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.primary_address_country.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_country.value) <= 0}
{assign var="value" value=$fields.primary_address_country.default_value }
{else}
{assign var="value" value=$fields.primary_address_country.value }
{/if} 
<span class="sugar_field" id="{$fields.primary_address_country.name}">{$fields.primary_address_country.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.alt_address_country.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.alt_address_country.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_COUNTRY' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.alt_address_country.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_country.value) <= 0}
{assign var="value" value=$fields.alt_address_country.default_value }
{else}
{assign var="value" value=$fields.alt_address_country.value }
{/if} 
<span class="sugar_field" id="{$fields.alt_address_country.name}">{$fields.alt_address_country.value}</span>
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

{if $bean->field_defs.primary_address_city.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.primary_address_city.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_CITY' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.primary_address_city.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_city.value) <= 0}
{assign var="value" value=$fields.primary_address_city.default_value }
{else}
{assign var="value" value=$fields.primary_address_city.value }
{/if} 
<span class="sugar_field" id="{$fields.primary_address_city.name}">{$fields.primary_address_city.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.alt_address_city.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.alt_address_city.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_CITY' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.alt_address_city.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_city.value) <= 0}
{assign var="value" value=$fields.alt_address_city.default_value }
{else}
{assign var="value" value=$fields.alt_address_city.value }
{/if} 
<span class="sugar_field" id="{$fields.alt_address_city.name}">{$fields.alt_address_city.value}</span>
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

{if $bean->field_defs.primary_address_postalcode.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.primary_address_postalcode.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARY_ADDRESS_POSTALCODE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.primary_address_postalcode.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.primary_address_postalcode.value) <= 0}
{assign var="value" value=$fields.primary_address_postalcode.default_value }
{else}
{assign var="value" value=$fields.primary_address_postalcode.value }
{/if} 
<span class="sugar_field" id="{$fields.primary_address_postalcode.name}">{$fields.primary_address_postalcode.value}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.alt_address_postalcode.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.alt_address_postalcode.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ALT_ADDRESS_POSTALCODE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.alt_address_postalcode.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.alt_address_postalcode.value) <= 0}
{assign var="value" value=$fields.alt_address_postalcode.default_value }
{else}
{assign var="value" value=$fields.alt_address_postalcode.value }
{/if} 
<span class="sugar_field" id="{$fields.alt_address_postalcode.name}">{$fields.alt_address_postalcode.value}</span>
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
<script>document.getElementById("LBL_CONTACT_INFORMATION").style.display='none';</script>
{/if}
<div id='LBL_PANEL_ADVANCED' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_PANEL_ADVANCED' module='Leads'}</h4>
<table id='detailpanel_2' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.status.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.status.options)}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.options }">
{ $fields.status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.status.name}" value="{ $fields.status.value }">
{ $fields.status.options[$fields.status.value]}
{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.lead_source.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.lead_source.options)}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.options }">
{ $fields.lead_source.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.value }">
{ $fields.lead_source.options[$fields.lead_source.value]}
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

{if $bean->field_defs.status_description.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.status_description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STATUS_DESCRIPTION' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.status_description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.status_description.name|escape:'html'|url2html|nl2br}">{$fields.status_description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.campaign_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.campaign_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}
{capture assign="detail_url"}index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="campaign_id" class="sugar_field" data-id-value="{$fields.campaign_id.value}">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
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

{if $bean->field_defs.do_not_call.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.do_not_call.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DO_NOT_CALL' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.do_not_call.hidden}
{counter name="panelFieldCount"}

{if strval($fields.do_not_call.value) == "1" || strval($fields.do_not_call.value) == "yes" || strval($fields.do_not_call.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.do_not_call.name}" id="{$fields.do_not_call.name}" value="$fields.do_not_call.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.lead_source_description.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lead_source_description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE_DESCRIPTION' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source_description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.lead_source_description.name|escape:'html'|url2html|nl2br}">{$fields.lead_source_description.value|escape:'html'|escape:'html_entity_decode'|url2html|nl2br}</span>
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

{if $bean->field_defs.send_email_verification_link_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.send_email_verification_link_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SEND_EMAIL_VERIFICATION_LINK' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.send_email_verification_link_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.send_email_verification_link_c.value) == "1" || strval($fields.send_email_verification_link_c.value) == "yes" || strval($fields.send_email_verification_link_c.value) == "on"} 
{assign var="checked" value='checked="checked"'}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.send_email_verification_link_c.name}" id="{$fields.send_email_verification_link_c.name}" value="$fields.send_email_verification_link_c.value" disabled="true" {$checked}>
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.email_verification_date_sent_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.email_verification_date_sent_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL_VERIFICATION_DATE_SENT' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.email_verification_date_sent_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.email_verification_date_sent_c.value) <= 0}
{assign var="value" value=$fields.email_verification_date_sent_c.default_value }
{else}
{assign var="value" value=$fields.email_verification_date_sent_c.value }
{/if} 
<span class="sugar_field" id="{$fields.email_verification_date_sent_c.name}">{$fields.email_verification_date_sent_c.value}</span>
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

{if $bean->field_defs.product_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.product_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRODUCT' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.product_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.gi_products_id_c.value)}
{capture assign="detail_url"}index.php?module=GI_Products&action=DetailView&record={$fields.gi_products_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="gi_products_id_c" class="sugar_field" data-id-value="{$fields.gi_products_id_c.value}">{$fields.product_c.value}</span>
{if !empty($fields.gi_products_id_c.value)}</a>{/if}
{/if}
</td>

{else}
<td class='tabDetailViewDL'>&nbsp;</td><td class='tabDetailViewDF'>&nbsp;</td>
{/if}

{if $bean->field_defs.current_url_c.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.current_url_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENT_URL' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.current_url_c.hidden}
{counter name="panelFieldCount"}

{capture name=getLink assign=link}{$fields.current_url_c.value}{/capture}
{if !empty($link)}
{capture name=getStart assign=linkStart}{$link|substr:0:7}{/capture}
<span class="sugar_field" id="{$fields.current_url_c.name}">
<a href='{$link|to_url}' target='_blank' >{$link}</a>
</span>
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
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_PANEL_ADVANCED").style.display='none';</script>
{/if}
<div id='LBL_PANEL_ASSIGNMENT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_PANEL_ASSIGNMENT' module='Leads'}</h4>
<table id='detailpanel_3' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>

{if $bean->field_defs.assigned_user_name.acl < 1}
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Leads'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
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
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
{/if}
</div></div>

</form>
<script>SUGAR.util.doWhen("document.getElementById('form') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>