<?php
/*
 * include this file, then call debug_dump() when you want to 
 * compile a list of input data / files and environment details.
 * pass true if you want the results returned as a string value 
 * rather than output.
 */
function debug_dump($return_str=false) {
	$output_string = '<script type="text/javascript">var zz; var zzih;</script>';
	$output_string .= "<div id='zz_debug_dump' style='border:8px double #F80;background-color:white;color:black;font:9pt/12px monospace;position:fixed;width:40%;z-index:98787;'>".
	      "== start of debug dump ==<br />\n";
	if(isset($_SESSION)) {
		foreach($_SESSION as $k => $v) { $output_string .= sprintf("S: %s = %s<br />\n",$k,$v); }
	}
	if(isset($_COOKIE)) {
		foreach($_COOKIE  as $k => $v) { $output_string .= sprintf("C: %s = %s<br />\n",$k,$v); }
	}
	if(isset($_GET)) {
		foreach($_GET     as $k => $v) { $output_string .= sprintf("G: %s = %s<br />\n",$k,$v); }
	}
	if(isset($_POST)) {
		foreach($_POST    as $k => $v) { $output_string .= sprintf("P: %s = %s<br />\n",$k,is_array($v)?print_r($v,true):$v); }
	}
	if(isset($_FILES)) {
		foreach($_FILES   as $k => $v) { $output_string .= sprintf("F: %s = %s<br />\n",$k,print_r($v,true)); }
	}
    $output_string .= "== end of debug dump ==<br />".
	      "<span style='cursor:pointer;' onclick=\"zz=document.getElementById('zz_debug_dump');zzih=zz.innerHTML;zz.innerHTML='<span style=\'cursor:pointer;\' onclick=\'zz.innerHTML = zzih;\'>Show</span>'\">Hide</span></div>\n";
	if($return_str) {
		return($output_string);
	} else {
		print($output_strin);
		return;
	}
}
?>