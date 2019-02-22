<?php
    //this is my database I created try it on your own database
    //Access denied for user 'root'@'localhost' (using password: YES) 
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '12345678');
   //define('DB_DATABASE', 'database');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
?>