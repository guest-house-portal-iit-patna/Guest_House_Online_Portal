<img src="images/iitp_logo.png" class="rounded float-left">
<div class="header-nav">
  <h1>IIT PATNA</h1>
  <h2>Guest House Booking Portal</h2>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5F9EA0; ">
  <a class="navbar-brand" href="/Guest_House_Online_Portal/index.php" style="font-size: inherit; color: #fff;">Home</a>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <?php if(!isset($_SESSION['username']) || $_SESSION['user_role']!='admin'){ ?>
    <li class="nav-item active">
      <a class="nav-link" href="https://ww  w.iitp.ac.in/hostel/reachIITP.html" style="color: #fff;">How to reach IIT Patna?</a>
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
      <a class="nav-link" href="#" style="color: #fff;">Booking Requests</a>
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
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >Admin</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >Faculty/Staff</a>
        <a class="dropdown-item" href="/Guest_House_Online_Portal/login.php" >Student</a>
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
      <h4>Mp
      il</h4>
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
