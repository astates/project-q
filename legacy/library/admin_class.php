<?php
class admin_class{

	public $debug = null;
	private $db = null
	
	public function __construct($redir = null, $force = false){
		require_once('conf.php');
		require_once(__LIBRARY__.'/mysql_class.php');
		$this->db = new mysql_class('localhost', array(__DB_NAME_PROD__,__DB_NAME_DEV__), __DB_USER__, __DB_PASS__);
		
		require_once(__LIBRARY__.'/debug_class.php');
		$this->debug = new debug_class();
	}
	
}
?>