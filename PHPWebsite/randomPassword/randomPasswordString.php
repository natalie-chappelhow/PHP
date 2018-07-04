<?php
	//returning a random character
	//function - pass in a string, gets a random character from the string, then returns it
	function randomCharacters ($string){
		$i = mt_rand(0, strlen($string)-1);//strlen to find the length of the string. -1 as the array produced from using rand starts at 1
		return $string[$i];
	}


	//build a string of randomised characters
	function randomString($length, $characterSet){
		//$length = 8; //setting the number of characters wanted for the password
		$output = '';
			for($i = 0; $i < $length; $i++){ //if $i < 8 the loop will continue (or the length of character set)
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
		//create a character set - the set of characters allowed in the password - uppercase, lowercase, numbers, symbols
		$lowerCase = 'abcdefghijklmnopqrstuvwxyz';
		$upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$numbers = '0123456789';
		$symbols = '£$%^&*~#@?';
		
		//if these are false, they will not be used in the srting
		$useLowerCase = true;
		$useUpperCase = true;
		$useNumbers = false;
		$useSymbols = true;


		$character = '';
		if($useLowerCase === true){//if $useLower is true it will concatenate $lowerCase onto $character
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

	echo generatePassword(5);
?>