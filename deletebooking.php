<?php
  // Start the session
  require_once('server.php');
  require_once('templates/navbar.php');

  //IF user is not logged in, this page cannot be accessed.
  if(empty($_SESSION['username'])) {
    header('location: login.php');
  }


  if(isset($_POST['delete'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($dbc, trim($_GET['id']));
    $query="SELECT username FROM guestinfo WHERE id='$id'";
    $username=mysqli_query($dbc, $query);
    $update_status_query = "DELETE FROM guestinfo  WHERE id='$id'";
    $update_status = mysqli_query($dbc, $update_status_query);
    header('Location: homepage.php');
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
  }
?>
