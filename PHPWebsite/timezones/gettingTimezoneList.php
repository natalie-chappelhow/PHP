<?php
	
	//functions in PHP to get a list of time zones
	$timezone = timezone_identifiers_list();// the time function  is an array so a loop is needed 

	foreach($timezone as $zone){
		echo $zone . "<br/ >";
	}

	//DateTimeZone::listIdentifiers();//OOP version
	
	/*
	$timezoneAbbr = timezone_name_from_abbr('GMT');//used to find a timezone - this function will get Greenwich Mean Time
	echo $timezoneAbbr;
	*/

	
	

?>