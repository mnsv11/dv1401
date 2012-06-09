

<h1>Formulär och get-metoden</h1>
<form method="post" action="?p=kmom03_validate">
<fieldset>
<legend>Exempel på formulär med get-metoden</legend>
<p>
<label for="input1">Användarnamn:</label><br>
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




<p>Du anropade sidan med följande querystring:
<?php echo htmlentities($_SERVER['QUERY_STRING']); ?>
<p><code>$_GET</code> innehåller följande:</p>
<pre><?php print_r($_GET); ?></pre>
<p><code>$_POST</code> innehåller följande:</p>
<pre><?php print_r($_POST); ?></pre>

<?php
if(isset($_POST['account']))
{
	echo "<p>Kontot är definierat.</p>";
} 
else 
{
	echo "<p>Kontot är EJ definierat.</p>";
}
?>




