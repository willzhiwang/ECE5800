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
</html>
<?php
    require "header.php"
?>

<?php
    require_once('./configDB.php');
    $db = getConnection();

    $databaseStateStrings = array();
    $databaseStateStrings[0] = "StateID";
    $databaseStateStrings[1] = "StateAbbrev";
    $databaseStateName = "States";

    $databaseVehicleStrings = array();
    $databaseVehicleStrings[0] = "VehicleID";
    $databaseVehicleStrings[1] = "LicensePlate";
    $databaseVehicleStrings[2] = "Make";
    $databaseVehicleStrings[3] = "Model";
    $databaseVehicleStrings[4] = "Color";
    $databaseVehicleName = "Vehicle";

    $array_states = getDatabaseArray($db, $databaseStateStrings, $databaseStateName);
    $array_vehicles = getDatabaseArray($db, $databaseVehicleStrings, $databaseVehicleName);

    $sqlAdmin = "SELECT User.UserID, Account.AccountID, Person.PersonID, Account.Email, Account.Username, Person.FirstName ,Person.LastName, Person.DateOfBirth, Person.PhoneNumber
    FROM Account
    INNER JOIN User ON (Account.UserID = User.UserID) AND (User.IsDriver=1)
    JOIN Person ON (Account.PersonID = Person.PersonID)
    ";
    $tableResults = mysqli_query($conn, $sqlAdmin);
    $array_drivers = array();
    if($tableResults) {
      while($row = mysqli_fetch_array($tableResults)) {
        $array_drivers[] = $row;
      }
    } else {
      echo "Couldn't issue the database query<br>";
      echo mysqli_error($conn);
    }

    function getConnection() {
      $test = mysqli_connect('localhost', 'root', '', 'Group7Vanpool');
      return $test;
  }

    function printOutArrayData($arrayToPrint) {
      echo '<table align="left" cellspacing="5" cellpadding="8">';
        for($i = 0; $i < sizeof($arrayToPrint); $i++) {
          echo '<tr>';
          for($j = 0; $j < sizeof($arrayToPrint); $j++) {
            echo '<td align="left">'.$arrayToPrint[$i][$j].'</td>';
          }
          echo '</tr>';
        }
        echo '</table>';
    }

    function getDatabaseArray($dbc, $databaseStrings, $databaseName) {
      $queryTemp = "SELECT ";
      for($i = 0; $i < sizeof($databaseStrings); $i++) {
        $queryTemp .= $databaseStrings[$i];
        if(($i+1) < sizeof($databaseStrings)) {
          $queryTemp .= ", ";
        }
      }
      $queryTemp .= " FROM ".$databaseName;
      //echo $queryTemp;
      $responseTemp = @mysqli_query($dbc, $queryTemp);
      $arrayTemp = array();
      if($responseTemp) {
          while($row = mysqli_fetch_array($responseTemp)) {
              $arrayTemp[] = $row;
          }
      } else {
          echo "Couldn't query the database";
          echo mysqli_error($dbc);
      }
      return $arrayTemp;
  }
?>

<script>

var stateInput;

var allStateAbbrevFrom;
var allStateAbbrevTo;
var fromStateAbbrev;
var toStateAbbrev;

var vehicleInput;

var vehicleStrings;

var driverInput;

var driverStrings;

