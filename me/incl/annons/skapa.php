<?php
//
// Set up the path and read the directory, store all files in array $files
//
$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);


//
// Check if Create-button was pressed, create a new file. Do some checks before actually
// creating the file.
//
if(isset($_POST['doCreate'])) {
  $filename = $path . basename(trim(strip_tags($_POST['filename'])));
  if(empty($_POST['filename']))
  {
    $res = "Filen skapades ej, filnamnet kan ej vara tomt. Välj ett annat filnamn.";
  }
  else if(is_file($filename)) 
  {
    $res = "Filen skapades ej, den finns redan. Välj ett annat filnamn.";
  }
  else 
  {
    file_put_contents($filename, null);
    $res = "Filen skapades.";
    $files = readDirectory($path);
  }
}


//
// Create a select/option-list based on the content of the array $files
// 
$select = "<select multiple id='input1' name='file'>";
foreach($files as $val) 
{
  $select .= "<option value='{$val}'>{$val}</option>";
}
$select .= "</select>";


?>

<h1>Lägg till annons</h1>

<p>Ange ett nytt namn på en annons.</p>

<form method="post">
  <fieldset class=sqlfieldset>
    <p>
      <label  for="input1">Befintliga annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <label for="input2">Ny annons:</label><br>
      <input id="input2" name="filename">
    </p>    
    
    <p>
      <input type="submit" name="doCreate" value="Skapa">
      <input type="reset" value="Ångra">
    </p>
        
    <?php if(isset($res)): ?>
    <p><output class="info"><?php echo $res ?></output></p>
    <?php endif; ?>
        

  </fieldset>
</form>
