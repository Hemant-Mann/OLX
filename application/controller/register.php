<?php require_once("../config/initialize.php"); ?>
<?php
if($session->is_logged_in()) {
  redirect_to(HOME."dashboard");
}

if(isset($_POST['submit'])) {
	
	global $database;
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $database->escape_value($_POST["password"]);
	
	$user = new User;
	
	$user->first_name = $first_name;
	$user->last_name = $last_name;
	$user->phone = $phone;
	$user->email = $email;
	$user->username = $username;
	$hash = $user->password_encrypt($password);
	$user->password = $hash;

	if($_POST["confirmation"] !== $_POST["password"]) {
		$user->errors[] = "Passwords don't match";
	}

	if($user->save()) {
		$message = "You are successfully registered!";
		$first_name = "";
		$last_name = "";
		$email = "";
		$phone = "";
		$username = "";
		$password = "";

	} else {
		$message = join("<br />", $user->errors);
	}	
} else {
	$first_name = "";
	$last_name = "";
	$email = "";
	$phone = "";
	$username = "";
	$password = "";
}
include('../view/register.php');
?>