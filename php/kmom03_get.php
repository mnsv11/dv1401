<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>PHP</title>
</head>



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
