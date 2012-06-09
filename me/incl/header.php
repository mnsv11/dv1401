<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    
    <!-- links to external stylesheets -->
<?php if(isset($_SESSION['stylesheet'])): ?>
  <link rel="stylesheet" href="style/<?php echo $_SESSION['stylesheet']; ?>">  
<?php else: ?>
  <link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet">
  <link rel="stylesheet" href="style/stylesheetred.css" title="Red stylesheet">
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

	<nav class="related">
	<a href="http://www.google.se" target="_blank">Google</a>
	</nav>
</header>

<div class=wrap>

	<!-- Header -->
<header id="top">
	
	<div id="bild">
		<img src="bilder/logo.jpg" alt="htmlphp logo" width=210 height=70>
	</div>

	<!-- Main navigation menu -->
  <nav class="navmenu">
    <a id="me-"     href="me.php">Me</a>
    <a id="report-" href="report.php">Redovisning</a>
    <a id="test-" href="test.php">Test</a>
    <a id="style-" href="style.php">Style</a>
    <a id="annons-" href="annons.php">Annonser</a>
    <a id="annonssql-" href="annonsSql.php">Annonser med sql</a>
    <a href="http://www.student.bth.se/~mnsv11/dv1401/Projekt_BMO/BMO/main.php" target= _blank>Projekt</a>
    <a id="source-"  href="viewsource.php">Källkod</a>
  </nav>

	
	
</header>







