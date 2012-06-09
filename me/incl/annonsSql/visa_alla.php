<?php
$dbPath = dirname(__FILE__) . "/sql/annons.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script

//
// Read from database
//
$stmt = $db->prepare('SELECT * FROM annons;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h1>Visa alla annonser</h1>
  <fieldset class=sqlfieldset>
<table>


  <tr>
    <th>Titel:</th>
    <th>Bild:</th>
    <th>Beskrivning:</th>
  </tr>
  
  <?php foreach($res as $ad): ?>
  
  <tr>
    <td><?php echo $ad['typ']; ?></td>
    <td><?php echo $ad['pris']; ?></td>
    <td><?php echo $ad['beskrivning']; ?></td>
  </tr>
  
  <?php endforeach; ?>

</table>
  </fieldset>

