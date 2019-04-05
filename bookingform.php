<?php
session_start();

//declaring variables
$username=$_SESSION['username'];
$guest_name = "";
$phone_number= "";

/*
There was some problem while using arrays in the form, look into it later and learn.
*/

// $address=array("appartment_number"=>" ","city"=>" ","state"=>" ","pin"=>" ");
// $indentor=array("employee_id"=>" ","indentorname"=>" ", "designation"=>" ","department"=>" ",,"phone"=>" ","email"=>" " );
// $room=array("number_people"=>" ","payment"=>" ","number_rooms"=>" ", "accomodation"=>" ", "arrival"=>" ","departure"=>" ","purpose"=>" ","veg_breakfast"=>" ","veg_lunch"=>" ","veg_dinner"=>" ","nonveg_breakfast"=>" ","nonveg_lunch"=>" ","nonveg_dinner"=>" ");

//connect to database
$dbc=mysqli_connect('localhost','root','','guesthouse');

$guest_name=$_POST['guest_name'];
$phone_number=$_POST['phone_number'];
$appartment_number=$_POST['appartment'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$employee_id=$_POST['employee_id'];
$indentorname=$_POST['indentorname'];
$designation=$_POST['designation'];
$department=$_POST['department'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$room_number_people=$_POST['number_people'];
$room_payment=$_POST['payment'];
$room_number_rooms=$_POST['number_rooms'];
$room_accomodation=$_POST['accomodation'];
$room_arrival=$_POST['arrival'];
$room_departure=$_POST['departure'];
$room_purpose=$_POST['purpose'];
$room_veg_breakfast=$_POST['veg_breakfast'];
$room_veg_lunch=$_POST['veg_lunch'];
$room_veg_dinner=$_POST['veg_dinner'];
$room_nonveg_breakfast=$_POST['nonveg_breakfast'];
$room_nonveg_lunch=$_POST['nonveg_lunch'];
$room_nonveg_dinner=$_POST['nonveg_dinner'];

$random_id = bin2hex(random_bytes(8));

//guest info
//guest address
//indentor info
//room
//all info is finally saved in a single table 'bookings'.


// $sql= "INSERT INTO guestinfo (id,username,guestname,guestphone) VALUES ('$random_id','$username','$guest_name','$phone_number')";
// mysqli_query($dbc,$sql);
//
// $sql= "INSERT INTO guestaddress (id,username,guestname,appartment,city,state,pin) VALUES ('$random_id','$username','$guest_name','$appartment_number','$city','$state','$pin')";
// mysqli_query($dbc,$sql);
//
// $sql= "INSERT INTO indentorinfo (id,username,guestname,employeeid,indentorname,designation,department,phone,email) VALUES ('$random_id','$username','$guest_name','$employee_id','$indentorname','$designation','$department','$phone','$email')";
// mysqli_query($dbc,$sql);
//
// $sql= "INSERT INTO roomrequirement (id,username,guestname,number_people,payment,number_rooms,accomodation,arrival,departure,purpose,vegbreakfast,veglunch,vegdinner,nonvegbreakfast,nonveglunch,nonvegdinner) VALUES ('$random_id','$username','$guest_name','$room_number_people','$room_payment','$room_number_rooms','$room_accomodation','$room_arrival','$room_departure','$room_purpose','$room_veg_breakfast','$room_veg_lunch','$room_veg_dinner','$room_nonveg_breakfast','$room_nonveg_lunch','$room_nonveg_dinner')";
// mysqli_query($dbc,$sql);

$sql= "INSERT INTO bookings (id,username,guestname,guestphone,appartment,city,state,pin,employeeid,indentorname,designation,department,phone,email,number_people,payment,number_rooms,accomodation,arrival,departure,purpose,vegbreakfast,veglunch,vegdinner,nonvegbreakfast,nonveglunch,nonvegdinner) VALUES ('$random_id','$username','$guest_name','$phone_number','$appartment_number','$city','$state','$pin','$employee_id','$indentorname','$designation','$department','$phone','$email','$room_number_people','$room_payment','$room_number_rooms','$room_accomodation','$room_arrival','$room_departure','$room_purpose','$room_veg_breakfast','$room_veg_lunch','$room_veg_dinner','$room_nonveg_breakfast','$room_nonveg_lunch','$room_nonveg_dinner')";
mysqli_query($dbc,$sql);

//Mailing

{
  // redirect to homepage
  $_SESSION['username']=$username;
  $_SESSION['success'] = "You are now logged in.";
  require_once('PHPMailer_5.2.0/class.phpmailer.php');
  $mail = new PHPMailer(); // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = "theoriginalmk7@gmail.com";
  $mail->Password = "etsH7BPvtXmkVgb";
  $mail->SetFrom("singh99sahil.gs@gmail.com");
  $mail->Subject = "Booking request received.";
  $mail->Body = "Hello ".$username.",<br><br>Your request for booking has been registered.<br>Your booking ID is ".$random_id.". <br>You will be suitably notified the status of your booking. <br>
  <br> Thank you";
  $mail->AddAddress($email);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   }

  header('location: homepage.php');
}
 ?>
