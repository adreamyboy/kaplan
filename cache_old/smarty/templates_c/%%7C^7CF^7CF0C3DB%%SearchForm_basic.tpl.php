<?php /* Smarty version 2.6.29, created on 2022-06-07 12:31:14
         compiled from cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 33, false),array('function', 'math', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 34, false),array('function', 'sugar_translate', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 43, false),array('function', 'sugar_getimage', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 81, false),array('function', 'html_options', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 144, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 332, false),array('modifier', 'default', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 159, false),array('modifier', 'count', 'cache/themes/SuiteR/modules/Meetings/SearchForm_basic.tpl', 319, false),)), $this); ?>

<input type='hidden' id="orderByInput" name='orderBy' value=''/>
<input type='hidden' id="sortOrder" name='sortOrder' value=''/>
<?php if (! isset ( $this->_tpl_vars['templateMeta']['maxColumnsBasic'] )): ?>
	<?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumns']); ?>
<?php else: ?>
    <?php $this->assign('basicMaxColumns', $this->_tpl_vars['templateMeta']['maxColumnsBasic']); ?>
<?php endif; ?>
<script>
<?php echo '
	$(function() {
	var $dialog = $(\'<div></div>\')
		.html(SUGAR.language.get(\'app_strings\', \'LBL_SEARCH_HELP_TEXT\'))
		.dialog({
			autoOpen: false,
			title: SUGAR.language.get(\'app_strings\', \'LBL_HELP\'),
			width: 700
		});
		
		$(\'#filterHelp\').click(function() {
		$dialog.dialog(\'open\');
		// prevent the default action, e.g., following a link
	});
	
	});
'; ?>

</script>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
      
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
			<label for='name_basic'> <?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBJECT','module' => 'Meetings'), $this);?>

		</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strlen ( $this->_tpl_vars['fields']['name_basic']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name_basic']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' 
    id='<?php echo $this->_tpl_vars['fields']['name_basic']['name']; ?>
' size='30' 
    maxlength='200' 
    value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      accesskey='9'  >
   	   	</td>
    
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='gi_products_meetings_1_name_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_GI_PRODUCTS_MEETINGS_1_FROM_GI_PRODUCTS_TITLE','module' => 'Meetings'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<input type="text" name="<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['name']; ?>
"  class="sqsEnabled"   id="<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden"  id="<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1gi_products_ida_basic']['name']; ?>
" value="<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1gi_products_ida_basic']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_TITLE']; ?>
" class="button firstChild" value="<?php echo $this->_tpl_vars['APP']['LBL_SELECT_BUTTON_LABEL']; ?>
" onclick='open_popup("<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['module']; ?>
", 600, 400, "", true, false, <?php echo '{"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"gi_products_meetings_1gi_products_ida_basic","name":"gi_products_meetings_1_name_basic"}}'; ?>
, "single", true);'><?php echo smarty_function_sugar_getimage(array('alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_SELECT'],'name' => "id-ff-select",'ext' => ".png",'other_attributes' => ''), $this);?>
</button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['name']; ?>
"   title="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
" class="button lastChild" onclick="this.form.<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1_name_basic']['name']; ?>
.value = ''; this.form.<?php echo $this->_tpl_vars['fields']['gi_products_meetings_1gi_products_ida_basic']['name']; ?>
.value = '';" value="<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
"><?php echo smarty_function_sugar_getimage(array('name' => "id-ff-clear",'alt' => $this->_tpl_vars['app_strings']['LBL_ID_FF_CLEAR'],'ext' => ".png",'other_attributes' => ''), $this);?>
</button>
</span>

   	   	</td>
    
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='current_user_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENT_USER_FILTER','module' => 'Meetings'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['current_user_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['current_user_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
   	   	</td>
    
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='date_start_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE','module' => 'Meetings'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php $this->assign('id', $this->_tpl_vars['fields']['date_start_basic']['name']); ?>

<?php if (isset ( $_REQUEST['date_start_basic_range_choice'] )): ?>
<?php $this->assign('starting_choice', $_REQUEST['date_start_basic_range_choice']); ?>
<?php else: ?>
<?php $this->assign('starting_choice', "="); ?>
<?php endif; ?>

<div class="clear hidden dateTimeRangeChoiceClear"></div>
<div class="dateTimeRangeChoice" style="white-space:nowrap !important;">
<select id="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" name="<?php echo $this->_tpl_vars['id']; ?>
_range_choice" onchange="<?php echo $this->_tpl_vars['id']; ?>
_range_change(this.value);">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['date_start_basic']['options'],'selected' => $this->_tpl_vars['starting_choice']), $this);?>

</select>
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_range_div" style="<?php if (preg_match ( '/^\[/' , $_REQUEST['range_date_start_basic'] ) || $this->_tpl_vars['starting_choice'] == 'between'): ?>display:none<?php else: ?>display:''<?php endif; ?>;">
<input autocomplete="off" type="text" name="range_<?php echo $this->_tpl_vars['id']; ?>
" id="range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php if (empty ( $_REQUEST['range_date_start_basic'] ) && ! empty ( $_REQUEST['date_start_basic'] )): ?><?php echo $_REQUEST['date_start_basic']; ?>
<?php else: ?><?php echo $_REQUEST['range_date_start_basic']; ?>
<?php endif; ?>' title=''   size="11" class="dateRangeInput">
<?php ob_start(); ?>alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" style="position:relative; top:6px" border="0" id="<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'other_attributes' => ($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
startWeekday: <?php echo ((is_array($_tmp=@$this->_tpl_vars['CALENDAR_FDOW'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
,
step : 1,
weekNumbers:false
}
);
</script>
    
</div>

<div id="<?php echo $this->_tpl_vars['id']; ?>
_between_range_div" style="<?php if ($this->_tpl_vars['starting_choice'] == 'between'): ?>display:'';<?php else: ?>display:none;<?php endif; ?>">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_start_basic']['value']); ?>
<input autocomplete="off" type="text" name="start_range_<?php echo $this->_tpl_vars['id']; ?>
" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['start_range_date_start_basic']; ?>
' title=''  tabindex='' size="11" class="rangeDateInput">
<?php ob_start(); ?>align="absmiddle" border="0" id="start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ($this->_tpl_vars['APP']).".LBL_ENTER_DATE other_attributes=".($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "start_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "start_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
<?php echo $this->_tpl_vars['APP']['LBL_AND']; ?>

<?php $this->assign('date_value', $this->_tpl_vars['fields']['date_start_basic']['value']); ?>
<input autocomplete="off" type="text" name="end_range_<?php echo $this->_tpl_vars['id']; ?>
" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
" value='<?php echo $_REQUEST['end_range_date_start_basic']; ?>
' title=''  tabindex='' size="11" class="dateRangeInput" maxlength="10">
<?php ob_start(); ?>align="absmiddle" border="0" id="end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('other_attributes', ob_get_contents());ob_end_clean(); ?>
<?php echo smarty_function_sugar_getimage(array('name' => 'jscalendar','ext' => ".gif",'alt' => ($this->_tpl_vars['APP']).".LBL_ENTER_DATE other_attributes=".($this->_tpl_vars['other_attributes'])), $this);?>

<script type="text/javascript">
Calendar.setup ({
inputField : "end_range_<?php echo $this->_tpl_vars['id']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "end_range_<?php echo $this->_tpl_vars['id']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
 
</div>


<script type='text/javascript'>

function <?php echo $this->_tpl_vars['id']; ?>
_range_change(val) 
{
  if(val == 'between') {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';  
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = ''; 
  } else if (val == '=' || val == 'not_equal' || val == 'greater_than' || val == 'less_than') {
     if((/^\[.*\]$/).test(document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value))
     {
     	document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     }
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = '';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';
  } else {
     document.getElementById("range_<?php echo $this->_tpl_vars['id']; ?>
").value = '[' + val + ']';    
     document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value = '';
     document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value = ''; 
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_range_div").style.display = 'none';
     document.getElementById("<?php echo $this->_tpl_vars['id']; ?>
_between_range_div").style.display = 'none';         
  }
}

var <?php echo $this->_tpl_vars['id']; ?>
_range_reset = function()
{
<?php echo $this->_tpl_vars['id']; ?>
_range_change('=');
}

YAHOO.util.Event.onDOMReady(function() {
if(document.getElementById('search_form_clear'))
{
YAHOO.util.Event.addListener('search_form_clear', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
}

});

YAHOO.util.Event.onDOMReady(function() {
 	if(document.getElementById('search_form_clear_advanced'))
 	 {
 	     YAHOO.util.Event.addListener('search_form_clear_advanced', 'click', <?php echo $this->_tpl_vars['id']; ?>
_range_reset);
 	 }

});

YAHOO.util.Event.onDOMReady(function() {
    //register on basic search form button if it exists
    if(document.getElementById('search_form_submit'))
     {
         YAHOO.util.Event.addListener('search_form_submit', 'click',<?php echo $this->_tpl_vars['id']; ?>
_range_validate);
     }
    //register on advanced search submit button if it exists
   if(document.getElementById('search_form_submit_advanced'))
    {
        YAHOO.util.Event.addListener('search_form_submit_advanced', 'click',<?php echo $this->_tpl_vars['id']; ?>
_range_validate);
    }

});

// this function is specific to range date searches and will check that both start and end date ranges have been
// filled prior to submitting search form.  It is called from the listener added above.
function <?php echo $this->_tpl_vars['id']; ?>
_range_validate(e){
    if (
            (document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value.length >0 && document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value.length == 0)
          ||(document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").value.length >0 && document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value.length == 0)
       )
    {
        e.preventDefault();
        alert('<?php echo $this->_tpl_vars['APP']['LBL_CHOOSE_START_AND_END_DATES']; ?>
');
        if (document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").value.length == 0) {
            document.getElementById("start_range_<?php echo $this->_tpl_vars['id']; ?>
").focus();
        }
        else {
            document.getElementById("end_range_<?php echo $this->_tpl_vars['id']; ?>
").focus();
        }
    }

}

</script>
   	   	</td>
    
      
	<?php echo smarty_function_counter(array('assign' => 'index'), $this);?>

	<?php echo smarty_function_math(array('equation' => "left % right",'left' => $this->_tpl_vars['index'],'right' => $this->_tpl_vars['basicMaxColumns'],'assign' => 'modVal'), $this);?>

	<?php if (( $this->_tpl_vars['index'] % $this->_tpl_vars['basicMaxColumns'] == 1 && $this->_tpl_vars['index'] != 1 )): ?>
		</tr><tr>
	<?php endif; ?>
	
	<td scope="row" nowrap="nowrap" width='1%' >
		
		<label for='open_only_basic' ><?php echo smarty_function_sugar_translate(array('label' => 'LBL_OPEN_ITEMS','module' => 'Meetings'), $this);?>
</label>
    	</td>

	
	<td  nowrap="nowrap" width='1%'>
			
<?php if (strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['open_only_basic']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'checked="checked"'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['open_only_basic']['name']; ?>
" 
value="1" title='' tabindex="" <?php echo $this->_tpl_vars['checked']; ?>
 >
   	   	</td>
    <?php if (count($this->_tpl_vars['formData']) >= $this->_tpl_vars['basicMaxColumns']+1): ?>
    </tr>
    <tr>
	<td colspan="<?php echo $this->_tpl_vars['searchTableColumnCount']; ?>
">
    <?php else: ?>
	<td class="sumbitButtons">
    <?php endif; ?>
        <input tabindex="2" title="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_TITLE']; ?>
" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH_BUTTON_LABEL']; ?>
" id="search_form_submit"/>&nbsp;
	    <input tabindex='2' title='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_TITLE']; ?>
' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='<?php echo $this->_tpl_vars['APP']['LBL_CLEAR_BUTTON_LABEL']; ?>
'/>
        <?php if ($this->_tpl_vars['HAS_ADVANCED_SEARCH'] && ! $this->_tpl_vars['searchFormInPopup']): ?>
	    &nbsp;&nbsp;<a id="advanced_search_link" href="javascript:void(0);" accesskey="<?php echo $this->_tpl_vars['APP']['LBL_ADV_SEARCH_LNK_KEY']; ?>
"><?php echo $this->_tpl_vars['APP']['LNK_ADVANCED_FILTER']; ?>
</a>
	    <?php endif; ?>
    </td>
	<td class="helpIcon" width="*"><img alt="Help" border='0' id="filterHelp" src='<?php echo smarty_function_sugar_getimagepath(array('file' => "help-dashlet.gif"), $this);?>
'></td>
	</tr>
</table>
<script>
	<?php echo '
	$(document).ready(function () {
		$( \'#advanced_search_link\' ).one( "click", function() {
			//alert( "This will be displayed only once." );
			SUGAR.searchForm.searchFormSelect(\''; ?>
<?php echo $this->_tpl_vars['module']; ?>
<?php echo '|advanced_search\',\''; ?>
<?php echo $this->_tpl_vars['module']; ?>
<?php echo '|basic_search\');
		});
	});
	'; ?>

</script><?php echo '<script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'search_form_modified_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["modified_by_name_basic","modified_user_id_basic"],"required_list":["modified_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_created_by_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["created_by_name_basic","created_by_basic"],"required_list":["created_by"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_assigned_user_name_basic\']={"form":"search_form","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name_basic","assigned_user_id_basic"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_contact_name_basic\']={"form":"search_form","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["contact_name_basic","contact_id_basic","contact_id_basic","contact_id_basic"],"required_list":["contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_parent_name_basic\']={"form":"search_form","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["parent_name_basic","parent_id_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_gi_products_meetings_1_name_basic\']={"form":"search_form","method":"query","modules":["GI_Products"],"group":"or","field_list":["name","id"],"populate_list":["gi_products_meetings_1_name_basic","gi_products_meetings_1gi_products_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'search_form_gi_surveys_meetings_1_name_basic\']={"form":"search_form","method":"query","modules":["GI_Surveys"],"group":"or","field_list":["name","id"],"populate_list":["gi_surveys_meetings_1_name_basic","gi_surveys_meetings_1gi_surveys_ida_basic"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>