<?php
	session_start();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password1 = $_POST['password_1'];
	$password2 = $_POST['password_2'];


	$hostname = "localhost";
	$username1 = "root";
	$password = "";
	$dbname = "innovation";

    $dbc = mysqli_connect($hostname, $username1, $password, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());
    
   
    mysqli_set_charset($dbc, "utf8");
    if($password1!=$password2){
    	echo "password don't match"."<br>";
    }
    else{
		$query1 = "SELECT * FROM guest_users WHERE email = '$email'";
		$query2 = "SELECT * FROM guest_users WHERE username = '$username'";
	    $result1 = mysqli_query($dbc,$query1);
	    $result2 =  mysqli_query($dbc,$query2);
	    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
	    $count1 = mysqli_num_rows($result1);
	    $count2 = mysqli_num_rows($result2);
        
	    if($count1+$count2==0){
	    	$query = "INSERT INTO guest_users (username,email,password) VALUES('$username','$email','$password1')";
	    	if(mysqli_query($dbc,$query)){
	    		echo "Registration complete"."<br>";
	    	}
	    	// else{
	    	// 	echo "error"."<br>";
	    	// }

	    	require_once('PHPMailer_5.2.0/class.phpmailer.php');
				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
				$mail->Username = "vatsal.eliot@gmail.com";
				$mail->Password = "mkaqaumuchffjcmh";
				$mail->SetFrom("singh99sahil.gs@gmail.com");
				$mail->Subject = "Welecome to IIT PATNA Guest House Booking Portal";
				$mail->Body = "Hi ".$username.",<br><br>Welcome to the Guest House booking portal of IIT Patna. <br> You have succesfully been registered.<br> <br> Thank you"; 
				$mail->AddAddress($email);
						
				 if(!$mail->Send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				 } else {
				    echo "Message has been sent";
				 }
				 //header("location: signin.php");
	    }
	    else{
              	if($count1>=1)
              	{
                	echo "This email id is already registered"."<br>";
                }
                if($count2>=1)
                {
                	echo "This username already exists"."<br>";	
                }
                //header("location: signup.php?type=null");
        }

    }

?>
