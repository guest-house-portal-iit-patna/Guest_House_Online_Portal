<?php
  $dbcc= mysqli_connect('localhost','root','','guesthouse');
  if (!$dbcc) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $query = "SELECT serial,room,type,status,id,guestname,roomposition,username,indentorname,arrival,departure FROM rooms";
$data = mysqli_query($dbcc, $query);
if(mysqli_num_rows($data) != 0){

// while($row = mysqli_fetch_array($data))
// {
//   if ($row["roomposition"]=="1st floor")
//   {
//     $row1=$row;
//   }
//   if ($row["roomposition"]=="2nd floor")
//   {
//     $row2=$row;
//
//   }
// }

 ?>

<div class="building">
  <div class="screen-side">
    <div class="screen"></div>
    <h3 class="select-text">Please select your rooms.</h3>
  </div>
  <ol class="cabin">
    <li class="rows row--1">
      <ol class="rooms" type="A">
        <?php while($row1 = mysqli_fetch_array($data))
        {

          if ($row1["roomposition"]=="1st floor") {
            if($row1["status"]=="empty"){
          echo '<li class="room">
            <input type="checkbox" id="'.$row1["room"].'" />
            <label for="'.$row1["room"].'">'.$row1["room"].'</label>
          </li>';
        }
        else {
          echo '<li class="room">
            <input type="checkbox" disabled id="'.$row1["room"].'" />
            <label for="'.$row1["room"].'">'.$row1["room"].'</label>
          </li>';
        }
        }
        }
       }
         ?>
      </ol>
    </li>

    <li class="rows row--2">
      <ol class="rooms" type="A">
        <?php
        $data = mysqli_query($dbcc, $query);
        if(mysqli_num_rows($data) != 0){
         while($row2 = mysqli_fetch_array($data))
        {
          if ($row2["roomposition"]=="2nd floor") {
            if($row2["status"]=="empty"){
          echo '<li class="room">
            <input type="checkbox" id="'.$row2["room"].'" />
            <label for="'.$row2["room"].'">'.$row2["room"].'</label>
          </li>';
        }
        else {
          echo '<li class="room">
            <input type="checkbox" disabled id="'.$row2["room"].'" />
            <label for="'.$row2["room"].'">'.$row2["room"].'</label>
          </li>';
        }
        }
      }
     }
         ?>
       </ol>
     </li>

       <li class="rows row--3">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row3 = mysqli_fetch_array($data))
           {
             if ($row3["roomposition"]=="3rd floor") {
               if($row3["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row3["room"].'" />
               <label for="'.$row3["room"].'">'.$row3["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row3["room"].'" />
               <label for="'.$row3["room"].'">'.$row3["room"].'</label>
             </li>';
           }}}}?>
         </ol>
         </li>

       <li class="rows row--4">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row4 = mysqli_fetch_array($data))
           {
             if ($row4["roomposition"]=="4th floor") {
               if($row4["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row4["room"].'" />
               <label for="'.$row4["room"].'">'.$row4["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row4["room"].'" />
               <label for="'.$row4["room"].'">'.$row4["room"].'</label>
             </li>';
           }}}}?>
         </ol>
         </li>

       <li class="rows row--5">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row5 = mysqli_fetch_array($data))
           {
             if ($row5["roomposition"]=="5th floor") {
               if($row5["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row5["room"].'" />
               <label for="'.$row5["room"].'">'.$row5["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row5["room"].'" />
               <label for="'.$row5["room"].'">'.$row5["room"].'</label>
             </li>';
           }}}}?>
         </ol>
         </li>

       <li class="rows row--6">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row6 = mysqli_fetch_array($data))
           {
             if ($row6["roomposition"]=="6th floor") {
               if($row6["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row6["room"].'" />
               <label for="'.$row6["room"].'">'.$row6["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row6["room"].'" />
               <label for="'.$row6["room"].'">'.$row6["room"].'</label>
             </li>';
           }}}}?>
         </ol>
       </li>

       <li class="rows row--7">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row7 = mysqli_fetch_array($data))
           {
             if ($row7["roomposition"]=="7th floor") {
               if($row7["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row7["room"].'" />
               <label for="'.$row7["room"].'">'.$row7["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row7["room"].'" />
               <label for="'.$row7["room"].'">'.$row7["room"].'</label>
             </li>';
           }}}}?>
         </ol>
       </li>

       <li class="rows row--8">
         <ol class="rooms" type="A">
           <?php
           $data = mysqli_query($dbcc, $query);
           if(mysqli_num_rows($data) != 0){
            while($row8 = mysqli_fetch_array($data))
           {
             if ($row8["roomposition"]=="8th floor") {
               if($row8["status"]=="empty"){
             echo '<li class="room">
               <input type="checkbox" id="'.$row8["room"].'" />
               <label for="'.$row8["room"].'">'.$row8["room"].'</label>
             </li>';
           }
           else {
             echo '<li class="room">
               <input type="checkbox" disabled id="'.$row8["room"].'" />
               <label for="'.$row8["room"].'">'.$row8["room"].'</label>
             </li>';
           }}}}?>
         </ol>
       </li>

      </ol>
    </li>
  </ol>
</div>
