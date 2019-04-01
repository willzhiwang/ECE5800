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
					<a class="nav-link" style="color:rgba(255,255,255,255);width:100px" href="fromto.php">From To</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="search.php">Search</a>
				</li>
				<button type="button" class="btn bg-white" style="margin-left:1rem;color:rgba(0,0,0,255);width:120px">Contact Us</button>
			</ul>
		</nav>
	<header>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:500px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:5rem">Billing Settings</h1>
					<br>
					<form action="billing.inc.php" method="post">
						<h4>Payment</h4>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="creditCardInput">Credit Card Number</label>
									<input type="text" class="form-control" name="cardNu" id="creditCardInput" placeholder="Credit Card Number">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="cvvInput">CCV</label>
									<input type="text" class="form-control" name="cvv" id="ccvInput" placeholder="CCV">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="expMonthInput">Expiration Month</label>
									<input type="text" class="form-control" name="eMonth" id="expMonthInput" placeholder="Expiration Month">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="expYearInput">Expiration Year</label>
									<input type="text" class="form-control" name="eYear" id="expYearInput" placeholder="Expiration Year">
								</div>
							</div>
						</div>
						<h4>Billing Address</h4>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingFirstNameInput">First Name</label>
									<input type="text" class="form-control" name="B-fname" id="billingFirstNameInput" placeholder="First Name">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingLastNameInput">Last Name</label>
									<input type="text" class="form-control" name="B-lname" id="billingLastNameInput" placeholder="Last Name">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingAddressInput">Address</label>
									<input type="text" class="form-control" name="B-address" id="billingAddressInput" placeholder="Address">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingCityInput">City</label>
									<input type="text" class="form-control" name="B-city" id="billingCityInput" placeholder="City">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingStateInput">State</label>
									<input type="text" class="form-control" name="B-state" id="billingStateInput" placeholder="State">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingZipInput">Zip Code</label>
									<input type="text" class="form-control" name="B-zip" id="billingZipInput" placeholder="Zip Code">
								</div>
							</div>
						</div>
						<div class="form-group">
								<button type="submit" class="btn btn-lg btn-primary" name="billing-submit">Save</button>
						</div>
					</form>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>