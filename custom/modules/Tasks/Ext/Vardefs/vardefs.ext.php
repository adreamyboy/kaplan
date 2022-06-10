<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['Task']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_tasks',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2015-10-29 06:55:32
$dictionary['Task']['fields']['date_due']['required']=true;
$dictionary['Task']['fields']['date_due']['audited']=true;
$dictionary['Task']['fields']['date_due']['merge_filter']='disabled';

 

 // created: 2015-10-29 06:55:41
$dictionary['Task']['fields']['date_start']['required']=true;
$dictionary['Task']['fields']['date_start']['merge_filter']='disabled';
$dictionary['Task']['fields']['date_start']['audited']=true;

 

 // created: 2015-10-29 06:55:57
$dictionary['Task']['fields']['status']['audited']=true;
$dictionary['Task']['fields']['status']['merge_filter']='disabled';

 
?>