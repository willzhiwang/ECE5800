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
	<header>
		<nav class="navbar navbar-expand-sm" style="background-color:rgba(0,134,195,255)">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255);width:150px" href="costandsavings.php">Cost and Savings</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="map.php">Map</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255);width:100px" href="fromto.php">From To</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="search.php">Search</a>
				</li>
				<button type="button" class="btn bg-white" style="margin-left:1rem;color:rgba(0,0,0,255);width:120px">Contact Us</button>
			</ul>
		</nav>
	</header>
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
										<input type="text" class="form-control" name="pwd" id="passwordInput" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="passwordRepeatInput">Repeat Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="pwd-r" id="passwordRepeatInput" placeholder="Repeat Password">
									</div>
								</div>
							</div>
							<h5>Type of User</h5>
							<div class="form-group">
								<label>
									<input type="radio" name="isPassenger" value="0" checked>
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
										<select name="question1" id="security1">
											<option value="0">Select a security question...</option>
											<option value="1">Example question 1</option>
											<option value="2">Example question 2</option>
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
											<option value="0">Select a security question...</option>
											<option value="1">Example question 1</option>
											<option value="2">Example question 2</option>
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
											<option value="0">Select a security question...</option>
											<option value="1">Example question 1</option>
											<option value="2">Example question 2</option>
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