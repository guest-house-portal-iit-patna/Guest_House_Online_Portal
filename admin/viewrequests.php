<?php
  // Start the session
  require_once('../server.php');
  require_once('adminhome.php');

  //upon approval

  $activeTab = "2";
  if(isset($_POST['approve'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));

    $update_status_query = "UPDATE bookings SET status='accepted' WHERE id='$id'";
    $update_status = mysqli_query($dbc, $update_status_query);
    if(!$update_status){
      echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">' .
        'Failed to update. Please try again.' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
        '<span aria-hidden="true">&times;</span></button></div></div>';
      die("QUERY FAILED ".mysqli_error($dbc));
    } else {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">' .
          'Successfully Updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
          '<span aria-hidden="true">&times;</span></button></div></div>';
    }
    $activeTab = $_GET['tab'];

    //acceptance mail

  //   require_once('../PHPMailer_5.2.0/class.phpmailer.php');
  //   $mail = new PHPMailer(); // create a new object
  //   $mail->IsSMTP(); // enable SMTP
  //   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  //   $mail->SMTPAuth = true; // authentication enabled
  //   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  //   $mail->Host = "smtp.gmail.com";
  //   $mail->Port = 465; // or 587
  //   $mail->IsHTML(true);
  //   $mail->Username = "theoriginalmk7@gmail.com";
  //   $mail->Password = "etsH7BPvtXmkVgb";
  //   $mail->SetFrom("singh99sahil.gs@gmail.com");
  //   $mail->Subject = "Welcome to IIT PATNA Guest House Booking Portal";
  //   $mail->Body = "Hi ".$username.",<br><br>Welcome to the Guest House booking portal of IIT Patna. <br> Your request has beem accepted.<br> <br> Thank you";
  //   $mail->AddAddress($email);
  //
  //    if(!$mail->Send()) {
  //       echo "Mailer Error: " . $mail->ErrorInfo;
  //    }
  }

  //upon rejection

  if(isset($_POST['reject'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));

    $update_status_query = "UPDATE bookings SET status='rejected' WHERE id='$id'";
    $update_status = mysqli_query($dbc, $update_status_query);
    if(!$update_status){
      echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">' .
        'Failed to update. Please try again.' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
        '<span aria-hidden="true">&times;</span></button></div></div>';
      die("QUERY FAILED ".mysqli_error($dbc));
    } else {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">' .
          'Successfully Updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
          '<span aria-hidden="true">&times;</span></button></div></div>';
    }
    $activeTab = $_GET['tab'];
  }

  if(isset($_POST['delete'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));

    $update_status_query = "DELETE FROM bookings  WHERE id='$id'";
    $update_status = mysqli_query($dbc, $update_status_query);
    if(!$update_status){
      echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">' .
        'Failed to update. Please try again.' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
        '<span aria-hidden="true">&times;</span></button></div></div>';
      die("QUERY FAILED ".mysqli_error($dbc));
    } else {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">' .
          'Successfully Updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
          '<span aria-hidden="true">&times;</span></button></div></div>';
    }
    $activeTab = $_GET['tab'];
  }
?>

