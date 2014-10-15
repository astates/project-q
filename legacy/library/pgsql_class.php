<?php

class pgsql_class{
	public $db_conn = null;
	public function __construct($host = localhost, $dbname = '', $user = '', $password = '', $port = '5432'){
		$this->db_conn = pg_connect("host=$host user=$user password=$password port=$port dbname=$dbname");
		return $this->db_conn;
	}

	public function fetch($query = null){
		$Q = pg_query($this->db_conn,$query);
		while($row = pg_fetch_object($Q)){
			$array[] = $row;
		}
		return $array;
	}

	public function query($query = null){
		pg_query($this->db_conn,$query) or die(pg_last_error().' '.pg_errormessage());
	}
	
	public function error(){
		exit(pg_error_message()."<br>".pg_last_error()."<br>");
	}
}
?>
