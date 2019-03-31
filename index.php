<?php include('server.php');
if(!isset($_SESSION['user_role']))
$_SESSION['user_role']="guest";
?>

<!DOCTYPE html>
<html>
<head>
	<title>IIT PATNA Guest House Portal</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
	<img src="images/iitp_logo.png" class="rounded float-left" height="120">
	<div class="header-nav">
	  <h1>IIT PATNA</h1>
	  <h2>Guest House Booking Portal</h2>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5F9EA0; ">
	  <a class="navbar-brand" href="/Guest_House_Online_Portal/index.php" style="font-size: inherit; color: #fff;">Home</a>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav mr-auto">
	    <?php if(!isset($_SESSION['username']) || $_SESSION['user_role']!='admin'){ ?>
	    <li class="nav-item active">
	      <a class="nav-link" href="https://www.iitp.ac.in/hostel/reachIITP.html" style="color: #fff;">How to reach IIT Patna?</a>
	    </li>
	    <li class="nav-item active">
	      <a class="nav-link" href="https://www.iitp.ac.in/" style="color: #fff;">IIT Patna</a>
	    </li>
	    <li>
	      <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color:#fff;">
	        Contact us
	      </a>
	    </li>
	    <?php } ?>
	    <?php if(isset($_SESSION['username']) && $_SESSION['user_role']=='admin'){ ?>
	    <li class="nav-item active">
	      <a class="nav-link" href="#">Bookings</a>
	    </li>

	    <?php } ?>
	  </ul>

	  <span class="navbar-text">
	  <ul class="navbar-nav mr-auto">
	    <li class="nav-item dropdown active">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
	        Institute Member Login
	      </a>
	      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="/Guest_House_Online_Portal/adminlogin.php">Admin</a>
	        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php">Faculty/Staff</a>
	        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php">Student</a>
	      </div>
	    <li class="nav-item active">
	      <a class="nav-link" href="/Guest_House_Online_Portal/login.php" style="color:#fff">Guest Login</a>
	    </li>
	  </ul>
	</nav>
	<div class="collapse" id="collapseExample">
	  <div class="card card-body">
	    <footer>
	      <h3>Contact Us</h3>
	      <article>
	      <h4>Address</h4>
	      <p>IIT PATNA Guest House</p>
	      </article>

	      <article>
	      <h4>Mail</h4>
	      <p><a href="#">mail_guest_house@gmail.com</a></p>
	      </article>

	      <article>
	      <h4>Phone</h4>
	      <p>(+91)9999999999</p>
	      </article>
	    </footer>
	  </div>
	</div>
	</div>
</body>
</html>
