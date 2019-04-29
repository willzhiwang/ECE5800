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
						<form action="search.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">

									<div class="col-xs-3">
										<input type="text" class="form-control" name="from" id="phoneInput" placeholder="From" value= "<?php  ?>">
									</div>

									<div class="col-xs-3">
										<input type="text" class="form-control" name="to" id="phoneInput" placeholder="To" value= "<?php  ?>">
									</div>
										<!--label for="firstNameInput">From city</label>
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
										</select-->
								</div>	
								
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInput">Day of the week</label>
								<div class="form-check">
   									<input type="checkbox" class="form-check-input" name="sun" value="Sun" id="sun" checked>
    								<label class="form-check-label" for="sun">Sunday</label>
  								</div>
								<div class="form-check">
   									<input type="checkbox" class="form-check-input" name="mon" value="Mon" id="mon" checked>
    								<label class="form-check-label" for="mon">Monday</label>
  								</div>
								<div class="form-check">
   									<input type="checkbox" class="form-check-input" name="tue" value="Tue" id="tue" checked>
    								<label class="form-check-label" for="tue">Tuesday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" name="wed" value="Wed" id="wed" checked>
    								<label class="form-check-label" for="wed">Wednesday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" name="thu" value="Thu" id="thu" checked>
    								<label class="form-check-label" for="thu">Thursday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" name="fri" value="Fri" id="fri" checked>
    								<label class="form-check-label" for="fri">Friday</label>
  								</div>
								  <div class="form-check">
   									<input type="checkbox" class="form-check-input" name="sat" value="Sat" id="sat" checked>
    								<label class="form-check-label" for="sat">Saturday</label>
  								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInput">Departure Time of the day</label>
								<input type="time" class="form-control" id="depTimeInput" name="depTime">
									
							</div>
							<ul class="nav nav-pills flex-column">
								<li class="nav-item">
								<?php
								if(isset($_SESSION['userId']))
								{
							  		echo '<p class="login-status"> You are logged in </p>';
							  		echo '
							  		<div class="form-group">
							  		<button class="btn btn-lg btn-primary" type="submit" name="search-submit">Search</button>
						  			</div>';
								}
								else{
							  echo '<p class="text-danger"> Please login </p>';
								}
						 		?>
								</li>
							</ul>


				<hr class="d-sm-none">
							<br>
						</form>
					<br>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>
</html>

