<?php include('server.php');
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
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/loginsystem.css">
</head>
<body>
  <div id="root">
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
