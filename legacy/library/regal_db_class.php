<?php

class regal_db_class{
/*
	This class is used over-lay of the mysql_class
	we determine what DB we are using based on regalboats needs
*/
	private $mysql = null;
	public $year = null;
	public $nextyear = null;
	private $server = null;

	public function __construct(){
		require_once('conf.php');
		$this->year = date("Y");
		$this->nextyear = $this->year+1;
		require_once(__LIBRARY__.'/mysql_class.php');
		$this->mysql = new mysql_class(__DB_HOST__,__DB_USER__,__DB_PASS__);
		
		require_once(__LIBRARY__.'/server_class.php');
		$this->server = new server_class();
	
		$this->mysql->selectDB($this->server->returnDatabaseNameBasedOnURL());		
	}
		
	public function fetch($Q){
		$this->mysql->fetch($Q);
	}
		
	public function createDevDB(){
		// we create the new dev database for the next year models / website
		$SQL = "CREATE DATABASE regal".$this->nextyear."_dev";
		print($SQL);
		//$this->mysql->query($SQL);
	}
	public function createProdDB(){
		$SQL = "CREATE DATABASE regal".$this->nextyear."_prod";
		print($SQL);
		//$this->mysql->query($SQL);
	}
	
	public function populateNewProdDB(){
		// we create a dump of the existaning DB and populate the new db
		$SQL = "";
		//$this->mysql->query($SQL);
		print_R($SQL);
	}
	public function backUpCurrentDatabase(){
		$SQL = "backup db";
		//$this->mysql->query($SQL);
		print_r($SQL);
	}
}
?>