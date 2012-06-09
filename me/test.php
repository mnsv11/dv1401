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

$pageId = "test";

$p = null;
if(isset($_GET["p"]))
{
	$p = $_GET["p"];
}

$path = "incl/test";
$file = null;
if($p == "kmom03_get")
{
	$title = "kmom03_get";
	$file 	   = "kmom03_get.php";
}
else if($p == "kmom03_getform")
{
	$title = "kmom03_getform";
	$file 	   = "kmom03_getform.php";
}
else if($p == "kmom03_postform")
{
	$title = "kmom03_postform";
	$file 	   = "kmom03_postform.php";
}
else if($p == "kmom03_validate")
{
	$title = "kmom03_validate";
	$file 	   = "kmom03_validate.php";
}
else if($p == "kmom03_validate2")
{
	$title = "kmom03_validate2";
	$file 	   = "kmom03_validate2.php";
}
else if($p == "kmom03_server")
{
	$title = "kmom03_server";
	$file 	   = "kmom03_server.php";
}
else if($p == "kmom03_sessiondestroy")
{
	$title = "kmom03: Förstör sessionen";
	$file 	   = "kmom03_sessiondestroy.php";
	destroySession();
}
else if($p == "kmom03_sessionchange")
{
	$title = "kmom03_sessionchange";
	$file 	   = "kmom03_sessionchange.php";
}
else if($p == "kmom03_viewsession")
{
	$title = "kmom03_viewsession";
	$file 	   = "kmom03_viewsession.php";
}
else
{
	$title = "Test";
	$file      = "default.php";
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
