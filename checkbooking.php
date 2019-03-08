<?php
  // Start the session
  require_once('server.php');
  require_once('templates/navbar.php');

  //IF user is not logged in, this page cannot be accessed.
  if(empty($_SESSION['username'])) {
    header('location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">

  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/loginsystem.css">
</head>
<body>
<!--html code-->
<br>
      <table class="table" style="width:80%; margin-left:150px;">
        <thead class="thead-light">
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Username</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Guest Number</th>
            <th scope="col">Status</th>
          </tr>
        </thead>

        <?php
        $dbc= mysqli_connect('localhost','root','','booking');
        if (!$dbc) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $username = mysqli_real_escape_string($dbc, trim($_GET['username']));
        $query = "SELECT * FROM guestinfo WHERE username='$username '";
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
                        '<td>' . $row["guestphone"] . '</td>' .'<td>' . $row["status"] . '</td>'
                         .
                         '<td><form action="deletebooking.php?id=' . $row["id"] . '" method="post" style="border:none;">' .
                         '<button type="delete" class="btn btn-outline-danger" name="delete" style="margin-top:-25px;">Cancel</button></form></td>' .
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
</body>
</html>
