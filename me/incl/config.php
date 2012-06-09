<?php

// start a named session
session_name(preg_replace('/[:\.\/-_]/', '', __FILE__));
session_start();


error_reporting(-1);

include_once(dirname(__FILE__) . "/../src/common.php");

// include functions for login & logout
include_once(dirname(__FILE__) . "/../src/login.php");

// account and password that can login
$userAccount = "doe";
$userPassword = userPassword("doe");
 
// time page generation, display in footer. comment out to disable timing.
$pageTimeGeneration = microtime(true); 

