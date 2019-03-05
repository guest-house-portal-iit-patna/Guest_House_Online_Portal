<!DOCTYPE html>
<html>
<head>
	<title>IIT PATNA Guest House Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style rel="stylesheet">
	nav {
		width: 80%;
		margin: 30px auto 0px;
		color: #fff;
		background: #5F9EA0;
		text-align: center;
		border: 1px solid #80C4DE;
		border-bottom: none;
		border-radius: 10px 10px 0px 0px;
		padding: 20px;
	}

	body {
		margin: 30px auto auto;
		text-align: center;
		background-image: url("images/iitp_logo.png");
		background-repeat: no-repeat;
		background-size: 120px 120px;
		background-position: 350px 25px;
	}
	</style>

</head>
<body>
  <section id= "banner">
    	<h1>IIT PATNA</h1>
    	<h2>Guest House Booking Portal</h2>

		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5F9EA0; ">
		  <a class="navbar-brand" href="/Guest_House_Online_Portal/index.php" style="font-size: inherit; color: #fff;">Home</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <?php if(!isset($_SESSION['username']) || $_SESSION['user_role']!='admin'){ ?>
		      <li class="nav-item active">
		        <a class="nav-link" href="https://www.iitp.ac.in/hostel/reachIITP.html" style="color: #fff;">How to reach IIT Patna?</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="https://www.iitp.ac.in/" style="color: #fff;">IIT Patna</a>
		      </li>
		      <!-- <li class="nav-item dropdown active">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Contact Us
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Email</a>
		          <a class="dropdown-item" href="#">Phone</a>
		          <div class="dropdown-divider"></div>
		           <a class="dropdown-item" href="#">Set Appointment</a>
		        </div> -->

						<li>
						  <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color:#fff;">
						    Contact us
						  </a>
						  <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						    Button with data-target
						  </button> -->
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
		        <?php if(!isset($_SESSION['access_token'])){ ?>
		          <li class="nav-item active">
		            <a class="nav-link" href="/Guest_House_Online_Portal/login.php" style="color:#fff">Institute Member Login</a>
		          </li>
		          <li class="nav-item active">
		            <a class="nav-link" href="/Guest_House_Online_Portal/login.php" style="color:#fff">Guest Login</a>
		          </li>
		        <?php
		          } else {
		        ?>
		        <li class="nav-item dropdown active">
		          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php
		            if(isset($_SESSION['username'])){
		              echo $_SESSION['username'];
		            ?>
		          </a>
		          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		            <?php
		              if($_SESSION['user_role']=='student'){
		              ?>
		                <a class="dropdown-item" href="/TPC-management-app/student/profile.php">Profile</a>
		                <a class="dropdown-item" href="/TPC-management-app/student/jobs.php">Jobs</a>
		            <?php
		              } else{
		              ?>
		                <a class="dropdown-item" href="/TPC-management-app/admin/dashboard.php">Dashboard</a>
		              <?php
		              }
		              ?>
		          <?php
		            } else if(isset($_SESSION['company_name'])){
		              echo $_SESSION['company_name'];
		            ?>
		          </a>
		          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		            <a class="dropdown-item" href="/TPC-management-app/recruiter/profile.php">Profile</a>
		            <a class="dropdown-item" href="/TPC-management-app/recruiter/createPosition.php">New Position</a>
		            <a class="dropdown-item" href="/TPC-management-app/recruiter/jobs.php">Created Jobs</a>
		          <?php } ?>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="/TPC-management-app/logout.php">Logout</a>
		          </div>
		        </li>
		        <?php
		          }
		          ?>
		      </ul>
		    </span>
		  </div>
		</nav>
	</ul>
	</nav>
  </section>
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
</body>
</html>















<!-- <ul>
	<li style= "display: inline;"><a href="">Admin</a></li>
	<li style= "display: inline;"><a href="">Faculty</a></li>
	<li style= "display: inline;"><a href="">Staff</a></li>
	<li style= "display: inline;"><a href="">Registered Member</a></li>
	<li style= "display: inline;"><a href="">Student</a></li>
	<li style= "display: inline;"><a href="">Reference</a></li>
</ul> -->
<!-- <nav class="navbar navbar-light" style="background-color: #5F9EA0;">
<ul class="nav">
<li class="nav-item">
<a class="nav-link active" href="#">Admin</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Faculty</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Staff</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Registered Member</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Student</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Reference</a>
</li> -->
