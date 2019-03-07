<?php require_once('server.php');
require_once('templates/navbar.php');

//IF user is not logged in, this page cannot be accessed.
if(empty($_SESSION['username'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">

  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/loginsystem.css">
</head>
<body>
  <div id="root" style="margin-bottom:200px;">
<div class="header">
  <h2>Home Page</h2>
</div>

<div class="content">
  <?php if(isset($_SESSION['success'])): ?>
    <div class="error success">
        <h3>
          <?php
              echo $_SESSION['success'] ;
              unset($_SESSION['success']);
          ?>
        </h3>
    </div>
  <?php endif ?>
 <?php if(isset($_SESSION['username'])): ?>
   <p>Welcome <strong> <?php  echo $_SESSION['username']; ?>. </strong> </p>
   <a href="booking.php">Make a booking request.</a> <br>
   <a href="booking.php">Check status of current requests.</a> <br>
   <a href="booking.php">Check availability.</a> <br>
   <p> <a href="homepage.php?logout='1'" style="color: red;"> Logout</a> </p>
 <?php endif  ?>
</div>

  </div>
  <!-- <script src="main.js" type="text/javascript"></script> -->
</body>
</html>
