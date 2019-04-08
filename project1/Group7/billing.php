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
    require "header.php"
?>
<main>
      <div class="container">
         <section>
            <h1>Billing Settings</h1>
            <form action = "account.inc.php" method = "post">
            <h3>Payment</h3>
            <div class="form-group"><input type="text" name="cardNu" placeholder="credit card number"></div>
            <div class="form-group"><input type="text" name="cvv" placeholder="cvv"></div>
            <div class="form-group"><input type="text" name="eMonth" placeholder="Exp month"></div>
            <div class="form-group"><input type="text" name="eYear" placeholder="Exp year"></div>

            <h3>Billing Address</h3>
            <div class="form-group"><input type="text" name="fname" placeholder="First Name"></div>
            <div class="form-group"><input type="text" name="lname" placeholder="Last Name"></div>
            <div class="form-group"><input type="text" name="Address" placeholder="Address"></div>
            <div class="form-group"><input type="text" name="city" placeholder="city"></div>
            <div class="form-group"><input type="text" name="state" placeholder="state"></div>
            <div class="form-group"><input type="text" name="zip" placeholder="Zip Code"></div>
            <div class="form-group"><input type="checkbox" name="userType" value="passenger"checked> I am a passenger<br>
            <div class="form-group"><input type="checkbox" name="userType" value="driver" > I am a driver<br>
            <div class="form-group"><button type="submit" class="btn btn-primary" name="signup-submit">SignUp</button></div>
            </form>
        </section>
    </div>
</main>