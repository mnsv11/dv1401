<?php
$stylesheets = readDirectory(dirname(__FILE__) . "/../../style/");

$select = "<select id='input1' name='stylesheet' onchange='form.submit();'>";
$select .= "<option value='-1'>Webbplatsens standard stylesheet</option>";
foreach($stylesheets as $val) 
{
  $selected = "";
  if(isset($_SESSION['stylesheet']) && $_SESSION['stylesheet'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";


?>

<h1>Välj stylesheet</h1>

<p>Välj den stylesheet som du vill använda.</p>

<form method="post" action="?p=choose_stylesheet_process">
  <fieldset>
    <!-- <legend>Välj Stylesheet</legend> -->
    <p>
      <label for="input1">Stylesheet:</label><br>
      <?php echo $select; ?>
    </p>
    
    <p>
      <?php 
      if(isset($_SESSION['stylesheet']))
      {
        echo "Din nuvarande stylesheet är '{$_SESSION['stylesheet']}'.";
      }
      else
      {
        echo "Du använder webbplatsens standard stylesheet.";
      }
      ?>
    </p>

  </fieldset>
</form>


 

