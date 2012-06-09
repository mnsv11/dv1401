<meta charset="utf8">


<?php
$arr = array("Col", 1,"Moped");		


echo "<table><tr><th>Värde</th></tr>"; //skriver ut överskriften på tabellen

foreach ($arr as $val) {		//loopar
	echo "<tr><td>$val</td></tr>" ;	//skriver ut innehåll i tabell
}
echo "</table>";			//avslutar tabell
   
?> 
<hr>

<table>
 <tr><th><?php echo $arr["foo"]; echo $arr[1];?></th><th>col2</th><th>col3</th></tr>
 <tr><td>data</td><td>data</td><td>data</td></tr>
 <tr><td>data</td><td>data</td><td>data</td></tr>
 <tr><td>data</td><td>data</td><td>data</td></tr>
</table>
<br/>



