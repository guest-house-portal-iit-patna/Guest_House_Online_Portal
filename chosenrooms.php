<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(empty($_SESSION['username'])) {
  header('location: login.php');
}

require_once('server.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];
if (isset($_POST['roomschosen'])){
  if(!empty($_POST['check_list'])){
  // Loop to store and display values of individual checked checkbox.

  foreach($_POST['check_list'] as $selected){
    if(!isset($s))
    $s=$selected;
    else {
    $s=$s.",".$selected;
    }
  }
  $dbc= mysqli_connect('localhost','root','','guesthouse');
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $update_status_query = "UPDATE bookings SET requestedrooms='$s' WHERE id='$id'";
  $update_status = mysqli_query($dbc, $update_status_query);
}
header("location: homepage.php");
}

  // Load Composer's autoloader
  require 'phpmailer/vendor/autoload.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

      //Server settings
      $mail->SMTPDebug = 1;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'theoriginalmk7@gmail.com';                     // SMTP username
      $mail->Password   = 'uqmftsMfU9ustcw';                               // SMTP password
      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('theoriginalmk7@gmail.com', 'Guesthouse IIT PATNA');
      $mail->addAddress($email);     // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Booking request received.';
      $mail->Body    = "Hello ".$_SESSION['username'].",<br><br>Your request for booking has been registered.<br>Your booking ID is ".$_SESSION['id'].". <br>You will be suitably notified the status of your booking. <br>
      <br> Thank you";
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if($mail->send())
          echo 'Message has been sent';
      else
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

?>
