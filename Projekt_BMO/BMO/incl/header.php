<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
 
 
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
    
    <!-- links to external stylesheets -->
<?php if(isset($_SESSION['stylesheet'])): ?>
  <link rel="stylesheet" href="style/<?php echo $_SESSION['stylesheet']; ?>">  
<?php else: ?>
  <link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet">
<?php endif; ?>

    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
    <link rel="SHORTCUT ICON" href="bilder/ring.ico" type="image/x-icon"/>
    
<!-- Each page can set $pageStyle to create additional style -->
<?php if(isset($pageStyle)) : ?>
 <style type="text/css">
   <?php echo $pageStyle; ?>
 </style>
<?php endif; ?>
    
     

    	
    <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
</head>

   <body<?php if(isset($pageId)) echo " id='$pageId' "; ?>>
                       
<!-- Above header -->
<header id="above">

	<!-- login & logout menu -->
	<?php echo userLoginMenu(); ?>

</header>

<div class=wrap>

	<!-- Header -->
<header id="top">
	
<h1 id="huvud">begravningsmuseum online</h1>

	<!-- Main navigation menu -->
  <nav class="navmenu">
    <a id="main-"     href="main.php">Startsida</a>
    <a id="artiklar-" href="artiklar.php">Artiklar</a>
    <a id="samling-" href="samling.php">Samlingar</a>
     <a id="om-"  href="om.php">Om</a>
     <a id="kontakt-" href="kontakt.php">Kontakt</a>
  
<?php echo "<form id=search method=get action=visa.php><label>Search: <input type=search name=search></label></form>"; ?>
	</nav>
	<?php include("search.php");?>
</header>







