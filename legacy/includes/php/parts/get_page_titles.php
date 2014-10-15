<?php

$url = $_SERVER['REQUEST_URI'];
$uri_explode = explode('/', $url);
//print_r($uri_explode);
if(isset($uri_explode[1]) || $uri_explode[1] != '') 
{
$current_page = $uri_explode[1];

switch($current_page)
{

	case 'thank_you_contact_form':
	$title = 'Thank You For Contacting Us';
	break;

	case '':
	case 'home':
	$title = 'Welcome To DoubleQ';
	break;

	default:
	$title = 'Welcome To DoubleQ';
	break;

}
}
?>