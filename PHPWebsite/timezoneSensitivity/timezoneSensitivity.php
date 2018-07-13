<?php

//display the current time
//shows the timezone the user last chose


//retrieve stored time zone identifier string - session variable
session_start();
$_SESSION['userTimezoneIdentifier'] = ['Europe/London'];

//create a DateTimeZone object using identifier string. Using a function to hold the object so it can be called many times if needed
function getUserTimezone(){
	if(isset($_SESSION['userTimezoneIdentifier'])){
		$userTimezoneIdentifier = $_SESSION['userTimezoneIdentifier'];
		$userTimezone = new DateTimeZone($userTimezoneIdentifier);
	}
	return $userTimezone;
}

$userTimezone = getUserTimezone();

//set DateTime object using DateTimeZone object


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Timezone Sensitivity</title>
</head>
<body>
	<h1>Timezone Sensitivity</h1>


	<div class="container">
		<div id ="time">
			Current Time:
			<span class ="time">
				<?php
				$dateTime = new DateTime('now', $userTimezone);
				echo $dateTime->format('F j g:i a T');
				?>
			</span>
		</div>
	</div>



</body>
</html>