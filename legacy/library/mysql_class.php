<?php
class mysql_class{

	public $db_conn = null;
	
	public function __construct($host = localhost, $username = '', $password = ''){
		$this->db_conn = mysql_connect($host, $username, $password);
		return $this->db_conn;
	}
	
	public function selectDB($dbname = null){
		return mysql_select_db($dbname);
	}
	
	public function old_error($msg = null){
		if($msg == null) { $msg = mysql_error(); }
		exit("ERROR : <br><b>$msg</b><br>");
	}
	
	public function getNumRecords($R) {
		return mysql_num_rows($R);
	}
	
	public function query($query = null){
		// technically, just querying will not return, so we just return the result_id
		return mysql_query($query,$this->db_conn) or $this->errorOut($query,mysql_error());
	}

	//$object_name->fetch()
	public function old_fetch($query = null){
		$R = $this->query($query);
		if($R){
			while($row = mysql_fetch_array($R)){
				$array[] = $row;
			}
			return $array;
		}else{
			return array(0=>'error',1=>'No results found');
		}
	}
	
	public function fetch($query = null) {
        $array = array();
		$Q = mysql_query($query,$this->db_conn) or $this->error($query);
        if(mysql_errno($this->db_conn)) { 
            $this->error($query); 
            exit(); 
        }
		while($row = mysql_fetch_object($Q)){
			$array[] = $row;
		}
		return $array;
	}
	
	public function returnRowNumsFromTableName($table_name = null){
		$SQL = "SELECT count(*) FROM $table_name;";
		return $this->fetch($SQL);
	}
	
	public function error($query_text = null){
        if($query_text) {
            $query_text = "attempted query: $query_text<br />";
        } else {
            $query_text = "";
        }
		exit(mysql_error($this->db_conn)."<br/>$query_text");
	}
	
	public function errorOut($sql = null, $errorMsg = null){
		print("SQL = $sql<br>$errorMsg");
		exit();
	}
	
}
