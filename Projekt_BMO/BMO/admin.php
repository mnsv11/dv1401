<?php
include("incl/config.php");


if(!isset($_SESSION['authenticated']))//kollar om någon är inloggad
{
header('Location: http://www.disneyworld.se');
}

// Define style thats specific for this page
$pageStyle = '
figure { 
 border-bottom-right-radius: 5px;
 border-bottom-left-radius: 5px;
 border-color:#5C0A0A;
 box-shadow: 5px 5px 5px #8A0F0F;
}
';

$pageId = "admin";

$p = null;
if(isset($_GET["p"]))
{
	$p = $_GET["p"];
}

$path = "incl/admin";
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
    default:
    $title   = "Admin.";
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
    <hr>
  </article>
  
</div>
<?php include("incl/footer.php"); ?>
