<?php
  $dbcc= mysqli_connect('localhost','root','','guesthouse');
  if (!$dbcc) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $query = "SELECT room,arrival,departure FROM bookedrooms WHERE arrival>='$from_date' AND departure<='$to_date'";
  $data1 = mysqli_query($dbcc, $query);
  $roomsarr=mysqli_fetch_array($data1);
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
    for ($i=1; $i <=2; $i++) {
      ?>
    <li class="rows row--<?php echo $i ?>">
      <ol class="rooms" type="A">
        <?php while($row1 = mysqli_fetch_array($data))
        {

          if ($row1["floor"]==$i) {
            if(!isset($roomsarr))
            {
            echo '<li class="room">
              <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" value="'.$row1["room"].'" id="'.$row1["room"].'" />
              <label for="'.$row1["room"].'">'.$row1["room"].'</label>
            </li>';
            }
            else{
            if(!(in_array($row1['room'],$roomsarr['room'])))
            {
          echo '<li class="room">
            <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" value="'.$row1["room"].'" id="'.$row1["room"].'" />
            <label for="'.$row1["room"].'">'.$row1["room"].'</label>
          </li>';
        }
        else {
          echo '<li class="room">
            <input class="single-checkbox" type="checkbox" name="check_list[]" onclick=" return checkThis(this,1)" disabled value="'.$row1["room"].'" id="'.$row1["room"].'" />
            <label for="'.$row1["room"].'">'.$row1["room"].'</label>
          </li>';
        }
      }
        }
        }
       }
       ?>
        </ol>
      </li>
    <?php } ?>
      </ol>
      <button type="submit" class="btn btn-primary" name="roomschosen" style="margin:auto; display:block;">Submit</button>
      </form>
</div>
