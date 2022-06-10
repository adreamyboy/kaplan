<?php

$bean = $this->bean;

// If "Not Admin", don't allow this action.
/*
global $current_user;
$isAdmin = is_admin($current_user);
if (!$isAdmin) {
	$params = array(
		'module'=> 'ProspectLists',
		'action'=>'DetailView', 
		'record' => $bean->id,
	);
	$url = 'index.php?' . http_build_query($params);
	SugarApplication::appendErrorMessage('You can NOT create line items for this target lists because you do NOT have Admin permissions.');
	SugarApplication::redirect($url);
}
*/

// Add contact to list.
if ($_REQUEST['mobile_phones'] != '' && $_REQUEST['record_type'] != '') {
	
	$str = $_REQUEST['mobile_phones'];
	$order = array("\r\n", "\n", "\r");
	$replace = "','";
	$newstr = "'" . str_replace($order, $replace, $str) . "'";
	
	$link = $_REQUEST['record_type'];
	
	if ($bean->load_relationship($link)) {
		
		$sql = "SELECT id, first_name, last_name, phone_mobile 
				FROM {$link}
				WHERE phone_mobile IN ({$newstr})
				AND deleted = 0";
	
		$result = $GLOBALS["db"]->query($sql);
		while ( $contact = $GLOBALS["db"]->fetchByAssoc($result) ) {
			if ($contact['phone_mobile'] != '') {
				$bean->$link->add($contact['id']);
			}
		}
	}
			
	$params = array(
		'module'=> 'ProspectLists',
		'action'=>'DetailView', 
		'record' => $bean->id,
	);
	$url = 'index.php?' . http_build_query($params);
	SugarApplication::appendErrorMessage('The matching contacts were added to this target list.');
	SugarApplication::redirect($url);
}
?>

<form method="post">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="PopulateByMobilePhones" />
	<table>
		<tr>
			<td colspan="2">
				<h2>You are about to add contacts/targets with following email addresses to this Target List: <?=$bean->name?></h2>
			</td>
		</tr>
		<tr>
			<td colspan="2"><h3>NOTE: Contacts will be added.  Prospects & Leads will not be added.</td>
		</tr>
		<tr>
			<td>What records you want to add?</td>
			<td>
				<input type="radio" name="record_type" value="contacts" <?php if ($_REQUEST['record_type'] == 'contacts') echo 'checked'?>> Contacts<br>
				<input type="radio" name="record_type" value="prospects" <?php if ($_REQUEST['record_type'] == 'prospects') echo 'checked'?>> Prospects<br>
			</td>
		</tr>
		<tr>
			<td>Enter the mobile phones of contacts/prospects you want to add [comma-separated]:</td>
			<td>
				<textarea type="text" id="mobile_phones" name="mobile_phones" rows="6" cols="40"><?=$_REQUEST['mobile_phones']?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2"><a href="<?=$return_url?>">Return to Target List</a> <input type="submit" value="Populate Now!"></td>
		</tr>
	</table>
</form>