<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
<body>

<?php

	define("NUMFIELDS", 13);

	require_once('../mysqli_vanpool_connect.php');
	
	$query_questions = "SELECT SecurityQuestionID, Question FROM SecurityQuestion";
	
	$response_questions = @mysqli_query($dbc, $query_questions);
	
	$array_security_questions = array();
	
	if($response_questions) {
	
		
		while($row = mysqli_fetch_array($response_questions)) {
			
			$array_security_questions[] = $row;
			
		}
	
		// Prints out only one question of the data
		//print_r($array_security_questions[0][1]); 
		
	} else {
		
		echo "Couldn't issue the database query<br>";
		
		echo mysqli_error($dbc);
	}

	$query_user_data = "SELECT UserID, Username, Email FROM Users";
	$response_user = @mysqli_query($dbc, $query_user_data);
	$array_user_data = array();
	if($response_user) {
		while($row = mysqli_fetch_array($response_user)) {
			$array_user_data[] = $row;
		}
	} else {
		echo "Couldn't issue the database query<br>";
		echo mysqli_error($dbc);
	}
	
	mysqli_close($dbc);

	$dataEntered = array();

	$passwordFlag = false;
	$passwordRepeatFlag = false;
	$passwordMatchingSuccessFlag = false;

	$enteredUsernameFlag = false;
	$enteredEmailFlag = false;

	$usernameSuccessFlag = false;
	$emailSuccessFlag = false;

	$fname = $lname = $email = $username = $password = $passwordrepeat = "";
	$security_ans1 = $security_ans2 = $security_ans3 = "";

	$fnameErr = $lnameErr = $usernameErr = $emailErr = $passwordErr = $passwordRepeatErr = "";
	$security_ans1Err = $security_ans2Err = $security_ans3Err = "";

	$passwordMatchingErr = "";
	$usernameMatchingErr = "";
	$emailMatchingErr = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$passwordMatchingErr = "";
		$usernameMatchingErr = "";
		$emailMatchingErr = "";

		if(empty($_POST["f_name"])) {
			$fnameErr = "* First Name is required";
		} else {
			$fname = test_input($_POST["f_name"]);
			$dataEntered[] = $fname;
		}

		if(empty($_POST["l_name"])) {
			$lnameErr = "* Last Name is required";
		} else {
			$lname = test_input($_POST["l_name"]);
			$dataEntered[] = $lname;
		}

		if(empty($_POST["mail"])) {
			$emailErr = "* Email is required";
			$enteredEmailFlag = false;
		} else {
			$email = test_input($_POST["mail"]);
			// Check for valid email format
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "* Invalid email format";
			} else {
				$dataEntered[] = $email;
				$enteredEmailFlag = true;
			}
		}

		if(empty($_POST["uid"])) {
			$usernameErr = "* Username is required";
			$enteredUsernameFlag = false;
		} else {
			$username = test_input($_POST["uid"]);
			$dataEntered[] = $username;
			$enteredUsernameFlag = true;
		}

		$password = "";
		if(empty($_POST["pwd"])) {
			$passwordErr = "* Password is required";
			$passwordFlag = false;
		} else {
			$password = test_input($_POST["pwd"]);
			$dataEntered[] = $password;
			$passwordFlag = true;
		}

		$passwordrepeat = "";
		if(empty($_POST["pwd-r"])) {
			$passwordRepeatErr = "* Repeated Password is required";
			$passwordRepeatFlag = false;
		} else {
			$passwordrepeat = test_input($_POST["pwd-r"]);
			$dataEntered[] = $passwordrepeat;
			$passwordRepeatFlag = true;
		}

		$typeofuser = test_input($_POST["isDriver"]);
		$dataEntered[] = $typeofuser;

		$security_ques1 = test_input($_POST["secQ1"]);
		$dataEntered[] = $security_ques1;

		if(empty($_POST["secA1"])) {
			$security_ans1Err = "* Answer to Security Question 1 is required";
		} else {
			$security_ans1 = test_input($_POST["secA1"]);
			$dataEntered[] = $security_ans1;
		}

		$security_ques2 = test_input($_POST["secQ2"]);
		$dataEntered[] = $security_ques2;

		if(empty($_POST["secA2"])) {
			$security_ans2Err = "* Answer to Security Question 2 is required";
		} else {
			$security_ans2 = test_input($_POST["secA2"]);
			$dataEntered[] = $security_ans2;
		}

		$security_ques3 = test_input($_POST["secQ3"]);
		$dataEntered[] = $security_ques3;

		if(empty($_POST["secA3"])) {
			$security_ans3Err = "* Answer to Security Question 3 is required";
		} else {
			$security_ans3 = test_input($_POST["secA3"]);
			$dataEntered[] = $security_ans3;
		}

		if($passwordFlag && $passwordRepeatFlag) {
			test_password($password, $passwordrepeat, $passwordMatchingErr, $passwordMatchingSuccessFlag);
		}

		if($enteredEmailFlag) {
			test_email_exists($array_user_data, $email, $emailMatchingErr, $emailSuccessFlag);
		}

		if($enteredUsernameFlag) {
			test_username_exists($array_user_data, $username, $usernameMatchingErr, $usernameSuccessFlag);
		}

		if($passwordMatchingSuccessFlag && $usernameSuccessFlag && $emailSuccessFlag) {
			/*
			if(sizeof($dataEntered) == NUMFIELDS) {
				require_once('../mysqli_vanpool_connect.php');
				$query = "INSERT INTO Users (Username, Email) VALUES (?, ?)";
				$stmt = mysqli_prepare($dbc, $query);
				mysqli_stmt_bind_param($stmt, "ss", $data[4], $data[3]);
				mysqli_stmt_execute($stmt);
				$affected_rows = mysqli_stmt_affected_rows($stmt);
				if($affected_rows) {
					echo 'Student Entered';
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
				} else {
					echo 'Error Ocurred<br />';
					echo mysqli_error();
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
				}
			}
			*/
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function test_output($data) {
		if(sizeof($data) == 13) {
			echo "<h2>Your Input:</h2>";
			foreach($data as $entered){
				echo "$entered<br />";
			}
		}
	}

	function test_password($pass, $repeat, &$matchingError, &$passFlag) {
		if($pass != $repeat) {
			$matchingError = "* Passwords do NOT match";
			$passFlag = false;
		} else {
			$passFlag = true;
		}
	}

	function test_username_exists($existingUserData, $enteredUsername, &$userMatchingError, &$userFlag) {
		foreach($existingUserData as $currentUsernameData) {
			if($currentUsernameData['Username'] == $enteredUsername) {
				$userMatchingError = "* Entered Username already exists";
				$userFlag = false;
			} else {
				$userFlag = true;
			}
		}
	}

	function test_email_exists($existingUserData, $enteredEmail, &$mailMatchingError, &$mailFlag) {
		foreach($existingUserData as $currentEmailData) {
			if($currentEmailData['Email'] == $enteredEmail) {
				$mailMatchingError = "* Entered Email already has an account";
				$mailFlag = false;
			} else {
				$mailFlag = true;
			}
		}
	}

	function add_input($data) {
		if(sizeof($data) == NUMFIELDS) {
			// At this point user has filled out every field
			// Also user has entered the password and repeat password the same
			// And user has entered a valid email address
			// And username and email have not been used before
			require_once('../mysqli_vanpool_connect.php');
			$query = "INSERT INTO Users (Username, Email) VALUES (?, ?)";
			$stmt = mysqli_prepare($dbc, $query);
			mysqli_stmt_bind_param($stmt, "ss", $data[4], $data[3]);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			if($affected_rows) {
				echo 'Student Entered';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			} else {
				echo 'Error Ocurred<br />';
				echo mysqli_error();
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
		}
	}
	

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

	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="text-align:center">Sign Up</h1>
					<br>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<table>
								<tr>
								<td>
									<div class="form-group" style="margin-left:2rem">
										<label for="fNameInput">First Name</label>
										<div class="row">
											<div class="col-xs-3">
												<input type="text" class="form-control" name="f_name" id="fnameInput" placeholder="First Name" value="<?php echo $fname;?>">
												<span style="color:#FF0000"><?php echo $fnameErr;?></span>
												<br><br>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="form-group" style="margin-left:4rem">
										<label for="lNameInput">Last Name</label>
										<div class="row">
											<div class="col-xs-3">
												<input type="text" class="form-control" name="l_name" id="lnameInput" placeholder="Last Name" value="<?php echo $lname;?>">
												<span style="color:#FF0000"><?php echo $lnameErr;?></span>
												<br><br>
											</div>
										</div>
									</div>
								</td>
								</tr>
							</table>
							<div class="form-group" style="margin-left:2rem">
								<label for="emailInput">Email</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="mail" id="emailInput" placeholder="Email" value="<?php echo $email;?>">
										<span style="color:#FF0000"><?php echo $emailErr;?></span>
										<span style="color:#FF0000"><?php echo $emailMatchingErr;?></span>
										<br><br>
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="usernameInput">Username</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="uid" id="usernameInput" placeholder="Username" value="<?php echo $username;?>">
										<span style="color:#FF0000"><?php echo $usernameErr;?></span>
										<span style="color:#FF0000"><?php echo $usernameMatchingErr;?></span>
										<br><br>
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="passwordInput">Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="password" class="form-control" name="pwd" id="passwordInput" placeholder="Password">
										<span style="color:#FF0000"><?php echo $passwordErr;?></span>
										<br><br>
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="passwordRepeatInput">Repeat Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="password" class="form-control" name="pwd-r" id="passwordRepeatInput" placeholder="Repeat Password">
										<span style="color:#FF0000"><?php echo $passwordRepeatErr;?></span>
										<span style="color:#FF0000"><?php echo $passwordMatchingErr;?></span>
										<br><br>
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
										<label for="secQ1">Security Question 1</label>
										<select name="secQ1" id="security1" onchange="securityQuestion1Change()">
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
										<label for="secA1">Answer 1</label>
										<input type="text" name="secA1" id="answer1" placeholder="Answer 1" value="<?php echo $security_ans1;?>">
										<span style="color:#FF0000"><?php echo $security_ans1Err;?></span>
										<br><br>
									</div>
								</div>
							</div>
							
							
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="secQ2">Security Question 2</label>
										<select name="secQ2" id="security2" onchange="securityQuestion2Change()">
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
										<label for="secA2">Answer 2</label>
										<input type="text" name="secA2" id="answer2" placeholder="Answer 2" value="<?php echo $security_ans2;?>">
										<span style="color:#FF0000"><?php echo $security_ans2Err;?></span>
										<br><br>
									</div>
								</div>
							</div>
							
							
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="secQ3">Security Question 3</label>
										<select name="secQ3" id="security3" onchange="securityQuestion3Change()">
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
										<label for="secA3">Answer 3</label>
										<input type="text" name="secA3" id="answer3" placeholder="Answer 3" value="<?php echo $security_ans3;?>">
										<span style="color:#FF0000"><?php echo $security_ans3Err;?></span>
										<br><br>
									</div>
								</div>
							</div>
							<div class="form-group" style="text-align:center">
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
</html> 