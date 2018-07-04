<?php

	function detectUppercase($string){
		/*if(strtolower($string) != $string){ //if the string changed then it must have been uppercase. If it is not equal to the original string
			return true;//then it changed - true if lowercasing changes string
		} else {
			return false;
		}
		*/

		return strtolower($string) != $string; //works in the same way as the if statement above
	}

	function detectLowercase($string){
		/*if(strtoupper($string) != $string){ //if the string changed then it must have been lowercase. If it is not equal to the original string
			return true;//then it changed - true if uppercasing changes string
		} else {
			return false;
		}
		*/

		return strtoupper($string) != $string; //works in the same way as the if statement above
	}



	//preg_match($pattern, $string);//perform regular expression match
	//preg_match_all($pattern, $string)//same as preg_match but it keeps looking for it continuously
	function countNumbers($string){
		return preg_match_all('/[0-9]/', $string);
	}


	//regular expression \W is any non letter
	//Listing the symbols is better practice
	function countSymbols($string){
		$regex = '/[' . preg_quote('£$%^&*~#@?+-_') . ']/';//escape regex symbols to get their literal meaning rather than their meaning in regex
		return preg_match_all($regex, $string);
	}

	

	function passwordStrength($password){
		$strength = 0;
		$possiblePoints = 12;
		$length = strlen($password);//finding the length of the password

		if(detectUppercase($password)){//if the string changed then...
			$strength +=1;//...add one to the strength of the password
		}

		if(detectLowercase($password)){//if the string changed then...
			$strength +=1;//...add one to the strength of the password
		}

 
 		$strength += min(countNumbers($password), 2);//Don't add more than 2

		$strength += min(countSymbols($password), 2);//Don't add more than 2

		if($length >= 8) {//if the length of the password is greater than or equal to 8
		    $strength += 2; //add 2 points
		    $strength += min(($length -8) * 0.5, 4);//adding more points when there are more than 8 characters in the password. 4 - maximum points they get for passwords for 16 and over character passwords
  		}

		$strengthPercent = $strength / (float) $possiblePoints;//(float) ensuring that the result of the calculation returns as a float number 
		$rating = floor($strengthPercent * 10);//floor - round the calculation down

		return $rating;
	}

	$password = $_POST['rate'];
	$rating = passwordStrength($password);


	
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>PHP Practice - Creating a Password Strength Metre</title>
</head>
<body>
	<h1>PHP Password Strength Meter</h1>

	<p>Your password rating is : <?php echo $rating;?></p>

	
	<div id="meter">
      <?php
      //creating 10 boxes that change colour depending upon the rating
      for($i=0; $i < 10; $i++) {
        echo "<div";
        if($rating > $i) {
          echo " class=\"rating-{$rating}\"";
        }
        echo "></div>";
      }
      ?>
    </div>
    
    <br style="clear: both;" />
		<div class="form">
			<form name="passwordMeter" id="passwordMeter" action = "" method = "post">
				<p>Rate the strength of your password</p>
				<label for="rate">Password:</label>
				<input type="text" id="rate" name="rate" value="" /> 


				<input type="submit" value="Submit">

			</form>

	<h1>JavaScript Password Strength Meter</h1>		

		</div>
</body>
</html>


