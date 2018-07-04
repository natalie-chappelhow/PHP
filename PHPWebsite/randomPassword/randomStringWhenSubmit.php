<?php

	function randomCharacters ($string){
		$i = mt_rand(0, strlen($string)-1);
		return $string[$i];
	}



	function randomString($length, $characterSet){
		//$length = 8;
		$output = '';
			for($i = 0; $i < $length; $i++){ //if $i < 8 the loop will continue
				$output .= randomCharacters($characterSet); //everytime it goes through the loop, the random character is added to the $output string
			}
		return $output;
	}

	//echo randomString(8, $character);
	//echo randomString(3, $character);
	//echo randomString(10, $character);
	//echo randomString(5, $character);
	//echo randomString(25, $character);

	//works up to this point - created string of random characters that are 8 characters in length - contains lower case, upper case, numbers and symbols 
	//echo randomCharacters($character);





	function generatePassword($length){
		//creating character set

		$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
		$upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numbers = '0123456789';
		$symbols = '£$%^&*~#@?';

		$useLowerCase = true;
		$useUpperCase = true;
		$useNumbers = false;
		$useSymbols = true;

		$character = '';
		if($useLowerCase === true){
			$character .= $lowerCase; 
		}

		if($useUpperCase === true){
			$character .= $upperCase; 
		}

		if($useNumbers === true){
			$character .= $numbers; 
		}

		if($useSymbols === true){
			$character .= $symbols; 
		}

		//$character = $lowerCase . $upperCase . $numbers . $symbols;

		//echo $character;

		return randomString($length, $character);

	}


	$password = generatePassword(5);


?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Website</title>
</head>
<body>
	<h1>Password Generator</h1>

	
	<div class="container">
		<div class="form">
			<form name="passwordForm" id="passwordForm" action = "" method = "get">
				<p>Generate a password using the below form</p>
				<h2>Form</h2>
				<label for="length">Length:</label>
				<input type="text" id="length" name="length" value="<?php if(isset($_POST["length"])){echo $_POST["length"];} ?>"> <!--displays the last entered length value in the length field-->
				
				<label for="lowerCase">lowerCase:</label>
				<input type="checkbox" id="lowerCase" name="lowerCase" value="1" <?php if($_POST["lowerCase"] == 1){echo "checked";} ?> > <!--value = "1" if checked - the box stays checked when submitted-->

				<label for="upperCase">upperCase:</label>
				<input type="checkbox" id="upperCase" name="upperCase" value="1" <?php if($_POST["upperCase"] == 1){echo "checked";} ?> >

				<label for="numbers">numbers:</label>
				<input type="checkbox" id="numbers" name="numbers" value="1" <?php if($_POST["numbers"] == 1){echo "checked";} ?> >

				<label for="symbols">symbols:</label>
				<input type="checkbox" id="symbols" name="symbols" value="1" <?php if($_POST["symbols"] == 1){echo "checked";} ?> >

				<input type="submit" value="Submit">

			</form>

			<p>Generated Password : <?php echo $password;?></p>

		</div>
	</div>


<!--WORKS - GENERATES RANDOM STRING WHEN YOU PRESS SUBMIT-->

</body>
</html>



