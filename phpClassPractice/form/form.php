<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="validation.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Form</title>
</head>
<?php $showTheButton = true; ?>


<?php

	$nameError = $emailError = $telError = $subjectError = $messageError = ""; // = is used to give the same value to multiple variables. 
	$name = $email = $tel = $subject = $message = "";
	
?>



<body>
	<div class="container">
		<div class="form">
			<form name="contactForm" id="contactForm" action = "getResponse.php" method = "post">
				<h2>Form</h2>
				<p><span class = "error"> * required field</span></p>
				<label for="name">Name:</label>
				<span class = "error"> * <?php echo $nameError;?> </span>
				<input type="text" id="name" name="name" placeholder="Your Name...">
				
				<label for="email">Email:</label>
				<span class = "error"> * <?php echo $emailError;?> </span>
				<input type="email" id="email" name="email" placeholder="Your Email...">

				<label for="tel">Telephone:</label>
				<span class = "error"> <?php echo $telError;?> </span>
				<input type="text" id="tel" name="tel" placeholder="Your Telephone...">

				<label for="subject">Subject:</label>
				<span class = "error"> <?php echo $subjectError;?> </span>
				<input type="text" id="subject" name="subject" placeholder="Subject...">

				<label for="message">Message:</label>
				<span class = "error"> * <?php echo $messageError;?> </span>
				<textarea id="message" name="message" placeholder="Write message..."></textarea>
				<?php if(isset($showTheButton)): ?>
				<input type="submit" value="Submit">
				<?php endif; ?>
			</form>
		</div>
	</div>
	

</body>
</html>