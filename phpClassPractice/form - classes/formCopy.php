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
<body>
	<div class="container">
		<div class="form">
			<form name="contactForm" id="contactForm" action="classPractice2.php" method = "post">
				<h2>Form</h2>
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" placeholder="Your Name...">

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" placeholder="Your Email...">

				<label for="tel">Telephone:</label>
				<input type="text" id="tel" name="tel" placeholder="Your Telephone...">

				<label for="subject">Subject:</label>
				<input type="text" id="subject" name="subject" placeholder="Subject...">

				<label for="message">Message:</label>
				<textarea id="message" name="message" placeholder="Write message..."></textarea>
				<?php if(isset($showTheButton)): ?>
				<input type="submit" value="Submit">
				<?php endif; ?>
			</form>


		</div>
	</div>
	




</body>
</html>