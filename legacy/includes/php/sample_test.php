<?php include('header.php'); ?>
<?php include('parts/db_connect.php'); 


// for($i=1; $i <= 5; $i++)
// {
$data = mysql_query("SELECT * FROM questions") 
 or die(mysql_error()); 
$db_questions = array();

$i = 0;
echo '<pre>';
 while($info = mysql_fetch_array( $data ))
 {
	$db_question[$i] = $info;
	
 	//print_r($info);
 	//echo($db_question[$i]['id']);
 	
	$i++;
 }	echo '</pre>';
 	//print_r($info);
 	 
 	
 
 // echo '<pre>';
 // echo($db_questions[1]['id']);
 // //print_r($db_questions[1]);
 // echo '</pre>';
// }
 $zz = 1; ?>
<div class="test_container">
	<p>Welcome to the testing area</p>
	    <form id="test_form" action="/includes/php/parts/form_processor.php" method="get">
	    <div id="wizard">
<?php
	
	for($i=0; $i <= 5; $i++){ 

	$id = $db_question[$i]['id'];
 	$question = stripslashes($db_question[$i]['question']);
 	$answer = stripslashes($db_question[$i]['answer']);
 	$wrong_answer_1 = stripslashes($db_question[$i]['wrong_answer_1']);
 	$wrong_answer_2 = stripslashes($db_question[$i]['wrong_answer_2']);
 	$wrong_answer_3 = stripslashes($db_question[$i]['wrong_answer_3']);

	?>
	<h1></h1>
    <div>
    <div class="question_area">
    <?php echo $question ?>
    </div>
    <br/><br/>
    <div class="answer_area">
    <label><input type="radio" name="<?php echo 'question_' . $i; ?>" value="<?php echo $answer; ?>"><?php echo $answer; ?></label><br/>
    <label><input type="radio" name="<?php echo 'question_' . $i; ?>" value="<?php echo $wrong_answer_1; ?>"><?php echo $wrong_answer_1; ?></label><br/>
    <label><input type="radio" name="<?php echo 'question_' . $i; ?>" value="<?php echo $wrong_answer_2; ?>"><?php echo $wrong_answer_2; ?></label><br/>
    <label><input type="radio" name="<?php echo 'question_' . $i; ?>" value="<?php echo $wrong_answer_3; ?>"><?php echo $wrong_answer_3; ?></label><br/>
    </div>
    </div>
	 <?php } ?>
    </div>
    <input type="hidden" name="form_type" value="test_form">
    </form>
     
    
    
</div>

<?php include('footer.php'); ?>