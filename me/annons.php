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


$pageId = "annons";

$p = null;
if(isset($_GET["p"]))
{
	$p = $_GET["p"];
}

$path = "incl/annons";
$file = null;
switch($p) 
{
  case "init":
    $title   = "Init";
    $file        = "init.php";
    break;
    case "uppdatera":
    $title   = "uppdatera";
    $file        = "uppdatera.php";
    break;
    case "skapa":
    $title   = "skapa";
    $file        = "skapa.php";
    break;
    case "tabort":
    $title   = "tabort";
    $file        = "delete.php";
    break;
    case "visa":
    $title   = "visa";
    $file        = "visa.php";
    break;
    case "visa_alla":
    $title   = "visa_alla";
    $file        = "visa_alla.php";
    break;
  default:
    $title   = "Anonser.";
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
