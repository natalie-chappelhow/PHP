<?php


session_start();
$_SESSION['userTimezoneIdentifier'] = ['Asia/Tokyo'];

function getUserTimezone(){
	if(isset($_SESSION['userTimezoneIdentifier'])){
		$userTimezoneIdentifier = $_SESSION['userTimezoneIdentifier'];
		$userTimezone = new DateTimeZone($userTimezoneIdentifier);
	}
	return $userTimezone;
}

$userTimezone = getUserTimezone();

$format = 'F j, g:i a T';//format of the date and time - how it is to look on the webpage
$utcTimezone = new DateTimeZone('UTC');//new dateTimeZone object for UTC timezone

$utcStart = 'Dec 20 11:00pm';//start time
$dateTimeStart = new DateTime($utcStart, $utcTimezone);//create new DateTime objet using the string stored in $utcStart and the timezone utc
$dateTimeStart->setTimezone($userTimezone);//switch the timezone
$startTime = $dateTimeStart->format($format);

$utcEnd = 'Dec 20 11:00pm';//end time
$dateTimeEnd = new DateTime($utcEnd, $utcTimezone);
$dateTimeEnd->setTimezone($userTimezone);
$endTime = $dateTimeEnd->format($format);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Notice of Upcoming Maintenance Window</title>
</head>
<body>
	<h1>Notice of Upcoming Maintenance Window</h1>


	<div class="container">
		<div id ="time">
			This website will be offline for routine maintenance from
			<span class ="time">
				<?php
				echo $startTime;
				?>
				to <span class ="time">
				<?php
				echo $endTime;
				?>
			</span>
		</div>
	</div>



</body>
</html>