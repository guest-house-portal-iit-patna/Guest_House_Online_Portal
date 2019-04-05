<?php
  require_once ('../server.php');
  $dbc= mysqli_connect('localhost','root','','guesthouse');
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $query= "SELECT * FROM bookings";
  $array = array();
  // look through query
  $result = mysqli_query($dbc,$query);
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    // add each row returned into an array
    $array[] = $row;
    // print_r($array);
  }
  // $result = mysqli_query($dbc,$query);
  // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<?php if(count($array) > 0): ?>
  <div class="bookinginfo">
    <?php foreach ($array as $row): ?>
      <?php foreach ($row as $element): ?>
        <p> <?php echo $element; ?> </p>
      <?php endforeach ?>
    <?php endforeach ?>
  </div>
<?php endif ?>
