<?php
// This file is NOT a part of Moodle - http://moodle.org/
//
// This client for Moodle 2 is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//

function getRESTConnection($params,$functionname){
	global $moodle_url;
	/// SETUP - NEED TO BE CHANGED
	$token = '79e49b2fea375af3af86f0ebda1f01e5';
	$domainname = "http://www.genesisreview.com/elearning";

	// REST RETURNED VALUES FORMAT
	$restformat = 'json'; //Also possible in Moodle 2.2 and later: 'json'
	//Setting it to 'json' will fail all calls on earlier Moodle version

	/// REST CALL
	//header('Content-Type: text/plain');
	$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;

	require_once('curl.php');
	$curl = new curl;
	$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
	
	$resp = $curl->post($serverurl . $restformat, $params);
	return $resp;
}

/*******************/
/****** USERS ******/
/*******************/

function eddy_mdl_create_user($user1){
	$functionname = 'core_user_create_users';
	////////=== moodle_user_create_users ===////////
	$users = array($user1);
	$params = array('users' => $users); 
	$resp=getRESTConnection($params , $functionname);
	$userJSON=json_decode($resp);
	return($userJSON);
}

function eddy_mdl_update_user($user2){
	$functionname = 'core_user_update_users';
	////////=== moodle_user_create_users ===////////
	$users = array($user2);
	$params = array('users' => $users); 
	$resp=getRESTConnection($params , $functionname);
	$userJSON=json_decode($resp);
	return($userJSON);
}

function eddy_mdl_delete_user($uid){
	$functionname = 'core_user_delete_users';
	$params = array('userids' => array($uid));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;		
}

function eddy_get_mdl_user_by_id($id) {
	$functionname = 'core_user_get_users_by_field';
	$users = array($id);
	$params = array('field' => 'id' , 'values' => $users);
	$resp=getRESTConnection($params,$functionname);
	$userJSON=json_decode($resp);
	if (count($userJSON) == 0 || isset($userJSON->errorcode)) {
		return 0;
	} else {
		return $userJSON[0];
	}
}

function eddy_get_mdl_user_by_email($email) {
	$functionname = 'core_user_get_users_by_field';
	$users = array($email);
	$params = array('field' => 'email' , 'values' => $users);
	$resp=getRESTConnection($params,$functionname);
	$userJSON=json_decode($resp);
	if (count($userJSON) == 0 || isset($userJSON->errorcode)) {
		return 0;
	} else {
		return $userJSON[0];
	}
}

function eddy_get_mdl_user_by_username($username) {
	$functionname = 'core_user_get_users_by_field';
	$users = array($username);
	$params = array('field' => 'username' , 'values' => $users);
	$resp=getRESTConnection($params,$functionname);
	$userJSON=json_decode($resp);
	if (count($userJSON) == 0 || isset($userJSON->errorcode)) {
		return 0;
	} else {
		return $userJSON[0];
	}
}

function eddy_get_mdl_user_by_idnumber($idnumber) {
	$functionname = 'core_user_get_users_by_field';
	$users = array($idnumber);
	$params = array('field' => 'idnumber' , 'values' => $users);
	$resp=getRESTConnection($params,$functionname);
	$userJSON=json_decode($resp);
	if (count($userJSON) == 0 || isset($userJSON->errorcode)) {
		return 0;
	} else {
		return $userJSON[0];
	}
}

function get_user_by_id($userid){
    $functionname = 'core_user_get_users_by_id';
	$params = array('id' => $userid); //
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;
}

/********************/
/****** GROUPS ******/
/********************/

function eddy_assign_group($userid,$groupid)
{
	$functionname = 'core_user_get_users_by_field';
	
	$users = array($emailvalue);
	
	$params = array('field' => 'email' , 'values' => $users);

	$resp=getRESTConnection($params,$functionname);
	$userJSON=json_decode($resp);
	if(count($userJSON)>0){
		return $userJSON->id;
	}else{
		return 0;
	}
}

/*********************/
/****** COURSES ******/
/*********************/

