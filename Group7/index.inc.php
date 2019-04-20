<?php
    if (isset($_POST['index-submit']))
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
            while ($row = mysqli_fetch_array($result))
            {
                echo"<br>";
                echo "\r\nFrom: ".$from. "; To: ".$to."; Departure: ".$row['DepartureTime']."; ArrivalTime: ".$row['ArrivalTime'];
                echo"\r\n";
                echo "------Route ID:" .$row['RouteID'] . ", FromAddress ID:". $row['FromAddress'].", ToAddress ID:". $row['ToAddress'];
                echo '<button type="submit" class="btn btn-lg btn-primary" name="account-submit">Subscribe</button>
                ';
                echo "<br>";
            }

        
    }
?>