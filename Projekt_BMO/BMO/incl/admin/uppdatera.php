<?php
$dbPath = dirname(__FILE__) . "/../../sql/bmo.sqlite";

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
  
  $ad[] = strip_tags($_POST["title"], $strip);
  $ad[] = strip_tags($_POST["category"], $strip);
  $ad[] = strip_tags($_POST["text"], $strip);
  $ad[] = strip_tags($_POST["owner"], $strip);
  $ad[] = strip_tags($_POST["image"], $strip);
  $ad[] = strip_tags($_POST["imageResize"], $strip);
   $ad[] = strip_tags($_POST["id"], $strip);

$stmt = $db->prepare("UPDATE Object SET title=?, category=?, text=?, owner=?, image=?, imageResize=? WHERE id=?");
  $stmt->execute($ad);


}


//
// Create a select/option-list of the ads
// 
$stmt = $db->prepare('SELECT id, * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' name='Object' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Objekt</option>";
foreach($res as $ad) {
  $selected = "";
  if(isset($_POST['Object']) && $_POST['Object'] == $ad['id']) {
    $selected = "selected";
    $current = $ad;
    }
  $select .= "<option value='{$ad['id']}' {$selected}>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";


?>

<h1>Administrera</h1>


<form method="post">
  <fieldset>
    <input type="hidden" name="id" value="<?php echo $current['id']; ?>">

    <p>
      <label for="input1">Sidans innehåll:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <label for="input2">Titel:</label><br>
      <input type="text" class="text" name="title" value="<?php echo $current['title']; ?>">
    </p>    
    
   <p>
      <label for="input3">Kategori:</label><br>
      <input type="text" class="text" name="category" value="<?php echo $current['category']; ?>">
    </p> 
    
    <p>
      <label for="input4">Bild:</label><br>
      <input type="text" class="text" name="image" value="<?php echo $current['image']; ?>">
    </p> 
    
    <p>
      <label for="input5">Bild Stor:</label><br>
      <input type="text" class="text" name="imageResize" value="<?php echo $current['imageResize']; ?>">
    </p> 
            <p>
      <label for="input6">Ägare:</label><br>
      <input type="text" class="text" name="owner" value="<?php echo $current['owner']; ?>">
    </p>
    
    <p>
      <textarea style="width:100%;" name="text"><?php echo $current['text']; ?></textarea>
    </p>    
    

    
    
    <p>
      <input type="submit" name="doSave" value="Spara" <?php if(!isset($current['id'])) echo "disabled";  ?>>
      <input type="reset" value="Ångra">
    </p>

    <?php if(isset($output)): ?>
    <p><output class="success"><?php echo $output; ?></output></p>
    <?php endif; ?>
        
  </fieldset>
</form>            

 

