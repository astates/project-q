<?php
print_r($_GET);

$form_type = $_GET['form_type'];

switch($form_type)
{
	case 'contact_form ':
	echo 'contact_form';
	break;
}
?>