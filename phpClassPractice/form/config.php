<?php
	//setting variables to contain information about database
	$host = "localhost"; 
	$username = "root";
	$password = "";
	$databaseName = "contactform";

	//creates connection with database - uses variables created above
	$connection = mysqli_connect($host, $username, $password, $databaseName);


	//check connection with database
	if ($connection->connect_error){ //if there is a connection error
		die("Connection Failed:" . $connection->connect_error);//prints a message and stops running/exits the script. The same as using exit() 
	} 
?>