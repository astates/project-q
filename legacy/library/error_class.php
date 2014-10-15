<?php

class debug_class{

	public $TO = null;
	public $CC = null;
	
	public function __construct($to ='errors@netpass.com', $cc = null){
		$this->TO = $to;
		$this->CC = $cc;
	}
	
	public function errorOut(){
	}
	
	public function display($var = null, $title = null, $stop = false){
		if($var == null){
			print("<b>Error occured attempting to display debug variable</b><br>");
			return false;
		}
		
		
		?><pre style="border: 1px solid black; background-color: #CCCCCC;"><?php
		if($title != null){
			print("<h2>$title</h2>");
		}
		print_r($var);
		?></pre><?php
		
		if($stop){
			exit("Halt Recieved");
		}
	}
}
?>