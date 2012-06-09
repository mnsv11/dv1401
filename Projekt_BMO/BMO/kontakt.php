<?php
$title = "Kontakt";
$pageId = "kontakt";
include("incl/config.php");
include("incl/header.php");
?>
<h2>Kontakta oss </h2>
  <fieldset>
 

 
 
<form name="kontakt" method="post" action="formmail.php">
 Namn:<br>
 <input name="name" type="text" size="30">
 <br>
 Ämne:<br>
 <input name="subject" type="text" size="30">
 <br>
 email:<br>
 <input name="email" type="text" size="30">
 <br>
 Meddelande:<br>
 <textarea name="message" cols="30" rows="5"></textarea>
 <br>
 <br>
 <input name="submit" type="submit"
 value="Skicka meddelandet">
 </form>
 

 
  </fieldset>
<?php include("incl/footer.php"); ?>
