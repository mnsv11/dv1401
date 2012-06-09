<h1>Ändra värden i sessionen</h1>
<p>I denna fil finns PHP-kod för att läsa och sätta värden i sessionen. Kör denna sida, 
visa sedan innehållet i sessionen, kör därefter denna sidan igen och studera därefter hur sessionen ändrats.</p>

<?php
$_SESSION['me'] = "dbwebb.se";

if(isset($_SESSION['counter'])) {
  $_SESSION['counter'] = $_SESSION['counter'] + 1;
}
else
{
  $_SESSION['counter'] = 1;
}

