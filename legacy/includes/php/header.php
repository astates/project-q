<?php


// require_once('library/php_dependencies.php');
// checkApplicationDependencies(true);
// require_once('library/session_class.php');
// $session = new session_class();
// $db = $session->loadThisClass('library/regal_db_class.php','regal_db_class',__FILE__,__LINE__);
// $server = $session->loadThisClass('library/server_class.php','server_class',__FILE__,__LINE__);
// $debug = $session->loadThisClass('library/debug_class.php','debug_class',__FILE__,__LINE__);

session_start();
//print_r($_SESSION);
?>


<html>
<head>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?//php $root =  'dev.mvprogramming.com/nyn/'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 	
	<script src="/includes/javascript/jquery.steps/jquery.steps.js"></script>
	<link rel="stylesheet" href='/includes/css/header.css' type='text/css'>
	<link rel="stylesheet" href='/includes/css/main.css' type='text/css'>
	<link rel="stylesheet" href='/includes/css/footer.css' type='text/css'>
	<link rel="stylesheet" href='/includes/css/jquery.steps.css' type='text/css'>
	<?php include('parts/get_page_titles.php');?>

<title><?php echo $title; ?></title> 
</head>
<body>
<?php //echo $root; ?>
<div class="main_container">
<header>
	<nav>
		
		<ul>
			<li><a href='/home/' >Home</a></li>
			<li><a href='/about/' >About</a></li>
			<li><a href='/contact/' >Contact</a></li>
			<li><a href='/faq/' >FAQ</a></li>
			<li><a href='/reseller/' >Reseller</a></li>
			<li><a href='/subscriptions/' >Subscriptions</a></li>
			<li><a href='/create_a_test/' >Create A Test</a></li>
			<li><a href='/sample_test/' >Sample A Test</a></li>
		</ul>
		<?php 
		if(isset($_SESSION['logged_in']))
{ 
	echo 'Welcome back ' . $_SESSION['user_name'];
	echo '<a href=\'/logout/\'>Logout</a>';
}else{ ?>
<a href='/login/'>Login</a>
<?php } ?>
		
	</nav>
</header>
	

	