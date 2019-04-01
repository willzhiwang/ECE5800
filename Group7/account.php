<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="Map.php">Map</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255);width:100px" href="Fromto.php">From To</a>
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
					<h1 style="margin-left:15rem">Account Settings</h1>
					<br>
						<form action="account.inc.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">
									<div class="col-xs-3">
										<label for="firstNameInput">First Name</label>
										<input type="text" class="form-control" name="fname" id="firstNameInput" placeholder="First Name">
									</div>
									<div class="col-xs-3" style="margin-left:1.5rem">
										<label for="lastNameInput">Last Name</label>
										<input type="text" class="form-control" name="lname" id="lastNameInput" placeholder="Last Name">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="addressInput">Address</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="Address" id="addressInput" placeholder="Address">
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInput">City</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="city" id="cityInput" placeholder="City">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInput">State</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="state" id="stateInput" placeholder="State">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInput">Zip Code</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="zip" id="zipCodeInput" placeholder="Zip Code">
									</div>
								</div>
							</div>
							<h5>Type of User</h5>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="userType" value="passenger" checked>
									I am a passenger
								<label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="userType" value="driver">
									I am a driver
								</label>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-primary" name="signup-submit">Save</button>
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