<!--html code-->
<br>
<div class="container" style="width:80%;">
  <ul class="nav nav-pills nav-justified" id="companiesTab" role="tablist" >
    <li class="nav-item pill-1">
      <a class="nav-link <?php if($activeTab==1){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="home" aria-selected="true">Accepted</a>
    </li>
    <li class="nav-item pill-1">
      <a class="nav-link <?php if($activeTab==2){echo 'active';} ?>" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
    </li>
    <li class="nav-item pill-1">
      <a class="nav-link <?php if($activeTab==3){echo 'active';} ?>" id="contact-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="contact" aria-selected="false">Rejected</a>
    </li>
  </ul>
  <div class="tab-content" id="companiesTabContent">
    <div class="tab-pane fade <?php if($activeTab==1){echo 'show active';} ?>" id="accepted">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Username</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Guest Number</th>
            <th scope="col">Change Status</th>
          </tr>
        </thead>

        <?php
        $dbc= mysqli_connect('localhost','root','','guesthouse');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }

          $query = "SELECT id, username, guestname, guestphone FROM bookings WHERE status='accepted'";
          $data = mysqli_query($dbc, $query);
          if(mysqli_num_rows($data) != 0){
        ?>
        <tbody>
          <?php
            $curr = 1;
            while($row = mysqli_fetch_array($data)){
              echo '<tr><th scope="row">' . $curr . '</th>' .
                        '<td>' . $row["username"] . '</td>' .
                        '<td>' . $row["guestname"] . '</td>' .
                        '<td>' . $row["guestphone"] . '</td>' .
                        '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=1" method="post">' .
                        '<button type="reject" class="btn btn-outline-danger" name="reject">Reject</button></form></td>' .
                    '</tr>';
              $curr = $curr + 1;
            }
          ?>
        </tbody>
        <?php } else { ?>
          <tr>
            <td>No data</td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <div class="tab-pane fade <?php if($activeTab==2){echo 'show active';} ?>" id="pending" role="tabpanel">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Username</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Guest Number</th>
            <th scope="col">Change Status</th>
            <th scope="col">Delete Request</th>
          </tr>
        </thead>
        <?php
        $dbc= mysqli_connect('localhost','root','','guesthouse');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }
            $query = "SELECT id, username, guestname, guestphone FROM bookings WHERE status='pending'";
          $data = mysqli_query($dbc, $query);
          if(mysqli_num_rows($data) != 0){
        ?>
        <tbody>
          <?php
            $curr = 1;
            while($row = mysqli_fetch_array($data)){
              echo '<tr><th scope="row">' . $curr . '</th>' .
                        '<td>'. $row["username"] . '</td>' .
                        '<td>' . $row["guestname"] . '</td>' .
                        '<td>' . $row["guestphone"] . '</td>' .
                        '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=2" method="post">' .
                        '<button type="approve" class="btn btn-outline-success" name="approve">Approve</button> ' .
                        '<button type="reject" class="btn btn-outline-danger" name="reject">Reject</button></form></td>' .
                        '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post">' .
                        '<button type="delete" class="btn btn-outline-danger" name="delete">Delete</button></form></td>' .
                    '</tr>';
              $curr = $curr + 1;
            }
          ?>
        </tbody>
        <?php } else { ?>
          <tr>
            <td>No data</td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <div class="tab-pane fade <?php if($activeTab==3){echo 'show active';} ?>" id="rejected" role="tabpanel">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Username</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Guest Number</th>
            <th scope="col">Change Status</th>
            <th scope="col">Delete Request</th>
          </tr>
        </thead>
        <?php
        $dbc= mysqli_connect('localhost','root','','guesthouse');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }
          $query = "SELECT id, username, guestname, guestphone FROM bookings WHERE status='rejected'";
          $data = mysqli_query($dbc, $query);
          if(mysqli_num_rows($data) != 0){
        ?>
        <tbody>
          <?php
            $curr = 1;
            while($row = mysqli_fetch_array($data)){
                    echo '<tr><th scope="row">' . $curr . '</th>' .
                              '<td>' . $row["username"] . '</td>' .
                              '<td>' . $row["guestname"] . '</td>' .
                              '<td>' . $row["guestphone"] . '</td>' .
                              '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post" >' .
                              '<button type="approve" class="btn btn-outline-info" name="approve">Approve</button></form></td>' .
                              '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post">' .
                              '<button type="delete" class="btn btn-outline-danger" name="delete">Delete</button></form></td>' .
                          '</tr>';

                          // echo '<tr><th scope="row">' . $curr . '</th>' .
                          //           '<td>' . $row["username"] . '</td>' .
                          //           '<td>' . $row["guestname"] . '</td>' .
                          //           '<td>' . $row["guestphone"] . '</td>' .
                          //           '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post" style="display:inline-block; float:left; margin-right:-50px;">' .
                          //           '<button type="approve" class="btn btn-success" name="approve">Approve</button></form> .
                          //           '<form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post" style="margin-left:-150px; display:inline-block; float:right;">' .
                          //           '<button type="delete" class="btn btn-danger" name="delete">Delete</button></form></td>' .
                          //       '</tr>';

              $curr = $curr + 1;
            }
          ?>
        </tbody>
        <?php } else { ?>
          <tr>
            <td>No data</td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>
