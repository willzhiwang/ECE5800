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
	require "header.php";
	require 'configDB.php';
	$currentAccountID=$_SESSION['userId'];
	$sql2 = "SELECT `PersonID` FROM `Account` WHERE `AccountID`=$currentAccountID";
	$result2 = mysqli_query($conn, $sql2);

	if (mysqli_num_rows($result2) > 0) {
		$row = mysqli_fetch_assoc($result2);
		$currentPersonID = $row["PersonID"];
		//echo "\n Person id from Account table: " . $currentPersonID. "<br>";
		if ($row["PersonID"]==NULL)//when it's null
		{
			$firstname = "";
			$lastname = "";
			$birthdate = "";
			$phone = "";
			$Aname= "";
			$street = "";
			$city = "";
			$state = "";
			$zip = "";
		}
		else
		{
			$sql3 = "SELECT `FirstName`,`LastName`,`DateOfBirth`,`PhoneNumber`,`Address` FROM `Person` WHERE `PersonID`=$currentPersonID";
			$result3 = mysqli_query($conn, $sql3);
			if (mysqli_num_rows($result3) > 0) {
				$row2 = mysqli_fetch_assoc($result3);

				//$PersonID = $row2["ID"];
				$firstname = $row2["FirstName"];
				$lastname = $row2["LastName"];
				$birthdate = $row2["DateOfBirth"];
				$phone = $row2["PhoneNumber"];
				//Address
				$currentAddressID = $row2["Address"];
				if ($currentAddressID==NULL)//when it's null
				{
					$Aname= "";
					$street = "";
					$city = "";
					$state = "0";
					$zip = "";
				}
				else
				{
					$sql4 = "SELECT `Name`,`Street`,`City`,`State`,`ZipCode` FROM `Address` WHERE `AddressID`=$currentAddressID";
					$result4 = mysqli_query($conn, $sql4);
					if (mysqli_num_rows($result4) > 0) {
						$row4 = mysqli_fetch_assoc($result4);
						$Aname= $row4["Name"];;
						$street = $row4["Street"];
						$city = $row4["City"];
						$state = $row4["State"];
						$zip = $row4["ZipCode"];
					}
				}
			}
		}	
	}
		

?>

<body>
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

							<?php 
								if (isset($_GET['error']))
								{
											
									if ($_GET['error'] == "emptyPersonFields")
									{
										echo '<large class="text-danger"> Fill in all person info! </large>';
									}
									else if ($_GET['error'] == "emptyAddressFields")
									{
										echo '<large class="text-danger"> Fill in all address info! </large>';
									}
									else 
									{												
										echo '<large class="text-danger"> Please contact us! </large>';
									}
								}
								else if (isset($_GET['account']) == "success")
								{
									echo '<large class="text-success"> Saved! </large>';
								}
								?>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<div class="row">
									<div class="col-xs-3">
										<label for="firstNameInput">First Name</label>
										<input type="text" class="form-control" name="fname" id="firstNameInput" placeholder="First Name" value= "<?php echo $firstname; ?>">
									</div>
									<div class="col-xs-3" style="margin-left:1.5rem">
										<label for="lastNameInput">Last Name</label>
										<input type="text" class="form-control" name="lname" id="lastNameInput" placeholder="Last Name" value= "<?php echo $lastname; ?>">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="addressInput">Name</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="Aname" id="addressName" placeholder="Name/Apt number/Company for this Address" value= "<?php echo $Aname; ?>">
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="addressInput">Address</label>
								<div class="row" style="margin-right:1rem">
									<input type="text" class="form-control" name="address" id="addressInput" placeholder="Street" value= "<?php echo $street; ?>">
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="cityInput">City</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="city" id="cityInput" placeholder="City" value= "<?php echo $city; ?>">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="stateInput">State</label>
								<div class="row">
									<div class="col-xs-3">
									<select name="state" id="stateInput" style="margin-top:10%" onchange="onFromStateChange()" selected="<?php echo $state; ?>">
										<!-- TODO: populate from database instead of hard-coding -->
										<!-- TODO: properly start drop-down on previously selected state-->
										<option id="stateFromOption0" value="0">AL</option>
										<option id="stateFromOption1" value="1">AK</option>
										<option id="stateFromOption2" value="2">AZ</option>
										<option id="stateFromOption3" value="3">AR</option>
										<option id="stateFromOption4" value="4">CA</option>
										<option id="stateFromOption5" value="5">CO</option>
										<option id="stateFromOption6" value="6">CT</option>
										<option id="stateFromOption7" value="7">DE</option>
										<option id="stateFromOption8" value="8">FL</option>
										<option id="stateFromOption9" value="9">GA</option>
										<option id="stateFromOption10" value="10">HI</option>
										<option id="stateFromOption11" value="11">ID</option>
										<option id="stateFromOption12" value="12">IL</option>
										<option id="stateFromOption13" value="13">IN</option>
										<option id="stateFromOption14" value="14">IA</option>
										<option id="stateFromOption15" value="15">KS</option>
										<option id="stateFromOption16" value="16">KY</option>
										<option id="stateFromOption17" value="17">LA</option>
										<option id="stateFromOption18" value="18">ME</option>
										<option id="stateFromOption19" value="19">MD</option>
										<option id="stateFromOption20" value="20">MA</option>
										<option id="stateFromOption21" value="21">MI</option>
										<option id="stateFromOption22" value="22">MN</option>
										<option id="stateFromOption23" value="23">MS</option>
										<option id="stateFromOption24" value="24">MO</option>
										<option id="stateFromOption25" value="25">MT</option>
										<option id="stateFromOption26" value="26">NE</option>
										<option id="stateFromOption27" value="27">NV</option>
										<option id="stateFromOption28" value="28">NH</option>
										<option id="stateFromOption29" value="29">NJ</option>
										<option id="stateFromOption30" value="30">NM</option>
										<option id="stateFromOption31" value="31">NY</option>
										<option id="stateFromOption32" value="32">NC</option>
										<option id="stateFromOption33" value="33">ND</option>
										<option id="stateFromOption34" value="34">OH</option>
										<option id="stateFromOption35" value="35">OK</option>
										<option id="stateFromOption36" value="36">OR</option>
										<option id="stateFromOption37" value="37">PA</option>
										<option id="stateFromOption38" value="38">RI</option>
										<option id="stateFromOption39" value="39">SC</option>
										<option id="stateFromOption40" value="40">SD</option>
										<option id="stateFromOption41" value="41">TN</option>
										<option id="stateFromOption42" value="42">TX</option>
										<option id="stateFromOption43" value="43">UT</option>
										<option id="stateFromOption44" value="44">VT</option>
										<option id="stateFromOption45" value="45">VA</option>
										<option id="stateFromOption46" value="46">WA</option>
										<option id="stateFromOption47" value="47">WV</option>
										<option id="stateFromOption48" value="48">WI</option>
										<option id="stateFromOption49" value="49">WY</option>
									</select>
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="zipCodeInput">Zip Code</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="zip" id="zipCodeInput" placeholder="Zip Code" value= "<?php echo $zip; ?>">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="dateOfBirthInput">Date of Birth</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="date" class="form-control" name="dateofbirth" id="dateOfBirthInput" placeholder="Date of Birth" value= "<?php echo $birthdate; ?>">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:2rem">
								<label for="phoneInput">Phone Number</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="phone" id="phoneInput" placeholder="Phone Number" value= "<?php echo $phone; ?>">
									</div>
								</div>
							</div>


							<div class="form-group" style="margin-left:2rem">
								<button type="submit" class="btn btn-lg btn-info btn-block" name="account-submit">Save</button>
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