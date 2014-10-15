<?php
/*
	This is our configurations file.
	It is used to set default items based on the application.
#####################################################################

	We check to see if this File is executed directory, and it is... we STOP RIGHT THERE
*/
if(preg_match('/conf/i',$_SERVER['REQUEST_URI'])){
	die(header("Location: /"));
	exit();
	exit();
	die();
}
/*	
#####################################################################

DataBase Declaration


*/
define('__DB_HOST__','localhost');
define('__DB_NAME_DEV__','torchwood'); // 'nicks_db
define('__DB_NAME_TEST__','torchwood_test');
define('__DB_NAME_PROD__','torchwood_prod');
define('__DB_USER__','torchwood');
define('__DB_PASS__','gz1k2s');
/*
#####################################################################

Default Error Messages
*/
define('__EXCEED_SESSION_TIME__','You have exceeded the maximum allowable time for your session');
define('__INVALID_PASSWORD__','Invalid Password');
define('__INVALID_USERNAME__','Unknown / Unregistered Username');

/*
#######################################################################

Default Directory Assignments
*/
define('__ROOT__',getcwd());	// this will need to be assigned statically
define('__LIBRARY__',__ROOT__.'/library');
define('__PHP__',__ROOT__.'/includes/php');
define('__HTML__',__ROOT__.'/includes/html');
define('__CSS__',__ROOT__.'/includes/css');
define('__JS__',__ROOT__.'/includes/javascript');




?>