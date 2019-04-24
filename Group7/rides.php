<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<?php
    require "header.php";
    require 'configDB.php';
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
<?php

    $currentAccountID=$_SESSION['userId'];
    $sql = "SELECT UserID From Account WHERE AccountID = $currentAccountID";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_assoc($result);
        $currentUserID = $row["UserID"];
    }
    else 
    {
        header("Location: search.php?error=sqlerror");
        mysqli_rollback($conn);
        exit();
    }
    echo "User ID: ".$currentUserID ;
?>

