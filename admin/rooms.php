<?php
// Start the session
require_once('../server.php');
require_once('adminhome.php');

//upon approval
$activeTab = "1";

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
   </ul>
   <div class="tab-content" id="companiesTabContent">
     <div class="tab-pane fade <?php if($activeTab==1){echo 'show active';} ?>" id="booked">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">S.No.</th>
             <th scope="col">Room Number</th>
             <th scope="col">Room Type</th>
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

           $query = "SELECT room,status,id,guestname,roomposition,username,indentorname,arrival,departure FROM rooms WHERE status='booked'";
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
             $query = "SELECT room,status,id,guestname,roomposition,username,indentorname,arrival,departure FROM rooms WHERE status='empty'";
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
   </div>
 </div>
 </body>
 </html>
