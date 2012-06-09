
<?php 
$db = new PDO("sqlite:boats.sqlite");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script
// Prepare and execute the statement
$stmt = $db->prepare('SELECT * FROM Jetty;');$stmt->execute();
// Get the results as an array
$res = $stmt->fetchAll(PDO::FETCH_CLASS);echo "<pre>", print_r($res, false), "</pre>";
