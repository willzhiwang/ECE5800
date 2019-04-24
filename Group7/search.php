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
    require "header.php"
?>
<body>
	<main>
	<div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Departure Time</th>
        <th scope="col">Arrival Time</th>
        <th scope="col">Day of Week</th>
        <th scope="col">Route ID</th>
        <!--th scope="col">FromAddress ID</th>
        <th scope="col">ToAddress ID</th-->
      </tr>
    </thead>
    <form action="bookticket.php" method="post">
<?php
    if (isset($_POST['search-submit']))
    {
        require 'configDB.php';

        //require 'login.inc.php';

        if (isset($_POST['from']))
        {
            $from = $_POST['from'];

        }
        if (isset($_POST['to']))
        {
            $to = $_POST['to'];

        }
        $sun=$mon=$tue=$wed=$thu=$fri=$sat=NULL;
        
        if (isset($_POST['sun']))
        {
            $sun = $_POST['sun'];

        }
        if (isset($_POST['mon']))
        {
            $mon = $_POST['mon'];

        }
        if (isset($_POST['tue']))
        {
            $tue = $_POST['tue'];

        }
        if (isset($_POST['wed']))
        {
            $wed = $_POST['wed'];

        }
        if (isset($_POST['thu']))
        {
            $thu = $_POST['thu'];

        }
        if (isset($_POST['fri']))
        {
            $fri = $_POST['fri'];

        }
        if (isset($_POST['sat']))
        {
            $sat = $_POST['sat'];
        }

        $search1 = "$sun, $mon, $tue, $wed, $thu, $fri, $sat";
        //echo "search1: ". $search1;
        $search_arr = explode(", ", $search1);
        //echo"search arr :";
        //print_r ($search_arr);
        $out = array("0","0","0","0","0","0","0");
        for ( $i= 0; $i<7;$i++ )
        {
            if ($search_arr[$i] != NULL){
                $out[$i] = "1";
            }
            
        }
        $week = implode("",$out);
        echo "week days: ". $week ;

        $sql = "SELECT Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, Route.DaysofWeek, A1.AddressID, A2.AddressID, A1.Name, A2.Name
                FROM Address AS A1
                JOIN Address AS A2
                INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND Route.ToAddress=A2.AddressID
                WHERE A1.Name Like '$from' AND A2.Name Like '$to' AND Route.SeatsLeft >0 AND Route.DaysofWeek LIKE '$week'
                ";
        $result = mysqli_query($conn, $sql) ;
        $arr;
        echo"<tbody>";
            while ($row = mysqli_fetch_array($result))
            {
                $currentRoute = $row['RouteID'];
                //echo " ".$currentRoute;
                echo "<tr>";
                echo "<td>".$from."</td>";
                echo "<td>".$to."</td>";
                echo "<td>".$row['DepartureTime']."</td>";
                echo "<td>".$row['ArrivalTime']."</td>";
                echo "<td>".$row['DaysofWeek']."</td>";
                echo "<td>".$row['RouteID']."</td>";
                //echo "<td>".$row['FromAddress']."</td>";
                //echo "<td>".$row['ToAddress']."</td>";

                echo '<td><button type="submit" class="btn btn-lg btn-primary" name="bookticket-submit" value='.$currentRoute.'>Reserve</button></td>';
                //echo "<\tr>";
            }
        echo"</tbody>";
        //echo $currentRoute;
        
    }
?>
    </form>
    </table>
    </div>
    </main>
</body>