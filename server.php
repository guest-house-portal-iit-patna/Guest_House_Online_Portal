<?php
session_start();

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

$username = "";
$email="";
$designation = "";
$phone = "";
$employeeid = "";
$name = "";
$errors = array();
//connect to database
require_once('connectVars.php');

$db= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
//if the register button is clicked

if(isset($_POST['register']))
 {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $employeeid= $_POST['employeeid'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //checks if form fields are filled
    if(empty($username))
    {
      array_push($errors, "Username is required.");
    }
    if(empty($name))
    {
      array_push($errors, "Name is required.");
    }
    if(empty($email))
    {
      array_push($errors, "Email is required.");
    }
    if(empty($designation))
    {
      array_push($errors, "Designation is required.");
    }
    if(empty($employeeid))
    {
      array_push($errors, "Employee id is required.");
    }
    if(empty($phone))
    {
      array_push($errors, "Phone No. is required.");
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
          $sql = "INSERT INTO users (username,name,email,designation,employeeid,phone,department,password) VALUES ('$username','$name','$email','$designation','$employeeid','$phone','$department','$password')";
          if(mysqli_query($db,$sql))
          {
            // Sending mail and then redirecting to homepage
            $_SESSION['username']=$username;
            $_SESSION['success'] = "You are now logged in.";

            // Load Composer's autoloader
            require 'phpmailer/vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);


                $mail->SMTPDebug = 1;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'theoriginalmk7@gmail.com';                     // SMTP username
                $mail->Password   = 'uqmftsMfU9ustcw';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('theoriginalmk7@gmail.com', 'Guesthouse IIT Patna');
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
                $mail->Subject = 'Welcome to IIT PATNA Guest House Booking Portal';
                $mail->Body    = "Hi ".$username.",<br><br>Welcome to the Guest House booking portal of IIT Patna.
                 <br> You have succesfully been registered.<br> <br> Thank you";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



            if ($mail->send()){
                echo 'Email has been sent';
            }
            else
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";


            //Heading to HOMEPAGE
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


//logging in (from admin)
if(isset($_POST['adminlogin']))
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
// encrypting password for security.
    $query= "SELECT * FROM admin WHERE username= '$username' AND password='$password' ";
    $result = mysqli_query($db,$query);

    $query1 = "SELECT password FROM admin WHERE username = '$username'";
    $query2 = "SELECT username FROM admin WHERE password = '$password'";
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
      $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/Guest_House_Online_Portal/admin/adminhome.php';
      header('Location: ' . $home_url);
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
    header('location: index.php');
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/Guest_House_Online_Portal/index.php';
    header('Location: ' . $home_url);
  }

    ?>
