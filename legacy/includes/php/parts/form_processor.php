<?php
//print_r($_GET);

$form_type = $_GET['form_type'];
// $form_type = 'contact_form';

// if($form_type == '99contact_form' && $form_type == 'contact_form')
// {
// 	echo 'poop for days';
// 	print ($form_type);
// 	print ('form_contact ');
// 	print "days for poop ";
// }elseif($form_type == '99contact_form'){
// 	echo 'im old greg';
// }else{
// 	echo 'billy bob';
// }

// $form_type = 'contact_form';

switch($form_type)
{
	case 'contact_form':

	$email = $_GET['email'];
	$first_name = $_GET['first_name'];
	$last_name = $_GET['last_name'];
	$phone = $_GET['phone'];
	$comment = $_GET['comment'];
	//echo 'contact_form';
	$to      = 'arstates@gmail.com, gbijeau37@gmail.com, ' . $email;
	$subject = 'Contact Form Has Been Filled Out';
	$message = '<html>
	<head>
		<title>Contact Form Receipt</title>
	</head>
	<body>
	hello, you submitted a contact form. Here are your comments: <br/>'
	 . $comment . '
	First Name: ' . $first_name . '<br/>
	Last Name: ' . $last_name . '<br/>
	Email: ' . $email . '<br/>
	Phone: ' . $phone . '<br/>
	</body>
	</html>';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: test@dev.mvprogramming.com' . "\r\n" .
    'Reply-To: andrew@mvprogramming.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    echo '<pre>';
    print $message;
	//mail($to, $subject, $message, $headers);
	//header('Location: /thank_you_contact_form/');
	break;

	case 'test_form':
	$score = 0;
	$form_answer = array();
	include('db_connect.php');
	$id=0;
	$get_count = count($_GET)-1;
	//echo 'get_count: ' . $get_count;
	$data = mysql_query("SELECT answer FROM questions") or die(mysql_error());

	$db_answer = array();
	$from_db_answer = array();
	$i = 0;
	echo '<pre>';
 while($info = mysql_fetch_array( $data ))
 {
	
	$from_db_answer[$i] = $info;
	$i++;
		
 }	

 $answer_count = count($from_db_answer) - 1;

 for($z=0; $z <= $answer_count - 1; $z++)
 {
 	$db_answer[$z] = $from_db_answer[$z][0];
 	if($db_answer[$z] == $_GET['question_' . $z])
 		{
 		//echo $db_answer[$z];
 		//echo $_GET['question_' . $z];
 		$score++;
 		}
 }
 
 
	echo 'score: ' . $score . ' out of ' . $answer_count;
	
	break;
}
?>