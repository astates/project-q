<?php
class css_class{

	public function __construct(){}

	public function includeStyle($filename){
		print('<link rel="stylesheet" href="/includes/css/'.$filname.'"></style>");
	}
	
}
?>