window.onload = function() {
  stateInput = <?php echo json_encode($array_states); ?>;
  vehicleInput = <?php echo json_encode($array_vehicles); ?>;
  driverInput = <?php echo json_encode($array_drivers); ?>;

  allStateAbbrevFrom = [stateInput.length];
  allStateAbbrevTo = [stateInput.length];

  vehicleStrings = [vehicleInput.length];

  driverStrings = [driverInput.length];


  allStateAbbrevFrom[0] = document.getElementById('stateFromOption0');
  allStateAbbrevFrom[1] = document.getElementById('stateFromOption1');
  allStateAbbrevFrom[2] = document.getElementById('stateFromOption2');
  allStateAbbrevFrom[3] = document.getElementById('stateFromOption3');
  allStateAbbrevFrom[4] = document.getElementById('stateFromOption4');
  allStateAbbrevFrom[5] = document.getElementById('stateFromOption5');
  allStateAbbrevFrom[6] = document.getElementById('stateFromOption6');
  allStateAbbrevFrom[7] = document.getElementById('stateFromOption7');
  allStateAbbrevFrom[8] = document.getElementById('stateFromOption8');
  allStateAbbrevFrom[9] = document.getElementById('stateFromOption9');
  allStateAbbrevFrom[10] = document.getElementById('stateFromOption10');
  allStateAbbrevFrom[11] = document.getElementById('stateFromOption11');
  allStateAbbrevFrom[12] = document.getElementById('stateFromOption12');
  allStateAbbrevFrom[13] = document.getElementById('stateFromOption13');
  allStateAbbrevFrom[14] = document.getElementById('stateFromOption14');
  allStateAbbrevFrom[15] = document.getElementById('stateFromOption15');
  allStateAbbrevFrom[16] = document.getElementById('stateFromOption16');
  allStateAbbrevFrom[17] = document.getElementById('stateFromOption17');
  allStateAbbrevFrom[18] = document.getElementById('stateFromOption18');
  allStateAbbrevFrom[19] = document.getElementById('stateFromOption19');
  allStateAbbrevFrom[20] = document.getElementById('stateFromOption20');
  allStateAbbrevFrom[21] = document.getElementById('stateFromOption21');
  allStateAbbrevFrom[22] = document.getElementById('stateFromOption22');
  allStateAbbrevFrom[23] = document.getElementById('stateFromOption23');
  allStateAbbrevFrom[24] = document.getElementById('stateFromOption24');
  allStateAbbrevFrom[25] = document.getElementById('stateFromOption25');
  allStateAbbrevFrom[26] = document.getElementById('stateFromOption26');
  allStateAbbrevFrom[27] = document.getElementById('stateFromOption27');
  allStateAbbrevFrom[28] = document.getElementById('stateFromOption28');
  allStateAbbrevFrom[29] = document.getElementById('stateFromOption29');
  allStateAbbrevFrom[30] = document.getElementById('stateFromOption30');
  allStateAbbrevFrom[31] = document.getElementById('stateFromOption31');
  allStateAbbrevFrom[32] = document.getElementById('stateFromOption32');
  allStateAbbrevFrom[33] = document.getElementById('stateFromOption33');
  allStateAbbrevFrom[34] = document.getElementById('stateFromOption34');
  allStateAbbrevFrom[35] = document.getElementById('stateFromOption35');
  allStateAbbrevFrom[36] = document.getElementById('stateFromOption36');
  allStateAbbrevFrom[37] = document.getElementById('stateFromOption37');
  allStateAbbrevFrom[38] = document.getElementById('stateFromOption38');
  allStateAbbrevFrom[39] = document.getElementById('stateFromOption39');
  allStateAbbrevFrom[40] = document.getElementById('stateFromOption40');
  allStateAbbrevFrom[41] = document.getElementById('stateFromOption41');
  allStateAbbrevFrom[42] = document.getElementById('stateFromOption42');
  allStateAbbrevFrom[43] = document.getElementById('stateFromOption43');
  allStateAbbrevFrom[44] = document.getElementById('stateFromOption44');
  allStateAbbrevFrom[45] = document.getElementById('stateFromOption45');
  allStateAbbrevFrom[46] = document.getElementById('stateFromOption46');
  allStateAbbrevFrom[47] = document.getElementById('stateFromOption47');
  allStateAbbrevFrom[48] = document.getElementById('stateFromOption48');
  allStateAbbrevFrom[49] = document.getElementById('stateFromOption49');

  allStateAbbrevTo[0] = document.getElementById('stateToOption0');
  allStateAbbrevTo[1] = document.getElementById('stateToOption1');
  allStateAbbrevTo[2] = document.getElementById('stateToOption2');
  allStateAbbrevTo[3] = document.getElementById('stateToOption3');
  allStateAbbrevTo[4] = document.getElementById('stateToOption4');
  allStateAbbrevTo[5] = document.getElementById('stateToOption5');
  allStateAbbrevTo[6] = document.getElementById('stateToOption6');
  allStateAbbrevTo[7] = document.getElementById('stateToOption7');
  allStateAbbrevTo[8] = document.getElementById('stateToOption8');
  allStateAbbrevTo[9] = document.getElementById('stateToOption9');
  allStateAbbrevTo[10] = document.getElementById('stateToOption10');
  allStateAbbrevTo[11] = document.getElementById('stateToOption11');
  allStateAbbrevTo[12] = document.getElementById('stateToOption12');
  allStateAbbrevTo[13] = document.getElementById('stateToOption13');
  allStateAbbrevTo[14] = document.getElementById('stateToOption14');
  allStateAbbrevTo[15] = document.getElementById('stateToOption15');
  allStateAbbrevTo[16] = document.getElementById('stateToOption16');
  allStateAbbrevTo[17] = document.getElementById('stateToOption17');
  allStateAbbrevTo[18] = document.getElementById('stateToOption18');
  allStateAbbrevTo[19] = document.getElementById('stateToOption19');
  allStateAbbrevTo[20] = document.getElementById('stateToOption20');
  allStateAbbrevTo[21] = document.getElementById('stateToOption21');
  allStateAbbrevTo[22] = document.getElementById('stateToOption22');
  allStateAbbrevTo[23] = document.getElementById('stateToOption23');
  allStateAbbrevTo[24] = document.getElementById('stateToOption24');
  allStateAbbrevTo[25] = document.getElementById('stateToOption25');
  allStateAbbrevTo[26] = document.getElementById('stateToOption26');
  allStateAbbrevTo[27] = document.getElementById('stateToOption27');
  allStateAbbrevTo[28] = document.getElementById('stateToOption28');
  allStateAbbrevTo[29] = document.getElementById('stateToOption29');
  allStateAbbrevTo[30] = document.getElementById('stateToOption30');
  allStateAbbrevTo[31] = document.getElementById('stateToOption31');
  allStateAbbrevTo[32] = document.getElementById('stateToOption32');
  allStateAbbrevTo[33] = document.getElementById('stateToOption33');
  allStateAbbrevTo[34] = document.getElementById('stateToOption34');
  allStateAbbrevTo[35] = document.getElementById('stateToOption35');
  allStateAbbrevTo[36] = document.getElementById('stateToOption36');
  allStateAbbrevTo[37] = document.getElementById('stateToOption37');
  allStateAbbrevTo[38] = document.getElementById('stateToOption38');
  allStateAbbrevTo[39] = document.getElementById('stateToOption39');
  allStateAbbrevTo[40] = document.getElementById('stateToOption40');
  allStateAbbrevTo[41] = document.getElementById('stateToOption41');
  allStateAbbrevTo[42] = document.getElementById('stateToOption42');
  allStateAbbrevTo[43] = document.getElementById('stateToOption43');
  allStateAbbrevTo[44] = document.getElementById('stateToOption44');
  allStateAbbrevTo[45] = document.getElementById('stateToOption45');
  allStateAbbrevTo[46] = document.getElementById('stateToOption46');
  allStateAbbrevTo[47] = document.getElementById('stateToOption47');
  allStateAbbrevTo[48] = document.getElementById('stateToOption48');
  allStateAbbrevTo[49] = document.getElementById('stateToOption49');


  for(var i = 0; i < stateInput.length; i++) {
    allStateAbbrevFrom[i].innerHTML = stateInput[i][1];
    allStateAbbrevTo[i].innerHTML = stateInput[i][1];
  }

  fromStateAbbrev = stateInput[0][1];
  toStateAbbrev = stateInput[0][1];

  for(var i = 0; i < vehicleInput.length; i++) {
    vehicleStrings[i] = vehicleInput[i][2] + " " + vehicleInput[i][3] + " " + vehicleInput[i][4] + ", License: " + vehicleInput[i][1];
  }

  for(var i = 0; i < driverInput.length; i++) {
    driverStrings[i] = driverInput[i][4] + " (" + driverInput[i][5] + " " + driverInput[i][6] + ")";
  }

  var optionSelectVehicle = document.getElementById("vehicleInput");
  var optionSelectDriver = document.getElementById("driverInput");

  for(var i = 0; i < vehicleStrings.length; i++) {
    var tempOption = document.createElement("option");
    tempOption.text = vehicleStrings[i];
    tempOption.value = vehicleInput[i][0];
    optionSelectVehicle.add(tempOption);
  }

  for(var i = 0; i < driverInput.length; i++) {
    var tempOption = document.createElement("option");
    tempOption.text = driverStrings[i];
    tempOption.value = driverInput[i][0]
    optionSelectDriver.add(tempOption);
  }



}

