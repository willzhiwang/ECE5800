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
	<header>
		<nav class="navbar navbar-expand-sm" style="background-color:rgba(0,134,195,255)">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255);width:150px" href="costandsavings.php">Cost and Savings</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="Map.php">Map</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255);width:100px" href="fromto.php">From To</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="search.php">Search</a>
				</li>
				<button type="button" class="btn bg-white" style="margin-left:1rem;color:rgba(0,0,0,255);width:120px">Contact Us</button>
			</ul>
		</nav>
	<header>
    <main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
			<br>
			<div class="container bg-white" style="width:500px;height:800px;border-radius:25px;border-style:inset;border-width:large">
				<h2 style="margin-left:10rem">About Us</h2>
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