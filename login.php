<?php include('server.php');
// include('index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/loginsystem.css">
</head>
<body>
  <div id="root"></div>
  <!-- <script src="main.js" type="text/javascript"></script> -->
<div class="header">
  <h2>Login</h2>
</div>
<form class="login" action="login.php" method="post">

  <!-- The erros are displayed here-->
  <?php include('errors.php'); ?>

  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username" required>
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password" required>
  </div>
  <div class="input-group">
    <button type="submit" name="login" class="button">Login</button>
  </div>
  <p>
    Not a member yet? <a href="register.php">Register here</a>
  </p>
</form>

</body>
</html>