function onFromStateChange() {
  for(var i = 0; i < stateInput.length; i++) {
    if(i == document.getElementById('stateFrom').value) {
      fromStateAbbrev = stateInput[i][1];
    }
  }
}

function onToStateChange() {
  for(var i = 0; i < stateInput.length; i++) {
    if(i == document.getElementById('stateTo').value) {
      toStateAbbrev = stateInput[i][1];
    }
  }
}


</script>

<html>
<body>
  <main>
  <div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:50%;border-radius:25px;border-style:inset;border-width:large">
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
        <h2 style="margin-left:40%">Add Route</h2>

          <form action="AddRoute.inc.php" method="post">
          <div class="form-group" style="margin-left:5%">
            <p style="font-weight:bold">Select a Vehicle</p>
            <div class="form-group" style="margin-left:5%">
              <label for="vehicleInput">Vehicle Used:</label>
              <select name="vehicleid" id="vehicleInput">
              </select>
            </div>
            <p style="font-weight:bold">Select a Driver</p>
            <div class="form-group" style="margin-left:5%">
              <label for="driverInput">Driver:</label>
              <select name="driverid" id="driverInput">
              </select>
            </div>
            <p style="font-weight:bold">Departs From...</p>
            <div class="form-group" style="margin-left:5%">
							<label for="addressNameFrom">Location Name</label>
								<div class="row" style="margin-right:2%">
									<input type="text" class="form-control" name="AnameFrom" id="addressNameFrom" maxlength="61" placeholder="Name/Apt number/Company for this Address">
								</div>
							</div>
							<div class="form-group" style="margin-left:5%">
								<label for="streetInputFrom">Street</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="streetFrom" id="streetInputFrom" maxlength="127" placeholder="Street">
								</div>
							</div>
                <div class="form-group" style="margin-left:5%">
								<div class="row">
									<div class="col-xs-3">
                    <p>City</p>
                  </div>
                  <div class="col-xs-3" style="margin-left:35%">
                    <p>State</p>
                  </div>
                  <div class="col-xs-3" style="margin-left:7%">
                    <p>Zip Code</P>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3">
                    <input type="text" class="form-control" name="cityFrom" id="cityInputFrom" maxlength="31" placeholder="City">
                  </div>
                  <div class="col-xs-3" style="margin-left:5%">
                    <select name="stateFrom" id="stateInputFrom" style="margin-top:10%" onchange="onFromStateChange()">
                        <option id="stateFromOption0" value="0" selected="0">Null</option>
                        <option id="stateFromOption1" value="1">Null</option>
                        <option id="stateFromOption2" value="2">Null</option>
                        <option id="stateFromOption3" value="3">Null</option>
                        <option id="stateFromOption4" value="4">Null</option>
                        <option id="stateFromOption5" value="5">Null</option>
                        <option id="stateFromOption6" value="6">Null</option>
                        <option id="stateFromOption7" value="7">Null</option>
                        <option id="stateFromOption8" value="8">Null</option>
                        <option id="stateFromOption9" value="9">Null</option>
                        <option id="stateFromOption10" value="10">Null</option>
                        <option id="stateFromOption11" value="11">Null</option>
                        <option id="stateFromOption12" value="12">Null</option>
                        <option id="stateFromOption13" value="13">Null</option>
                        <option id="stateFromOption14" value="14">Null</option>
                        <option id="stateFromOption15" value="15">Null</option>
                        <option id="stateFromOption16" value="16">Null</option>
                        <option id="stateFromOption17" value="17">Null</option>
                        <option id="stateFromOption18" value="18">Null</option>
                        <option id="stateFromOption19" value="19">Null</option>
                        <option id="stateFromOption20" value="20">Null</option>
                        <option id="stateFromOption21" value="21">Null</option>
                        <option id="stateFromOption22" value="22">Null</option>
                        <option id="stateFromOption23" value="23">Null</option>
                        <option id="stateFromOption24" value="24">Null</option>
                        <option id="stateFromOption25" value="25">Null</option>
                        <option id="stateFromOption26" value="26">Null</option>
                        <option id="stateFromOption27" value="27">Null</option>
                        <option id="stateFromOption28" value="28">Null</option>
                        <option id="stateFromOption29" value="29">Null</option>
                        <option id="stateFromOption30" value="30">Null</option>
                        <option id="stateFromOption31" value="31">Null</option>
                        <option id="stateFromOption32" value="32">Null</option>
                        <option id="stateFromOption33" value="33">Null</option>
                        <option id="stateFromOption34" value="34">Null</option>
                        <option id="stateFromOption35" value="35">Null</option>
                        <option id="stateFromOption36" value="36">Null</option>
                        <option id="stateFromOption37" value="37">Null</option>
                        <option id="stateFromOption38" value="38">Null</option>
                        <option id="stateFromOption39" value="39">Null</option>
                        <option id="stateFromOption40" value="40">Null</option>
                        <option id="stateFromOption41" value="41">Null</option>
                        <option id="stateFromOption42" value="42">Null</option>
                        <option id="stateFromOption43" value="43">Null</option>
                        <option id="stateFromOption44" value="44">Null</option>
                        <option id="stateFromOption45" value="45">Null</option>
                        <option id="stateFromOption46" value="46">Null</option>
                        <option id="stateFromOption47" value="47">Null</option>
                        <option id="stateFromOption48" value="48">Null</option>
                        <option id="stateFromOption49" value="49">Null</option>
                      </select>
                    </div>
                    <div class="col-xs-3" style="margin-left:5%">
                      <input type="text" class="form-control" name="zipFrom" id="zipCodeInputFrom" maxlength="10" placeholder="Zip Code">
                    </div>
                  </div>
                </div>

                <p style="font-weight:bold">Goes To...</p>
      <div class="form-group" style="margin-left:5%">
    
							<label for="addressNameTo">Location Name</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="AnameTo" id="addressNameTo" maxlength="61" placeholder="Name/Apt number/Company for this Address">
								</div>
		  </div>
							<div class="form-group" style="margin-left:5%">
								<label for="streetInputTo">Street</label>
								<div class="row" style="margin-right:2%">
									<input type="text" class="form-control" name="streetTo" id="streetInputTo" maxlength="127" placeholder="Street">
								</div>
							</div>
                <div class="form-group" style="margin-left:5%">
								<div class="row">
									<div class="col-xs-3">
                    <p>City</p>
                  </div>
                  <div class="col-xs-3" style="margin-left:35%">
                    <p>State</p>
                  </div>
                  <div class="col-xs-3" style="margin-left:7%">
                    <p>Zip Code</P>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3">
                    <input type="text" class="form-control" name="cityTo" id="cityInputTo" maxlength="31" placeholder="City">
                  </div>
                  <div class="col-xs-3" style="margin-left:5%">
                    <select name="stateTo" id="stateInputTo" style="margin-top:10%" onchange="onToStateChange()">
                        <option id="stateToOption0" value="0" selected="0">Null</option>
                        <option id="stateToOption1" value="1">Null</option>
                        <option id="stateToOption2" value="2">Null</option>
                        <option id="stateToOption3" value="3">Null</option>
                        <option id="stateToOption4" value="4">Null</option>
                        <option id="stateToOption5" value="5">Null</option>
                        <option id="stateToOption6" value="6">Null</option>
                        <option id="stateToOption7" value="7">Null</option>
                        <option id="stateToOption8" value="8">Null</option>
                        <option id="stateToOption9" value="9">Null</option>
                        <option id="stateToOption10" value="10">Null</option>
                        <option id="stateToOption11" value="11">Null</option>
                        <option id="stateToOption12" value="12">Null</option>
                        <option id="stateToOption13" value="13">Null</option>
                        <option id="stateToOption14" value="14">Null</option>
                        <option id="stateToOption15" value="15">Null</option>
                        <option id="stateToOption16" value="16">Null</option>
                        <option id="stateToOption17" value="17">Null</option>
                        <option id="stateToOption18" value="18">Null</option>
                        <option id="stateToOption19" value="19">Null</option>
                        <option id="stateToOption20" value="20">Null</option>
                        <option id="stateToOption21" value="21">Null</option>
                        <option id="stateToOption22" value="22">Null</option>
                        <option id="stateToOption23" value="23">Null</option>
                        <option id="stateToOption24" value="24">Null</option>
                        <option id="stateToOption25" value="25">Null</option>
                        <option id="stateToOption26" value="26">Null</option>
                        <option id="stateToOption27" value="27">Null</option>
                        <option id="stateToOption28" value="28">Null</option>
                        <option id="stateToOption29" value="29">Null</option>
                        <option id="stateToOption30" value="30">Null</option>
                        <option id="stateToOption31" value="31">Null</option>
                        <option id="stateToOption32" value="32">Null</option>
                        <option id="stateToOption33" value="33">Null</option>
                        <option id="stateToOption34" value="34">Null</option>
                        <option id="stateToOption35" value="35">Null</option>
                        <option id="stateToOption36" value="36">Null</option>
                        <option id="stateToOption37" value="37">Null</option>
                        <option id="stateToOption38" value="38">Null</option>
                        <option id="stateToOption39" value="39">Null</option>
                        <option id="stateToOption40" value="40">Null</option>
                        <option id="stateToOption41" value="41">Null</option>
                        <option id="stateToOption42" value="42">Null</option>
                        <option id="stateToOption43" value="43">Null</option>
                        <option id="stateToOption44" value="44">Null</option>
                        <option id="stateToOption45" value="45">Null</option>
                        <option id="stateToOption46" value="46">Null</option>
                        <option id="stateToOption47" value="47">Null</option>
                        <option id="stateToOption48" value="48">Null</option>
                        <option id="stateToOption49" value="49">Null</option>
                      </select>
                    </div>
                    <div class="col-xs-3" style="margin-left:5%">
                      <input type="text" class="form-control" name="zipTo" id="zipCodeInputTo" maxlength="10" placeholder="Zip Code">
                    </div>
                  </div>
                </div>

                <p style="font-weight:bold">Route Time</p>
    <div class="form-group" style="margin-left:5%;margin-right:30%;">
      <label for="usr">Departure time:</label>
      <input type="time" class="form-control" id="depTimeInput" name="depTime">
    </div>
    <div class="form-group" style="margin-left:5%;margin-right:30%;">
      <label for="usr">Estimated arrival time:</label>
      <input type="time" class="form-control" id="arrTimeInput" name="arrTime">
    </div>
    <div class="form-group" style="margin-left:5%;margin-right:30%;">
      <label for="usr">Distance (in miles):</label>
      <input type="text" class="form-control" id="distanceInput" name="distance">
    </div>
    <p style="font-weight:bold">Route Frequency</p> 
    
      <div class="form-group" style="margin-left:5%">
        <div class="form-check-inline">
        <div class="row">
            <div class="col-xs-3" style="margin-left:3%">
          <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Sun">Sun 
          </label> 
            </div>

            <div class="col-xs-3" style="margin-left:3%">
          <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Mon">Mon 
          </label> 
          </div>

          <div class="col-xs-3" style="margin-left:3%">
          <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Tue">Tues 
          </label> 
          </div>
          
          <div class="col-xs-3" style="margin-left:3%">
          <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Wed">Wed 
            </label> 
            </div>

            <div class="col-xs-3" style="margin-left:3%">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Thu">Thurs 
            </label> 
            </div>

            <div class="col-xs-3" style="margin-left:3%">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Fri">Fri 
            </label> 
            </div>
            
            <div class="col-xs-3" style="margin-left:3%">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="daysChecked[]" value="Sat">Sat 
            </label>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top:4%">
        <button type="submit" class="btn btn-primary" name="AddRoute-submit">Submit</button>
        </div>
        </div>
      </div>
      </form>
      <br>
      <br>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div>
    </main>
  </body>
</html>



