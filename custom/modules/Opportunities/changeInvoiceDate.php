<?php

$bean = $this->bean;

global $timedate;
if ($timedate->check_matching_format($bean->date_closed, 'Y-m-d')) {
    $date_closed = $bean->date_closed;
} else {
    $date_closed = $timedate->to_db_date($bean->date_closed, false);  // do not change to user's timezone.  check if this is needed!
}

// If current user is "Not Admin"...
global $current_user;
$isAdmin = is_admin($current_user);
if (!$isAdmin) {
    
    // ... AND... If current user doesn't have "Accountant" role, don't allow this action
    include_once('modules/ACLRoles/ACLRole.php');
    $objACLRole = new ACLRole();
    $roles = $objACLRole->getUserRoleNames($current_user->id);
    if (!in_array("Accountant", $roles)) {
        $params = array(
            'module'=> 'Opportunities',
            'action'=> 'DetailView', 
            'record' => $bean->id,
        );
        $url = 'index.php?' . http_build_query($params);
        SugarApplication::appendErrorMessage('You can NOT change the invoice date because you do NOT have Admin and/or Accountant permissions.');
        SugarApplication::redirect($url);
    }
}

// Update invoice date & create note
if ($_REQUEST['new_date_closed'] != '' || $_REQUEST['reason'] != '') {
	
    // update invoice date.
    $old_date_closed = $bean->date_closed;
    $bean->date_closed = $_REQUEST['new_date_closed'];
    $bean->save();
    
    // log a note about the change (with the reason).
    $note = new Note();
    $note->name = "Invoice date is changed.";
    $note->parent_type = 'Opportunities';
    $note->parent_id = $bean->id;
    $note->parent_name = $bean->name;
    $note->description = "Invoice date was changed from ({$date_closed}) to ({$_REQUEST['new_date_closed']}) by ({$current_user->user_name}). \n\n {$_REQUEST['reason']}";
    $note->save();
    
	$params = array(
		'module'=> 'Opportunities',
		'action' => 'DetailView', 
		'record' => $bean->id,
	);
	$url = 'index.php?' . http_build_query($params);
	SugarApplication::appendErrorMessage('The invoice date was updated successfully!');
	SugarApplication::redirect($url);
    
} else {
    echo "<p style='color:red;'>You must provide an invoice date & reason of change.</p>";
}

$params = array(
    'module' => 'Opportunities',
    'action' => 'DetailView', 
    'record' => $bean->id,
);
$return_url = 'index.php?' . http_build_query($params);

?>

<form method="post">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="changeInvoiceDate" />
	<table>
		<tr><td>You are editig opportunity/invoice:</td><td><?=$bean->name?></td></tr>
        <tr><td>Enter the new invoice date:</td><td><input type="date" id="new_date_closed" name="new_date_closed" value="<?=$date_closed?>"></td></tr>
        <tr><td>Enter the reason for updating the invoice date:</td><td><textarea id="reason" name="reason" value="<?=$reason?>" cols="60" rows="4" required></textarea></td></tr>
		<tr><td colspan="2"><a href="<?=$return_url?>">Return to Opportunity</a> <input type="submit" value="Change Now!"></td></tr>
	</table>
</form>
