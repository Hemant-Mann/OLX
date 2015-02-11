<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('../config/config.php');

class DatabaseObject {

	protected static $table_name;

	public static function find_all() {
		return static::find_by_sql("SELECT * FROM ". static::$table_name);
  	}
  
    public static function find_by_id($id=0) {
    	global $database;
	    $result_array = static::find_by_sql("SELECT * FROM ". static::$table_name. 
	    	" WHERE id=". $database->escape_value($id)." LIMIT 1");
	  return !empty($result_array) ? array_shift($result_array) : false;
 	}
  
    public static function find_by_user_id($id=0) {
    	global $database;
	    $result_array = static::find_by_sql("SELECT * FROM ". static::$table_name. 
	    	" WHERE user_id=". $database->escape_value($id));

	  	return !empty($result_array) ? $result_array : false;
 	}

 	public static function find_by_field($field, $value) {
 		global $database;
 		$safe_value = $database->escape_value($id);
 		$result_array = static::find_by_sql("SELECT * FROM ". static::$table_name. 
	    	" WHERE {$field}='{$safe_value}'");
 		return !empty($result_array) ? $result_array : false;
 	}
 	
	public static function find_by_username($username="") {
		global $database;
		$safe_username = $database->escape_value($username);
		$sql = "SELECT * FROM ". static::$table_name;
		$sql .= " WHERE username = '{$safe_username}'";
		$result = static::find_by_sql($sql);

		return !empty($result) ? array_shift($result) : false;
	} 	

  	public static function find_by_sql($sql="") {
	    global $database;
	    $result_set = $database->query($sql);
	    $object_array = array();
	    while ($row = $database->fetch_array($result_set)) {
	       $object_array[] = static::instantiate($row);
	    }
	    return $object_array;
	}

	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ". static::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);		
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
   		 $class_name = get_called_class();
		 $object = new $class_name;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  // (incl. private ones!) as the keys and their current values as the value
	  $object_vars = $this->attributes();
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $object_vars);
	}
 
	protected function attributes() {
		// return an array of attribute keys and their values
		$attributes = array();
		foreach(static::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes() {
		global $database;
		$clean_attributes = array();
		// sanitize the values before submitting
		// Note: does not alter the actual value of each attribute
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes;
	}

	public function save() {
		// A new record won't have an id yet
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		// Don't forget your SQL syntax 
		$attributes = $this->sanitized_attributes();
		$sql  = "INSERT into ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";	
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql  = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
		$database->	query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		$sql = "DELETE from ".static::$table_name;
		$sql .= " WHERE id =". $database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false; 

	}

 	public static function search($keywords="") {
 		global $database;
 		$where = "";

 		$keywords = preg_split('/[\s]+/', $keywords);
 		$total_keywords = count($keywords);

 		foreach($keywords as $key=>$keyword) {
 			$where .= " name LIKE '%$keyword%'";
 			if($key !=($total_keywords - 1)) {
 				$where .= " AND ";
 			} 
 		}

 		$sql = "SELECT * FROM ". static::$table_name;
 		$sql .= " WHERE {$where}";

 		$result_array = static::find_by_sql($sql);
 		
 		return !empty($result_array) ? $result_array : null;

 	}


}

?>
