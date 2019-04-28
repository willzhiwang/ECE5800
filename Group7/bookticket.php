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
    //require "header.php";
    //require "search.php";
    include "search.php";

?>
<body>
<?php
if (isset($_POST['bookticket-submit']))
    {
        require 'configDB.php';
        $currentRoute = $_POST['bookticket-submit'];
        //echo("current select route: " .$currentRoute);
        
        /**************Find User ID*************/
        $currentAccountID=$_SESSION['userId'];
        $sql3 = "SELECT UserID From Account WHERE AccountID = $currentAccountID";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) > 0) 
        {
            $row = mysqli_fetch_assoc($result3);
            $currentUserID = $row["UserID"];
            //find Payment info
            $sql5 = "SELECT PaymentInfo From User WHERE UserID = $currentUserID";
            $result5 = mysqli_query($conn, $sql5);
            if (mysqli_num_rows($result5) > 0) 
            {
                $row = mysqli_fetch_assoc($result5);
                $payment = $row["PaymentInfo"];
                if ($payment == NULL) // when payment is null info not filled
                {
                    header("Location: search.php?error=needPay");
                    mysqli_rollback($conn);
                    exit();
                }
            }
            else 
            {
                header("Location: search.php?error=sqlerror5");
                mysqli_rollback($conn);
                exit();
            }
        
        }
        else 
        {
            header("Location: search.php?error=sqlerror3");
            mysqli_rollback($conn);
            exit();
        }
        //check if user's all information are filled
        //get person ID
        $sql4 = "SELECT PersonID From Account WHERE AccountID = $currentAccountID";
        $result4 = mysqli_query($conn, $sql4);
        if (mysqli_num_rows($result4) > 0) 
        {
            $row = mysqli_fetch_assoc($result4);
            $currentPersonID = $row["PersonID"];
            if ($currentPersonID == NULL) // when person id is null info not filled
            {
                header("Location: search.php?error=needAccountSetting");
                mysqli_rollback($conn);
                exit();
            }
        }
        else 
        {
            header("Location: search.php?error=sqlerror4");
            mysqli_rollback($conn);
            exit();
        }

        /***************Passenger to routes*************/
        $sql2 = "INSERT INTO PassengerToRoutes (UserID, RouteID) VALUES (?,?)";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2,$sql2))
        {
            header("Location: search.php?error=sqlerror2");
            mysqli_rollback($conn);
            exit();
        }
        else{

            /**************User with all routes**************/
            $sql1 = "SELECT * From PassengerToRoutes WHERE UserID = $currentUserID";
            $result1 = mysqli_query($conn, $sql1);
            while ($row = mysqli_fetch_array($result1))
            {
                $findRouteID = $row['RouteID'];
                echo "findRouteID: ".$findRouteID;
                if ($findRouteID==$currentRoute)
                {
                    //header("Location: search.php?error=route_exists");
                    echo ("<script>alert('Seats Full!')</script>");
                    echo("<script>window.location = 'search.php';</script>");
                    mysqli_rollback($conn);
                    exit();
                }
            }

            /*****************Seats Left********************/
            //If the seats is full it won't be display in searching
            $sql = "SELECT SeatsLeft From Route WHERE RouteID = $currentRoute";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) 
            {
                $row = mysqli_fetch_assoc($result);
                $currentSeats = $row["SeatsLeft"];
    
                if ($currentSeats== 0)//when seats are 0
                {
                    echo "Current route is full";
                }
                else
                {
                    //echo "findRouteID: ".$findRouteID;
                    echo "current user:".$currentUserID."current route:".$currentRoute;
                    mysqli_stmt_bind_param($stmt2,"ii",$currentUserID,$currentRoute);
                    mysqli_stmt_execute($stmt2);

                    $sql = "UPDATE Route SET SeatsLeft = (SeatsLeft-1) 
                    WHERE RouteID = $currentRoute AND SeatsLeft >0 ";
                    $stmt= mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                    header("Location: search.php?error=sqlerror");
                    //echo "sql is Error";
                    mysqli_rollback($conn);
                    exit();
                    }
                    mysqli_stmt_execute($stmt);
                    //header("Location: account.php?account=success");
                    exit();
                    mysqli_stmt_close($stmt);
                }

            }
            mysqli_stmt_close($stmt2);
        }
    }
?>