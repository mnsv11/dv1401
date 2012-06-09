<h1>Förstör sessionen</h1>

<p>Sessionen är nu förstörd.</p>

<p>Funktionen <code>destroySession()</code> används för att förstöra sessionen och anropas från 
filen <code>test.php</code>:</p>

<?php

$code = 'else if ($p == "kmom03_sessiondestroy") 
{
  $pageTitle = "kmom03: Förstör sessionen";
  $file = "kmom03_sessiondestroy.php";
  destroySession();
}

';
echo "<blockquote class='code'>\n" . htmlspecialchars($code, ENT_NOQUOTES, "UTF-8") . "</blockquote>";
?>

<p>Funktionen <code>destroySession()</code> hittar du i filen <code>src/common.php</code>: 
<a href="viewsource.php?dir=src&amp;file=common.php#file">viewsource.php?dir=src&amp;file=common.php#file</a>.</p>
 

