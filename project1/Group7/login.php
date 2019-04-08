
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
<?php
    require "header.php"
?>
    <main>
    <div class="container">
         <section>
            <h1>Login</h1>
            <form action = "login.inc.php" method = "post">
            <div class="form-group"><input type="text" name="mail" placeholder="email"></div>
            <div class="form-group"><input type="password" name="pwd" placeholder="Password"></div>
            <div class="form-group"><button type="submit" class="btn btn-primary" name="login-submit">LogIn</button></div>
         </section></div>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   