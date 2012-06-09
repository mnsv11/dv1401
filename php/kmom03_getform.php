<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>PHP</title>
</head>

<h1>Formulär och get-metoden</h1>
<form method="get" action="?">
<fieldset>
<legend>Exempel på formulär med get-metoden</legend>
<p>
<label for="input1">Användarkonto:</label><br>
<input id="input1" class="text" type="text" name="account">
</p>
<p>
<label for="input2">Lösenord:</label><br>
<input id="input2" class="text" type="password" name="password">
</p>
<p>
<input type="submit" name="doLogin" value="Login">
</p>
</fieldset>
</form>


<h1> Visa innehållet i <code>$_GET</code></h1>
<p>Du anropade sidan med följande querystring:
<?php echo htmlentities($_SERVER['QUERY_STRING']); ?>
<p><code>$_GET</code> innehåller följande:</p>
<pre><?php print_r($_GET); ?></pre>







<hr>
<p>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
</p>
</html>
