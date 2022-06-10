<?php

 $id=$_REQUEST['campaign_id'];

 $Campaigns_obj = BeanFactory::getBean('Campaigns',$id);
 $name          = $Campaigns_obj->name;
 
 global $db;
 $sql="delete FROM campaigns where name= '$name' and id!='$id'";
 $RObj  = $db->query($sql);


header("Location:index.php?module=Campaigns&action=DetailView&record=".$id);
?>
