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
        <!--th scope="col">Day of Week</th-->
        <th scope="col">Route ID</th>
        <th scope="col">FromAddress ID</th>
        <th scope="col">ToAddress ID</th>
      </tr>
    </thead>
<?php
    if (isset($_POST['search-submit']))
    {
        require 'configDB.php';

        //require 'login.inc.php';
        $from = $_POST['from'];
        $to = $_POST['to'];

        $sun = $_POST['sun'];
        $mon = $_POST['mon'];
        $tue = $_POST['tue'];
        $wed = $_POST['wed'];
        $thu = $_POST['thu'];
        $fri = $_POST['fri'];
        $sat = $_POST['sat'];


        /*$arr = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        //$search1 = "Monday, Tuesday, Wednesday, Thursday, Friday";
        $search_arr = explode(", ", $search1);
        $out1 = array("0","0","0","0","0","0","0");
        foreach($search_arr as $value){
            $sr = array_search($value, $arr);
            $out1[$sr] = "1";
        }
*/

        $sql = "SELECT Route.RouteID,Route.DepartureTime,Route.ArrivalTime, Route.FromAddress, Route.ToAddress, A1.AddressID, A2.AddressID, A1.Name, A2.Name
                FROM Address AS A1
                JOIN Address AS A2
                INNER JOIN Route ON (A1.AddressID = Route.FromAddress) AND Route.ToAddress=A2.AddressID
                WHERE A1.Name Like '$from' AND A2.Name Like '$to'
                ";
        $result = mysqli_query($conn, $sql) ;
        echo"<tbody>";
            while ($row = mysqli_fetch_array($result))
            {
                
                echo "<tr>";
                echo "<td>".$from."</td>";
                echo "<td>".$to."</td>";
                echo "<td>".$row['DepartureTime']."</td>";
                echo "<td>".$row['ArrivalTime']."</td>";
                echo "<td>".$row['RouteID']."</td>";
                echo "<td>".$row['FromAddress']."</td>";
                echo "<td>".$row['ToAddress']."</td>";

                echo '<td><button type="submit" class="btn btn-lg btn-primary" name="bookticket-submit">Subscribe</button></td>';
                //echo "<\tr>";
            }
        echo"</tbody>";
        
    }
?>
    </table>
    </div>
    </main>
</body>