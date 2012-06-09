<h1>Visa innehållet i <code>$_SERVER</code></h1>

<p>Länken till denna sidan:<br>
<a href="<?php echo getCurrentUrl(); ?>"><?php echo getCurrentUrl(); ?></a></p>

<hr>          
<p><code>$_SERVER</code> innehåller följande:</p>
<div style="overflow:auto;">
<pre><?php echo htmlentities(print_r($_SERVER,true)); ?></pre>
</div>


