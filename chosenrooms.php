<?php
if (isset($_POST['roomschosen'])){
  if(!empty($_POST['check_list'])){
  // Loop to store and display values of individual checked checkbox.
  foreach($_POST['check_list'] as $selected){
  echo $selected."</br>";
  }
}
header("location: homepage.php");
}

?>
