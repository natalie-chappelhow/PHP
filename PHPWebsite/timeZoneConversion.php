<?php

	//store the timezone selection
	session_start(); //used to start the session. This function must be the very first thing in the document
	//session is a way to store information (in variables) to be used across multiple pages. Unlike a cookie, the information is not stored on the users computer
	
	


	//Unix Time - number of seconds since Jan 1, 1970, midnight UTC - Unix time is in UTC
	//PHP uses Unix time internally - referred to as a 'time stamp'

	//echo time();//used to get current unix time

	/*
	Procedural Functions
	strtotime($date_string);//parse string into timestamp
	mktime($h, $m, $s, $mo, $d, $y);//build timestamp
	date($format, $timestamp);//format timestamp for output
	strftime($format, $timestamp)//format timestamp for output
	checkdate($month, $day, $year);//validate a date
	*/

	//OOP
	//DateTime::getTimezone(); ~ same as date_timezone_get() (latter is Procedural)


	$timezoneList = timezone_identifiers_list(); //Procedural
	//$timezoneList = DateTimeZone::listIdentifiers(); //OOP

	//Formatting the offset so that the values have more meaning to the user
	function formatHoursMinutes($float){
		$hours = floor($float);
		$minutes = ($float - $hours) * 60; //to get the number of minutes
		return sprintf("%+02d:%02d", $hours, $minutes); //sprintf - gives the ability to control the formatting through a series of codes - writes a formatted string to a variable
		//$hours goes into %+02d (1st argument) - makes sure it has 2 digits. It is going to put a - or a + in front of the $hours value 
		//$minutes goes into %02d (2nd argument) - makes sure it has 2 digits. 
	}


	//session variables are set with the PHP global variable - $_SESSION
	$userTimezoneIdentifier = NULL;//want it set to NULL by default

	if ($_POST["submit"]){ //if the form has been submitted
		//save the timezone choice
		$timezoneSelection = $_POST['timezoneSelection'];
		//only accept the value if it is in the list
		if(in_array($timezoneSelection, $timezoneList)){//using in_array to see if the value is in the array that stores the list of all the timezones
			$_SESSION["userTimezoneIdentifier"] = $timezoneSelection;
			$userTimezoneIdentifier = $timezoneSelection;
		}	  
	} else{
		//check for previous timezone settings e.g what value had already been set
		if(isset($_SESSION["userTimezoneIdentifier"])){
			$userTimezoneIdentifier = $_SESSION["userTimezoneIdentifier"];
		}
	}

	
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Timezone Conversion</title>
</head>
<body>
	<!--<h1>Timezone Conversion</h1>-->

	
	<div class="container">
		<div class="form">
		<form name="timezoneConversion" id="timezoneConversion" action = "" method = "post">
				<h2>Form</h2>
				<label for="length">Preferred Timezone:</label>
				<select name ="timezoneSelection"> 
					<!--<option value = "Europe/London"> Europe/London </option>-->
					
					<?php
					$dateTime = new DateTime('now');//creating a DateTime object. Uses the default time of the system - 'now'  
					foreach($timezoneList as $zone){
						//include time zone offset. Shows the user the difference between the timezone selected and UTC
						$this_timezone = new DateTimeZone($zone);
						$dateTime->setTimezone($this_timezone);
						//divide by 3600 to get offset in hours
						//$offset = $dateTime->getOffset() / 3600;
						$offset = formatHoursMinutes($dateTime->getOffset() / 3600);
						//creating a dropdown that shows the user a list of all the timezone options. User selects and option then presses submit
						

						//another way to format the offset - jsut this line is needed
						//$offset = $dateTime->format('P');

						echo "<option value =\"{$zone}\"";
						//see if an option has been selected or not
						if($userTimezoneIdentifier == $zone){
							echo " selected";
						}
						echo ">";
						echo $zone . " (UTC/GMT {$offset})"; 
						echo "</option>";
					}
					?>
				</select> 



				<input type="submit" name ="submit" id="submit" value="Submit">

			</form>
		</div>
	</div>



</body>
</html>