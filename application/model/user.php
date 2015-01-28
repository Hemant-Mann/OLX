<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class User extends DatabaseObject {
	
	protected static $table_name = "users";
	protected static $db_fields = ['id',  'first_name', 'last_name', 'phone', 'email', 'username', 'password'];
	public $id;
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $username;
	public $password;

	public $errors = [];

  	public function full_name() {
	    if(isset($this->first_name) && isset($this->last_name)) {
	      return $this->first_name . " " . $this->last_name;
	    } else {
	      return "";
	    }
 	}

	public static function authenticate($username="", $password="") {
	    global $database;
	    $user = self::find_by_username($username);
	    $password = $database->escape_value($password);

		if($user) {
		  if(password_check($password, $user->password)) {
		  	return $user;
		  } else {   
		  	return false; 	
		  }
		} else {
		  	return false;
		 }
	}

	public function password_encrypt($password) {
		$hash_format = "$2y$10$";  //tells PHP to use Blowfish with a "cost" of 10
		$salt_length = 22; //Blowfish salts should be 22-characters or more
		$salt = $this->generate_salt($salt_length);
		$format_and_salt = $hash_format. $salt;	
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}

	public function generate_salt($length) {
		//Not 100% unique, not 100% random, but good enought for a salt
		//MD5 returns 32 characters
		$unique_random_string = md5(uniqid(mt_rand(), true));
		
		//valid characters for a salt are [a-z A-Z 0-9 ./]
		$base64_string = base64_encode($unique_random_string);
		
		//but not '+' which is in base64 encoding
		$modified_base64_string = str_replace('+', '.', $base64_string);
		
		//Truncate string to the correct length
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}

	public function save() {
		// A new record won't have an id yet
		if(isset($this->id)) {
			// To update the description or price
			$this->update();
		} else {
			// Make sure there are no errors

			//Can't save if there are pre-existing errors
			if(!empty($this->errors)) { return false; }

			// Make any field is not empty
			if(empty($this->first_name)) {
				$this->errors[] = "Please provide a first name";
			} 

			if(empty($this->last_name)) {
				$this->errors[] = "Please provide a last name";
			} 

			if (empty($this->email)) {
				$this->errors[] = "Please provide an email";
			} 

			if(empty($this->phone)) {
				$this->errors[] = "Please provide phone number";
			} 

			if(empty($this->username)) {
				$this->errors[] = "Please fill a username of your choice";
			} 

			if (empty($this->password)) {
				$this->errors[] = "Please enter a password";
			} 

			// Check lengths
			if(strlen($this->first_name) > 30) {
				$this->errors[] = "The length of first name should be less than 30 characters";
			} 

			if(strlen($this->last_name) > 30) {
				$this->errors[] = "Last name can only be 30 characters long";
			} 

			if(strlen($this->username) > 30) {
				$this->errors[] = "Username can only be 30 characters long";
			} 

			if(strlen($this->phone) != 10) {
				$this->errors[] = "Please provide a 10 digit phone number";
			} 

			global $database;

			// Check if the phone number exists in the DB
			$safe_phone = $database->escape_value($this->phone);
			$sql = "SELECT * FROM users ";
			$sql .= "WHERE phone = '{$safe_phone}' ";
			$result_set = self::find_by_sql($sql);
			$user = array_shift($result_set);
			if(!empty($user)) {
				if($user->phone === $safe_phone) {
					$this->errors[] = "Please enter a different phone number";
				}
			}

			// Check if the email already exists in the database;
			$safe_email = $database->escape_value($this->email);
			$sql = "SELECT * FROM users ";
			$sql .= "WHERE email = '{$safe_email}' ";
			$result_set = self::find_by_sql($sql);
			$user = array_shift($result_set);
			if(!empty($user)) {
				if($user->email === $safe_email) {
					$this->errors[] = "Please try with a different email id";
				}
			}

			// Check if the username already exists in the database;
			$safe_username = $database->escape_value($this->username);
			$sql = "SELECT * FROM users";
			$sql .= " WHERE username = '{$safe_username}' ";
			$result_set = self::find_by_sql($sql);
			$user = array_shift($result_set);
			if(!empty($user)) {
				if($user->username === $safe_username) {
					$this->errors[] = "Please try with a different username";
				}
			}

			if(empty($this->errors)) {
				// No errors create a user
				$this->create();
				return true;
			} else {
				return false;
			}

		}
	}  


}
	


?>