<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-10-22 07:35:50
$dictionary["GI_Mobile_Registrations"]["fields"]["contacts_gi_mobile_registrations_1"] = array (
  'name' => 'contacts_gi_mobile_registrations_1',
  'type' => 'link',
  'relationship' => 'contacts_gi_mobile_registrations_1',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_CONTACTS_GI_MOBILE_REGISTRATIONS_1_FROM_CONTACTS_TITLE',
  'id_name' => 'contacts_gi_mobile_registrations_1contacts_ida',
);
$dictionary["GI_Mobile_Registrations"]["fields"]["contacts_gi_mobile_registrations_1_name"] = array (
  'name' => 'contacts_gi_mobile_registrations_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_GI_MOBILE_REGISTRATIONS_1_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_gi_mobile_registrations_1contacts_ida',
  'link' => 'contacts_gi_mobile_registrations_1',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["GI_Mobile_Registrations"]["fields"]["contacts_gi_mobile_registrations_1contacts_ida"] = array (
  'name' => 'contacts_gi_mobile_registrations_1contacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_gi_mobile_registrations_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_CONTACTS_GI_MOBILE_REGISTRATIONS_1_FROM_GI_MOBILE_REGISTRATIONS_TITLE',
);


 // created: 2015-10-22 07:26:01
$dictionary['GI_Mobile_Registrations']['fields']['description']['required']=true;
$dictionary['GI_Mobile_Registrations']['fields']['description']['audited']=true;
$dictionary['GI_Mobile_Registrations']['fields']['description']['comments']='Full text of the note';
$dictionary['GI_Mobile_Registrations']['fields']['description']['merge_filter']='disabled';

 

 // created: 2015-10-22 07:25:18
$dictionary['GI_Mobile_Registrations']['fields']['device_os_c']['labelValue']='Device OS';

 
?>