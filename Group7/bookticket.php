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
        //echo($currentRoute);
        
        /**************Find User ID*************/
        $currentAccountID=$_SESSION['userId'];
        $sql3 = "SELECT UserID From Account WHERE AccountID = $currentAccountID";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) > 0) 
        {
            $row = mysqli_fetch_assoc($result3);
            $currentUserID = $row["UserID"];
        }
        else 
        {
            header("Location: search.php?error=sqlerror3");
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