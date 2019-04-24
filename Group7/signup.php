<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
<?php
    require "header.php"
?>
<?php
	require_once('./configDB.php');
	
	$query_questions = "SELECT SecurityQuestionID, Question FROM SecurityQuestion";
	
	$response_questions = @mysqli_query($conn, $query_questions);
	
	$array_security_questions = array();
	
	if($response_questions) {
	
		
		while($row = mysqli_fetch_array($response_questions)) {
			
			$array_security_questions[] = $row;
			
		}
		
	} else {
		
		echo "Couldn't issue the database query<br>";
		
		echo mysqli_error($conn);
	}

	$security_ans1Err = $security_ans2Err = $security_ans3Err = "";
?>

<script>

var finalSecurityQuestion1;
var finalSecurityQuestion2;
var finalSecurityQuestion3;

var allSecurityQuestions;

var securityQuestions1;
var securityQuestions2;
var securityQuestions3;

var questionIndex1;
var questionIndex2;
var questionIndex3;


// Polls the database for all possible security questions
// Sets all the questions slots with all possible questions
// Also initiates the 3 variables to hold the selected 3 security questions for this account
window.onload = function() {
	finalSecurityQuestion1;
	finalSecurityQuestion2;
	finalSecurityQuestion3;

	var temp = <?php echo json_encode($array_security_questions); ?>;
	allSecurityQuestions = [temp.length];
	securityQuestions1 = [temp.length];
	securityQuestions2 = [temp.length];
	securityQuestions3 = [temp.length];

	securityQuestions1[0] = document.getElementById('question1-option0');
	securityQuestions1[1] = document.getElementById('question1-option1');
	securityQuestions1[2] = document.getElementById('question1-option2');
	securityQuestions1[3] = document.getElementById('question1-option3');
	securityQuestions1[4] = document.getElementById('question1-option4');
	securityQuestions1[5] = document.getElementById('question1-option5');
	securityQuestions1[6] = document.getElementById('question1-option6');

	securityQuestions2[0] = document.getElementById('question2-option0');
	securityQuestions2[1] = document.getElementById('question2-option1');
	securityQuestions2[2] = document.getElementById('question2-option2');
	securityQuestions2[3] = document.getElementById('question2-option3');
	securityQuestions2[4] = document.getElementById('question2-option4');
	securityQuestions2[5] = document.getElementById('question2-option5');
	securityQuestions2[6] = document.getElementById('question2-option6');

	securityQuestions3[0] = document.getElementById('question3-option0');
	securityQuestions3[1] = document.getElementById('question3-option1');
	securityQuestions3[2] = document.getElementById('question3-option2');
	securityQuestions3[3] = document.getElementById('question3-option3');
	securityQuestions3[4] = document.getElementById('question3-option4');
	securityQuestions3[5] = document.getElementById('question3-option5');
	securityQuestions3[6] = document.getElementById('question3-option6');

	for(var i = 0; i < temp.length; i++) {
		allSecurityQuestions[i] = temp[i][1];
		securityQuestions1[i].innerHTML = temp[i][1];
		securityQuestions2[i].innerHTML = temp[i][1];
		securityQuestions3[i].innerHTML = temp[i][1];
	}

	finalSecurityQuestion1 = allSecurityQuestions[0];
	finalSecurityQuestion2 = allSecurityQuestions[1];
	finalSecurityQuestion3 = allSecurityQuestions[2];
	
	questionIndex1 = 0;
	questionIndex2 = 1;
	questionIndex3 = 2;
	disableSelectedQuestions();
}

function disableSelectedQuestions() {
	for(var i = 0; i < securityQuestions1.length; i++) {
		securityQuestions1[i].disabled = false;
		securityQuestions2[i].disabled = false;
		securityQuestions3[i].disabled = false;
	}
	securityQuestions2[questionIndex1].disabled = true;
	securityQuestions3[questionIndex1].disabled = true;
	
	securityQuestions1[questionIndex2].disabled = true;
	securityQuestions3[questionIndex2].disabled = true;
	
	securityQuestions1[questionIndex3].disabled = true;
	securityQuestions2[questionIndex3].disabled = true;
}

function securityQuestion1Change() {
	for(var i = 0; i < securityQuestions1.length; i++) {
		if(i == document.getElementById('security1').value) {
			finalSecurityQuestion1 = securityQuestions1[i];
			questionIndex1 = i;
		}
	}
	disableSelectedQuestions();
}

function securityQuestion2Change() {
	for(var i = 0; i < securityQuestions2.length; i++) {
		if(i == document.getElementById('security2').value) {
			finalSecurityQuestion2 = securityQuestions2[i];
			questionIndex2 = i;
		}
	}
	disableSelectedQuestions();
}

