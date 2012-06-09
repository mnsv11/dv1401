<?php
// Was the form submitted? Then change current stylesheet in the session
if(isset($_POST['stylesheet'])) 
{
  if($_POST['stylesheet'] == '-1') 
  {
    unset($_SESSION['stylesheet']);
  } 
  else
  {
    $_SESSION['stylesheet'] = strip_tags($_POST['stylesheet']);
  }
}

// Example-code below, copied from the manual: http://php.net/manual/en/function.header.php
/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'style.php?p=choose_stylesheet';
header("Location: http://$host$uri/$extra");
exit;
