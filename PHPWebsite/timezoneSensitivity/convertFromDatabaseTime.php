<?php

//convert from database time

$utcTimezone = new DateTimeZone('UTC');//create oject of the utc timezone
$userTimezone = new DateTimeZone('Asia/Tokyo');//create object of the user's timezone
$format = 'Y-d-m H:i:s';//format that the database is wanting it stored as

$databaseTime = '2018-13-07 13:22:41';
$dateTime = new DateTime($databaseTime, $utcTimezone);// new dateTime object using the database time
$dateTime->setTimezone($userTimezone);//change the database date time to utc date time
$userTime = $dateTime->format($format);//format the date time to how the database wants it

?>