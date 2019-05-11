<?php
require_once('server.php');
//load.php
$hostname=DB_HOST;
$user=DB_USER;
$password=DB_PASSWORD;
$databasename=DB_NAME;
$connect = new PDO("mysql:host=$hostname;dbname=$databasename", $user, $password);
$date1 = strtotime(date("Y-m-d 00:00:00"));
//$today = date("Y-m-d H:i:s");

$dbcc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "DELETE FROM calendar";
$data1 = mysqli_query($dbcc, $query);
$date = date("Y-m-d", $date1);
for($i = 0 ; $i <= 45; $i++){
    $from_date1 = $date1;
    $from_date = date("Y-m-d 00:00:00", $from_date1);
    $to_date1 = strtotime("+1 day", $from_date1);
    $to_date = date("Y-m-d 00:00:00", $to_date1);
    print("from ".$from_date."= ".gettype($from_date)."<br>");
    print("to ".$to_date."= ".gettype($from_date)."<br>");
    $normal = 0;
    $master = 0;
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

      $row2=array();
      while($row = mysqli_fetch_array($data))
      {
        $row2[]=$row;
      }
       foreach ($row2 as $row1)
          {
              if(!isset($roomsarr))
              {
                  $normal = 16;
                  $master = 8;
              }
              else
              {
                if(!(in_array($row1['room'],$roomsarr)))
                {
                  if($row1['type']=="Normal")$normal++;
                  else $master++;
                }
              }


          }
          }
          $str = "Normal: ".$normal."\nMaster: ".$master;
          $query = "INSERT INTO calendar (available_rooms, start_time, end_time) VALUES ('$str','$from_date','$from_date')";
          mysqli_query($dbcc,$query);
          $date1 = strtotime("+1 day", $date1);
          unset($roomsarr);
}
header('location: calendarview.php');
?>
