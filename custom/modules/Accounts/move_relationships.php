<?php

/*
This action is used to move all the relationships from one individual account to another individual account, 
and also move all the relationships from the first account's primary contact to the other account's primary contact.

For example, assume that you find 2 duplicate individual accounts, and each of them is related to other records, 
and you want to delete one of them.

Also, sometime a student complains of not see his/her courses in eLearning or Mobile App, although the logins are correct. 
This sometimes happens because 2 contacts/logins exist with the same email address.  

To delete a duplicated contact & individual account, you must do the following steps:
1. Move the relationships from the contact you to delete, to the contact you to keep. (handled by this function)
2. Move the relationships from the individual account you to delete, to the individual accont you to keep. (handled by this function)
3. Delete the contact you want to delete.  This will also automaticlly delete the related individual account.
*/

/*** Process the "post/action" from the form below. ***/
if ($_REQUEST['to_id'] != '') {
	
	// from "account"
	$from_account = $this->bean;

	// to "account"
	$to_account = new Account();
	$to_account->retrieve($_REQUEST['to_id']);

	// from "contact"
	if ($from_account->individual_c == '1') {
		$link = "contacts";
		if ($from_account->load_relationship($link)) {
			$from_contacts = $from_account->$link->getBeans();
			if (count($from_contacts) == 1) {
				$from_contact = current($from_contacts);
			}
		}
	}

	// to "contact"
	if ($to_account->individual_c == '1') {
		$link = "contacts";
		if ($to_account->load_relationship($link)) {
			$to_contacts = $to_account->$link->getBeans();
			if (count($to_contacts) == 1) {
				$to_contact = current($to_contacts);
			}
		}
	}
	
    /*
    //***** DEBUGING *****
	echo '<pre>';
	print_r($from_account);
	print_r($from_contact);
	print_r($to_account);
	print_r($to_contact);
	echo '</pre>';
	*/

	// move "account" relationships
	if ($to_account->id != '') {
		foreach ($from_account->field_name_map as $key => $field) {
			if ($field['type'] == 'link' && $key != 'contacts') {
				if ($from_account->load_relationship($key)) {
					$collection = $from_account->$key->getBeans();
					if (count($collection) > 0) {
						foreach($collection as $item){
							$module_class = get_class($item);
							$obj = new $module_class;
							$to_account->load_relationship($key);
							$to_account->$key->add($item->id);
							$from_account->$key->delete($item->id);
						}
						$keys = array_keys($collection);
						$relationships[$key] = $keys;
					}
				}
			}
		}
	}

	// move "contact" relationships
	if ($to_contact->id != '') {
		foreach ($from_contact->field_name_map as $key => $field) {
			if ($field['type'] == 'link' && $key != 'accounts') {
				if ($from_contact->load_relationship($key)) {
					$collection = $from_contact->$key->getBeans();
					if (count($collection) > 0) {
						foreach($collection as $item){
							$module_class = get_class($item);
							$obj = new $module_class;
							$to_contact->load_relationship($key);
							$to_contact->$key->add($item->id);
							$from_contact->$key->delete($item->id);
						}
						$keys = array_keys($collection);
						$relationships[$key] = $keys;
					}
				}
			}
		}	
	}
    
    /*
    //***** DEBUGING *****
    echo '<table>';
    foreach ($from_account->field_name_map as $key => $field) {
        echo "<tr><td>{$key}</td><td>{$field['type']}</td><td>{$from_account->$key}</td></tr>";
    }
    echo '</table>';
    */

}
?>


<!--- In the below form, you must select the account which you want to move the relationships to --->
<form method="GET">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="move_relationships" />
	<table>
		<tr><td colspan="2"><h3>Move all related records to another <?=$_REQUEST['module']?></h3></td></tr>
		<tr><td><p>Move all related records of this record to the Account ID: </td><td><input type="text" id="to_id" name="to_id" value=""></p></td></tr>
		<tr><td colspan="2"><input type="submit" value="Move Now!"></td></tr>
	</table>
</form>

<p><a href="index.php?module=<?=$_REQUEST['module']?>&action=DetailView&record=<?=$_REQUEST['record']?>">Return to Account</a></p>