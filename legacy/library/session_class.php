<?php
class session_class{

	public $debug = null;
	//public $error = null;
	private $conf = null;
	
	public function __construct($redir = null, $force = false){
		/*
			$redir is used for when a browser has exceeded the time limit and then is redirected
			$force is used to bypass the redirection based on the session time limit.
				this is usefull when normal pages, that users are not required to refresh the pages
				for example, when you have someone that is logged in.
		*/
		@session_start();
		require_once('conf.php');
		/*$this->conf = 'conf.php';
		if(!file_exists($this->conf)){
			exit("Missing conf file");
		}else{
			require_once($this->conf);
		}
		*/
		//$this->debug = $this->loadThisClass('library/debug_class.php','debug_class',__FILE__,__LINE__);
		
		if(!$this->checkSession() && $force){
			$this->close("/");
		}
	}
	
	public function checkSession($redir = false, $location = null, $tl = 3600){
		if(!isset($_SESSION['start_time'])){
			$_SESSION = array(
				'start_time'	=> date("U"),
				'end_time'		=> date("U")+$tl,
				'right_now'		=> date("U"),
				'email'			=> 'null',
			);
		}else{
			settype($_SESSION['end_time'],'integer');
			settype($_SESSION['right_now'],'integer');
			$right_now = date("U");
			settype($right_now,'integer');
			
			if($_SESSION['end_time'] < $right_now){
				return array(0=>'error',1=>__EXCEED_SESSION_TIME__);
			}
			$_SESSION['right_now'] = date("U");
			$_SESSION['end_time'] = date("U")+$tl;
		}
		return true;
	}
	
	public function loadFile($filename = null, $FILE = __FILE__, $LINE = __LINE__, $disError = true){
		/*
			We are allowed to skip this file if it doesn't exist.
		*/
		if($filename == null){
			if($disError){
				print("<b>Missing filename for require() from $FILE on #$LINE</b><br>");
			}
		}else{
			// we sqaush the warning if the file doesn't exists.
			include($filename);
		}
		return true;
	}
	
	public function loadThisClass($filename = null, $classname = null, $FILE = __FILE__, $LINE = __LINE__, $disError = true){
		if($filename == null) {
			if($disError){
				print("<b>Missing filename for loadThisClass() from $FILE on #$LINE</b><br>");
			}
			return array(0=>'error',1=>"No Filename received FILE :: $FILE on LINE # $LINE");
		}
		if($classname == null){
			if($disError){
				print("<b>Missing classname for loadThisClass() from $FILE on #$LINE</b><br>");
			}
			return array(0=>'error',1=>"No Filename received FILE :: $FILE on LINE # $LINE");
		}
		
		// we got here so we can do the checks now
		if(!file_exists(__ROOT__.'/'.$filename)){
			if($disError){
				print("<b>Missing $filename $FILE on #$LINE :: Cannot load class '$classname'</b><br>");
			}
			return array(0=>'error',1=>"Missing $filename file included from $FILE on # $LINE");
		}else{
			require_once(__ROOT__.'/'.$filename);	// always based this off the ROOT of the site.
			return new $classname();
		}
	}
	
	public function close($redir = "/"){
		print("<h1>I'm redirecting</h1>");// 
		printf("Target of redirection: %s<br />\n",$_SERVER['SERVER_NAME'].$redir);
		exit(print_r($_SESSION));
		$_SESSION=array();
		unset($_SESSION);
		session_destroy();
		header("Location: $redir");
		exit();
	}
	
	public function checkSessionEmailisNull(){
		if($_SESSION['email'] == 'null'){ return true; }
		return false;
	}
	
	public function set($var, $val){
		$_SESSION[$var] = $val;
	}
	public function get($var){
		return $_SESSION[$var];
	}
}
?>