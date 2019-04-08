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
					<h1 style="margin-left:15rem">Van Pool Service</h1>
					<br>
						<form action="account.inc.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">
										<label for="firstNameInput">From city</label>
										<select class="selectpicker show-menu-arrow form-control">
  											<option>UCC</option>
  											<option>Hawks ridge</option>
  											<option>CID airport</option>
											<option>Coral Ridge Mall</option>
											<option>May flower</option>
											<option>restaurant</option>
										</select>
									
									
										<label for="lastNameInput">To city</label>
										<select class="selectpicker show-menu-arrow form-control">
											<option>Hawks ridge</option>
  											<option>UCC</option>
  											<option>CID airport</option>
											<option>Coral Ridge Mall</option>
											<option>May flower</option>
											<option>restaurant</option>
										</select>
								</div>	
								
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInput">Day of the week</label>
								<div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Monday</label>
  								</div>
								<div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Tuesday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Wednesday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Thursday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Friday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Saturday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" id="exampleCheck1">
    								<label class="form-check-label" for="exampleCheck1">Sunday</label>
  								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInput">Time of the day</label>
								<select class="selectpicker show-menu-arrow  form-control">
									<option>0:00 am</option>
  									<option>1:00 am</option>
  									<option>2:00 am</option>
  									<option>3:00 am</option>
									<option>4:00 am</option>
									<option>5:00 am</option>
									<option>6:00 am</option>
									<option>7:00 am</option>
  									<option>8:00 am</option>
  									<option>9:00 am</option>
									<option>10:00 am</option>
									<option>11:00 am</option>
									<option>12:00 pm</option>
									<option>1:00 pm</option>
  									<option>2:00 pm</option>
  									<option>3:00 pm</option>
									<option>4:00 pm</option>
									<option>5:00 pm</option>
									<option>6:00 pm</option>
									<option>7:00 pm</option>
  									<option>8:00 pm</option>
  									<option>9:00 pm</option>
									<option>10:00 pm</option>
									<option>11:00 pm</option>
								</select>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInput">How many person</label>
								<select class="selectpicker show-menu-arrow form-control">
  									<option>1</option>
  									<option>2</option>
  									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>

							</div>
							<p class="text-danger">For round trip please book the ticket back</p>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-primary" name="signup-submit">Search</button>
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

<?php
    require "footer.php"
?>