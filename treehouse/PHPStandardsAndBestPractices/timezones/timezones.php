<?php 

$utcDateTime = new DateTime('2014-08-24 13:14', newDateTimeZone('UTC'));//new date/time object. Specified the second argument of the date time class which is an instance of date time zone. accepts a string with a name of time zone and UTC

$localDateTime = clone $utcDateTime;// clone the date to keep a copy of the original
//date time is a mutable class - means the object will change state when we run methods like set time zone 

$localDateTime->setTimeZone(new DateTimeZone('America/New York'));// now use the set time zone method on the new copy of the UTC date/time instance. Will update the local date/time object to have a new time zone and therefore a new time

?>
<!--outputting 2 <p> with date and time for UTC and one for America/New York-->
<p>The UTC date/time is: <?php $utcDateTimeZone->format("Y-m-d H:i:s"); ?></p>
<p>The New York date/time is: <?php $localDateTimeZone->format("Y-m-d H:i:s"); ?></p>


