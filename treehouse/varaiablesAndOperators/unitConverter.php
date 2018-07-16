<?php
	//lbs to kg - number in pounds we want to convert into kilograms
	$pounds = 140;
	//floating point value for the pound to kilogram conversion
	$lbsToKg = 0.453592;
	//use the variable above to calculate pounds multiplied by the kilogram conversion
	$kilograms = $pounds * $lbsToKg;
	//display pounds to kilograms
	echo "Weight: " . $pounds . "lbs" . " = " .  $kilograms . "kgs";

	
	



	//m to km - number in miles we want to convert into kilometres
	$miles = 2.5;
	//floating point value for the mile to kilometre conversion
	$mToKm = 1.60934;
	//use the variable above to calculate miles multiplied by the kilometres conversion
	$kilometres = $miles * $mToKm;
	//display miles to kilometres
	echo "\n Distance: " . $miles . "miles" . " " . $kilometres . " km";

	//f to c
	$fahrenheit = 20;
	$celsius = ($fahrenheit - 32) * 5 / 9;
	echo "\n Temperature " . $fahrenheit .  " degrees f " . $celsius . " c";


?>