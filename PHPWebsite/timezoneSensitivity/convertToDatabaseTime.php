<?php

//convert to database time

$utcTimezone = new DateTimeZone('UTC');//create oject of the utc timezone
$userTimezone = new DateTimeZone('Asia/Tokyo');//create object of the user's timezone
$format = 'Y-d-m H:i:s';//format that the database is wanting it stored as

$userTime = '2018-13-07 13:16:33';
$dateTime = new DateTime($userTime, $userTimezone);// new dateTime object using the user's timezone and their date and times
$dateTime->setTimezone($utcTimezone);//change the user's date time to utc date time
$databaseTime = $dateTime->format($format);//format the date time to how the database wants it

?>