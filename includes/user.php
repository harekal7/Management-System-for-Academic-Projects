<?php

require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {
	
	protected static $table_name="users";
	protected static $db_fields = array('id', 'email', 'oauth_uid', 'oauth_provider', 'username', 'first_name', 'last_name' ,'mobile', 'pic', 'street1', 'street2', 'city', 'state', 'zip_code', 'country', 'status', 'info', 'skill_file', 'reputations');
	
	public $id;
	public $email;
	public $oauth_uid;
	public $oauth_provider;
	public $username;
	public $first_name;
	public $last_name;
	public $mobile;
	public $pic;
	public $street1;
	public $street2;
	public $city;
	public $state;
	public $zip_code;
	public $country;
	public $status;
	public $info;
	public $skill_file;
	public $reputations;
	public $friends;
	public $profile;
	
  	public static function full_name() {
    		if(isset($this->first_name) && isset($this->last_name)) {
      		return $this->first_name . " " . $this->last_name;
    		} else {
      		return "";
    		}
  	}


	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  	}
  
  	public static function find_by_id($id=0) {
    		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  	}
  
  	public static function find_by_sql($sql="") {
    		global $database;
    		$result_set = $database->query($sql);
    		$object_array = array();
    		while ($row = $database->fetch_array($result_set)) {
      			$object_array[] = self::instantiate($row);
    		}
    		return $object_array;
  	}
  	

	public static function count_all() {
	  	global $database;
	  	$sql = "SELECT COUNT(*) FROM ".self::$table_name;
    		$result_set = $database->query($sql);
	  	$row = $database->fetch_array($result_set);
    		return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    		$object = new self;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
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
	  	// We don't care about the value, we just want to know if the key exists
	  	// Will return true or false
	  	return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  	$attributes = array();
	  	foreach(self::$db_fields as $field) {
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
	  	foreach($this->attributes() as $key => $value){
	    	$clean_attributes[$key] = $database->escape_value($value);
	  	}
	  	return $clean_attributes;
	}
	
	public function save() {
	  	// A new record won't have an id yet.
	  	return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	  	$sql = "INSERT INTO ".self::$table_name." (";
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
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  	$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
	  	$database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  	$sql = "DELETE FROM ".self::$table_name;
	  	$sql .= " WHERE id=". $database->escape_value($this->id);
	  	$sql .= " LIMIT 1";
	  	$database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update() 
		// after calling $user->delete().
	}
	
	public static function checkUser($user_profile) 
	{
		global $db;
		$result = $db->query("SELECT * FROM users WHERE oauth_uid='{$_SESSION['user_id']}' and oauth_provider='facebook' LIMIT 1");
		$result_array = $db->fetch_array($result);
		
		if (empty($result_array))		#user not present. Insert a new Record
		{
			$query = $db->query("INSERT INTO users (oauth_provider,oauth_uid,username,first_name,last_name,email) VALUES ('facebook', '{$_SESSION['user_id']}', '{$user_profile['name']}','{$user_profile['first_name']}','{$user_profile['last_name']}','{$user_profile['email']}')");
			
			$url = "https://graph.facebook.com/".$_SESSION['user_id']."/picture";
			$img = 'profile_pic/'.$db->insert_id();
			file_put_contents($img, file_get_contents($url));
			
			$query = $db->query("UPDATE users SET pic ='{$img}' WHERE users.oauth_uid = '{$_SESSION['user_id']}'");
			$result = $db->query("SELECT * FROM users WHERE oauth_uid ='{$_SESSION['user_id']}' and oauth_provider='facebook' LIMIT 1");
			$result_array = $db->fetch_array($result);
		}
		return $result_array;
	}
	
	public static function gplus_login($user_profile) 
	{
		global $db;
		$result = $db->query("SELECT * FROM users WHERE oauth_uid='{$user_profile['id']}' and oauth_provider='gplus' LIMIT 1");
		$result_array = $db->fetch_array($result);
		
		if (empty($result_array))		#user not present. Insert a new Record
		{
			$query = $db->query("INSERT INTO users (oauth_provider,oauth_uid,username,first_name,last_name,email) VALUES ('gplus', '{$user_profile['id']}', '{$user_profile['displayName']}','{$user_profile['displayName']}','{$user_profile['displayName']}','{$user_profile['emails'][0]}')");
			$_SESSION['birthday'] = $user_profile['birthday'];
			$_SESSION['nickname'] = $user_profile['nickname'];
			$_SESSION['currentLocation'] = $user_profile['currentLocation'];
			$_SESSION['id'] = $user_profile['id'];
			$_SESSION['kind'] = $user_profile['kind'];
			$_SESSION['middleName'] = $user_profile['middleName'];

			//$url = substr($user_profile['image']['url'],0,stripos($user_profile['image']['url'],'?sz=')."?sz=200");
			$url = $user_profile['image']['url'];
			$img = 'profile_pic/'.$db->insert_id();
			file_put_contents($img, file_get_contents($url));
			
			$query = $db->query("UPDATE users SET pic ='{$img}' WHERE users.oauth_uid = '{$user_profile['id']}'");
			$result = $db->query("SELECT * FROM users WHERE oauth_uid ='{$user_profile['id']}' and oauth_provider='gplus' LIMIT 1");
			$result_array = $db->fetch_array($result);
		}
		return $result_array;
	}
	
	public static function tt_login($user_profile) 
	{
		global $db;
		$result = $db->query("SELECT * FROM users WHERE oauth_uid='{$user_profile->id}' and oauth_provider='twitter' LIMIT 1");
		$result_array = $db->fetch_array($result);
		
		if (empty($result_array))		#user not present. Insert a new Record
		{
			$query = $db->query("INSERT INTO users (oauth_provider,oauth_uid,username,first_name,last_name,email) VALUES ('twitter', '{$user_profile->id}', '{$user_profile->name}','{$user_profile->first_name}','{$user_profile->last_name}','{$user_profile->email}')");
			
			$url = "http://api.twitter.com/1/users/profile_image?screen_name=".$user_profile->screen_name."&size=original";
			$img = 'profile_pic/'.$db->insert_id();
			file_put_contents($img, file_get_contents($url));
			
			$query = $db->query("UPDATE users SET pic ='{$img}' WHERE users.oauth_uid = '{$user_profile->id}'");
			$result = $db->query("SELECT * FROM users WHERE oauth_uid ='{$user_profile->id}' and oauth_provider='twitter' LIMIT 1");
			$result_array = $db->fetch_array($result);
		}
		return $result_array;
	}


}

?>
