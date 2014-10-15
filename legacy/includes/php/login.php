<?php 
session_start();
if(isset($_POST['login_attempted']) && $_POST['login_attempted'] == 'true'){

include('parts/db_connect.php'); 

$user_name = trim($_POST['user_name']);
echo $user_name;
$results = mysql_query("SELECT * FROM members WHERE username='" . $user_name . "'") or die(mysql_error()); 
//echo $results;
if(mysql_num_rows($results) >= 1)
{
	
	$_SESSION['user_name'] = $_POST['user_name'];
	$_SESSION['logged_in'] = 'true';
	header('Location: /home/');
}else{
	echo "There was no matching record for the name " . $user_name . "<br/>Please Try Again";
	?>
	<form action="/includes/php/login.php" method="post">
<label><input type="text" value="" name="user_name">User Name:</label>
<label><input type="text" value="" name="password">Password</label>
<label><input type="submit" value="submit" name="submit">Submit</label>
<input type="hidden" value="true" name="login_attempted">
</form>
<a href="/signup/">Don't have an account? Sign up!</a>
 <?php }

}else{ ?>
<form action="/includes/php/login.php" method="post">
<label><input type="text" value="" name="user_name">User Name:</label>
<label><input type="text" value="" name="password">Password</label>
<label><input type="submit" value="submit" name="submit">Submit</label>
<input type="hidden" value="true" name="login_attempted">
</form>
<a href="/signup/">Don't have an account? Sign up!</a>
<?php } ?>



