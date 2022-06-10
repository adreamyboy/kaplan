
<input type='hidden' id="orderByInput" name='orderBy' value=''/>
<input type='hidden' id="sortOrder" name='sortOrder' value=''/>
{if !isset($templateMeta.maxColumnsBasic)}
	{assign var="basicMaxColumns" value=$templateMeta.maxColumns}
{else}
    {assign var="basicMaxColumns" value=$templateMeta.maxColumnsBasic}
{/if}
<script>
{literal}
	$(function() {
	var $dialog = $('<div></div>')
		.html(SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_TEXT'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get('app_strings', 'LBL_HELP'),
			width: 700
		});
		
		$('#filterHelp').click(function() {
		$dialog.dialog('open');
		// prevent the default action, e.g., following a link
	});
	
	});
{/literal}
</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='code_basic' >{sugar_translate label='LBL_CODE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.code_basic.value) <= 0}
{assign var="value" value=$fields.code_basic.default_value }
{else}
{assign var="value" value=$fields.code_basic.value }
{/if}  
<input type='text' name='{$fields.code_basic.name}' 
    id='{$fields.code_basic.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      accesskey='9'  >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> {sugar_translate label='LBL_NAME' module='GI_Products'}
		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.name_basic.value) <= 0}
{assign var="value" value=$fields.name_basic.default_value }
{else}
{assign var="value" value=$fields.name_basic.value }
{/if}  
<input type='text' name='{$fields.name_basic.name}' 
    id='{$fields.name_basic.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='gi_products_catalog_gi_products_1_name_basic' >{sugar_translate label='LBL_GI_PRODUCTS_CATALOG_GI_PRODUCTS_1_FROM_GI_PRODUCTS_CATALOG_TITLE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.gi_products_catalog_gi_products_1_name_basic.name}"  class="sqsEnabled"   id="{$fields.gi_products_catalog_gi_products_1_name_basic.name}" size="" value="{$fields.gi_products_catalog_gi_products_1_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida_basic.name}" value="{$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_products_catalog_gi_products_1_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.gi_products_catalog_gi_products_1_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"gi_products_catalog_gi_products_1gi_products_catalog_ida_basic","name":"gi_products_catalog_gi_products_1_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.gi_products_catalog_gi_products_1_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.gi_products_catalog_gi_products_1_name_basic.name}.value = ''; this.form.{$fields.gi_products_catalog_gi_products_1gi_products_catalog_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='gi_terms_gi_products_1_name_basic' >{sugar_translate label='LBL_GI_TERMS_GI_PRODUCTS_1_FROM_GI_TERMS_TITLE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.gi_terms_gi_products_1_name_basic.name}"  class="sqsEnabled"   id="{$fields.gi_terms_gi_products_1_name_basic.name}" size="" value="{$fields.gi_terms_gi_products_1_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.gi_terms_gi_products_1gi_terms_ida_basic.name}" value="{$fields.gi_terms_gi_products_1gi_terms_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_terms_gi_products_1_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.gi_terms_gi_products_1_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"gi_terms_gi_products_1gi_terms_ida_basic","name":"gi_terms_gi_products_1_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.gi_terms_gi_products_1_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.gi_terms_gi_products_1_name_basic.name}.value = ''; this.form.{$fields.gi_terms_gi_products_1gi_terms_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='gi_locations_gi_products_1_name_basic' >{sugar_translate label='LBL_GI_LOCATIONS_GI_PRODUCTS_1_FROM_GI_LOCATIONS_TITLE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.gi_locations_gi_products_1_name_basic.name}"  class="sqsEnabled"   id="{$fields.gi_locations_gi_products_1_name_basic.name}" size="" value="{$fields.gi_locations_gi_products_1_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.gi_locations_gi_products_1gi_locations_ida_basic.name}" value="{$fields.gi_locations_gi_products_1gi_locations_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.gi_locations_gi_products_1_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.gi_locations_gi_products_1_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"gi_locations_gi_products_1gi_locations_ida_basic","name":"gi_locations_gi_products_1_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.gi_locations_gi_products_1_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.gi_locations_gi_products_1_name_basic.name}.value = ''; this.form.{$fields.gi_locations_gi_products_1gi_locations_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='status_c_basic' >{sugar_translate label='LBL_STATUS' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='status_c_basic' name='status_c_basic[]' options=$fields.status_c_basic.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.status_c_basic.value}
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='vat_c_basic' >{sugar_translate label='LBL_VAT' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.vat_c_basic.value) <= 0}
{assign var="value" value=$fields.vat_c_basic.default_value }
{else}
{assign var="value" value=$fields.vat_c_basic.value }
{/if}  
<input type='text' name='{$fields.vat_c_basic.name}' 
    id='{$fields.vat_c_basic.name}' size='30' 
     
    value='{$value}' title='' tabindex='' > 
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='provisional_c_basic' >{sugar_translate label='LBL_PROVISIONAL' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.provisional_c_basic.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.provisional_c_basic.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.provisional_c_basic.name}" name="{$fields.provisional_c_basic.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='date_start_c_basic' >{sugar_translate label='LBL_DATE_START' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{assign var="id" value=$fields.date_start_c_basic.name }

{if isset($smarty.request.date_start_c_basic_range_choice)}
{assign var="starting_choice" value=$smarty.request.date_start_c_basic_range_choice}
{else}
{assign var="starting_choice" value="="}
{/if}

<div class="clear hidden dateTimeRangeChoiceClear"></div>
<div class="dateTimeRangeChoice" style="white-space:nowrap !important;">
<select id="{$id}_range_choice" name="{$id}_range_choice" onchange="{$id}_range_change(this.value);">
{html_options options=$fields.date_start_c_basic.options selected=$starting_choice}
</select>
</div>

<div id="{$id}_range_div" style="{if preg_match('/^\[/', $smarty.request.range_date_start_c_basic)  || $starting_choice == 'between'}display:none{else}display:''{/if};">
<input autocomplete="off" type="text" name="range_{$id}" id="range_{$id}" value='{if empty($smarty.request.range_date_start_c_basic) && !empty($smarty.request.date_start_c_basic)}{$smarty.request.date_start_c_basic}{else}{$smarty.request.range_date_start_c_basic}{/if}' title=''   size="11" class="dateRangeInput">
{capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
    
</div>

<div id="{$id}_between_range_div" style="{if $starting_choice=='between'}display:'';{else}display:none;{/if}">
{assign var=date_value value=$fields.date_start_c_basic.value }
<input autocomplete="off" type="text" name="start_range_{$id}" id="start_range_{$id}" value='{$smarty.request.start_range_date_start_c_basic }' title=''  tabindex='' size="11" class="rangeDateInput">
{capture assign="other_attributes"}align="absmiddle" border="0" id="start_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "start_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "start_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
{$APP.LBL_AND}
{assign var=date_value value=$fields.date_start_c_basic.value }
<input autocomplete="off" type="text" name="end_range_{$id}" id="end_range_{$id}" value='{$smarty.request.end_range_date_start_c_basic }' title=''  tabindex='' size="11" class="dateRangeInput" maxlength="10">
{capture assign="other_attributes"}align="absmiddle" border="0" id="end_range_{$id}_trigger"{/capture}
{sugar_getimage name="jscalendar" ext=".gif" alt="$APP.LBL_ENTER_DATE other_attributes=$other_attributes"}
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "end_range_{$id}",
daFormat : "{$CALENDAR_FORMAT}",
button : "end_range_{$id}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
 
</div>


<script type='text/javascript'>

function {$id}_range_change(val) 
{ldelim}
  if(val == 'between') {ldelim}
     document.getElementById("range_{$id}").value = '';  
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = ''; 
  {rdelim} else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {ldelim}
     if((/^\[.*\]$/).test(document.getElementById("range_{$id}").value))
     {ldelim}
     	document.getElementById("range_{$id}").value = '';
     {rdelim}
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = '';
     document.getElementById("{$id}_range_div").style.display = '';
     document.getElementById("{$id}_between_range_div").style.display = 'none';
  {rdelim} else {ldelim}
     document.getElementById("range_{$id}").value = '[' + val + ']';    
     document.getElementById("start_range_{$id}").value = '';
     document.getElementById("end_range_{$id}").value = ''; 
     document.getElementById("{$id}_range_div").style.display = 'none';
     document.getElementById("{$id}_between_range_div").style.display = 'none';         
  {rdelim}
{rdelim}

var {$id}_range_reset = function()
{ldelim}
{$id}_range_change('=');
{rdelim}

YAHOO.util.Event.onDOMReady(function() {ldelim}
if(document.getElementById('search_form_clear'))
{ldelim}
YAHOO.util.Event.addListener('search_form_clear', 'click', {$id}_range_reset);
{rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
 	if(document.getElementById('search_form_clear_advanced'))
 	 {ldelim}
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', {$id}_range_reset);
 	 {rdelim}

{rdelim});

YAHOO.util.Event.onDOMReady(function() {ldelim}
    //register on basic search form button if it exists
    if(document.getElementById('search_form_submit'))
     {ldelim}
         YAHOO.util.Event.addListener('search_form_submit', 'click',{$id}_range_validate);
     {rdelim}
    //register on advanced search submit button if it exists
   if(document.getElementById('search_form_submit_advanced'))
    {ldelim}
        YAHOO.util.Event.addListener('search_form_submit_advanced', 'click',{$id}_range_validate);
    {rdelim}

{rdelim});

// this function is specific to range date searches and will check that both start and end date ranges have been
// filled prior to submitting search form.  It is called from the listener added above.
function {$id}_range_validate(e){ldelim}
    if (
            (document.getElementById("start_range_{$id}").value.length >0 && document.getElementById("end_range_{$id}").value.length == 0)
          ||(document.getElementById("end_range_{$id}").value.length >0 && document.getElementById("start_range_{$id}").value.length == 0)
       )
    {ldelim}
        e.preventDefault();
        alert('{$APP.LBL_CHOOSE_START_AND_END_DATES}');
        if (document.getElementById("start_range_{$id}").value.length == 0) {ldelim}
            document.getElementById("start_range_{$id}").focus();
        {rdelim}
        else {ldelim}
            document.getElementById("end_range_{$id}").focus();
        {rdelim}
    {rdelim}

{rdelim}

</script>
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='type_basic' >{sugar_translate label='LBL_TYPE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='type_basic' name='type_basic[]' options=$fields.type_basic.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.type_basic.value}
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='web_hidden_basic' >{sugar_translate label='LBL_WEB_HIDDEN' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.web_hidden_basic.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.web_hidden_basic.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.web_hidden_basic.name}" name="{$fields.web_hidden_basic.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='number_of_targeted_c_basic' >{sugar_translate label='LBL_NUMBER_OF_TARGETED' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.number_of_targeted_c_basic.value) <= 0}
{assign var="value" value=$fields.number_of_targeted_c_basic.default_value }
{else}
{assign var="value" value=$fields.number_of_targeted_c_basic.value }
{/if}  
<input type='text' name='{$fields.number_of_targeted_c_basic.name}' 
    id='{$fields.number_of_targeted_c_basic.name}' size='30' 
     
    value='{$value}' title='' tabindex='' > 
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='revenues_budgeted_c_basic' >{sugar_translate label='LBL_REVENUES_BUDGETED' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.revenues_budgeted_c_basic.value) <= 0}
{assign var="value" value=$fields.revenues_budgeted_c_basic.default_value }
{else}
{assign var="value" value=$fields.revenues_budgeted_c_basic.value }
{/if}  
<input type='text' name='{$fields.revenues_budgeted_c_basic.name}' 
    id='{$fields.revenues_budgeted_c_basic.name}' size='30' 
     
    value='{$value}' title='' tabindex='' > 
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='accounts_gi_products_1_name_basic' >{sugar_translate label='LBL_ACCOUNTS_GI_PRODUCTS_1_FROM_ACCOUNTS_TITLE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="{$fields.accounts_gi_products_1_name_basic.name}"  class="sqsEnabled"   id="{$fields.accounts_gi_products_1_name_basic.name}" size="" value="{$fields.accounts_gi_products_1_name_basic.value}" title='' autocomplete="off"  >
<input type="hidden"  id="{$fields.accounts_gi_products_1accounts_ida_basic.name}" value="{$fields.accounts_gi_products_1accounts_ida_basic.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts_gi_products_1_name_basic.name}"   title="{$APP.LBL_SELECT_BUTTON_TITLE}" class="button firstChild" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick='open_popup("{$fields.accounts_gi_products_1_name_basic.module}", 600, 400, "", true, false, {literal}{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"accounts_gi_products_1accounts_ida_basic","name":"accounts_gi_products_1_name_basic"}}{/literal}, "single", true);'>{sugar_getimage alt=$app_strings.LBL_ID_FF_SELECT name="id-ff-select" ext=".png" other_attributes=''}</button><button type="button" name="btn_clr_{$fields.accounts_gi_products_1_name_basic.name}"   title="{$APP.LBL_CLEAR_BUTTON_TITLE}" class="button lastChild" onclick="this.form.{$fields.accounts_gi_products_1_name_basic.name}.value = ''; this.form.{$fields.accounts_gi_products_1accounts_ida_basic.name}.value = '';" value="{$APP.LBL_CLEAR_BUTTON_LABEL}">{sugar_getimage name="id-ff-clear" alt=$app_strings.LBL_ID_FF_CLEAR ext=".png" other_attributes=''}</button>
</span>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='has_elearning_c_basic' >{sugar_translate label='LBL_HAS_ELEARNING' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{assign var="yes" value=""}
{assign var="no" value=""}
{assign var="default" value=""}

{if strval($fields.has_elearning_c_basic.value) == "1"}
	{assign var="yes" value="SELECTED"}
{elseif strval($fields.has_elearning_c_basic.value) == "0"}
	{assign var="no" value="SELECTED"}
{else}
	{assign var="default" value="SELECTED"}
{/if}

<select id="{$fields.has_elearning_c_basic.name}" name="{$fields.has_elearning_c_basic.name}"   >
 <option value="" {$default}></option>
 <option value = "0" {$no}> {$APP.LBL_SEARCH_DROPDOWN_NO}</option>
 <option value = "1" {$yes}> {$APP.LBL_SEARCH_DROPDOWN_YES}</option>
</select>

   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='refund_expiry_terms_c_basic' >{sugar_translate label='LBL_REFUND_EXPIRY_TERMS' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='refund_expiry_terms_c_basic' name='refund_expiry_terms_c_basic[]' options=$fields.refund_expiry_terms_c_basic.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.refund_expiry_terms_c_basic.value}
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='quarter_c_basic' >{sugar_translate label='LBL_QUARTER' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.quarter_c_basic.value) <= 0}
{assign var="value" value=$fields.quarter_c_basic.default_value }
{else}
{assign var="value" value=$fields.quarter_c_basic.value }
{/if}  
<input type='text' name='{$fields.quarter_c_basic.name}' 
    id='{$fields.quarter_c_basic.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''      >
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='price_basic' >{sugar_translate label='LBL_PRICE' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{if strlen($fields.price_basic.value) <= 0}
{assign var="value" value=$fields.price_basic.default_value }
{else}
{assign var="value" value=$fields.price_basic.value }
{/if}  
<input type='text' name='{$fields.price_basic.name}' 
    id='{$fields.price_basic.name}' size='30' 
     
    value='{$value}' title='' tabindex='' > 
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='default_line_item_status_c_basic' >{sugar_translate label='LBL_DEFAULT_LINE_ITEM_STATUS' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='default_line_item_status_c_basic' name='default_line_item_status_c_basic[]' options=$fields.default_line_item_status_c_basic.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.default_line_item_status_c_basic.value}
   	   	</td>
    
      
	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$basicMaxColumns
          assign=modVal
    }
	{if ($index % $basicMaxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='assigned_user_id_basic' >{sugar_translate label='LBL_ASSIGNED_TO' module='GI_Products'}</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
{html_options id='assigned_user_id_basic' name='assigned_user_id_basic[]' options=$fields.assigned_user_id_basic.options size="6" class="templateGroupChooser" multiple="1" selected=$fields.assigned_user_id_basic.value}
   	   	</td>
    {if $formData|@count >= $basicMaxColumns+1}
    </tr>
    <tr>
	<td colspan="{$searchTableColumnCount}">
    {else}
	<td class="sumbitButtons">
    {/if}
        <input tabindex="2" title="{$APP.LBL_SEARCH_BUTTON_TITLE}" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="{$APP.LBL_SEARCH_BUTTON_LABEL}" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
        {if $HAS_ADVANCED_SEARCH && !$searchFormInPopup}
	    &nbsp;&nbsp;<a id="advanced_search_link" href="javascript:void(0);" accesskey="{$APP.LBL_ADV_SEARCH_LNK_KEY}">{$APP.LNK_ADVANCED_FILTER}</a>
	    {/if}
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='{sugar_getimagepath file="help-dashlet.gif"}'></td>
	</tr>
</table>
<script>
	{literal}
	$(document).ready(function () {
		$( '#advanced_search_link' ).one( "click", function() {
			//alert( "This will be displayed only once." );
			SUGAR.searchForm.searchFormSelect('{/literal}{$module}{literal}|advanced_search','{/literal}{$module}{literal}|basic_search');
		});
	});
	{/literal}
</script>{literal}<script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['search_form_modified_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_created_by_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_assigned_user_name_basic']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['search_form_accounts_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["search_form_accounts_gi_products_1_name_basic","accounts_gi_products_1accounts_ida_basic"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_gi_products_1accounts_ida"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_exam_results_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["GI_Exam_Results"],"group":"or","field_list":["name","id"],"populate_list":["gi_exam_results_gi_products_1_name_basic","gi_exam_results_gi_products_1gi_exam_results_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_line_items_change_requests_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["GI_Line_Items_Change_Requests"],"group":"or","field_list":["name","id"],"populate_list":["gi_line_items_change_requests_gi_products_1_name_basic","gi_line_itcd35equests_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_line_items_change_requests_gi_products_2_name_basic']={"form":"search_form","method":"query","modules":["GI_Line_Items_Change_Requests"],"group":"or","field_list":["name","id"],"populate_list":["gi_line_items_change_requests_gi_products_2_name_basic","gi_line_it60abequests_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_locations_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["GI_Locations"],"group":"or","field_list":["name","id"],"populate_list":["gi_locations_gi_products_1_name_basic","gi_locations_gi_products_1gi_locations_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_products_catalog_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["GI_Products_Catalog"],"group":"or","field_list":["name","id"],"populate_list":["gi_products_catalog_gi_products_1_name_basic","gi_products_catalog_gi_products_1gi_products_catalog_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['search_form_gi_terms_gi_products_1_name_basic']={"form":"search_form","method":"query","modules":["GI_Terms"],"group":"or","field_list":["name","id"],"populate_list":["gi_terms_gi_products_1_name_basic","gi_terms_gi_products_1gi_terms_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}