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
<body>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:20rem">Sign Up</h1>
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
							if ( $_GET['signup'] == "success") {
                            echo '<small class="text-success"> Success! </small>';
                            }
						}
					?>
					<br>
						<form action="signup.inc.php" method="post">
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

							<!-- TODO: The following dropdown menu should be pulled from the database
							with their respective values, not hardcoded here.-->
							<div class="form-group" style="margin-left:1rem">
								<div class="row">
									<div class="col-xs-5">
										<label for="security1">Security Question 1</label>
										<select name="question1" id="security1">
											<option value="0">Select a security question...</option>
											<option value="1">What is your maternal grandmother's maiden name?</option>
											<option value="2">What was the name of your elementary school?</option>
											<option value="3">What is your favorite football team?</option>
											<option value="4">What was the last name of your favorite elementary school teacher?</option>
											<option value="5">In which town or city did your parents meet?</option>
											<option value="6">What was your favorite food as a child?</option>
											<option value="7">What was the name of the company where you had your first job?</option>
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
										<select name="question2" id="security2">
										<option value="0">(Optional) Select a security question...</option>
											<option value="1">What is your maternal grandmother's maiden name?</option>
											<option value="2">What was the name of your elementary school?</option>
											<option value="3">What is your favorite football team?</option>
											<option value="4">What was the last name of your favorite elementary school teacher?</option>
											<option value="5">In which town or city did your parents meet?</option>
											<option value="6">What was your favorite food as a child?</option>
											<option value="7">What was the name of the company where you had your first job?</option>
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
										<select name="question3" id="security3">
											<option value="0">(Optional) Select a security question...</option>
											<option value="1">What is your maternal grandmother's maiden name?</option>
											<option value="2">What was the name of your elementary school?</option>
											<option value="3">What is your favorite football team?</option>
											<option value="4">What was the last name of your favorite elementary school teacher?</option>
											<option value="5">In which town or city did your parents meet?</option>
											<option value="6">What was your favorite food as a child?</option>
											<option value="7">What was the name of the company where you had your first job?</option>
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
<?php
    require "footer.php"
?>  