<?php
$dbPath = dirname(__FILE__) . "/../../sql/bmo.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


//
// Check if Save-button was pressed, save the ad if true.
//
if(isset($_POST['doCreate'])) {

  $ad[] = strip_tags($_POST["title"], "<b><i><p><img>");
  $ad[] = strip_tags($_POST["category"], "<b><i><p><img>");
  $ad[] = strip_tags($_POST["image"], "<b><i><p><img>");
  $ad[] = strip_tags($_POST["imageResize"], "<b><i><p><img>");
  $ad[] = strip_tags($_POST["owner"], "<b><i><p><img>");
  $ad[] = strip_tags($_POST["text"], "<b><i><p><img>");
  
  $stmt = $db->prepare("INSERT INTO Object (title, category, image,imageResize,owner,text) VALUES (?,?,?,?,?,?)");
  
  $stmt->execute($ad);
  $output = "Nytt objekt sparat";
}


//
// Create a select/option-list of the ads
// 
$stmt = $db->prepare('SELECT id, * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$select = "<select id='input1' multiple name='Object'>";
foreach($res as $ad) {
  $select .= "<option value='{$ad['id']}'>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";


?>

<h1>Lägg till annons</h1>


<form method="post">
  <fieldset>
    <p>
      <label for="input1">Befintliga annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <label for="input2">Titel på ny annons:</label><br>
      <input id="input2" class="text" name="title">
    </p>    
    <p>
      <label for="input3">Kategori:</label><br>
      <input id="input3" class="text" name="category">
    </p> 
    <p>
      <label for="input4">Bild:</label><br>
      <input id="input4" class="text" name="image">
    </p> 
    <p>
      <label for="input5">Bild:</label><br>
      <input id="input5" class="text" name="imageResize">
    </p> 
    <p>
      <label for="input6">Bild:</label><br>
      <input id="input6" class="text" name="owner">
    </p> 
 <p>
      <textarea style="width:100%;" name="text"></textarea>
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

