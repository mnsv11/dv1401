<?php
$dbPath = dirname(__FILE__) . "/sql/annons.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


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

<h1>Visa annons</h1>


<form method="post">
  <fieldset class=sqlfieldset>
    <p>
      <label for="input1">Annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
  <?php if(isset($current)): ?>
    <p>
      <div style="background:#eee; border:1px solid #999;padding:1em;">
        <h2><?php echo $current['typ']; ?></h2>
        <p><?php echo $current['beskrivning']; ?>
        <br><?php echo $current['pris']; ?></p>
      </div>
    </p>
  <?php endif; ?>
    
  </fieldset>
</form>
