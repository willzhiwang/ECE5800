<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<!-- /*homepage with a button direct to loginpage*/ -->

    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- frontend work to make it looks better
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    -->
</head>
<?php
require 'configDB.php'; 
?>
<body>
    <header>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <a class="navbar-brand" style="width:100px" href="index.php">Home</a>

    <button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav"> 
    
    <?php
        
        if (isset($_SESSION['userId'])) //hide or show logout
        {
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
                header("Location: header.php?error=sqlerror");
                mysqli_rollback($conn);
                exit();
            }
            $sql2 = "SELECT IsAdmin, IsDriver From User WHERE UserID = $currentUserID";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) 
            {
                $row = mysqli_fetch_assoc($result2);
                $admin = $row["IsAdmin"];
                $driver = $row["IsDriver"];
            }
            else 
            {
                header("Location: header.php?error=sql2error");
                mysqli_rollback($conn);
                exit();
            }
            if ($admin == 1)
            {
                $_SESSION['userType']= "admin";
                $userSetting= "Manage Rides";
                echo'
                <li class="nav-item"> <a class="nav-link" style="width:160px" href = "AddRoute.php">Add Route</a></li>
                <li class="nav-item"> <a class="nav-link" style="width:160px" href = "AddVehicle.php">Add Vehicle</a></li>
                ';
            }
            else if ($driver ==1)
            {
                $_SESSION['userType']= "driver";
                $userSetting= "My Drive";
            }
            else 
            {
                $_SESSION['userType']= "passanger";
                $userSetting= "My Ride";
                
            }

            echo '
            </ul>
            <ul class="navbar-nav ml-auto">
            <div class="dropdown dropleft float-right">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> Settings </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="account.php">My Account Setting</a>
              <a class="dropdown-item" href="rides.php">'.$userSetting.'</a>
              <a class="dropdown-item" href="billing.php">My Billing Setting</a>
            </div>
            </div>
            <form action = "logout.php" method = "post">
            <button class="btn btn-secondary" type = "submit" name = "logout-submit">Log out</a></button>
            </form>
            ';
} else {
    echo '
    </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
            <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>';
}
?>
    </ul>

    </div>
    </nav>
    </header>
    <footer>

    <nav class="navbar fixed-bottom bg-dark navbar-dark">

    <a class="navbar-brand" href="aboutus.php">About US</a>
    </footer>
</body>
</html>
