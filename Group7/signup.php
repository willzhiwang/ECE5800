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
            <h1>SignUp</h1>
            <?php
                if (isset($_GET['error']))
                {
                    if ($_GET['error'] == "emptyfields")
                    {
                        echo '<small class="text-danger"> Fill in all fields! </small>';
                    }
                    else if ($_GET['error'] == "invalidmailuid")
                    {
                        echo '<small class="text-danger"> Invalid username and email! </small>';
                    }
                    else if ($_GET['error'] == "invalidmail")
                    {
                        echo '<small class="text-danger"> Invalid email! </small>';
                    }
                    else if ($_GET['error'] == "invaliduid")
                    {
                        echo '<small class="text-danger"> Invalid username! </small>';
                    }
                    else if ($_GET['error'] == "passwordcheck")
                    {
                        echo '<small class="text-danger"> Passwords do not match! </small>';
                    }
                    else if ($_GET['error'] == "usertaken")
                    {
                        echo '<small class="text-danger"> Username is already taken! </small>';
                    }
                }
                else if ( $_GET['signup'] == "success") {
                    echo '<small class="text-success"> Success! </small>';
                }
            ?>
            <form action = "signup.inc.php" method = "post">
            <div class="form-group"><input type="text" name="uid" placeholder="Username"></div>
            <div class="form-group"><input type="text" name="mail" placeholder="email"></div>
            <div class="form-group"><input type="password" name="pwd" placeholder="Password"></div>
            <div class="form-group"><input type="password" name="pwd-r" placeholder="Repeat Password"></div>
            <div class="form-group"><input type="checkbox" name="userType" value="passenger"checked> I am a passenger<br>
            <div class="form-group"><input type="checkbox" name="userType" value="driver" > I am a driver<br>
            <div class="form-group"><button type="submit" class="btn btn-primary" name="signup-submit">SignUp</button></div>
            </form>
            
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   