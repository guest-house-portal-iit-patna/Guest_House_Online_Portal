<?php require_once('server.php'); ?>
<img src="images/iitp_logo.png" class="rounded float-left">
<div class="header-nav">
  <h1>IIT PATNA</h1>
  <h2>Guest House Booking Portal</h2>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5F9EA0; ">
  <a class="navbar-brand" href="/Guest_House_Online_Portal/index.php" style="font-size: inherit; color: #fff;">Home</a>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="https://www.iitp.ac.in/hostel/reachIITP.html" style="color: #fff;">How to reach IIT Patna?</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="https://www.iitp.ac.in/" style="color: #fff;">IIT Patna</a>
    </li>
    <li>
      <b> <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color:#fff; padding-top:8px; font-size:95%; font-weight:200%;">
        Contact us
      </a>
    </b>
    </li>

  </ul>
  <?php if (isset($_SESSION['username'])){ ?>
  <span class="navbar-text">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown active">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
        <?php echo $_SESSION['username']; ?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/Guest_House_Online_Portal/adminlogin.php" >option</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >option</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >option</a>
      </div>
  </ul>
  </span>
<?php }else{ ?>

  <span class="navbar-text">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown active">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
        Institute Member Login
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/Guest_House_Online_Portal/adminlogin.php" >Admin</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >Faculty/Staff</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >Student</a>
      </div>
    <li class="nav-item active">
      <a class="nav-link" href="/Guest_House_Online_Portal/login.php" style="color:#fff">Guest Login</a>
    </li>
  </ul>
  </span>
<?php } ?>
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
