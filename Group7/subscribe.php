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
					<h1 style="margin-left:35%">Recept</h1>
					<br>
					<table class="table table-hover">
                    <?php
                        echo "Subscribe on " . date("d/m/Y") . "<br><br>";
                        echo "Your will have subscription until ".date('d/m/Y', strtotime('+1 months'));
                    ?>
                    
                </table>
				</section>
				<br>
				<div class="form-group">
				</form>
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