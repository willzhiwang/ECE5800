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
	<main>
		<br>
		<br>
			<div class="container bg-white" style="width:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:15rem">Booking ticket</h1>
					<br>
						<form action="account.inc.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">
									<div class="col-xs-3">
										<label for="firstNameInput">From city</label>
										<input type="text" class="form-control" name="fname" id="firstNameInput" placeholder="Iowa city">
									</div>
									<div class="col-xs-3" style="margin-left:1.5rem">
										<label for="lastNameInput">To city</label>
										<input type="text" class="form-control" name="lname" id="lastNameInput" placeholder="CID airport">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInput">Date</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="city" id="cityInput" placeholder="06/06/2019">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInput">Time of the day</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="state" id="stateInput" placeholder="2.00 pm">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInput">How many person</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="zip" id="zipCodeInput" placeholder="2">
									</div>
								</div>
							</div>
							<h5>Type of trip</h5>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="userType" value="passenger" checked>
									round trip
								<label>
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