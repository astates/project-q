<?php
class user_class{

	public $debug = null;
	private $db = null;
	
	public function __construct($redir = null, $force = false){
		require_once('conf.php');
		require_once(__LIBRARY__.'/mysql_class.php');
		$this->db = new mysql_class('localhost', __DB_USER__, __DB_PASS__);
		
		require_once(__LIBRARY__.'/server_class.php');
		$this->server = new server_class();
		$this->db->selectDB($this->server->returnDatabaseNameBasedOnURL('netpassbuildcenter'));
		
		require_once(__LIBRARY__.'/debug_class.php');
		$this->debug = new debug_class();
	}
	
	public function getUserNameFromEmailAddress($email){
		$SQL = "SELECT username FROM users WHERE email = '$email';";
		$R = $this->db->fetch($SQL);
		return $R;
	}
	
}
?>