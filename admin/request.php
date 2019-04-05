<?php
  // Start the session
  require_once('../server.php');
  require_once('../templates/navbar.php');

  // Connect to Database
  $dbc= mysqli_connect('localhost','root','','guesthouse');
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Fetch id
  $id = $_GET['id'];

  $query = "SELECT * FROM bookings WHERE id='". $id ."'";
  $data = mysqli_query($dbc, $query);

  if(!$data){
    die("QUERY FAILED ".mysqli_error($dbc));
  }

  if(mysqli_num_rows($data) == "1"){
    $row = mysqli_fetch_assoc($data);
    $username = $row["username"];
    $guestname = $row["guestname"];
    $guestphone = $row["guestphone"];
    $status = $row["status"];
    ?>
    <div class="container" style="max-width: 80%; padding: 20px;">
      <div class="card">
        <div class="card-header">
          <div style="display:inline-block">
            <h4 class="card-title" ><?php echo $username; ?></h4>
          </div>
        </div>
        <div class="card-body">
          <div style="display:flex;"><h5>ID:</h5> <div style="padding-left: 5px;"><?php echo $id; ?></div></div>
          <div style="display:flex;"><h5>Username:</h5> <div style="padding-left: 5px;"><?php echo $username; ?></div></div>
          <div style="display:flex;"><h5>Guest Name:</h5> <div style="padding-left: 5px;"><?php echo $guestname; ?></div></div>
        </div>
        <div class="card-footer text-muted">
          <div style="float:left;margin-bottom:4px;">
            <?php if ($status == "accepted"){ ?>
            <span class="badge badge-success">Accepted</span>
            <?php } elseif ($status == "pending") { ?>
            <span class="badge badge-warning">Pending</span>
            <?php } elseif ($status == "rejected") { ?>
            <span class="badge badge-danger">Rejected</span>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php  }

?>
