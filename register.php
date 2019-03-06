<?php include('server.php');
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/loginsystem.css">
</head>
<body>
  <div id="root" style="margin-bottom:200px;">
  <!-- <script src="main.js" type="text/javascript"></script> -->
<div class="header">
  <h2>Register</h2>
</div>
<form class="registration-form" action="register.php" method="post">

<!-- The erros are displayed here-->
<?php include('errors.php'); ?>

  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username" required placeholder="Username" value="<?php echo $username; ?>">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email" required placeholder= "email@iitp.ac.in" value="<?php echo $username; ?>">
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" required placeholder="******" name="password_1">
  </div>
  <div class="input-group">
    <label>Confirm Password</label>
    <input type="password" required placeholder="******" name="password_2">
  </div>
  <div class="input-group">
    <button type="submit" name="register" class="button">Register</button>
  </div>
  <p>
     Already a member? <a href="login.php">Sign in</a>
   </p>
</form>
</div>
</body>
</html>
