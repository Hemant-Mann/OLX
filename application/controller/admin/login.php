<?php require_once $libpath = substr(str_replace('\\', '/', __dir__), 0, -28).'library/initialize.php'; ?>
<?php

if($session->is_logged_in()) {
  redirect_to(HOME."dashboard");
}

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
  $found_user = User::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
    redirect_to(HOME."dashboard");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }
  
} else { 
  // Form has not been submitted.
  $username = "";
  $password = "";
  $message = "";
}
include($dir_admin.'login.php');
?>