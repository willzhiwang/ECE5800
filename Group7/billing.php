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
		//echo "\n User id from Account table: " . $currentUserID. "<br>";
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
				//echo "\n PaymentInfo id from User table: " . $currentPaymentID. "<br>";
				if ($currentPaymentID==NULL)//when it's null
				{
					$cardNu="";
					$name="";
					$eDate = "";
					$cvv="";
					$cardType = "";
					
					$Aname= "";
					$street = "";
					$city = "";
					$state = "";
					$zip = "";
				}
				else // if User ID is correct
				{
					$sql2 = "SELECT `CreditCardNumber`,`NameOnCard`,`ExpirationDate`,`SecurityCode`,`CardType`,`BillingAddress` FROM `PaymentInfo` WHERE `PaymentInfoID`=$currentPaymentID";
					$result2 = mysqli_query($conn, $sql2);
					if (mysqli_num_rows($result2) > 0) {
						$row2 = mysqli_fetch_assoc($result2);
		
						//$PersonID = $row2["ID"];
						$cardNu = $row2["CreditCardNumber"];
						$name = $row2["NameOnCard"];
						$eDate = $row2["ExpirationDate"];
						$cvv=$row2["SecurityCode"];
						$cardType = $row2["CardType"];
						$currentBillingAddressID = $row2["BillingAddress"];

						if ($currentBillingAddressID==NULL)//when it's null
						{
							$Aname= "";
							$street = "";
							$city = "";
							$state = "";
							$zip = "";
						}
						else
						{
							$sql4 = "SELECT `Name`,`Street`,`City`,`State`,`ZipCode` FROM `Address` WHERE `AddressID`=$currentBillingAddressID";
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
		}
	}
?>
<body>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
			<br>
			<br>
			<div class="container bg-white" style="width:50%;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:30%">Billing Settings</h1>
					<br>
					<form action="billing.inc.php" method="post">
						<div class="form-group" style="margin-left:5%">
							<?php 
								if (isset($_GET['error']))
								{
											
									if ($_GET['error'] == "emptypaymentaddress")
									{
										echo '<large class="text-danger"> Fill in all Payment Address info! </large>';
									}
									else if ($_GET['error'] == "emptypayment")
									{
										echo '<large class="text-danger"> Fill in all Payment info! </large>';
									}
									else 
									{												
										echo '<large class="text-danger"> Please contact us! </large>';
									}
								}
								else if (isset($_GET['billing']) == "success")
								{
									echo '<large class="text-success"> Saved! </large>';
								}
							?>
						</div>
						<h4 style="margin-left:2%;font-weight:bold;">Payment</h4>
						
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="creditCardInput">Credit Card Number</label>
									<input type="text" class="form-control" name="cardNu" id="creditCardInput" placeholder="Credit Card Number" value= "<?php echo $cardNu; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="cvvInput">CCV</label>
									<input type="text" class="form-control" name="cvv" id="ccvInput" placeholder="CCV" value= "<?php echo $cvv; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="cvvInput">Card Type</label>
									<input type="text" class="form-control" name="ctype" id="cardType" placeholder="Visa" value= "<?php echo $cardType; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="expMonthInput">Expiration Date</label>
									<input type="month" class="form-control" name="eDate" id="expDateInput" placeholder="Expiration Date" value= "<?php echo $eDate; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingFirstNameInput">Name</label>
									<input type="text" class="form-control" name="Bname" id="billingFirstNameInput" placeholder="Name" value= "<?php echo $name; ?>">
								</div>
							</div>
						</div>
						<h4 style="margin-left:2%;font-weight:bold;">Billing Address</h4>
						<div class="form-group" style="margin-left:5%">
								<label for="addressInput">Name</label>
								<div class="row">
									<input type="text" class="form-control" name="Aname" id="addressName" placeholder="Name/Apt number/Company for this Address" value= "<?php echo $Aname; ?>" style="margin-right:5%">
								</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingAddressInput">Address</label>
									<input type="text" class="form-control" name="Baddress" id="billingAddressInput" placeholder="Street" value= "<?php echo $street; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingCityInput">City</label>
									<input type="text" class="form-control" name="Bcity" id="billingCityInput" placeholder="City" value= "<?php echo $city; ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingStateInput">State</label>
									<select name="Bstate" id="billingStateInput" style="margin-top:10%" onchange="onFromStateChange()" selected="<?php echo $state; ?>">
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
						<div class="form-group" style="margin-left:5%">
							<div class="row">
								<div class="col-xs-3">
									<label for="billingZipInput">Zip Code</label>
									<input type="text" class="form-control" name="Bzip" id="billingZipInput" placeholder="Zip Code" value= "<?php echo $zip; ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
								<button type="submit" class="btn btn-lg btn-info btn-block" name="billing-submit">Save</button>
						</div>
					</form>
				</section>
			</div>
		<br>
		<br>
		<br>
		<br>
		</div>
	</main>
</body>
</html>