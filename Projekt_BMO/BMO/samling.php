<?php
include("incl/config.php");

$title   = "Bildgalleri";
$pageId = "samling";
 include("incl/header.php"); ?>
 
<?php
//
// Read from database
//
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Bildgalleri</h2>
  <fieldset>
<table>

  
  <?php foreach($res as $ad): ?>
  
  <tr>
   <td> 
    <a href= "<?php echo $ad['imageResize']; ?>" rel="lightbox" title="my caption"><img src="<?php echo $ad['image']; ?>" alt=""></a>
    <br><strong>Kategori:</strong> <?php echo $ad['category']; ?>
    <br><strong>Titel:</strong> <?php echo $ad['title']; ?>
    <br><strong>Beskrivning:</strong> <?php echo $ad['text']; ?>
    <br><strong>Ägare:</strong> <?php echo $ad['owner']; ?>
   </td>
  </tr>
  
  <?php endforeach; ?>

</table>
  </fieldset>
<?php include("incl/footer.php"); ?>
