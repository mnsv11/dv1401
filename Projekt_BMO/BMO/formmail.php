<?php
 
// anger en variabel som kan lagra de eventuella felaktigheterna
 $errors = array();
 
// kontrollera om ett Namn angivits
 if (!$_POST["name"])
 $errors[] = "- ditt namn";
 
// kontrollera om ett Ämne angivits
 if (!$_POST["subject"])
 $errors[] = "- ärende i ämnesraden";
 
// kontrollera om en e-postadress angivits
 if (!$_POST["email"])
 $errors[] = "- din epostadress";
 
// kontrollera om ett Meddelande angivits
 if (!$_POST["message"])
 $errors[] = "- inget meddelande har skrivits!";
 
// om felaktig information finns visas detta meddelande
 if (count($errors)>0){
 echo "<strong>Följande information måste anges innan du kan skicka formuläret:</strong><br />";
 
foreach($errors as $error_message)
 echo "$error_message <br />";
 echo "<br />Ange den information som saknas och skicka formuläret igen. Tack! <br />";
 echo "<a href='javascript:history.go(-1)'>klicka här för att komma tillbaka till formuläret</a>";
 }
 
else {
 // formuläret är korrekt ifyllt och informationen bearbetas
 $to = "m.svedklint@telia.com";
 $from = $_POST["email"];
 $subject = $_POST["subject"];
 $name = $_POST["name"];
 $message = $_POST["message"];
 
if (mail($to, $subject, $message ,"From: $name <$from>"))
 echo nl2br("<h2>Ditt meddelande har skickats!</h2>
 <b>mottagare:</b> $to
 <b>ämne:</b> $subject
 <b>meddelande:</b>
 $message
 ");
 
     else
      echo "Det gick inte att skicka ditt meddelande";
 }
 
?>

