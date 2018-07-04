<?php
	/*can also use PHP range() - will output every character between the range given as an array
	
	$lowerCase = implode(range("a", "z")); //implode is used to convert to a string - convert the range array to a string
	$upperCase = implode(range("A", "Z"));
	$numbers = implode(range(0, 9));

	$chars = $lowerCase . $upperCase . $numbers . $symbols;

	echo $chars; 
	*/

	/*
	select a random character from the character set - can use
	rand() - takes two arguments, low value and high value - returns a random integer between the range, including the low and high values
	mt_rand() - replacement for rand - faster and more random than rand - works in the same way as rand, just has mt_ at the front
	random_int() - considered cryptographically secure. New function in PHP7 (not available in older version of PHP)
	*/

	//echo $chars[22];//echoing the 22nd character from the $chars

	
	//returning a random character
	//function - pass in a string, gets a random character from the string, then returns it
	function randomCharacters ($string){
		$i = mt_rand(0, strlen($string)-1);//strlen to find the length of the string. -1 as the array produced from using rand starts at 1
		return $string[$i];
	}



	function randomString($length, $characterSet){
		//$length = 8; //setting the number of characters wanted for the password
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

	
	//echo randomCharacters($character);


	function generatePassword($length){
		//creating character set
		$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
		$upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numbers = '0123456789';
		$symbols = '£$%^&*~#@?';


		//if these are false, they will not be used in the srting
		$useLowerCase = isset($_GET['lowerCase']) ? $_GET['lowerCase'] : "0"; //? is a ternary/conditional operator - operator that takes 3 arguments.  Checking to see if it is set. If it is set then use the value of lowerCase, if not use 0
		$useUpperCase = isset($_GET['upperCase']) ? $_GET['upperCase'] : "0";
		$useNumbers = isset($_GET['numbers']) ? $_GET['numbers'] : "0";
		$useSymbols = isset($_GET['symbols']) ? $_GET['symbols'] : "0";

		$character = '';


		if($useLowerCase == '1'){//if $useLower is "1" (i.e checked) it will concatenate $lowerCase onto $character
			$character .= $lowerCase; 
		}

		if($useUpperCase == '1'){
			$character .= $upperCase;  
		}

		if($useNumbers == '1'){
			$character .= $numbers; 
		}

		if($useSymbols == '1'){
			$character .= $symbols; 
		}

		//$character = $lowerCase . $upperCase . $numbers . $symbols;

		//echo $character;

		return randomString($length, $character);

	}

	$password = generatePassword($_GET['length']);


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Password Generator</title>
</head>
<body>
	<h1>Password Generator</h1>

	
	<div class="container">
		<div class="form">
			<form name="passwordForm" id="passwordForm" action = "" method = "get">
				<p>Generate a password using the below form</p>
				<h2>Form</h2>
				<label for="length">Length:</label>
				<input type="text" id="length" name="length" value="<?php if(isset($_GET["length"])){echo $_GET["length"];}?>" /> <!--displays the last entered length value in the length field-->
				
				<label for="lowerCase">lowerCase:</label>
				<input name="lowerCase" value="0" type="hidden">
				<input type="checkbox" id="lowerCase" name="lowerCase" value="1" <?php if($_GET["lowerCase"] == 1){echo "checked";}?> /> <!--value = "1" if checked - the box stays checked when submitted-->

				<label for="upperCase">upperCase:</label>
				<input name="upperCase" value="0" type="hidden">
				<input type="checkbox" id="upperCase" name="upperCase" value="1" <?php if($_GET["upperCase"] == 1){echo "checked";}?> />

				<label for="numbers">numbers:</label>
				<input name="numbers" value="0" type="hidden">
				<input type="checkbox" id="numbers" name="numbers" value="1" <?php if($_GET["numbers"] == 1){echo "checked";}?> />

				<label for="symbols">symbols:</label>
				<input name="symbols" value="0" type="hidden"> <!--unchecked checkboxes don't send data to the server. A hack is to use a hidden input field (has the same name as the checkbox) with a value of 0. This value of 0 is sent to the server -->
				<input type="checkbox" id="symbols" name="symbols" value="1" <?php if($_GET["symbols"] == 1){echo "checked";}?> />

				<input type="submit" value="Submit">

			</form>

			<p>Generated Password : <?php echo $password;?></p>

		</div>
	</div>
</body>
</html>



