<?php
$dbPath = dirname(__FILE__) . "/../sql/bmo.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script



// start a named session
session_name(preg_replace('/[:\.\/-_]/', '', __FILE__));
session_start();


error_reporting(-1);

include_once(dirname(__FILE__) . "/../src/common.php");

// include functions for login & logout
include_once(dirname(__FILE__) . "/../src/login.php");


 
// time page generation, display in footer. comment out to disable timing.
$pageTimeGeneration = microtime(true); 


