<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../../../img/favicon_dbwebb.png">
   <title>Example PHP PDO and SQLite. Create table and insert rows</title>
</head>

<body>
  <h1>Create table and insert rows</h1>
  <p><a href="../../../viewsource.php?dir=incl/guide/sqlite20&file=<?php echo basename(__FILE__); ?>"><em>Source</em></a></p>

  <h2>Lets do it</h2>
  
<?php 
error_reporting(-1); 


// ---------------------------------------------------------------------------------------------

$file = dirname(__FILE__) . "/jetty2.sqlite";
echo "<p>1. Connecting to the database in with filename: <code>$file</code>.</p>";

$db = new PDO("sqlite:$file");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


// ---------------------------------------------------------------------------------------------

$stmt = $db->prepare('
  CREATE TABLE IF NOT EXISTS Jetty
  (
    jettyPosition INTEGER PRIMARY KEY  NOT NULL  UNIQUE, 
    boatType VARCHAR(20) NOT NULL, 
    boatEngine VARCHAR(20) NOT NULL, 
    boatLength INTEGER, 
    boatWidth INTEGER, 
    ownerName VARCHAR(20)
  );
');

echo "<p>2. Creating table by executing SQL statement:<pre>" . $stmt->queryString . "</pre></p>";
$stmt->execute();


// ---------------------------------------------------------------------------------------------

$stmt = $db->prepare('DELETE FROM Jetty;');

echo "<p>3. Delete all rows in table by executing SQL statement:<pre>" . $stmt->queryString . "</pre></p>";
$stmt->execute();


// ---------------------------------------------------------------------------------------------

echo "<p>4. Inserting default rows into table.</p>";
$stmt = $db->prepare("INSERT INTO Jetty VALUES(1,'Buster XXL','Yamaha 115hk',635,240,'Adam')");
$stmt->execute();
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";

$stmt = $db->prepare("INSERT INTO Jetty VALUES(2,'Buster M','Yamaha 40hk',460,186,'Berit')");
$stmt->execute();
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";

$stmt = $db->prepare("INSERT INTO Jetty VALUES(3,'Linder 440','Tohatsu 4hk',431,164,'Ceasar')");
$stmt->execute();
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";


// ---------------------------------------------------------------------------------------------

$stmt = $db->prepare('SELECT * FROM Jetty;');

echo "<p>5. Executing SQL statement:<pre>" . $stmt->queryString . "</pre></p>";
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<p>6. Results from query:</p>";

echo "<table style='border:1px solid #999'><tr style='background:#999'>";
// Get all columnnames and use for table header
foreach($res[0] AS $key => $val) {
  echo "<th>$key</th>";
}
echo "</tr>";

// Get all rows, one by one
foreach($res AS $val) {
  echo "<tr>";
  foreach($val AS $val1) {
    echo "<td>$val1</td>";
  }
  echo "</tr>";
}
echo "</table>";


// ---------------------------------------------------------------------------------------------
//
// Close the connection by setting it to null
//
$db = null;


//// Was the form submitted? Then add new boat//
if(isset($_POST['add'])) {  // Add all form entries to an array    
$boat[] = strip_tags($_POST["jettyPosition"]);    
$boat[] = strip_tags($_POST["boatType"]);    
$boat[] = strip_tags($_POST["boatEngine"]);    
$boat[] = strip_tags($_POST["boatLength"]);    
$boat[] = strip_tags($_POST["boatWidth"]);    
$boat[] = strip_tags($_POST["ownerName"]);  
$stmt = $db->prepare("INSERT INTO Jetty VALUES(?,?,?,?,?,?)"); 
$stmt->execute($boat);  echo "<p>Inserted new boat. Rowcount is = " . $stmt->rowCount() . "</p>";}


?>


</body>
</html>

