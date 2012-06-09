<?php session_start();?>
 
<meta charset="utf8">

<form method = post>
<br>
<label>Hur mycket är 12x2?: 
        <select name="input">
        <option>14</option>
        <option>24</option>
      </select>
      </label>
    <input type=submit>
 </form>
    
    
    
  <?php  
 
 error_reporting(-1);

 
  
if ($_POST["input"] == '14'){
    	$_SESSION["y"] += 1;
  }
  
if ($_POST["input"] == '24'){
    	    $_SESSION["x"] += 1;
  }
  	

echo "<pre>" , print_r($_SESSION , true),"</pre>";

?>

