<?php
function checkApplicationDependencies(){
	ini_set('display_errors',false);
	/*
		We check to verify that this server has all the dependencies that we
		need for our application to run.
	*/
	// are we running php5 or less?
	canWeHandleClasses();
	
	
	// we exclude KNOWN extension we will not be using.
	$exclude_ext = array('pgsql');
	// check for the extensions that we need for our application
	checkExtensions($exclude_ext);
	
	
	ini_set('display_errors',true);
}
function failed($reason = null){
	?>
	<h1>Missing Dependency</h1>
	<p>Unfortainitly we are unable to execute this application. Please see the error below.</p>
	<p><pre><?= $reason; ?></pre></p>
	<?php
	exit();
}

function canWeHandleClasses(){
	$VER = explode('.',phpversion());
	settype($VER[0],'integer');
	if($VER[0] < '5') { failed("You are running php version ".phpversion()." please upgrade to Version 5 or higher to execute this application"); }
}

function checkExtensions($exclude = array()){
	$ext = array(
		'gd',
		'mysql',
		'pgsql',
	);
	foreach($ext as $k => $v){
		foreach($exclude as $ek => $ev){
			if($ev != $v){
				$ext_load = @extension_loaded($v);
				$dyn_ext = @dl("$v.so");
				if(!$ext_load && !$dyn_ext) { failed("Missing extension $v"); }
			}
		}
	}
}
?>