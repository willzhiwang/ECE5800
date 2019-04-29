<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
</html>
<?php
require "header.php";
require 'configDB.php';
?>

<body>
	<main>
		<br>
		<br>
			<div class="container bg-white" style="width:1300px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h3 style="margin-left:19rem">All Vehicles</h3>
					<br>
						<form action="rides.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">

								<div class="form-group">
							  		<button class="btn btn-primary" type="submit" name="search-submit">Back</button>
                                  </div>
                                  
                                <div class="form-group" style="margin-left:2rem">
                                  <?php 
                                  if (isset($_GET['error']))
                                  {
                                    												
                                    echo '<large class="text-danger"> Please contact us! </large>';
                                    
                                  }
                                  else if (isset($_GET['vehicles']) == "success")
                                  {
                                      echo '<large class="text-success"> Success! </large>';
                                  }
                                  ?>
                                </div>
                                </div>
                            </div>  
                        </form>	
                    <?php
                    echo'
                    <body>
                    <main>
                    <form action="deleteVehicle.php" method="post">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">UserID</th>
                                <th scope="col">VehicleID</th>
                                <th scope="col">LicensePlate</th>
                                <th scope="col">Year</th>
                                <th scope="col">Make</th>
                                <th scope="col">Model</th>
                                <th scope="col">Color</th>
                               <th scope="col">MaxCapacity</th>
                                <th scope="col"></th>
                              </tr>
                    </thead>';

        $sqlAdmin = "SELECT Vehicle.OwnerUser, Vehicle.VehicleID, Vehicle.LicensePlate, Vehicle.Year, Vehicle.Make, 
        Vehicle.Model, Vehicle.Color, Vehicle.MaxCapacity
        FROM Vehicle
        ";
        $tableResults = mysqli_query($conn, $sqlAdmin);
        echo"<tbody>";
            while ($row = mysqli_fetch_array($tableResults))
            {
                //echo " ".$currentRoute;
                $currentVehicle=$row['VehicleID'];
                echo "<tr>";
                echo "<td>".$row['OwnerUser']."</td>";
                echo "<td>".$row['VehicleID']."</td>";
                echo "<td>".$row['LicensePlate']."</td>";
                echo "<td>".$row['Year']."</td>";
                echo "<td>".$row['Make']."</td>";
                echo "<td>".$row['Model']."</td>";
                echo "<td>".$row['Color']."</td>";
                echo "<td>".$row['MaxCapacity']."</td>";
                //echo "<td>".$row['PhoneNumber']."</td>";
                echo '<td><button type="submit" class="btn btn-danger" name="deleteVehicle-submit" value='.$currentVehicle.'>Remove</button></td>';
            }
        echo '</tr></tbody></div></form></main></body>';
        ;
    ?>    
</form>	
			
				<hr class="d-sm-none">
					<br>
					<br>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>