<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/form2.css">
</head>
<body>
  <div id="root"></div>
  <script src="main.js" type="text/javascript"></script>
<div class="header">
  <h2>Register</h2>
</div>
<form class="registration-form" action="register.php" method="post">
  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email">
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1">
  </div>
  <div class="input-group">
    <label>Confirm Password</label>
    <input type="password" name="password_2">
  </div>
  <div class="input-group">
    <button type="submit" name="Register" class="button">Register</button>
  </div>
  <p>
     Already a member? <a href="loginform.php">Sign in</a>
   </p>
</form>

</body>
</html>
