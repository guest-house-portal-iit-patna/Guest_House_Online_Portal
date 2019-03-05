<?php
session_start();

$username = "";
$email="";
$errors = array();
//connect to database

$db= mysqli_connect('localhost','root','','registration');

//if the register button is clicked

if(isset($_POST['register']))
 {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //checks if form fields are filled
    if(empty($username))
    {
      array_push($errors, "Username is required.");
    }
    if(empty($email))
    {
      array_push($errors, "Email is required.");
    }
    if(empty($password_1))
    {
      array_push($errors, "Password is required.");
    }
    if($password_1!=$password_2)
    {
      array_push($errors,"The two passwords do not match.");
    }

    //if no errors are found, registration will be complete.
    if(count($errors)==0)
    {
      $password = md5($password_1);
      //password is encrypted before storing in the database.
      $query1 = "SELECT * FROM users WHERE email = '$email'";
  		$query2 = "SELECT * FROM users WHERE username = '$username'";
  	    $result1 = mysqli_query($db,$query1);
  	    $result2 =  mysqli_query($db,$query2);
  	    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
  	    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
  	    $count1 = mysqli_num_rows($result1);
  	    $count2 = mysqli_num_rows($result2);

      if($count1+$count2==0)
        {
          $sql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
          if(mysqli_query($db,$sql))
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
            $mail->Username = "vatsal.eliot@gmail.com";
            $mail->Password = "mkaqaumuchffjcmh";
            $mail->SetFrom("singh99sahil.gs@gmail.com");
            $mail->Subject = "Welcome to IIT PATNA Guest House Booking Portal";
            $mail->Body = "Hi ".$username.",<br><br>Welcome to the Guest House booking portal of IIT Patna. <br> You have succesfully been registered.<br> <br> Thank you";
            $mail->AddAddress($email);

             if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
             }

            header('location: homepage.php');
        }
      }
      else{
              	if($count1>=1)
              	{
                array_push($errors, "The email id is already registered.");;
                }
                if($count2>=1)
                {
                array_push($errors, "The username already exists.");
                }
                //header("location: signup.php?type=null");
        }
    }
  }

//logging in (from loginpage)
if(isset($_POST['login']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  //ensure fields are entered.
  if(empty($username))
  {
    array_push($errors, "Username is required.");
  }
  if(empty($password))
  {
    array_push($errors, "Password is required.");
  }
  if(count($errors)==0)
  {
    $password= md5($password); // encrypting password for security.
    $query= "SELECT * FROM users WHERE username= '$username' AND password='$password' ";
    $result = mysqli_query($db,$query);

    $query1 = "SELECT password FROM users WHERE username = '$username'";
    $query2 = "SELECT username FROM users WHERE password = '$password'";
      $result1 = mysqli_query($db,$query1);
      $result2 =  mysqli_query($db,$query2);
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count1 = mysqli_num_rows($result1);
      $count2 = mysqli_num_rows($result2);

    if(mysqli_num_rows($result)==1)
    {
      //log user in
      $_SESSION['username']=$username;
      $_SESSION['success'] = "You are now logged in.";
      header('location: homepage.php');
    }
    else
    {
      array_push($errors, "The username/password combination is incorrect.");
      if($count1==0)
      {
        array_push($errors," The Username does not exist.");
      }
      else if ($count1==1)
      {
        array_push($errors, "Incorrect password.");
      }

    }
  }
}


  //Logout
  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
  }

    ?>
