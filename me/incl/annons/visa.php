<?php
//
// Set up the path and read the directory, store all files in array $files
//
$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);


//
// Check that the filename is valid by checking that it exists in the $files array.
//
$filename = null;
if(isset($_POST['file']) && in_array($_POST['file'], $files))
{
  $filename = $path . $_POST['file'];
}


//
// Create a select/option-list based on the content of the array $files
// 
$select = "<select id='input1' name='file' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Annons</option>";
foreach($files as $val) 
{
  $selected = "";
  if(isset($_POST['file']) && $_POST['file'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";


?>

<h1>Visa annons</h1>

<p>Välj den annons som du vill visa.</p>

<form method="post">
  <fieldset class=sqlfieldset>
    
      <label for="input1">Annonser:</label><br>
      <?php echo $select; ?>
    
    
    
      <div style="background:#eee; border:1px solid #999;padding:1em;">
        <p><?php if($filename) echo getFileContents($filename); ?></p>
      </div>
        
    
  </fieldset>
</form>
 

