<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guest House Booking Form</title>
  <link rel="stylesheet"   href="css/bookingform.css">
</head>
<body>
 <div id="root">
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
          <input name="employee_id" placeholder="Employee ID" type="text" tabindex="16" required autofocus>
        </fieldset>
        <fieldset>
          <input name="indentorname" placeholder="Indentor Name" type="text" tabindex="17" required>
        </fieldset>
        <fieldset>
          <input name="designation" placeholder="Designation" type="text" tabindex="18" required>
        </fieldset>
        <fieldset>
          <input name="department" placeholder="Department" type="text" tabindex="19" required>
        </fieldset>
        <fieldset>
          <input name="phone" placeholder="Phone number" type="tel" tabindex="20" required>
        </fieldset>
        <fieldset>
          <input name="email" placeholder="Email ID" type="email" tabindex="21" required>
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
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="hamster">Hamster</option>
          <option value="parrot">Parrot</option>
          <option value="spider">Spider</option>
          </select>
          </fieldset>
          <fieldset>
            <input name="number_rooms" placeholder="Number of rooms" type="number" tabindex="7" required>
          </fieldset>
          Accomodation Type: <br>
          <fieldset>
          <select name="accomodation" id="accomodation">
          <option value="">Please choose an option</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="hamster">Hamster</option>
          <option value="parrot">Parrot</option>
          <option value="spider">Spider</option>
          <option value="goldfish">Goldfish</option>
          </select>
          </fieldset>
          <fieldset>
            Date & Time of arrival : <br>
            <input name="arrival" placeholder="Date & Time of Arrival: " type="datetime-local" tabindex="8" required>
          </fieldset>
          <fieldset>
            Date & Time of departure : <br>
            <input name="departure" placeholder="Date & Time of Departure: " type="datetime-local" tabindex="9" required>
          </fieldset>
          <fieldset>
          Purpose of visit: <br>
          <select name="purpose" id="purpose">
          <option value="">Please choose an option</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="hamster">Hamster</option>
          <option value="parrot">Parrot</option>
          <option value="spider">Spider</option>
          <option value="goldfish">Goldfish</option>
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
