<?php
$dbPath = dirname(__FILE__) . "/sql/annons.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


//
// Check if Save-button was pressed, save the ad if true.
//
if(isset($_POST['doCreate'])) {

  $ad[] = strip_tags($_POST["typ"], "<b><i><p><img>");

  $stmt = $db->prepare("INSERT INTO annons (typ) VALUES (?)");
  $stmt->execute($ad);
  $output = "Lade till en ny annons";
}


//
// Create a select/option-list of the ads
// 
$stmt = $db->prepare('SELECT rowid, * FROM annons;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$select = "<select id='input1' multiple name='annons'>";
foreach($res as $ad) {
  $select .= "<option value='{$ad['rowid']}'>{$ad['typ']} ({$ad['rowid']})</option>";
}
$select .= "</select>";


?>

<h1>Lägg till annons</h1>


<form method="post">
  <fieldset class=sqlfieldset>
    <p>
      <label for="input1">Befintliga annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <label for="input2">Titel på ny annons:</label><br>
      <input id="input2" class="text" name="typ">
    </p>    
    
    <p>
      <input type="submit" name="doCreate" value="Skapa">
      <input type="reset" value="Ångra">
    </p>
        
    <?php if(isset($output)): ?>
    <p><output class="info"><?php echo $output ?></output></p>
    <?php endif; ?>
        

  </fieldset>
</form>

