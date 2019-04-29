<!DOCTYPE html>
<html>
<head>    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
</html>
<?php
    require "header.php"
?>
<html>
<body>
  <main>
    <div class="container">
      <?php
      if (isset($_GET['error']))
						{
							if ($_GET['error'] == "emptyfields")
							{
								echo '<small class="text-danger"> Fill in all fields! </small>';
              }
              elseif ($_GET['error'] == "wrongvehicle")
              {
                echo '<small class="text-danger"> That vehicle doesn\'t exist! </small>';
              }
              elseif ($_GET['error'] == "wrongdriver")
              {
                echo '<small class="text-danger"> That driver doesn\'t exist! </small>';
              }else{
                echo '<small class="text-danger"> An internal error occurred; please contact us for assistance. </small>';
              }
            }else if (isset($_GET['create']))
            {
              if ( $_GET['create'] == "success") {
                echo '<small class="text-success"> Route successfully added! </small>';
              }
            }
        ?>
        <h2>Add Route</h2>
  <!-- TODO: replace ID inputs with a drop-down menu. In the far future,
   a way to search by name would probably be more efficient.-->
          <form action="AddRoute.inc.php" method="post">
            <div class="form-group">
              <label for="usr">Vehicle used (ID):</label>
              <input type="number" class="form-control" id="vehicleidInput" name="vehicleid">
            </div>
            <div class="form-group">
              <label for="usr">Driver (ID):</label>
              <input type="number" class="form-control" id="driveridInput" name="driverid">
            </div>
            Departs From...
            <div class="form-group" style="margin-left:2rem">
      
							<label for="addressNameFrom">Location Name</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="AnameFrom" id="addressNameFrom" maxlength="61" placeholder="Name/Apt number/Company for this Address">
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="streetInputFrom">Street</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="streetFrom" id="streetInputFrom" maxlength="127" placeholder="Street">
								</div>
							</div>
              <!-- TODO: make city, state, zip code all on same line
                For brevity, and to mimic what a normal address looks like-->
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInputFrom">City</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="cityFrom" id="cityInputFrom" maxlength="31" placeholder="City">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInputFrom">State</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="stateFrom" id="stateInputFrom" maxlength="2" placeholder="State">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInputFrom">Zip Code</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="zipFrom" id="zipCodeInputFrom" maxlength="10" placeholder="Zip Code">
									</div>
								</div>
							</div>

              Goes To...
      <div class="form-group" style="margin-left:2rem">
    
							<label for="addressNameTo">Location Name</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="AnameTo" id="addressNameTo" maxlength="61" placeholder="Name/Apt number/Company for this Address">
								</div>
		  </div>
							<div class="form-group" style="margin-left:2rem">
								<label for="streetInputTo">Street</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="streetTo" id="streetInputTo" maxlength="127" placeholder="Street">
								</div>
							</div>
              <!-- TODO: make city, state, zip code all on same line
                For brevity, and to mimic what a normal address looks like-->
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInputTo">City</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="cityTo" id="cityInputTo" maxlength="31" placeholder="City">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInputTo">State</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="stateTo" id="stateInputTo" maxlength="2" placeholder="State">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInputTo">Zip Code</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="zipTo" id="zipCodeInputTo" maxlength="10" placeholder="Zip Code">
									</div>
								</div>
					</div>

    <div class="form-group">
      <label for="usr">Departure time:</label>
      <input type="time" class="form-control" id="depTimeInput" name="depTime">
    </div>
    <div class="form-group">
      <label for="usr">Estimated arrival time:</label>
      <input type="time" class="form-control" id="arrTimeInput" name="arrTime">
    </div>
    <div class="form-group">
      <label for="usr">Distance (in miles):</label>
      <input type="text" class="form-control" id="distanceInput" name="distance">
    </div>
    Runs On: 
    
      <div class="form-group">
        <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Sun">Sun 
        </label> 
       
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Mon">Mon 
        </label> 
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Tue">Tues 
        </label> 
        
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Wed">Wed 
          </label> 
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Thu">Thurs 
          </label> 
         
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Fri">Fri 
          </label> 
          
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Sat">Sat 
          </label>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="AddRoute-submit">Submit</button>
        </div>
        </div>
    
      </form>

      <br>
      <br>
      </div>
    </main>
  </body>
</html>

