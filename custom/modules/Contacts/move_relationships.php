<?php

$from_bean = $this->bean;

$to_bean = new Contact();
$to_bean->retrieve($_REQUEST['to_id']);

/*
echo '<table>';
foreach ($from_bean->field_name_map as $key => $field) {
	echo "<tr><td>{$key}</td><td>{$field['type']}</td><td>{$from_bean->$key}</td></tr>";
}
echo '</table>';
*/

if ($_REQUEST['to_id'] != '') {
	foreach ($from_bean->field_name_map as $key => $field) {
		if ($field['type'] == 'link' && $key != 'accounts') {
			if ($from_bean->load_relationship($key)) {
				$collection = $from_bean->$key->getBeans();
				if (count($collection) > 0) {
					foreach($collection as $item){
						$module_class = get_class($item);
						$obj = new $module_class;
						$to_bean->load_relationship($key);
						$to_bean->$key->add($item->id);
						$from_bean->$key->delete($item->id);
					}
					$keys = array_keys($collection);
					$relationships[$key] = $keys;
				}
			}
		}
	}	
}

/*
echo '<pre>';
print_r($relationships);
echo '</pre>';
*/

?>

<form method="GET">
	<input type="hidden" name="module" value="<?=$_REQUEST['module']?>" />
	<input type="hidden" name="record" value="<?=$_REQUEST['record']?>" />
	<input type="hidden" name="action" value="move_relationships" />
	<table>
		<tr><td colspan="2"><h3>Move all related records to another <?=$_REQUEST['module']?></h3></td></tr>
		<tr><td><p>Move all related records to <?=$_REQUEST['module']?> ID:</td><td><input type="text" id="to_id" name="to_id" value=""></p></td></tr>
		<tr><td colspan="2"><input type="submit" value="Move Now!"></td></tr>
	</table>
</form>