<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
</html>
<?php
    require "header.php";
    require 'configDB.php';

?>

<body>
	<main>
		<br>
		<br>
			<div class="container bg-white" style="width:1300px;border-radius:25px;border-style:inset;border-width:large">
				<section>
					<h3 style="margin-left:19rem">All Drivers</h3>
					<br>
						<form action="rides.php" method="post">
							<div class="form-group" style="margin-left:2rem">
								<div class="row">

								<div class="form-group">
							  		<button class="btn btn-primary" type="submit" name="search-submit">Back</button>
						  			</div>
                                </div>
<?php
echo'
    <body>
        <main>
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">UserID</th>
            <th scope="col">AccountID</th>
            <th scope="col">Person ID</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">DateOfBirth</th>
            <th scope="col">PhoneNumber</th>
          </tr>
        </thead>';

        $sqlAdmin = "SELECT User.UserID, Account.AccountID, Person.PersonID, Account.Email, Account.Username, Person.FirstName ,Person.LastName, Person.DateOfBirth, Person.PhoneNumber
        FROM Account
        INNER JOIN User ON (Account.UserID = User.UserID) AND (User.IsDriver=1)
        JOIN Person ON (Account.PersonID = Person.PersonID)
        ";
        $tableResults = mysqli_query($conn, $sqlAdmin);

        echo"<tbody>";
            while ($row = mysqli_fetch_array($tableResults))
            {
                //echo " ".$currentRoute;
                echo "<tr>";
                echo "<td>".$row['UserID']."</td>";
                echo "<td>".$row['AccountID']."</td>";
                echo "<td>".$row['PersonID']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Username']."</td>";
                echo "<td>".$row['FirstName']."</td>";
                echo "<td>".$row['LastName']."</td>";
                echo "<td>".$row['DateOfBirth']."</td>";
                echo "<td>".$row['PhoneNumber']."</td>";
                //echo '<td><button type="submit" class="btn btn-danger" name="delete-submit" value='.$currentRoute.'>Remove</button></td>';
            }
        echo '</tr></tbody></div></main></body>';
        ;
    ?>                            
                        
</form>	
			

				<hr class="d-sm-none">
							<br>
						</form>
					<br>
				</section>
			</div>
		<br>
		<br>
		</div>
	</main>
</body>