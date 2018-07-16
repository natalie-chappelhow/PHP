<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Timezone Sensitivity</title>
</head>
<body>
	<!--<h1>Timezone Conversion</h1>-->

	
	<div class="container">
		<div class="form">
			<div id="current-time">
        		Current Time: <span class="time"></span>
        		<?php
        		$dateTime = new DateTime('now'); 
        		echo $dateTime->format("F j, g:i a T");
        		?>
      		</div>
		</div>
	</div>



</body>
</html>



