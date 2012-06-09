<?php
$dbPath = dirname(__FILE__) . "/sql/annons.sqlite";

// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


//
// Check if Save-button was pressed, save the ad if true.
//
if(isset($_POST['doSave'])) {

  $strip = "<b><i><p><img>";

  // Add all form entries to an array
  $ad[] = strip_tags($_POST["typ"], $strip);
  $ad[] = strip_tags($_POST["beskrivning"], $strip);
  $ad[] = strip_tags($_POST["pris"], $strip);
  $ad[] = strip_tags($_POST["rowid"], $strip);

$stmt = $db->prepare("UPDATE annons SET typ=?, beskrivning=?, pris=? WHERE rowid=?");
  $stmt->execute($ad);
  $output = "Uppdaterade annonsen. Rowcount is = " . $stmt->rowCount() . ".";

}


//
// Create a select/option-list of the ads
// 
$stmt = $db->prepare('SELECT rowid, * FROM annons;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' name='annons' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Annons</option>";
foreach($res as $ad) {
  $selected = "";
  if(isset($_POST['annons']) && $_POST['annons'] == $ad['rowid']) {
    $selected = "selected";
    $current = $ad;
    }
  $select .= "<option value='{$ad['rowid']}' {$selected}>{$ad['typ']} ({$ad['rowid']})</option>";
}
$select .= "</select>";


?>

<h1>Uppdatera annons</h1>


<form method="post">
  <fieldset class=sqlfieldset>
    <input type="hidden" name="rowid" value="<?php echo $current['rowid']; ?>">

    <p>
      <label for="input1">Annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <label for="input1">Titel:</label><br>
      <input type="text" class="text" name="typ" value="<?php echo $current['typ']; ?>">
    </p>    
    
   
    
    <p>
      <textarea style="width:100%;" name="beskrivning"><?php echo $current['beskrivning']; ?></textarea>
    </p>    
    
        <p>
      <label for="input1">Pris:</label><br>
      <input type="text" class="text" name="pris" value="<?php echo $current['pris']; ?>">
    </p>
    
    
    <p>
      <input type="submit" name="doSave" value="Spara" <?php if(!isset($current['rowid'])) echo "disabled";  ?>>
      <input type="reset" value="Ångra">
    </p>

    <?php if(isset($output)): ?>
    <p><output class="success"><?php echo $output; ?></output></p>
    <?php endif; ?>
        
  </fieldset>
</form>            

 

