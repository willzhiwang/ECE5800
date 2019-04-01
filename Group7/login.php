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
					<a class="nav-link" style="color:rgba(255,255,255,255);width:100px" href="Fromto.php">From To</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:rgba(255,255,255,255)" href="search.php">Search</a>
				</li>
				<button type="button" class="btn bg-white" style="margin-left:1rem;color:rgba(0,0,0,255);width:120px">Contact Us</button>
			</ul>
		</nav>
	</header>
	<main>
		<div class="container-fluid" style="background-image: linear-gradient(rgb(49,182,246),rgb(115,232,255)">
		<br>
		<br>
			<div class="container bg-white" style="width:800px;height:800px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h1 style="margin-left:18rem">Login</h1>
					<br>
						<form action="login.inc.php" method="post">
							<div class="form-group" style="margin-left:8rem">
								<label for="emailinput">Email</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="mail" id="emailinput" placeholder="Email">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:8rem">
								<label for="passwordInput">Password</label>
								<div class="row">
									<div class="col-xs-3">
										<input type="text" class="form-control" name="pwd" id="passwordInput" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="form-group" style="margin-left:10rem">
								<button type="submit" class="btn btn-lg btn-primary" name="login-submit">Login</button>
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
<?php
    require "footer.php"
?>  