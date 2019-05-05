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
                        date_default_timezone_set("America/New_York");
                        echo "Subscribe on " . date("Y-m-d H:i:s") . "<br><br>";
                        $subdate= date('Y-m-d H:i:s', strtotime('+1 months'));
                        echo "Your will have subscription until ".$subdate ;
                        //echo $subdate;
                    ?>
                </table>
				</section>
				<br>
				<form action="subscribe.inc.php" method="post">
				<div class="form-group">
				<button type="submit" class="btn btn-lg btn-info btn-block" name="subscribe-submit" value=<?php echo $subdate;?> >subscribe</button>
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