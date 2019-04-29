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
    include "viewvehicles.php";

?>
<body>
<?php
if (isset($_POST['deleteVehicle-submit']))
    {
        require 'configDB.php';
        $currentVehicle = $_POST['deleteVehicle-submit'];

        $sql = "DELETE From Vehicle WHERE VehicleID = $currentVehicle";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: viewvehicles.php?error=sqlerror");
            exit();
        }
        if(!mysqli_stmt_execute($stmt)){
            header("Location: viewvehicles.php?error=sqlerror");
            exit();            
        }

        mysqli_stmt_close($stmt);
        //header("Location: viewvehicles.php");
        }
?>