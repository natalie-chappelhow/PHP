<?php
	require_once 'functions.php';

	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	//processing code - only if the form has been submitted
	if(isset($_POST['submit'])){

		//combining form values together to use for building a date time object
		$fromMonth = $_POST ['fromMonth']; //grab the values - string
		$fromDay = $_POST ['fromDay']; //grab the values - string
		$fromYear = $_POST ['fromYear']; //grab the values - string
		$fromMinute = $_POST ['fromMinute']; //grab the values - string
		$fromHour = $_POST ['fromHour']; //grab the values - string

		$fromTime = $fromYear . "/" . $fromMonth . "/" . $fromDay . " "; 
		$fromTime .= $fromHour . ":" . $fromMinute; //grab the values - string
		$fromTimeZone = $_POST ['fromTimeZone']; //grab the values - string
		$toTimeZone = $_POST ['toTimeZone']; //grab the values - string

		$timezoneIdentifier = timezone_identifiers_list();
		//check to see if the values are in the array
		if(in_array($fromTimeZone, $timezoneIdentifier) && in_array($toTimeZone, $timezoneIdentifier)){
			//create new objects from the values
			$fromTimeZoneObject = new DateTimeZone($fromTimeZone);
			$toTimeZoneObject = new DateTimeZone($toTimeZone);

			//create new date time object
			$convertedTime = new DateTime($fromTime, $fromTimeZoneObject);
			$convertedTime->setTimezone($toTimeZoneObject);
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Timezone Calculator</title>
</head>
<body>
	<!--<h1>Timezone Calculator</h1>-->

	
	<div class="container">
		<div class="form">
			<form action ="" method="post">
				<dl>
					<dt>From Time:</dt>
					<dd>
						<!--<input type="text" name="fromTime" value="<?php //echo $fromTime; ?>"/> -->
						<select class = "timezone" name = "fromMonth">
							<?php echo monthSelectOptions($fromMonth); ?> <!--By passing in the variable values to the echoing of the function, it keeps the submitted values in the form-->
						</select>
						<select class = "timezone" name = "fromDay">
							<?php echo daySelectOptions($fromDay); ?>
						</select>
						<select class = "timezone" name ="fromYear">
							<?php echo yearSelectOptions($fromYear); ?>
						</select>
						<select class="timezone" name ="fromHour">
							<?php echo hourSelectOptions($fromHour); ?>
						</select>
						<select class= "timezone" name ="fromMinute">
							<?php echo minuteSelectOptions($fromMinute); ?>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>From Time Zone:</dt>
					<dd>
						<select name ="fromTimeZone"/>
							<?php echo timezoneSelectOptions($fromTimeZone); ?>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>To Time Zone:</dt>
					<dd>
						<select name ="toTimeZone"/>
							<?php echo timezoneSelectOptions($toTimeZone); ?>
						</select>
					</dd>
				</dl>
				<!--Only do this HTML output if it is set-->
				<?php if(isset($convertedTime)) {?>
					<dl>
						<dt>Converted Time:</dt>
						<dd>
							<?php echo $convertedTime->format('F j, Y \a\t g:i a');?>
						</dd>
					</dl>
				<?php } //if(isset($convertedTime)) ?>

				<br />
				<div class="controls">
					<input type="submit" name="submit" value="Submit"/>
				</div>
      		</form>
		</div>
	</div>



</body>
</html>