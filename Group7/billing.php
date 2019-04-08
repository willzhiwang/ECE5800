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
	$sql = "SELECT `UserID` FROM `Account` WHERE `AccountID`=$currentAccountID";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$currentUserID = $row["UserID"];
		//echo "\n Person id from Account table: " . $currentPersonID. "<br>";
		if ($currentUserID==NULL)//when it's null
		{
			echo " UserID is NULL!";
		}
		else // if User ID is correct
		{
			$sql1 = "SELECT `PaymentInfo` FROM `User` WHERE `UserID`=$currentUserID";
			$result1 = mysqli_query($conn, $sql1);
			if (mysqli_num_rows($result1) > 0) {
				$row = mysqli_fetch_assoc($result1);
				$currentPaymentID = $row["PaymentInfo"];
				echo "\n Person id from Account table: " . $currentPaymentID. "<br>";
				if ($currentPaymentID==NULL)//when it's null
				{
					$cardNu="";
					$name="";
					$eDate = "";
					$cvv="";
					$cardType = "";
				}
				else // if User ID is correct
				{
					$sql2 = "SELECT `CreditCardNumber`,`NameOnCard`,`ExpirationDate`,`SecurityCode`,`CardType` FROM `PaymentInfo` WHERE `PaymentInfoID`=$currentPaymentID";
					$result2 = mysqli_query($conn, $sql2);
					if (mysqli_num_rows($result2) > 0) {
						$row2 = mysqli_fetch_assoc($result2);
		
						//$PersonID = $row2["ID"];
						$cardNu = $row2["CreditCardNumber"];
						$name = $row2["NameOnCard"];
						$eDate = $row2["ExpirationDate"];
						$cvv=$row2["SecurityCode"];
						$cardType = $row2["CardType"];
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
					<h1 style="margin-left:15rem">Billing Settings</h1>
					<br>
					<form action="billing.inc.php" method="post">
						<h4>Payment</h4>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="creditCardInput">Credit Card Number</label>
									<input type="text" class="form-control" name="cardNu" id="creditCardInput" placeholder="Credit Card Number" value= "<?php echo $cardNu; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="cvvInput">CCV</label>
									<input type="text" class="form-control" name="cvv" id="ccvInput" placeholder="CCV" value= "<?php echo $cvv; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="cvvInput">Card Type</label>
									<input type="text" class="form-control" name="ctype" id="cardType" placeholder="Visa" value= "<?php echo $cardType; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="expMonthInput">Expiration Date</label>
									<input type="text" class="form-control" name="eDate" id="expDateInput" placeholder="Expiration Date" value= "<?php echo $eDate; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:2rem">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingFirstNameInput">Name</label>
									<input type="text" class="form-control" name="B-name" id="billingFirstNameInput" placeholder="Name" value= "<?php echo $name; ?>">
								</div>
							</div>
						</div>
						<h4>Billing Address</h4>
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