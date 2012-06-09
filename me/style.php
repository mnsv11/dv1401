<?php
include("incl/config.php");

// Define style thats specific for this page
$pageStyle = '
figure { 
 border-bottom-right-radius: 5px;
 border-bottom-left-radius: 5px;
 border-color:#5C0A0A;
 box-shadow: 5px 5px 5px #8A0F0F;
}
';

$pageId = "style";

$p = null;
if(isset($_GET["p"]))
{
	$p = $_GET["p"];
}

$path = "incl/style";
$file = null;
switch($p) 
{
  case "choose_stylesheet":
    $title   = "Välj Stylesheet";
    $file        = "choose_stylesheet.php";
    break;
  case "edit_stylesheet":
    $title   = "Editera Stylesheet";
    $file        = "edit_stylesheet.php";
    break;
  case "choose_stylesheet_process":
    include("$path/choose_stylesheet_process.php");
    break;
  default:
    $title   = "Välj style för webbplatsen.";
    $file        = "default.php";
}


?>

<?php include("incl/header.php"); ?>
<div id="content">
 <aside class="left" style="width:22%;">
    <?php include("$path/aside.php"); ?>
  </aside>
   <article class="right border justify-para" style="width:73%;">
    <?php include("$path/$file"); ?>
    <?php include("incl/byline.php"); ?>  
    <hr>
  </article>
  
</div>
<?php include("incl/footer.php"); ?>
