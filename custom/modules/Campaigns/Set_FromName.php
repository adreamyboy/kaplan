<?php

global $db, $current_user;

$reply_name = $_POST['reply_name'];
$reply_addr = $_POST['reply_addr'];
$Id         = $_POST['Id'];

 $SQL = "UPDATE email_marketing SET from_name = '".$reply_name."', from_addr = '".$reply_addr."' WHERE campaign_id = '".$Id."'";
 $RES = $db->query($SQL);
 

?>
