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
					$state = "";
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
										<input type="text" class="form-control" name="state" id="stateInput" placeholder="State" value= "<?php echo $state; ?>">
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
										<input type="text" class="form-control" name="dateofbirth" id="dateOfBirthInput" placeholder="Date of Birth" value= "<?php echo $birthdate; ?>">
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