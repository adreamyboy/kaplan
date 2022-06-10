<?php
// created: 2015-11-04 16:05:00

$dictionary['Meeting']['fields']['contacts']['rel_fields'] = array(
	'accept_status' => array(
		'type' => 'enum',
		'options' => 'dom_meeting_accept_status',
	),
	'longitude' => array(
		'type' => 'varchar',
	),
	'latitude' => array(
		'type' => 'varchar',
	),
	'marked_by' => array(
		'type' => 'enum',
		'options' => 'marked_by_list',
	),
	'marking_mode' => array(
		'type' => 'enum',
		'options' => 'attendance_marking_mode_list',
	),
	'date_marked' => array(
		'type' => 'datetime',
	),
);

?>