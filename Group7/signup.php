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
                    else if ($_GET['error'] == "sqlerror")
                    {
                        echo '<small class="text-danger"> Sorry, something went wrong with our database. Please contact us for assistance. </small>';
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
                    else if ($_GET['error'] == "emailtaken")
                    {
                        echo '<small class="text-danger"> email is already taken! </small>';
                    }
                    
                }
                else if (isset($_GET['signup']))
                {
                    if ( $_GET['signup'] == "success") {
                    echo '<small class="text-success"> Success! </small>';
                    }
                }
            ?>
            <br>
            <form action = "signup.inc.php" method = "post">
            <div class="form-group"><input type="text" name="uid" placeholder="Username"></div>
            <div class="form-group"><input type="text" name="mail" placeholder="email"></div>
            <div class="form-group"><input type="password" name="pwd" placeholder="Password"></div>
            <div class="form-group"><input type="password" name="pwd-r" placeholder="Repeat Password"></div>
            <div class="form-group">
                <input type="radio" name="isDriver" value=0 CHECKED/> I am a passenger<br>
                <input type="radio" name="isDriver" value=1> I am a driver<br>
            </div>
            <!-- TODO: Read security questions from database, put those into dropdown menu -->
            <div class="form-group">
            <select name="question1">
                <option value="0">Select a security question...</option>
                <option value="1">Example question 1</option>
                <option value="2">Example question 2</option>
            </select>
            <input type="text" name="answer1" placeholder="Answer 1">
            </div>
            <div class="form-group">
            <select name="question2">
                <option value="0">(Optional) Select a security question...</option>
                <option value="1">Example question 1</option>
                <option value="2">Example question 2</option>
            </select>
            <input type="text" name="answer2" placeholder="Answer 2">
            </div>
            <div class="form-group">
            <select name="question3">
                <option value="0">(Optional) Select a security question...</option>
                <option value="1">Example question 1</option>
                <option value="2">Example question 2</option>
            </select>
            <input type="text" name="answer3" placeholder="Answer 3">
            </div>
            <!-- TODO: Add 3 dropdown menus for security questions, and text boxes after each for answers
            Will need to gather list of questions from database, to populate the dropdown menus
            (Only the 1st should be required)-->

            <div class="form-group"><button type="submit" class="btn btn-primary" name="signup-submit">SignUp</button></div>
            </form>
            
         </section>
      </div>
    </main>
    
<?php
    require "footer.php"
?>   