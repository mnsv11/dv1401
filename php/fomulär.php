<meta charset="utf8">

<form class=form method=post> 

  <fieldset>
    <legend>legend</legend>
    <label for="input1">Användarnamn:</label>
    <input id="input1" class="usernam" type="text" name="username">
    
    <label for="input2">Lösenord:</label>
    <input id="input2" class="text" type="password" name="password">
 
    <label>select: 
        <select name="input3">
        <option>ett</option>
        <option>två</option>
        <option>tre</option>
      </select>
      </label>
    <input type=submit>
  </fieldset>
</form>




<pre><?php print_r($_POST); ?></pre>
