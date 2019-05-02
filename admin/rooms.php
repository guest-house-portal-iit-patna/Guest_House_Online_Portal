<?php
// Start the session
require_once('../server.php');
require_once('adminhome.php');

//upon approval
$activeTab=1;
if(isset($_GET['check1']))
$activeTab = "1";
if(isset($_GET['check2']))
$activeTab = "2";

$dbc= mysqli_connect('localhost','root','','guesthouse');
if (!$dbc) {
  die("Connection failed: " . mysqli_connect_error());
}
 if (isset($_POST['add'])) {
   // code...
    $number = $_POST['number'];
    $type = $_POST['type'];
    $floor= $_POST['floor'];
    $query = "INSERT INTO rooms (room,type,floor) VALUES ('$number','$type','$floor')";
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
    $activeTab = "3";
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
    $activeTab = "3";
  }
 ?>

 <!--html code-->
 <br>
 <div class="container" style="width:80%;">
   <ul class="nav nav-pills nav-justified" id="guesthouseTab" role="tablist" >
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==1){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="home" aria-selected="true">Booked</a>
     </li>
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==2){echo 'active';} ?>" id="profile-tab" data-toggle="tab" href="#empty" role="tab" aria-controls="profile" aria-selected="false">Empty</a>
     </li>
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==3){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All Rooms </a>
     </li>
     <li class="nav-item pill-1">
       <a class="nav-link <?php if($activeTab==4){echo 'active';} ?>" id="home-tab" data-toggle="tab" href="#add" role="tab" aria-controls="home" aria-selected="true">Add Rooms </a>
     </li>
   </ul>
   <div class="tab-content" id="guesthouseTabContent">

     <div class="tab-pane fade <?php if($activeTab==1){echo 'show active';} ?>" id="booked">

       <form>
         <div class="check-form" id="check-form">
         <div class="form-row"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
           <div class="form-group col-md-4" style="margin-left:25px;">
             <input type="date" class="form-control" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date'];} ?>" placeholder="from_date" name="from_date" >
           </div>
           <div class="form-group col-md-4">
             <input type="date" class="form-control" placeholder="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date'];} ?>" name="to_date" >
           </div>
         <div class="form-group col-md-2" >
           <button type="submit" class="btn btn-primary" name="check1" style="margin-left:50px;">Check</button>
         </div>
         </div>
         </div>
       </form>

       <?php
        if(isset($_GET['check1'])) {
         $_SESSION['tab']=$activeTab;
         $to_date=$_GET['to_date'];
         $from_date=$_GET['from_date'];
          ?>
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Booking Id</th>
             <th scope="col">Guest Name</th>
             <th scope="col">Floor No.</th>
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

           $query = "SELECT room,id,guestname,floor,username,indentorname,arrival,departure FROM bookedrooms WHERE arrival<='$from_date' AND departure>='$from_date' OR arrival<='$to_date' AND departure>='$to_date' OR arrival>='$from_date' AND departure<='$to_date'";
           $data = mysqli_query($dbc, $query);
           if(mysqli_num_rows($data) != 0){
         ?>
         <tbody>
           <?php
             $curr = 1;
             while($row = mysqli_fetch_array($data)){
               echo '<tr><th scope="row">' . $curr . '</th>' .
                         '<td>' . $row["room"] . '</td>' .
                         '<td>' . $row["id"] . '</td>' .
                         '<td>' . $row["guestname"] . '</td>' .
                         '<td>' . $row["floor"] . '</td>' .
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
      <?php } ?>

     </div>

     <div class="tab-pane fade <?php if($activeTab==2){echo 'show active';} ?>" id="empty" role="tabpanel">

       <form>
         <div class="check-form" id="check-form">
         <div class="form-row"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
           <div class="form-group col-md-4" style="margin-left:25px;">
             <input type="date" class="form-control" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date'];} ?>" placeholder="from_date" name="from_date" >
           </div>
           <div class="form-group col-md-4">
             <input type="date" class="form-control" placeholder="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date'];} ?>" name="to_date" >
           </div>
         <div class="form-group col-md-2" >
           <button type="submit" class="btn btn-primary" name="check2" style="margin-left:50px;">Check</button>
         </div>
         </div>
         </div>
       </form>

       <?php
        if(isset($_GET['check2'])) {
         $to_date=$_GET['to_date'];
         $from_date=$_GET['from_date'];
          ?>

       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Room Floor Number</th>
           </tr>
         </thead>
         <?php
         $dbc= mysqli_connect('localhost','root','','guesthouse');
         if (!$dbc) {
           die("Connection failed: " . mysqli_connect_error());
         }
         $query = "SELECT room FROM bookedrooms WHERE arrival<='$from_date' AND departure>='$from_date' OR arrival<='$to_date' AND departure>='$to_date' OR arrival>='$from_date' AND departure<='$to_date'";
         $data1 = mysqli_query($dbc, $query);
         while($r=mysqli_fetch_assoc($data1)){
           $roomsarr[]=$r['room'];
         }

         $query = "SELECT room,type,floor FROM rooms";
         $data = mysqli_query($dbc, $query);


           if(mysqli_num_rows($data) != 0){
         ?>
         <?php   if(!isset($roomsarr)){ ?>
         <tbody>
           <?php
             $curr = 1;
             while($row = mysqli_fetch_array($data)){
               echo '<tr><th scope="row">' . $curr . '</th>' .
                         '<td>' . $row["room"] . '</td>' .
                         '<td>' . $row["type"] . '</td>' .
                         '<td>' . $row["floor"] . '</td>' .
                     '</tr>';
               $curr = $curr + 1;
           ?>
         </tbody>
       <?php }} else {
          $curr = 1;
        while($row = mysqli_fetch_array($data)){
         if(!(in_array($row['room'],$roomsarr))){?>
         <tbody>
           <?php

               echo '<tr><th scope="row">' . $curr . '</th>' .
                         '<td>' . $row["room"] . '</td>' .
                         '<td>' . $row["type"] . '</td>' .
                         '<td>' . $row["floor"] . '</td>' .
                     '</tr>';
               $curr = $curr + 1;
             }
           ?>
         </tbody>
     <?php  }} ?>
   <?php } else { ?>
           <tr>
             <td>No data</td>
           </tr>
         <?php } ?>
       </table>
     <?php } ?>
     </div>

     <div class="tab-pane fade <?php if($activeTab==3){echo 'show active';} ?>" id="all" role="tabpanel">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Room Floor Number</th>
             <th scope="col">Delete</th>
           </tr>
         </thead>
         <?php
         $dbc= mysqli_connect('localhost','root','','guesthouse');
         if (!$dbc) {
           die("Connection failed: " . mysqli_connect_error());
         }
             $query = "SELECT room,type,floor FROM rooms";
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
                         '<td>' . $row["floor"] . '</td>' .
                         '<td><form action="' . $_SERVER['PHP_SELF'] . '?room=' . $row["room"] . '&tab=3" method="post">' .
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

     <div class="tab-pane fade <?php if($activeTab==4){echo 'show active';} ?>" id="add" role="tabpanel">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
             <th scope="col">Room Floor Number</th>
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
                   <input type="text" class="form-control" placeholder="Room floor"  name="floor" required>
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
