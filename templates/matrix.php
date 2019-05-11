<?php
  $dbcc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$dbcc) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $query = "SELECT room FROM bookedrooms WHERE arrival<='$from_date' AND departure>='$from_date' OR arrival<='$to_date' AND departure>='$to_date' OR arrival>='$from_date' AND departure<='$to_date'";
  $data1 = mysqli_query($dbcc, $query);
  while($r=mysqli_fetch_assoc($data1)){
    $roomsarr[]=$r['room'];
  }

  $query = "SELECT room,type,floor FROM rooms";
  $data = mysqli_query($dbcc, $query);

if(mysqli_num_rows($data) != 0){
 ?>

<div class="building">
  <div class="screen-side">
    <div class="screen"></div>
    <h3 class="select-text">Please select your rooms.</h3>
  </div>
  <form class="form" id="room" action="chosenrooms.php" method="post" name="room">
  <ol class="cabin">
    <?php
    $row2=array();
    while($row = mysqli_fetch_array($data))
    {
      $row2[]=$row;
    }
    for ($i=1; $i <=2; $i++) {
      $j=0;
      ?>
    <li class="rows row--<?php echo $i ?>">
      <ol class="rooms" type="A">
        <?php foreach ($row2 as $row1)
        {

          if ($row1["floor"]==$i)
          {
            if(!isset($roomsarr))
            {
            echo '<li class="room">
              <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" value="'.$row1["room"].'" id="'.$row1["room"].'" />
              <label for="'.$row1["room"].'">'.$row1["room"].'</label>
            </li>';
            }
            else
            {
              if(!(in_array($row1['room'],$roomsarr)))
              {
                echo '<li class="room">
                  <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" value="'.$row1["room"].'" id="'.$row1["room"].'" />
                  <label for="'.$row1["room"].'">'.$row1["room"].'</label>
                </li>';
              }
              else
              {
                echo '<li class="room">
                <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" disabled value="'.$row1["room"].'" id="'.$row1["room"].'" />
                <label for="'.$row1["room"].'">'.$row1["room"].'</label>
                </li>';
              }
            }
          }
          $j++;
        }
       ?>
     </ol>
   </li>
    <?php } }?>

      </ol>
      <button type="submit" class="btn btn-primary" id="roomsubmit" name="roomschosen" style="margin: 2.5% auto 2.5%; display:block;">Submit</button>
      </form>

<div class="align" style="display: flex; margin-left:25%;">
  <figure style="display: flex; float:left; margin-right:3%;">
    <img src="images/legend/green.png" alt="" style="height:20px; width:20px; display:inline-block; margin-left:5%; margin-right:2%;">
    <figcaption style="float:right; margin-left:5%; display:inline-block;">Selected</figcaption>
  </figure>
  <figure style="display: flex; float:left; margin-right:3%;">
    <img src="images/legend/crimson.png" alt="" style="height:20px; width:20px; display:inline-block; margin-left:5%; margin-right:2%;">
    <figcaption style="float:right; margin-left:5%;">Booked</figcaption>
  </figure>
  <figure style="display: flex;float:left; margin-right:3%;">
    <img src="images/legend/blue.png" alt="" style="height:20px; width:20px; display:inline-block; margin-left:5%; margin-right:2%;">
    <figcaption style="float:right; margin-left:5%;">Normal </figcaption>
  </figure>
  <figure style="display: flex; float:left; margin-right:3%;">
    <img src="images/legend/dblue.png" alt="" style="height:20px; width:20px; display:inline-block; margin-left:5%; margin-right:2%;">
    <figcaption style="float:right; margin-left:5%;">Master </figcaption>
  </figure>
  <figure style="display: flex; float:left; margin-right:3%;">
    <img src="images/legend/orange.png" alt="" style="height:20px; width:20px; display:inline-block; margin-left:5%; margin-right:2%;">
    <figcaption style="float:right; margin-left:5%;">Requested</figcaption>
  </figure>
</div>

</div>
