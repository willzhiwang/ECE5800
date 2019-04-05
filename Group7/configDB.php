<?php
//this is my database I created try it on your own database
//Access denied for user 'root'@'localhost' (using password: YES) 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Group7Vanpool";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "Connected successfully";
}
?>