function securityQuestion3Change() {
	for(var i = 0; i < securityQuestions3.length; i++) {
		if(i == document.getElementById('security3').value) {
			finalSecurityQuestion3 = securityQuestions3[i];
			questionIndex3 = i;
		}
	}
	disableSelectedQuestions();
}



</script>

<body>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:20rem">Sign Up</h1>
					<br>
						<form action="signup.inc.php" method="post">
						<div class="form-group" style="margin-left:2rem">
							<?php
								if (isset($_GET['error']))
								{
									if ($_GET['error'] == "emptyfields")
									{
										echo '<small class="text-danger"> Fill in all fields! </small>';
									}
									else if ($_GET['error'] == "sqlerror")
									{
										echo '<small class="text-danger"> Sorry, something went wrong with our database. Please contact us for assistance. </small>';
									}
										else if ($_GET['error'] == "invalidmailuid")
									{
										echo '<small class="text-danger"> Invalid username and email! </small>';
									}
									else if ($_GET['error'] == "invalidmail")
									{
										echo '<small class="text-danger"> Invalid email! </small>';
									}
									else if ($_GET['error'] == "invaliduid")
									{
										echo '<small class="text-danger"> Invalid username! </small>';
									}
									else if ($_GET['error'] == "passwordcheck")
									{
										echo '<small class="text-danger"> Passwords do not match! </small>';
									}
									else if ($_GET['error'] == "usertaken")
									{
										echo '<small class="text-danger"> Username is already taken! </small>';
									}                    
									else if ($_GET['error'] == "emailtaken")
									{
										echo '<small class="text-danger"> email is already taken! </small>';
									}
								}
								else if (isset($_GET['signup']))
								{
									if ( $_GET['signup'] == "success") 
									{
                  		          		echo '<small class="text-success"> Success! </small>';
                    		        }
								}
							?>
							</div>

							<div class="form-group" style="margin-left:2rem">
								<label for="usernameInput">Username</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="uid" id="usernameInput" placeholder="Username">
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-left:2rem">
								<label for="emailInput">Email</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="mail" id="emailInput" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="passwordInput">Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="password" class="form-control" name="pwd" id="passwordInput" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="passwordRepeatInput">Repeat Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="password" class="form-control" name="pwd-r" id="passwordRepeatInput" placeholder="Repeat Password">
									</div>
								</div>
							</div>
							<h5>Type of User</h5>
							<div class="form-group">
								<label>
									<input type="radio" name="isDriver" value="0" checked>
									I am a passenger
								<label>
							</div>
							<div class="form-group">
								<label>
									<input type="radio" name="isDriver" value="1">
									I am a driver
								</label>
							</div>
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="security1">Security Question 1</label>
										<select name="question1" id="security1" onchange="securityQuestion1Change()">
											<option id="question1-option0" value="0" selected="0">Null</option>
											<option id="question1-option1" value="1">Null</option>
											<option id="question1-option2" value="2">Null</option>
											<option id="question1-option3" value="3">Null</option>
											<option id="question1-option4" value="4">Null</option>
											<option id="question1-option5" value="5">Null</option>
											<option id="question1-option6" value="6">Null</option>
										</select>
									</div>
									<div class="col-xs-5" style="margin-left:2rem">
										<label for="response1">Answer 1</label>
										<input type="text" name="answer1" id="response1" placeholder="Answer 1">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="security2">Security Question 2</label>
										<select name="question2" id="security2" onchange="securityQuestion2Change()">
											<option id="question2-option0" value="0">Null</option>
											<option id="question2-option1" value="1" selected="1">Null</option>
											<option id="question2-option2" value="2">Null</option>
											<option id="question2-option3" value="3">Null</option>
											<option id="question2-option4" value="4">Null</option>
											<option id="question2-option5" value="5">Null</option>
											<option id="question2-option6" value="6">Null</option>
										</select>
									</div>
									<div class="col-xs-5" style="margin-left:2rem">
										<label for="response2">Answer 2</label>
										<input type="text" name="answer2" id="response2" placeholder="Answer 2">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="security3">Security Question 3</label>
										<select name="question3" id="security3" onchange="securityQuestion3Change()">
											<option id="question3-option0" value="0">Null</option>
											<option id="question3-option1" value="1">Null</option>
											<option id="question3-option2" value="2" selected="2">Null</option>
											<option id="question3-option3" value="3">Null</option>
											<option id="question3-option4" value="4">Null</option>
											<option id="question3-option5" value="5">Null</option>
											<option id="question3-option6" value="6">Null</option>
										</select>
									</div>
									<div class="col-xs-5" style="margin-left:2rem">
										<label for="response1">Answer 3</label>
										<input type="text" name="answer3" id="response3" placeholder="Answer 3">
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-primary" name="signup-submit">Sign Up</button>
							</div>
							<br>
						</form>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>
