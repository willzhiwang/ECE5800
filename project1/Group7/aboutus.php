<?php
    require "header.php";
    //session_start();
?>
<!DOCTYPE html>
<html>
<head>
<!-- /*homepage with a button direct to loginpage*/ -->

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
<body>
	
    <main>
		    <h2 style="margin-left:18rem">About Us</h2>
				<br>
				<img src="https://upload.wikimedia.org/wikipedia/commons/d/d1/2017-03-07_Geneva_Motor_Show_1177.JPG" class="rounded" alt="Cinque Terre" width="450" height="265" style="margin-left:10px">
				<p style="margin-top:1rem">We are a vanpool company in Iowa City</p>
				<h3>Your Account</h3>
				<p></p>
				<ul class="nav nav-pills flex-column">
					<li class="nav-item">
						<?php
							if(isset($_SESSION['userId']))
							{
							  echo '<p class="login-status"> You are logged in </p>';
							}
							else{
							  echo '<p class="login-status"> Please login </p>';
							}
						 ?>
					</li>
				</ul>
				<hr class="d-sm-none">
			</div>
		<br>
		<br>
		</div>
    </main>
</body>
</html>
<?php
    require "footer.php"
?> 