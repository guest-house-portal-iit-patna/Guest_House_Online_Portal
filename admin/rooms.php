<?php
// Start the session
require_once('../server.php');
require_once('adminhome.php');

//upon approval
$activeTab = "1";

$dbc= mysqli_connect('localhost','root','','guesthouse');
if (!$dbc) {
  die("Connection failed: " . mysqli_connect_error());
}
 if (isset($_POST['add'])) {
   // code...
    $number = $_POST['number'];
    $type = $_POST['type'];
    $position= $_POST['position'];
    $query = "INSERT INTO rooms (room,type,roomposition) VALUES ('$number','$type','$position')";
    $update_status = mysqli_query($dbc, $query);
    // var_dump($update_status);
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
    $activeTab = "2";
}


  if(isset($_POST['delete'])){

    //connect to database

    $dbc= mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $serial = mysqli_real_escape_string($dbc, trim($_GET['serial']));

    $update_status_query = "DELETE FROM rooms WHERE serial='$serial'";
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
    $activeTab = "2";
  }
 ?>

 <!--html code-->
 <br>
 <div class="container" style="width:80%;">
   <ul class="nav nav-pills nav-justified" id="companiesTab" role="tablist" >
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==1){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="home" aria-selected="true">Booked</a>
     </li>
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==2){echo 'active';} ?>" id="profile-tab" data-toggle="tab" href="#empty" role="tab" aria-controls="profile" aria-selected="false">Empty</a>
     </li>
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==3){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#add" role="tab" aria-controls="home" aria-selected="true">Add Rooms </a>
     </li>
   </ul>
   <div class="tab-content" id="companiesTabContent">

     <div class="tab-pane fade <?php if($activeTab==1){echo 'show active';} ?>" id="booked">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Status</th>
             <th scope="col">Id</th>
             <th scope="col">Guest Name</th>
             <th scope="col">Position</th>
             <th scope="col">Username</th>
             <th scope="col">Indentor Name</th>
             <th scope="col">Check-In Date</th>
            <th scope="col">Check-Out Date</th>
           </tr>
         </thead>

         <?php
         $dbc= mysqli_connect('localhost','root','','guesthouse');
         if (!$dbc) {
           die("Connection failed: " . mysqli_connect_error());
         }

           $query = "SELECT room,type,status,id,guestname,roomposition,username,indentorname,arrival,departure FROM rooms WHERE status='booked'";
           $data = mysqli_query($dbc, $query);
           if(mysqli_num_rows($data) != 0){
         ?>
         <tbody>
           <?php
             $curr = 1;
             while($row = mysqli_fetch_array($data)){
               echo '<tr><th scope="row">' . $curr . '</th>' .
                         '<td>' . $row["room"] . '</td>' .
                         '<td>' . $row["type"] . '</td>' .
                         '<td>' . $row["status"] . '</td>' .
                         '<td>' . $row["id"] . '</td>' .
                         '<td>' . $row["guestname"] . '</td>' .
                         '<td>' . $row["roomposition"] . '</td>' .
                         '<td>' . $row["username"] . '</td>' .
                         '<td>' . $row["indentorname"] . '</td>' .
                         '<td>' . $row["arrival"] . '</td>' .
                         '<td>' . $row["departure"] . '</td>' .
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

     <div class="tab-pane fade <?php if($activeTab==2){echo 'show active';} ?>" id="empty" role="tabpanel">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Status</th>
             <th scope="col">Position</th>
           </tr>
         </thead>
         <?php
         $dbc= mysqli_connect('localhost','root','','guesthouse');
         if (!$dbc) {
           die("Connection failed: " . mysqli_connect_error());
         }
             $query = "SELECT serial,room,type,status,id,guestname,roomposition,username,indentorname,arrival,departure FROM rooms WHERE status='empty'";
           $data = mysqli_query($dbc, $query);
           if(mysqli_num_rows($data) != 0){
         ?>
         <tbody>
           <?php
             $curr = 1;
             while($row = mysqli_fetch_array($data)){
               echo '<tr><th scope="row">' . $curr . '</th>' .
                         '<td>' . $row["room"] . '</td>' .
                         '<td>' . $row["type"] . '</td>' .
                         '<td>' . $row["status"] . '</td>' .
                         '<td>' . $row["roomposition"] . '</td>' .
                         '<td><form action="' . $_SERVER['PHP_SELF'] . '?serial=' . $row["serial"] . '&tab=3" method="post">' .
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

     <div class="tab-pane fade <?php if($activeTab==3){echo 'show active';} ?>" id="add" role="tabpanel">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Room Position</th>
             <th scope="col">Submit</th>
           </tr>
         </thead>
         <tbody>
         <tr>
          <form class="form" action="rooms.php" method="post">
              <td>
               <div class="form-row">
                 <div class="col">
                   <input type="text" class="form-control" placeholder="Room Number" name="number" required>
                 </div>
                 </td>
                 <td>
                 <div class="col">
                   <input type="text" class="form-control" placeholder="Room Type" name="type" required>
                 </div>
                 </td>
                 <td>
                 <div class="col">
                   <input type="text" class="form-control" placeholder="Room Position"  name="position" required>
                 </div>
                 </td>
                 <td>
                 <button type="submit" class="btn btn-outline-info" name="add" >Submit</button>
                 </td>
               </div>
             </form>
           </tr>
          </tbody>
       </table>
     </div>
   </div>
 </div>
 </body>
 </html>
