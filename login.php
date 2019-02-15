<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];


	$hostname = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname = "innovation";

    $dbc = mysqli_connect($hostname, $username1, $password1, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());


    mysqli_set_charset($dbc, "utf8");

    
		$query1 = "SELECT password FROM guest_users WHERE username = '$username'";
		$query2 = "SELECT username FROM guest_users WHERE password = '$password'";
	    $result1 = mysqli_query($dbc,$query1);
	    $result2 =  mysqli_query($dbc,$query2);
	    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
	    $count1 = mysqli_num_rows($result1);
	    $count2 = mysqli_num_rows($result2);
        
	    if($count1==1 && $row1["password"]==$password){
	    	echo "login successful";
	    }
	    else{
	    	if($count1==0){
	    		echo "username don't exist"."<br>";
	    	}
	    	else if($count1==1){
	    		echo "incorrect password"."<br>";	
	    	}
	    }
    

?>
