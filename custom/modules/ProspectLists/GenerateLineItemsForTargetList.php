<?php

//$campaign_id = 'd71b54df-d4e7-dd3d-6f24-5422851d2d3a';  // Old Lead
//$campaign_id = 'de68220f-86b4-3b75-ef89-5422854d9952';  // Old Student

//$product_ids = 'da6bf1ce-3ccc-8ea5-1674-54c8a3bc66f6,e4ee0f2f-d067-0dcd-8ae3-54c8a39d0b18';
//$assigned_usernames = 'nalam,amago';



$bean = $this->bean;

// If "Not Admin", don't allow this action
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

if ($_REQUEST['product_ids'] != '') {

	// Check if product IDs are valid
	$product_ids = explode(',', $_REQUEST['product_ids']);
	$products = array();
	$valid_product_ids = true;
	foreach ($product_ids as $product_id) {
		$product = new GI_Products();
		$product->retrieve($product_id);
		if ($product->id == '') {
			$valid_product_ids = false;
			echo "<p>Invalid product ID: {$product_id}</p>";
		} else {
			$products[$product->id] = $product;
			//echo "<p>ID: {$product->id} ---- Name: {$product->name}</p>";
		}
	}
	
	// Check if assigned usernames are valid
	$assigned_usernames = explode(',', $_REQUEST['assigned_usernames']);
	$users = array();
	$valid_usernames = true;
	foreach ($assigned_usernames as $username) {
		$user = new User();
		$user->retrieve_by_string_fields(array('user_name'=>$username));
		if (empty($user->id)) {
			$valid_usernames = false;
			echo "<p>Invalid Assigned Usernames: {$username}</p>";
		} else {
			$users[] = $user->id;
			//$valid_usernames = false;
			//echo "<p>Invalid Assignee Username: {$assigned_usernames}</p>";
		}
	}
	
	//ini_set('display_errors', 1); error_reporting(E_ALL);
	
	// retrieve all contacts in target list
	$link = 'contacts';
	if ($bean->load_relationship($link)) {
		$contacts = $bean->$link->getBeans();
	}
	
	// If all products & usernames are valid... create the new line items
	if ($valid_usernames && $valid_product_ids && count($contacts) > 0) {
		$line_items = array();
		
		// build the arrays of product_id, contact_id, line_item_id
		$link = 'gi_products_gi_line_items_1';
		foreach ($products as $product) {
			if ($product->load_relationship($link)) {
				$collection = $product->$link->getBeans();
				foreach ($collection as $line_item) {
					$line_items[$product->id][$line_item->contacts_gi_line_items_1contacts_ida] = $line_item->id;
				}
			}
		}
		
		$i = 0;
		foreach ($contacts as $contact) {
			
			unset($opportunity);
			
			foreach ($products as $product) {
				
				if (!array_key_exists($contact->id, $line_items[$product->id])) {
					
					if (!isset($opportunity)) {
						$i++;
						$user_no = ($i % count($users));
						
						// Create a new opportunity
						$individual_account = $contact->get_individual_account();
						$opportunity = new Opportunity();
						$opportunity->account_id = $individual_account->id;
						$opportunity->campaign_id = $_REQUEST['campaign_id']; // this ID refers to "Old Lead" campaign
						$opportunity->description = $_REQUEST['opportunity_description'];
						$opportunity->assigned_user_id = $users[$user_no];
						$opportunity->save();
						$opportunity->retrieve($opportunity->id);
						$opportunity->save();
						
						// Create a new Note under this opportunity
						$note = new Note();
						$note->name = "Opportunity and line items created by mass-upload.";
						$note->parent_type = 'Opportunities';
						$note->parent_id = $opportunity->id;
						$note->parent_name = $opportunity->name;
						$note->contact_id = $contact->id;
						$note->contact_name = $contact->name;
						$note->description = "Opportunity and its line items were created by a mass-upload action.";
						$note->save();
					}
					
					//echo "<p>{$contact->id} --- {$product->id} --- {$users[$user_no]}</p>";
					
					// Create new line items under this opportunity
					$line_item = new GI_Line_Items();
					$line_item->opportunities_gi_line_items_1opportunities_ida = $opportunity->id;
					$line_item->gi_products_gi_line_items_1gi_products_ida = $product->id;
					$line_item->contacts_gi_line_items_1contacts_ida = $contact->id;
					$line_item->unit_price = $product->price;
					$line_item->save();
					$params = array(
						'module'=> 'GI_Line_Items',
						'action'=>'DetailView', 
						'record' => $line_item->id,
					);
					$url = 'index.php?' . http_build_query($params);
					echo "<p><a href='{$url}'>{$contact->name} -- {$product->name} -- {$users[$user_no]} -- {$line_item->name}</a></p>";
				}
			}
		}
	}
}

$params = array(
	'module'=> 'ProspectLists',
	'action'=>'DetailView', 
	'record' => $bean->id,
);
$return_url = 'index.php?' . http_build_query($params);

?>

<form method="GET">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="GenerateLineItemsForTargetList" />
	<table>
		<tr><td colspan="2"><h2>You are about to create new line item for the contacts in Target List: <?=$bean->name?> (<?=$_REQUEST['record']?>)</h2></td></tr>
		<tr><td colspan="2"><h3>NOTE 1: All line items will be created under completely <u>new opportunities</u>.</h3></td></tr>
		<tr><td colspan="2"><h3>NOTE 2: The new opportunities will be linked to the contacts' <u>individual accounts</u>.</h3></td></tr>
		<tr><td colspan="2"><h3>NOTE 3: This action <u>will check</u> if other similar line items already exist for the selected contacts.</h3></td></tr>
		<tr><td>Enter the IDs of products which you want to create line items for [comma-separated]:</td><td><input type="text" id="product_ids" name="product_ids" value="<?=$_REQUEST['product_ids']?>"></td></tr>
		<tr><td>Enter the assignees' usernames [comma-separated]:</td><td><input type="text" id="assigned_usernames" name="assigned_usernames" value="<?=$_REQUEST['assigned_usernames']?>"></td></tr>
		<tr><td>Enter the ID of campaign to which you want to relate the generated opportunities:</td><td><input type="text" id="campaign_id" name="campaign_id" value="<?=$_REQUEST['campaign_id']?>"></td></tr>
		<tr><td>Enter the default description for the generated opportunities:</td><td><input type="text" id="opportunity_description" name="opportunity_description" value="<?=$_REQUEST['opportunity_description']?>"></td></tr>
		<!--
		<tr><td>(For Corporate opportunities) Enter the ID of corporate opportunity:</td><td><input type="text" id="opportunity_id" name="opportunity_id" value="<?=$_REQUEST['opportunity_id']?>"></td></tr>
		<tr><td>(For Corporate opportunities) Enter the ID of line item to duplicate:</td><td><input type="text" id="line_item_id" name="line_item_id" value="<?=$_REQUEST['line_item_id']?>"></td></tr>
		-->
		<tr><td colspan="2"><a href="<?=$return_url?>">Return to Target List</a> <input type="submit" value="Create Now!"></td></tr>
	</table>
</form>