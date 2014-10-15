<?php
/**
 * include this file, then call debug_dump() when you want to 
 * compile a list of input data / files and environment details.
 * pass (true) if you want the results returned as a string value 
 * rather than output.
 * <?php debug_dump(); ?>  outputs content of all accessible super globals (call session_start() to enable access to $_SESSION data)
 *  --- OR ----
 * <?php $debug_dump = ''; $debug_dump = debug_dump(true); ?>
 * (later) 
 * </head><body><?php print($debug_dump); // first thing following open body tag ?>
 * -------------
 * also, an IP filter can be applied to limit when the dump appears:
 * $who_gets_to_see_dump = array('71.43.188.178', '192.168.1.136');
 * if(in_array($_SERVER['REMOTE_ADDR'],$who_gets_to_see_dump)) { debug_dump(); } ?>
 *
 */
function debug_dump($return_str=false) {
	$output_string = '<script type="text/javascript">var zz; var zzih;</script>';
	$output_string .= "<div id='zz_debug_dump' style='border:8px solid #F80;background-color:white;".
					  "color:black;font:9pt/12px monospace;position:fixed;right:10px;max-width:40%;".
					  "width:auto !important;width:40%;z-index:98789;overflow:scroll;max-height:80%;".
					  "height:auto !important;height:80%;'>".
					  "<pre>== start of debug dump ==\n";
	$output_string .= "<span style=\"color:red;\">THIS IS FOR DEBUGGING ONLY.\nTHIS IS ONLY SEEN ON MACHINES(IP)\nAT NETPASS.</span>\nIP: $_SERVER[REMOTE_ADDR]\n";
	if(isset($_SESSION)) {
		foreach($_SESSION as $k => $v) { 
			$time_val = ''; /* output time in human readable format, when possible */
			if((intval($v)>0) && ((stristr($k,'time')!== false) || stristr($k,'now')!==false)) { 
				$time_val = ' '.date('Y-m-d H:i:s',$v); 
			} /* else if(is_array($v)) {
				$v = print_r($v,true);
			} */
			$output_string .= sprintf("S: %s = %s\n",$k,$v.$time_val); 
		}
	}
	if(isset($_COOKIE)) {
		foreach($_COOKIE  as $k => $v) { $output_string .= sprintf("C: %s = %s\n",$k,$v); }
	}
	if(isset($_GET)) {
		foreach($_GET     as $k => $v) { $output_string .= sprintf("G: %s = %s\n",$k,$v); }
	}
	if(isset($_POST)) {
		foreach($_POST    as $k => $v) { $output_string .= sprintf("P: %s = %s\n",$k,is_array($v)?print_r($v,true):$v); }
	}
	if(isset($_FILES)) {
		foreach($_FILES   as $k => $v) { $output_string .= sprintf("F: %s = %s\n",$k,print_r($v,true)); }
	}
    $output_string .= "== end of debug dump ==</pre><br />".
	      "<span style='cursor:pointer;' onclick=\"zz=document.getElementById('zz_debug_dump');zzih=zz.innerHTML;zz.innerHTML='<span style=\'cursor:pointer;\' onclick=\'zz.innerHTML = zzih;\'>Show</span>'\">Hide</span></div>\n";
	if($return_str) {
		return($output_string);
	} else {
		print($output_string);
		return;
	}
}
?>