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

<?php
    if (isset($_GET['error']))
    {											
        echo '<large class="text-danger"> Please contact us! </large>';
    }
    else if (isset($_GET['rides']) == "success")
    {
    echo '<large class="text-success"> Success! </large>';
    }
    $currentAccountID=$_SESSION['userId'];
    $sql2 = "SELECT IsAdmin, IsDriver From User WHERE UserID = $currentUserID";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) 
    {
        $row = mysqli_fetch_assoc($result2);
        $admin = $row["IsAdmin"];
        $driver = $row["IsDriver"];
    }
    else 
    {
        header("Location: search.php?error=sql2error");
        mysqli_rollback($conn);
        exit();
    }
    //echo "IsAdmin: ".$admin ;
    //echo "IsDriver: ".$driver;
    //when admin is 1
    if ($admin == 1)
    {
        $_SESSION['userType'] = "admin";
        echo "<h3>welcome, Administrator</h3>";
        echo'
        <body>
        <main>
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">RouteID</th>
            <!--th scope="col">Vehicle</th-->
            <th scope="col">Driver (UserID)</th>
            <th scope="col">From Address</th>
            <th scope="col">To Address</th>
            <th scope="col">Depature</th>
            <th scope="col">Arrival</th>
            <th scope="col">MileDistance</th>
            <th scope="col">Seats Left</th>
            <th scope="col">Days of Week</th>
            <th scope="col"></th>

          </tr>
        </thead>';

        $sqlAdmin = "SELECT DriverToRoutes.UserID, Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, Route.DaysofWeek, Route.MileDistance ,Route.SeatsLeft,A1.AddressID, A2.AddressID, A1.Name, A2.Name
        FROM Address AS A1
        JOIN Address AS A2
        INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND (Route.ToAddress=A2.AddressID)
        JOIN DriverToRoutes ON (Route.RouteID = DriverToRoutes.RouteID)
        ";
        $tableResults = mysqli_query($conn, $sqlAdmin);

        echo"<tbody>";
            while ($row = mysqli_fetch_array($tableResults))
            {
                $currentRoute = $row['RouteID'];
                //echo " ".$currentRoute;
                echo "<tr>";
                echo "<td>".$row['RouteID']."</td>";
                echo "<td>".$row['UserID']."</td>";
                echo "<td>".$row[11]."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['DepartureTime']."</td>";
                echo "<td>".$row['ArrivalTime']."</td>";
                echo "<td>".$row['MileDistance']."</td>";
                echo "<td>".$row['SeatsLeft']."</td>";
                echo "<td>".$row['DaysofWeek']."</td>";

                echo '<td><button type="submit" class="btn btn-danger" name="delete-submit" value='.$currentRoute.'>Remove</button></td>';
            }
        echo '</tr></tbody></div></main></body>';
        ;
        echo '<form action="viewvehicles.php" method="post">
        <td><button type="submit" class="btn btn-info" name="viewVehicles-submit">View all Vehicles</button></td>
        </form>';
        echo '
        <form action="viewdrivers.php" method="post">
        <td><button type="submit" class="btn btn-info" name="viewDrivers-submit">View all Drivers</button></td>
        </form>';

    }
    //When driver
    else if ($driver ==1)
    {
        $_SESSION['userType'] = "driver";
        echo "<h3>welcome, Driver</h3>";
        echo'
        <body>
        <main>
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
          <th scope="col">RouteID</th>
          <th scope="col">Vehicle</th>
          <th scope="col">From Address</th>
          <th scope="col">To Address</th>
          <th scope="col">Depature</th>
          <th scope="col">Arrival</th>
          <th scope="col">MileDistance</th>
          <th scope="col">Seats Left</th>
          <th scope="col">Days of Week</th>
          <th scope="col"> </th>
          </tr>
        </thead>';

        $sqlDriver = "SELECT DriverToRoutes.UserID, Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, Route.DaysofWeek, Route.MileDistance ,Route.SeatsLeft,A1.AddressID, A2.AddressID, A1.Name, A2.Name
        FROM Address AS A1
        JOIN Address AS A2
        INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND (Route.ToAddress=A2.AddressID)
        JOIN DriverToRoutes ON (Route.RouteID = DriverToRoutes.RouteID)
        WHERE DriverToRoutes.UserID='$currentUserID'
        ";
        $tableResults = mysqli_query($conn, $sqlDriver);

        echo"<tbody>";
            while ($row = mysqli_fetch_array($tableResults))
            {
                $currentRoute = $row['RouteID'];
                //echo " ".$currentRoute;
                echo "<tr>";
                echo "<td>".$row['RouteID']."</td>";
                echo "<td>".$row['UserID']."</td>";
                echo "<td>".$row[10]."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['DepartureTime']."</td>";
                echo "<td>".$row['ArrivalTime']."</td>";
                echo "<td>".$row['MileDistance']."</td>";
                echo "<td>".$row['SeatsLeft']."</td>";
                echo "<td>".$row['DaysofWeek']."</td>";
            }
        echo '</tr></tbody></div></main></body>';
        ;

    }
    //passenger
    else 
    {
        $_SESSION['userType'] = "passanger";
        echo "<h3>welcome, Passanger</h3>";
        echo'
        <body>
        <main>
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">Route ID</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Departure Time</th>
            <th scope="col">Arrival Time</th>
            <th scope="col">Day of Week</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <form action="rides.inc.php" method="post">
        ';

        $sqlPassenger = "SELECT PassengerToRoutes.UserID, Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, Route.DaysofWeek, Route.MileDistance ,Route.SeatsLeft,A1.AddressID, A2.AddressID, A1.Name, A2.Name
        FROM Address AS A1
        JOIN Address AS A2
        INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND (Route.ToAddress=A2.AddressID)
        JOIN PassengerToRoutes ON (Route.RouteID = PassengerToRoutes.RouteID)
        WHERE PassengerToRoutes.UserID='$currentUserID'
        ";
        $tableResults = mysqli_query($conn, $sqlPassenger);

        echo"<tbody>";
            while ($row = mysqli_fetch_array($tableResults))
            {
                $currentRoute = $row['RouteID'];
                //echo " ".$currentRoute;
                echo "<tr>";
                echo "<td>".$row['RouteID']."</td>";
                echo "<td>".$row[11]."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['DepartureTime']."</td>";
                echo "<td>".$row['ArrivalTime']."</td>";
                echo "<td>".$row['DaysofWeek']."</td>";

                echo '<td><button type="submit" class="btn btn-danger" name="delete-submit" value='.$currentRoute.'>Remove</button></td>';
            }
        echo '</tr></tbody></form></div></main></body>';
        ;
    }

?>

