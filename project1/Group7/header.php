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

<body>
    <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <a class="navbar-brand" href="index.php">Home</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

    <li class="nav-item"> <a class="nav-link" href = "Map.php">Routes List</a></li>
    <li class="nav-item"> <a class="nav-link" href = "costandsave.php">Cost and Savings</a></li>
    <li class="nav-item"> <a class="nav-link" href = "Fromto.php">From and To</a></li>
    <li class="nav-item"> <a class="nav-link" href = "search.php">Search</a></li>
    
    </ul>

    <ul class="navbar-nav ml-auto">
    <?php
        if (isset($_SESSION['userId'])) //hide or show logout
        {
            echo '
            <div class="dropdown dropleft float-right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Settings </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="account.php">My Account</a>
              <a class="dropdown-item" href="rides.php">My Rides</a>
              <a class="dropdown-item" href="billing.php">Billing</a>
            </div>
            </div>
            <form action = "logout.php" method = "post">
            <button class="btn btn-secondary" type = "submit" name = "logout-submit">Log out</a></button>
            </form>
            ';
} else {
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
