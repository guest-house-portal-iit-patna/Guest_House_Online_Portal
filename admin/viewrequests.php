<?php
  // Start the session
  require_once('../server.php');
  require_once('adminhome.php');


  $activeTab = "1";
  if(isset($_POST['approve'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','booking');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));

    $update_status_query = "UPDATE guestinfo SET status='accepted' WHERE id='$id'";
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
  if(isset($_POST['reject'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','booking');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));

    $update_status_query = "UPDATE guestinfo SET status='rejected' WHERE id='$id'";
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

<div class="container">
  <ul class="nav nav-tabs" id="companiesTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link <?php if($activeTab==1){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="home" aria-selected="true">Accepted</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($activeTab==2){echo 'active';} ?>" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
    </li>
    <li class="nav-item">
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
            <th scope="col">Action</th>
          </tr>
        </thead>

        <?php
        $dbc= mysqli_connect('localhost','root','','booking');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }

          $query = "SELECT id, username, guestname, guestphone FROM guestinfo WHERE status='accepted'";
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
                        '<button type="reject" class="btn btn-danger" name="reject">Reject</button></form></td>' .
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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $dbc= mysqli_connect('localhost','root','','booking');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }
            $query = "SELECT id, username, guestname, guestphone FROM guestinfo WHERE status='pending'";
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
                        '<button type="approve" class="btn btn-success" name="approve">Approve</button> ' .
                        '<button type="reject" class="btn btn-danger" name="reject">Reject</button></form></td>' .
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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $dbc= mysqli_connect('localhost','root','','booking');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }
          $query = "SELECT id, username, guestname, guestphone FROM guestinfo WHERE status='rejected'";
          $data = mysqli_query($dbc, $query);
          if(mysqli_num_rows($data) != 0){
        ?>
        <tbody>
          <?php
            $curr = 1;
            while($row = mysqli_fetch_array($data)){
              // echo '<tr><th scope="row">' . $curr . '</th>' .
              //           '<td><a href="./company.php?id=' . $row["id"] . '" target="_blank">' . $row["username"] . '</a></td>' .
              //           '<td>' . $row["guestname"] . '</td>' .
              //           '<td>' . $row["guestphone"] . '</td>' .
              //           '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post">' .
              //           '<button type="approve" class="btn btn-success" name="approve">Approve</button></form></td>' .
              //       '</tr>';
                    echo '<tr><th scope="row">' . $curr . '</th>' .
                              '<td>' . $row["username"] . '</td>' .
                              '<td>' . $row["guestname"] . '</td>' .
                              '<td>' . $row["guestphone"] . '</td>' .
                              '<td><form action="' . $_SERVER['PHP_SELF'] . '?id=' . $row["id"] . '&tab=3" method="post">' .
                              '<button type="approve" class="btn btn-success" name="approve">Approve</button></form></td>' .
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
  </div>
</div>
</body>
</html>
