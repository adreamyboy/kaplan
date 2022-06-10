<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['Call']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_calls',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






 // created: 2017-03-12 23:53:13
$dictionary['Call']['fields']['call_reason_c']['inline_edit']='1';
$dictionary['Call']['fields']['call_reason_c']['labelValue']='Call Reason';

 

 // created: 2015-10-29 06:56:50
$dictionary['Call']['fields']['date_end']['audited']=true;
$dictionary['Call']['fields']['date_end']['comments']='Date is which call is scheduled to (or did) end';
$dictionary['Call']['fields']['date_end']['merge_filter']='disabled';

 

 // created: 2015-10-29 06:56:37
$dictionary['Call']['fields']['date_start']['audited']=true;
$dictionary['Call']['fields']['date_start']['comments']='Date in which call is schedule to (or did) start';
$dictionary['Call']['fields']['date_start']['merge_filter']='disabled';

 

 // created: 2015-10-29 06:57:23
$dictionary['Call']['fields']['status']['audited']=true;
$dictionary['Call']['fields']['status']['comments']='The status of the call (Held, Not Held, etc.)';
$dictionary['Call']['fields']['status']['merge_filter']='disabled';

 
?>