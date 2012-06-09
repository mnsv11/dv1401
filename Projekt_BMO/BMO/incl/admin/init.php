<?php
//
// Set up the path and read the directory, store all files in array $files
//
$dbPath = dirname(__FILE__) . "/../../sql/bmo.sqlite";

?>

<h1>Initiera och kontrollera annonsdatabasen</h1>

<fieldset class=sqlfieldset>
<p>Alla filer sparas i katalogen:<br> <code><?php echo dirname($dbPath); ?></code></p>

<?php if(is_writable(dirname($dbPath))): ?>
  <p class="success">Katalogen är skrivbar.</p>
<?php else: ?>
  <p class="alert">Katalogen är ej skrivbar. Skapa katalogen och gör den skrivbar.</p>
  <?php return; ?>
<?php endif; ?>
</fieldset>

<fieldset class=sqlfieldset>
<?php 
// Creating the database and initiating it with content
if(isset($_GET['create-database'])) {
  include(dirname(__FILE__) . "/init_database.php");
}
?>

<?php 
// Testing the connection with the database
// The $dbPath is defined in blokket2.php
if(is_file($dbPath)) {
  $db = new PDO("sqlite:$dbPath");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script
  echo "<p class='success'>Databasfilen <code>$dbPath</code> finns och kunde öppnas.</p>";
} else {
  echo "<p class='alert'>Databasfilen finns ej. <a href='?p=init&amp;create-database'>Klicka här för att skapa och initiera databasen</a>.</p>";
  return;
}
?>


<?php if(is_writable($dbPath)): ?>
  <p class="success">Databasfilen är skrivbar.</p>
<?php else: ?>
  <p class="alert">Databasfilen är ej skrivbar. Gör chmod 666 för att göra filen skrivbar.</p>
  <?php return; ?>
<?php endif; ?>
</fieldset>

