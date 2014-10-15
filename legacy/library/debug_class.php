<?php

class debug_class{
	
	public function __construct(){
	}
	
	public function display($var = null, $title = null){
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
	}
}
?>