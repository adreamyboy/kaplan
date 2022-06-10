<?php
// created: 2014-05-08 23:28:30
$dictionary["Test_Test1"]["fields"]["test_test1_test_test2"] = array (
  'name' => 'test_test1_test_test2',
  'type' => 'link',
  'relationship' => 'test_test1_test_test2',
  'source' => 'non-db',
  'module' => 'Test_Test2',
  'bean_name' => 'Test_Test2',
  'vname' => 'LBL_TEST_TEST1_TEST_TEST2_FROM_TEST_TEST2_TITLE',
  'id_name' => 'test_test1_test_test2test_test2_ida',
);
$dictionary["Test_Test1"]["fields"]["test_test1_test_test2_name"] = array (
  'name' => 'test_test1_test_test2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TEST_TEST1_TEST_TEST2_FROM_TEST_TEST2_TITLE',
  'save' => true,
  'id_name' => 'test_test1_test_test2test_test2_ida',
  'link' => 'test_test1_test_test2',
  'table' => 'test_test2',
  'module' => 'Test_Test2',
  'rname' => 'name',
);
$dictionary["Test_Test1"]["fields"]["test_test1_test_test2test_test2_ida"] = array (
  'name' => 'test_test1_test_test2test_test2_ida',
  'type' => 'link',
  'relationship' => 'test_test1_test_test2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TEST_TEST1_TEST_TEST2_FROM_TEST_TEST1_TITLE',
);
