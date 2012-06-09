<?php

include("incl/config.php");
$title   = "Om";
$pageId = "om";

 include("incl/header.php"); ?>
<?php

//
// Read from database
//
$stmt = $db->prepare('SELECT * FROM About;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h2>Om begravningsmuseum online</h2>
  <fieldset>




  
  <?php foreach($res as $ad): ?>
  
  
   <p id="omsidan">
    <?php echo $ad['Text']; ?>
    </p>
  
  
  <?php endforeach; ?>


  </fieldset>
  <?php include("incl/byline.php"); ?>
<?php include("incl/footer.php"); ?>
