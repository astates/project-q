<?php
class server_class{
	public $dev = 'dev';	// can override the default by setting this.
	public $test = 'test';
	//public $prod = 'prod'; //???
	
	public function __construct(){
		require_once('conf.php');
	}
	
	public function returnDatabaseNameBasedOnURL($pat = null){
		// use a pattern to override default functions (this is useful in unique development locations
		if($pat != null){
			$pattern = "/$pat/i";
			if(preg_match($pattern,$_SERVER['SERVER_NAME'])){
				return __DB_NAME_DEV__;
			}
		}
		// expand and check from the URL server name
		$v = explode('.',$_SERVER['SERVER_NAME']);
		switch($v[0]){
			case $this->dev : return __DB_NAME_DEV__; break;
			case $this->dev : return __DB_NAME_TEST; break;
			default : return __DB_NAME_PROD__; break;
		}
	}
	
	// print($server->returnConnectingIP());
	public function returnConnectingIP(){
		return $_SERVER['REMOTE_ADDR'];
	}
	
}
?>