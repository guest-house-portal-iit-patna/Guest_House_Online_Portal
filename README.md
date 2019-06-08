# Guest_House_Online_Portal

A video tutorial is present here : https://drive.google.com/file/d/1tzhX4s-QQzaXJUNSyXD2SeUGZgNf0Gf3/view?usp=sharing

###IMPORTANT###
  Change the name of the cloned repository to 'Guest_House_Online_Portal'.

 
Setup Instructions:

## Steps to setup portal (On a local server):
1. Download and setup the latest stable release of XAMPP/LAMPP/MAMPP/WAMPP from [here](https://www.apachefriends.org/download.html) depending on your OS.

2. Clone the repository into the htdocs folder of your server.

3. Edit the connectVars.php file in the main directory. This file contains connection constants for the SQL database.
Contents of the file should be as follows.
  <!--
  <?php
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASSWORD', '');
    define('DB_NAME', '');
  ?>
 -->

4. Change the admin details in guesthouse.sql. As of now default admin is created with username and password both set as 'admin'. Setup your database by either importing the guesthouse.sql file using phpMyAdmin or manually copy and paste the code in the SQL terminal.

5. Edit rooms.sql, this file contains the basic information of the rooms in the guesthouse.

6. Import rooms.sql in 'rooms' table using phpMyAdmin or manually copy and paste the code in the SQL terminal.


## Setup the connection variables(in connectVars.php):
- DB_HOST - Url of the SQL database server
- DB_USER - Username
- DB_PASSWORD - Password
- DB_NAME - Name of the database

## Steps to start:
- Start your XAMPP server.
- Go to http://localhost/Guest_House_Online_Portal/ on your browser to open the portal.
