<?php
//
// Set up the path and read the directory, store all files in array $files
//
$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);


//
// Check if Delete-button was pressed, delete the file. Do some checks before actually
// deleting the file.
//
if(isset($_POST['doDelete'])) {

  if(isset($_POST['file']) && in_array($_POST['file'], $files))
  {
    $filename = $path . $_POST['file'];
    unlink($filename);
    $files = readDirectory($path);
    $res = "Filen raderades.";    
  }
  else
  {
    $res = "Filen finns ej och kunde inte raderas.";    
  }
}


//
// Create a select/option-list based on the content of the array $files
// 
$select = "<select id='input1' name='file'>";
foreach($files as $val) 
{
  
  $select .= "<option value='{$val}'>{$val}</option>";
}
$select .= "</select>";


?>

<h1>Ta bort en annons</h1>

<p>Välj en annons och klicka knappen "Radera" för att ta bort annonsen.</p>

<form method="post">
  <fieldset class=sqlfieldset>
    <p>
      <label for="input1">Befintliga annonser:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <input type="submit" name="doDelete" value="Radera">
    </p>
        
    <?php if(isset($res)): ?>
    <p><output class="info"><?php echo $res ?></output></p>
    <?php endif; ?>
        

  </fieldset>
</form>

