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
</html>
<?php
    require "header.php"
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Route</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="usr">Vehicle used (ID):</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="usr">Driver:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">From address:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group">
      <label for="usr">To address:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="usr">Departure time:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="usr">Estimated arrival time:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="usr">Distance (in miles):</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Monday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Tuesday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Wednesday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Thursday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Friday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Saturday
        </label>
    </div>
    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Sunday
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>


    
<?php
    require "footer.php"
?>   