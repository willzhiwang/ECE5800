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

<?php
    require "header.php"
?>
    <main>
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Vanpool service </h1>
</div>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About US</h2>
      <h5>Photo of me:</h5>
      <img src="https://upload.wikimedia.org/wikipedia/commons/d/d1/2017-03-07_Geneva_Motor_Show_1177.JPG" class="rounded" alt="Cinque Terre" width="547" height="365">
      <p>We are a vanpool company in Iowa City</p>
      <h3>Somthing here </h3>
      <p></p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">A button </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">More</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>

  </div>
</div>


<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
    </main>
    </html>
<?php
    require "footer.php"
?>   