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
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<?php
if (isset($_GET['error']))
{
  if ($_GET['error'] == "emptyfields")
  {
    echo '<small class="text-danger"> Fill in all fields! </small>';
  }else{
    echo '<small class="text-danger"> An internal error occurred; please contact us for assistance. </small>';
  }
}else if (isset($_GET['create']))
{
  if ( $_GET['create'] == "success") {
    echo '<small class="text-success"> Vehicle successfully added! </small>';
  }
}
?>
  <h2>Add Vehicle</h2>
  <p>Please fill out the following information to add a vehicle</p>
  <form action="/AddVehicle.inc.php" method="post">
    <div class="form-group">
      <label for="licPlateInput">License Plate:</label>
      <input type="text" class="form-control" id="licPlateInput" name="licPlate">
    </div>
    <div class="form-group">
      <label for="makeInput">Make:</label>
      <input type="text" class="form-control" id="makeInput" name="make">
    </div>
    <div class="form-group">
      <label for="yearInput">Year:</label>
      <input type="number" class="form-control" id="yearInput" name="year">
    </div>
    <div class="form-group">
      <label for="modelInput">Model:</label>
      <input type="text" class="form-control" id="modelInput" name="model">
    </div>
    <div class="form-group">
      <label for="colorInput">Color:</label>
      <input type="text" class="form-control" id="colorInput" name="color">
    </div>
    <div class="form-group">
      <label for="capacityInput">Max Capacity (excluding driver):</label>
      <input type="number" class="form-control" id="capacityInput" name="capacity">
    </div>
    <button type="submit" name="AddVehicle-submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


    
<?php
    require "footer.php"
?>   