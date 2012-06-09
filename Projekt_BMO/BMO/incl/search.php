<?php 


$dbPath = dirname(__FILE__) . "/../sql/bmo.sqlite";
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script




if(isset($_GET['search']) && !empty($_GET['search'])) {
  $dbs = "%" . $_GET['search'] . "%"; //sätter ihop % och det man söker på
  $stmt = $db->prepare("SELECT * FROM Object WHERE title LIKE ? OR category = ?;");
 
 //echo "<p>Executing SQL statement:<pre>" . $stmt->queryString . "</pre>";
  $stmt->execute(array($dbs , $dbs));
  
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  $rowCount = count($res);
  if($rowCount == 0){
  echo "<p>Inga resultat";
  }
  if($rowCount > 0) {
  	      ?>
  	      
    <h2>Sökresultat</h2>
    <?php
    echo "<fieldset><table style='border:1px solid #999'>";
        
    // Get all rows, one by one

    foreach($res AS $val1) { ?>
  
   <tr>
   <td> 
    <a href= "<?php echo $val1['imageResize']; ?>" rel="lightbox"><img src="<?php echo $val1['image']; ?>" alt=""></a>
    <br><strong>Kategori:</strong> <?php echo $val1['category']; ?>
    <br><strong>Titel:</strong> <?php echo $val1['title']; ?>
    <br><strong>Beskrivning:</strong> <?php echo $val1['text']; ?>
    <br><strong>Ägare:</strong> <?php echo $val1['owner']; ?>
   </td>
  </tr>
  
 <?php 
    }
    echo "</table></fieldset>";
  }
}
                         
?>

      



