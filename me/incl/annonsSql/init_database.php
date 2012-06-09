<?php 
// Creating the database and initiating it with content
echo "<h3>Creating and populating the database</h2>";

$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script

// Create a table, but only if it not already exists. 
$stmt = $db->prepare('
  CREATE TABLE IF NOT EXISTS Ads
  (
    id INTEGER PRIMARY KEY NOT NULL UNIQUE, 
    title TEXT, 
    description TEXT, 
    image TEXT
  );
');
echo "<p>Creating table if it does not exists by executing SQL statement:<pre>" . $stmt->queryString . "</pre></p>";
$stmt->execute();


// Delete rows from the table. 
$stmt = $db->prepare('DELETE FROM Ads;');
echo "<p>Delete all rows in the table by executing SQL statement:<pre>" . $stmt->queryString . "</pre></p>";
$stmt->execute();


// Insert values into a table. 
echo "<p>Inserting default rows into table.</p>";
$stmt = $db->prepare("INSERT INTO Ads(title,description,image) VALUES(?,?,?)");

// Insert an ad
$ad = null;
$ad[] = "Akvarie";
$ad[] = '
Åttakantigt <b>akvarie</b> med tillbehör. Oerhört vackert, stilfullt och håller dessutom tätt.

Fiskar följer ej med.

Ge ett bud!
';
$ad[] = "img/blokket/akvarie_80.jpg";
$stmt->execute($ad);
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";

// Insert an ad
$ad = null;
$ad[] = "Cykel";
$ad[] = '
Två barn/ungdomscyklar. Välcyklade av två aktiva ungdomar, både i skog, mark och berg.

Det finns luft i däcken. <i>Oftast</i>.

Ge ett bud!
';
$ad[] = "img/blokket/cyklar_80.jpg";
$stmt->execute($ad);
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";

// Insert an ad
$ad = null;
$ad[] = "Löpband";
$ad[] = '
<p>Löpband för den som vill springa utan att komma någonstans. Perfekt framför TV:n.</p>

<p>Garanterad motion.</p>

<p>Ge ett bud!</p>
';
$ad[] = "img/blokket/lopband_80.jpg";
$stmt->execute($ad);
echo "<p>Rowcount is = " . $stmt->rowCount() . "</p>";

?> 

