<?php
$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);

$filename = null;
$isWritable = null;
if(isset($_POST['file']) && in_array($_POST['file'], $files))
{
  $filename = $path . $_POST['file'];
  if(is_Writable($filename))
  {
  	  $isWritable = true;
  }
  else
  {
	$isWritable = false;
  }
}

//sparar när man trycker på spara knappen
if(isset($_POST['doSave'])) {
  $res = putFileContents($filename, strip_tags($_POST['Content'], "<b><i><p><img>"));
}

//Create a select/option-list based on the content of the array $stylesheets
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

<h1>Uppdatera annonsen</h1>

<p>Välj den annons som du vill ändra</p>

<form method="post">
  <fieldset class=sqlfieldset>
    <!-- <legend>Editera Stylesheet</legend> -->
    <p>
      <?php echo $select; ?>
    </p>
       
    <p>
   	 <textarea style="width:95%;" name="Content"><?php if($filename) echo getFileContents($filename); ?></textarea>
    </p>
     <p>
     	 <input type="submit" name="doSave" value="Spara" <?php if(!$isWritable)echo"disabled";?>>
      	 <input type="reset" value="Ångra">
    </p>
        <?php if($isWritable === false): ?>
    <p class="info">Filen är ej skrivbar.</p>
    <?php endif; ?>
    
<?php if(isset($res)): ?>
    <p>
      <output class="success"><?php echo $res ?></output>    
    </p>
    <?php endif; ?>

   


    
  </fieldset>
</form>


 

