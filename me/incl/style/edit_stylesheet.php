<?php
$pathToStyles = dirname(__FILE__) . "/../../style/";
$stylesheets = readDirectory($pathToStyles);

$filename = null;
if(isset($_POST['stylesheet']) && in_array($_POST['stylesheet'], $stylesheets))
{
  $filename = $pathToStyles . $_POST['stylesheet'];
}
//kollar om en fil är skrivbar
$filename = null;
$isWritable = null;
if(isset($_POST['stylesheet']) && in_array($_POST['stylesheet'], $stylesheets))
{
  $filename = $pathToStyles . $_POST['stylesheet'];
  if(is_writable($filename)) 
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
  $res = putFileContents($filename, strip_tags($_POST['styleContent']));
}

//Create a select/option-list based on the content of the array $stylesheets
$select = "<select id='input1' name='stylesheet' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj stylesheet</option>";
foreach($stylesheets as $val) 
{
  $selected = "";
  if(isset($_POST['stylesheet']) && $_POST['stylesheet'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";

?>

<h1>Editera stylesheet</h1>

<p>Välj den stylesheet som du vill ändra</p>

<form method="post">
  <fieldset>
    <!-- <legend>Editera Stylesheet</legend> -->
    <p>
      <label for="input1">Stylesheet</label><br>
      <?php echo $select; ?>
    </p>
       
    <p>
   	 <textarea style="width:100%;" name="styleContent"><?php if($filename) echo getFileContents($filename); ?></textarea>
    </p>
     <p>
     	 <input type="submit" name="doSave" value="Spara" <?php if(!$isWritable)echo"disabled";?>>
      	 <input type="reset" value="Ångra">
    </p>
        <?php if($isWritable === false): ?>
    <p class="info">Filen är ej skrivbar.</p>
    <?php endif; ?>
    
<?php if(isset($resFromSave)): ?>
    <p>
      <output class="success"><?php echo $resFromSave ?></output>    
    </p>
    <?php endif; ?>

        
    <p class="quiet small"><em>
      <?php 
      if(isset($_SESSION['stylesheet']))
      {
        echo "Din nuvarande [aktiva] stylesheet är '{$_SESSION['stylesheet']}'.";
      }
      else
      {
        echo "Du använder webbplatsens standard stylesheet.";
      }
      ?>
    </em></p>


    
  </fieldset>
</form>


 

