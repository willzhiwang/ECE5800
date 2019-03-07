<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<!-- /*homepage with a button direct to loginpage*/ -->

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

<body>
    <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        
    <a class="navbar-brand" href="#">Navigation</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    
    <li class="nav-item"> <a class="nav-link" href = "index.php">Home</a></li>
    <li class="nav-item"> <a class="nav-link" href = "index.php">Passenger</a></li>
    <li class="nav-item"> <a class="nav-link" href = "index.php">Driver</a></li>
    <li class="nav-item"> <a class="nav-link" href = "index.php">About Us</a></li>
    <?php
        if(isset($_SESSION['userId']))//hide or show logout
        {
            echo ' <form action = "logout.php" method = "post">
            <button class="btn btn-secondary" type = "submit" name = "logout-submit">Log out</a></button>
            </form>';
        }
        else{
            echo '<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
            <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>';
        }
    ?>
 



    </ul>
    </div>
    </nav>

    </header>

</body>
</html>



