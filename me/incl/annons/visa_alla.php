<?php
//
// Set up the path and read the directory, store all files in array $files
//
$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);

?>

<h1>Visa alla annonser</h1>
<fieldset class=sqlfieldset>
<table>

  <tr>
    <th>Filnamn:</th>
    <th>Text:</th>
  </tr>
  
  <?php foreach($files as $val): ?>
  
  <tr>
    <td><?php echo $val; ?></td>
    <td><?php echo getFileContents($path . $val); ?></td>
  </tr>
  
  <?php endforeach; ?>

</table>
</fieldset>
