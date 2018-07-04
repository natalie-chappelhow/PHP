<?php
	
	//Unix Time - number of seconds since Jan 1, 1970, midnight UTC - Unix time is in UTC
	//PHP uses Unix time internally - referred to as a 'time stamp'

	//echo time();//used to get current unix time

	/*
	Procedural Functions
	strtotime($date_string);//parse string into timestamp
	mktime($h, $m, $s, $mo, $d, $y);//build timestamp
	date($format, $timestamp);//format timestamp for output
	strftime($format, $timestamp)//format timestamp for output
	checkdate($month, $day, $year);//validate a date
	*/

	//OOP
	//DateTime::getTimezone(); ~ same as date_timezone_get() (latter is Procedural)



?>