function eddy_enroll_user($userid,$courseid)
{
	$functionname = 'enrol_manual_enrol_users';
	
	$user1 = new stdClass();
	$user1->userid = $userid;
	$user1->courseid = $courseid;
	$user1->roleid = 5;
		
	$users = array($user1);
	$params = array('enrolments' => $users);
	
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return "DONE";
}

function get_users_courses($emailValue){
	$functionname = 'core_enrol_get_users_courses';
	$userid=eddy_get_mdl_user($emailValue);
	$params = array('userid' => $userid); //
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;
}

/*********************/
/****** COHORTS ******/
/*********************/

function create_cohort($name,$idnumber,$desc){
	$functionname = 'core_cohort_create_cohorts';	
	$cohort1 = array(
		'name' => $name,
		'idnumber' => $idnumber,
		'description' => $desc,
		'categorytype' => array('type' => 'system', 'value' => '0')
	);
	$params = array('cohorts' => array($cohort1) ); 
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;	
}

function delete_cohort($cid){
	$functionname = 'core_cohort_delete_cohorts';
	$params = array('cohortids' => array($cid));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;		
}

function update_cohort($cid,$name,$idnumber,$desc){
	$cohort1 = array(
		'id' => $cid,
		'categorytype' => array('type' => 'system', 'value' => '0'),
		'name' => $name,
		'idnumber' => $idnumber,
		'description' => $desc,
		'descriptionformat' => '1'
	);
	$functionname = 'core_cohort_update_cohorts'; 	
	$params = array('cohorts' => array($cohort1)); 
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;		
}

function get_cohort($cid){
	$functionname = 'core_cohort_get_cohorts';
	$params = array('cohortids' => array($cid));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;
}

function add_member_to_cohort($cid,$uid){
	$functionname = 'core_cohort_add_cohort_members';
	$cohort1 = array(
		'cohorttype' => array('type' => 'id', 'value' => $cid),
		'usertype' => array('type' => 'id', 'value' => $uid)
    );
	$params = array('members'=>array($cohort1));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;		
}

function delete_cohort_members($cid,$uid){
	$functionname = 'core_cohort_delete_cohort_members';
	$cohort1 = array(
		'cohortid' => $cid,
		'userid' => $uid
	);	
	$params = array('members'=>array($cohort1));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;		
}

function get_cohort_members($cid) {
	$functionname = 'core_cohort_get_cohort_members';
    $params = array('cohortids' => array($cid));
	$resp=getRESTConnection($params,$functionname);
	$statusJSON=json_decode($resp);
	return $statusJSON;
}


############ TESTING ##################################
//print_r(eddy_get_mdl_user('tjaafar@gmail.com'));
//print_r(get_cohort(4));
//print_r (add_member_to_cohort(4,2)); 
//print_r(delete_cohort_members(4,2));

/*
$user1 = new stdClass();
$user1->username = 'testusername4'; // make sure username , email does not exist before call
$user1->password = 'testpassword1';
$user1->firstname = 'testfirstname1';
$user1->lastname = 'testlastname1';
$user1->email = 'testemail1@moodle.com4';
$user1->auth = 'manual';
$user1->idnumber = 'testidnumber1';
$user1->description = 'Hello World!';
$user1->city = 'testcity1';
$user1->country = 'BR';
*/

//print_r(eddy_mdl_create_user($user1));
//http://localhost/genesis/elearning/user/profile.php?id=1635
/*
$user2 = new stdClass();
$user2->id = 1635;
$user2->firstname = 'testfirstname35';
$user2->lastname = 'testlastname1';
$user2->email = 'testemail1@moodle.com4';
$user2->auth = 'manual';
$user2->idnumber = 'testidnumber1';
$user2->description = 'Hello World!';
$user2->city = 'testcity1';
$user2->country = 'BR';
*/

//print_r(eddy_mdl_update_user($user2));
//echo eddy_get_mdl_user('tjaafar@gmail.com');
//print_r(create_cohort("Co new","C1 new","Cohort new")); // TESTED WORKING
//print_r(delete_cohort(6)); //TESTED WORKING
//print_r(update_cohort(6,"UPnew",'upnew','UTTPPnew')); // TESTED WORKING
//print_r(get_cohort(0));
?>