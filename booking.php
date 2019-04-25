  <?php include('server.php');
    include('templates/navbar.php');
    if(empty($_SESSION['username'])) {
        header('location: login.php');
      }

    $dbc=mysqli_connect('localhost','root','','guesthouse');
    if (!$dbc) {
     die("Connection failed: " . mysqli_connect_error());
    }
    $username=$_SESSION['username'];
    $query= "SELECT * FROM users WHERE username= '$username'";
    $data = mysqli_query($db,$query);
    $result=mysqli_fetch_array($data);
    $name=$result['name'];
    $designation=$result['designation'];
    $employeeid=$result['employeeid'];
    $department=$result['department'];
    $phone=$result['phone'];
    $email=$result['email'];
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guest House Booking Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet"   href="css/bookingform.css">
</head>
<body>
 <div id="root" style="margin-bottom:200px; margin-top:-50px;">
  <script src="main.js" type="text/javascript"></script>
  <div class="container">
    <form id="contact" action="bookingform.php" method="post">
    <div class="first-container">
      <div id="guestname">
       <h3>GUEST INFORMATION</h3>
       <fieldset>
         <input name="guest_name" placeholder="Guest/Visitor Name" type="text" tabindex="1" required autofocus>
       </fieldset>
       <fieldset>
         <input name="phone_number" placeholder="Phone Number " type="tel" tabindex="2" required>
       </fieldset>
        </div>
      <div id="address">
       <h3>GUEST ADDRESS</h3>
       <fieldset>
         <input name="appartment" placeholder="Flat/appartment/street number" type="text" tabindex="1" required autofocus>
       </fieldset>
       <fieldset>
         <input name="city" placeholder="City" type="text" tabindex="3" required>
       </fieldset>
       <fieldset>
         <input name="state" placeholder="State" type="text" tabindex="4" required>
       </fieldset>
       <fieldset>
         <input name="pin" placeholder="Pin" type="text" tabindex="5" required></>
       </fieldset>
      </div>
      <div id="indentorinfo">
        <h3>INDENTOR INFORMATION</h3>
        <fieldset>
          <input name="employee_id" placeholder="Employee ID" type="text" tabindex="16" required autofocus value="<?php if(isset($employeeid)) {echo $employeeid;} ?> ">
        </fieldset>
        <fieldset>
          <input name="indentorname" placeholder="Indentor Name" type="text" tabindex="17" required value="<?php if(isset($name)){ echo $name;} ?>">
        </fieldset>
        <fieldset>
          <input name="designation" placeholder="Designation" type="text" tabindex="18" required value="<?php if(isset($designation)){ echo $designation;} ?>">
        </fieldset>
        <fieldset>
          <input name="department" placeholder="Department" type="text" tabindex="19" required value="<?php {if(isset($department)) echo $department;} ?>">
        </fieldset>
        <fieldset>
          <input name="phone" placeholder="Phone number" type="tel" tabindex="20" required value="<?php {if(isset($phone)) echo $phone;} ?>">
        </fieldset>
        <fieldset>
          <input name="email" placeholder="Email ID" type="email" tabindex="21" required  value="<?php if(isset($email)) {echo $email;} ?>">
        </fieldset>
        </div>
    </div>
    <div class="second-container">
        <div id="roomrequirement">
          <h3>ROOM DETAILS</h3>
          <fieldset>
            <input name="number_people" placeholder="Number of person" type="text" tabindex="6" required autofocus>
          </fieldset>
          Payment: <br>
          <fieldset>
          <select name="payment" id="payment">
          <option value="">Please choose an option</option>
          <option value="On Arrival">On Arrival</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Debit Card">Debit Card</option>
          <option value="Beared by Institute.">Beared by Institute</option>
          <!-- <option value="spider"></option> -->
          </select>
          </fieldset>
          <fieldset>
            <input name="number_rooms" placeholder="1" type="number" tabindex="7" required>
          </fieldset>
          Accomodation Type: <br>
          <fieldset>
          <select name="accomodation" id="accomodation">
          <option value="">Please choose an option</option>
          <option value="Master">Master</option>
          <option value="Normal">Normal</option>
          <option value="Master & Normal">Master & Normal</option>
          <!-- <option value="parrot">Parrot</option>
          <option value="spider">Spider</option>
          <option value="goldfish">Goldfish</option> -->
          </select>
          </fieldset>
          <fieldset>
            Date & Time of arrival : <br>
            <input name="arrival" placeholder="Date & Time of Arrival: " type="datetime-local" tabindex="8" required min=<?php echo date('Y-m-d');?> >
          </fieldset>
          <fieldset>
            Date & Time of departure : <br>
            <input name="departure" placeholder="Date & Time of Departure: " type="datetime-local" tabindex="9" required min=<?php echo date('Y-m-d');?> >
          </fieldset>
          <fieldset>
          Purpose of visit: <br>
          <select name="purpose" id="purpose">
          <option value="">Please choose an option</option>
          <option value="Meeting">Meeting</option>
          <option value="Guest Lecture">Guest Lecture</option>
          <option value="Workshop">Workshop</option>
          <option value="Event">Event</option>
          <!-- <option value="spider">Spider</option>
          <option value="goldfish">Goldfish</option> -->
          </select>
          </fieldset>
          <fieldset>
            Numbers of food Type: <br>
            <ul>
            <li>Veg:
              <ul style="list-style-Type: none;">
              <li><input name="veg_breakfast" type="number" name="Breakfast" tabindex="10"></li>
              <li><input name="veg_lunch" type="number" name="Lunch" tabindex="11"></li>
              <li><input name="veg_dinner" type="number" name="Dinner" tabindex="12"></li>
              </ul>
            </li>
            <br>
            <li>Non-Veg:
              <ul style="list-style-Type: none;">
              <li><input name="nonveg_breakfast" type="number" name="Breakfast" tabindex="13"></li>
              <li><input name="nonveg_lunch" type="number" name="Lunch" tabindex="14"></li>
              <li><input name="nonveg_dinner" type="number" name="Dinner" tabindex="15"></li>
              </ul>
            </ul>
          </fieldset>
          </div>
    </div>
       <fieldset>
         <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
       </fieldset>
     </form>
    </div>
  </div>
</body>
</html>
