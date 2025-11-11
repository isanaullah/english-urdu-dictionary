<?php

/************************************************************************************
	Author		:	Rashid Hussain       											*	
	File Name 	:	db.class.php													*
************************************************************************************/
/************************************************************************************
																					*
	FUNCTIONS LIST:																	*
	function db_connect()	// connect to mysql server and select db				*
	function db_insert($table,$data)	// insert values into a table				*				
	function db_update($table,$date,$cond)	// update records of a table			*
	function db_select($table,$cond) 	// Select Table								*
																					*	
************************************************************************************/


class db_connect {

	// define a variable to switch on/off error messages
	protected $pdoDebug = true;

	public function __construct(string $host, string $db, string $user, string $pass){
		$this->host = $host;
		$this->db = $db;
		$this->user = $user;
		$this->pass = $pass;
	}
	
	/// METHOD FOR SERVER AND DATABASE CONNECTIVITY ///
	protected function connection(){
		try {
			$conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8", $this->user, $this->pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Set collation to handle mixed character encodings
			$conn->exec("SET NAMES utf8 COLLATE utf8_general_ci");
			$conn->exec("SET CHARACTER SET utf8");
			$conn->exec("SET collation_connection = utf8_general_ci");
			return $conn;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}	
	}

	/// METHOD FOR INSERTION DATA INTO DATABASE ///
	public function db_insert(string $table, array $data) {
		$db = $this->connection();

		$name = '(';
		$values = '(';
		foreach($data as $key=>$value){
			$name .=$key.",";
			$values .="':".$value."',";

			$execute[":".$key] = $value;
		}

		$name = rtrim($name, ',').')';
		$values = rtrim($values, ',').')';
		$sql = "INSERT INTO $table $name VALUES $values";

		$insert_query = $db->prepare($sql);
		$insert_query->execute($execute);
		
	}

	/// METHOD FOR SELECT DATA FROM DATABASEE WIDHOUT CONDITON ///
	public function db_select_all(string $field, string $table) {
		$db = $this->connection();

		$sql = "SELECT $field FROM $table";

		$select = $db->prepare($sql);
		$select->execute();

		$data['num'] = $select->rowCount();
		$data['row'] = $select->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
	}

	/// METHOD FOR SELECT All DATA FROM DATABASEE WITH CONDITON ///
	public function db_select_cond(string $field, string $table, string $cond, array $cond_value ) {
		$db = $this->connection();

		foreach($cond_value as $key=>$value){
			$execute[":".$key] = $value;
		}

		$sql = "SELECT $field FROM $table WHERE $cond";

		$select = $db->prepare($sql);
		$select->execute($execute);

		$data['row'] = $select->fetchAll(PDO::FETCH_ASSOC);
		$data['num'] = $select->rowCount();
		
		return $data;
	}

	/// METHOD FOR SELECT All DATA FROM DATABASEE WITH CONDITON ///
	public function db_fetch_single(string $field, string $table, string $cond, array $cond_value ) {
		$db = $this->connection();

		foreach($cond_value as $key=>$value){
			$execute[":".$key] = $value;
		}

		$sql = "SELECT $field FROM $table WHERE $cond";

		$select = $db->prepare($sql);
		$select->execute($execute);

		$data = $select->fetch(PDO::FETCH_ASSOC);
		$data['num'] = $select->rowCount();
		
		return $data;
	}

	/// METHOD FOR DELETE DATA INTO DATABASE ///
	public function db_delete(string $table, string $cond, array $cond_value ) {
		$db = $this->connection();

		foreach($cond_value as $key=>$value){
			$execute[":".$key] = $value;
		}

		$sql = "DELETE FROM $table WHERE $cond";

		$delete = $db->prepare($sql);
		$delete->execute($execute);
	}

	/// METHOD FOR UPDATE DATA IN DATABASE ///
	public function db_update(string $table, array $data, string $cond, array $cond_value) {
		$db = $this->connection();

		$u_values = '';
		foreach($data as $key=>$value){
			$u_values .=$key."=':".$value."',";
			$execute[":".$key] = $value;
		}
		$u_values = rtrim($u_values, ',');

		foreach($cond_value as $key=>$value){
			$u_values .="':".$value."',";

			$execute2[":".$key] = $value;
		}

		$executes = array_merge($execute, $execute2);

		$sql = "UPDATE $table SET $u_values $cond";

		$update_query = $db->prepare($sql);
		$update_query->execute($executes);
	}

	/// METHOD FOR UPDATE COUNTER ///
	public function db_update_counter(string $table, string $f, int $v, string $cond, array $cond_value ) {
		$db = $this->connection();

		foreach($cond_value as $key=>$value){
			$execute[":".$key] = $value;
		}

		$sql = "UPDATE $table SET $f=$v WHERE $cond";

		$update_query = $db->prepare($sql);
		$update_query->execute($execute);
	}



	function current_url(){
		echo $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	function get_page($name) {
		$page_name = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if ($page_name == $name) {
			echo 'class="active"';
		}
	}

	function get_active($pageslist) {
		$full_name = $_SERVER['PHP_SELF'];
		$name_array = explode('/',$full_name);
		$count = count($name_array);
		$page = $name_array[$count-1];
		echo in_array($page,$pageslist) ? 'class="active"' : '';
	}

} // end Class
?>