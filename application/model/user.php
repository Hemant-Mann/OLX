<?php

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

	private $required_fields = ['first_name', 'last_name', 'phone', 'email', 'username', 'password'];
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
	    if($result_set = self::find_by_field("username",$username)) {
			$user = array_shift($result_set);
		} else {
			$user = false;
		}
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
			return $this->update();
		} else {
			// Make sure there are no errors

			//Can't save if there are pre-existing errors
			if(!empty($this->errors)) { return false; }

			// Check if any required field is empty
			foreach($this->required_fields as $field) {
				if(empty($this->{$field})) {
					$this->errors[] = "Please fill the required fields";
					return false;
				} else {
					// Nothing is empty so check the lengths
					if($field == 'phone') {
						if(strlen($this->{$field}) != 10) {
							$this->errors[] = "Please provide a 10 digit phone number";
						}
					} elseif($field == 'email') {
						if(strlen($this->{$field}) > 255) {
							$this->errors[] = "Email can only be 255 characters long";
						}
					} elseif($field == 'password') {

					} else {
						if(strlen($this->{$field}) > 30) {
							$this->errors[] = "Max length of the {$field} is 30 characters";
						}
					}
				}
			} 

			global $database;

			// Check if the phone number exists in the DB
			if($result_set = self::find_by_field("phone", $this->phone)) {
				$user = array_shift($result_set);
				if($user->phone === $this->phone) {
					$this->errors[] = "Please enter a different phone number";
				}
			}

			// Check if the email already exists in the database;
			if($result_set = self::find_by_field("email", $this->email)) {
				$user = array_shift($result_set);
				if($user->email === $this->email) {
					$this->errors[] = "Please try with a different email id";
				}
			}

			// Check if the username already exists in the database;
			if($result_set = self::find_by_field("username", $this->username)) {
				$user = array_shift($result_set);
				if($user->username === $this->username) {
					$this->errors[] = "Please try with a different username";
				}
			}

			if(empty($this->errors)) {
				// No errors create a user
				return $this->create();
			} else {
				return false;
			}

		}
	}  

}
	
?>
