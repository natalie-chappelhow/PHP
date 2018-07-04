<?php

	$currentYear = date('Y');//current date as a year

	//$year = $currentYear - 100;

	/* while($year <= $currentYear){
		echo $year . "<br />\n";
		$year++;
	} */


	/* do{
		echo $year . "<br />\n";
	} while ($year++ <= $currentYear); */


	$firstArray = array('conditionals', 'arrays', 'loops', 'forms', 'functions');

	/* while (list($key, $value) = each($firstArray)){
		echo "key => $value \n";
	} */
	

	//FOR LOOP
	for ($year = $currentYear - 100; $year <= $currentYear; $year++){
		echo $year . "<br />\n";
	}

	for ($i = 0; $i < count($firstArray); $i++){
		echo $firstArray[$i] . "<br />\n" ;
	}
?>; 