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
<?php
		require "header.php"
	
?>
<body>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:50%;height:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:35%">Save and Cost</h1>
					<br>
					<table class="table table-bordered">
						<thead>
						  <tr style="background-color: #29B6F6">
							<th style="text-align:center;color:#FFFFFF">Monthly Gas Spending</th>
							<th style="text-align:center;color:#FFFFFF">Our Price</th>
							<th style="text-align:center;color:#FFFFFF">Savings</th>
						  </tr>
						</thead>
						<tbody>
						<!-- TODO: make monthly subscription cost variable.-->
						  <tr>
							<td style="text-align:center">$50.00</td>
							<td style="text-align:center">$5.99</td>
							<td style="text-align:center">$44.01</td>
						  </tr>
						  <tr style="background-color: #f2f2f2">
							<td style="text-align:center">$100.00</td>
							<td style="text-align:center">$5.99</td>
							<td style="text-align:center">$94.01</td>
						  </tr>
						  <tr>
							<td style="text-align:center">$200.00</td>
							<td style="text-align:center">$5.99</td>
							<td style="text-align:center">$194.01</td>
						  </tr>
						</tbody>
					</table>
				</section>
				<br>
				<?php
					if (isset($_GET['subscribe']))
					{
						if ( $_GET['subscribe'] == "success") 
						{
							echo '<large class="text-success"> Success! </large> <br>';
						}
					}
				
				if(isset($_SESSION['UserID']))
				{
					$currentUserID=$_SESSION['UserID'];			
					$sql2 = "SELECT `PaymentInfo` FROM `User` WHERE `UserID`=$currentUserID";
					$result2 = mysqli_query($conn, $sql2);
					if (mysqli_num_rows($result2) > 0) 
					{
						$row = mysqli_fetch_assoc($result2);
						$paymentID = $row["PaymentInfo"];
						if($paymentID == NULL)
						{
						echo '<p class="text-danger"> Please fill out your payment info in settings </p>';
						}
						else//if paymentinfo filled
						{
							$sql = "SELECT `LastPurchasedMonthly` FROM `User` WHERE UserID=$currentUserID";
							$result = mysqli_query($conn, $sql);
						
							if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$sub = $row["LastPurchasedMonthly"];
							}
            	echo "You have subscription until: " .$sub;      
							echo '<br><br><br>';
							echo '
							<form action="subscribe.php" method="post">
							<div class="form-group">
							<button type="submit" class="btn btn-lg btn-info btn-block" name="subscribe">Go to subscribe</button>
							</form>
						';
						}
					}

				}
				else{
				 echo '<p class="text-danger"> Please fill out your account and payment info in settings </p>';
				}
				?>

			</div>
			</div>

		<br>
		<br>
		<br>
		<br>
		</div>
	</main>
</body>
</html>