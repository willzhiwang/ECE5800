<!DOCTYPE html>
<html>
<head>
<!-- /*homepage with a button direct to loginpage*/ -->

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>

<!-- headers -->
<body>
    <header>
        <nav>
            <ul>
                <li> <a href = "index.php">Home</a></li>
                <li> <a href = "index.php">Passenger</a></li>
                <li> <a href = "index.php">Driver</a></li>
                <li> <a href = "index.php">About Us</a></li>
            </ul>
            <div>
                <form action = "login.php" method = "post">
                    <button type = "submit" name = "login">Login</button>
                </form>
                <a href = "signup.php">SignUp</a>
                <form action = "logout.php" method = "post">
                    <button type = "submit" name = "logout">Logout</button>
                </form>
            </div>
        </nav>
    </header>

</body>
</html>
