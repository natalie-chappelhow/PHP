<?php
  
$tz = new DateTimeZone('America/New_York');

echo "Name: " . $tz->getName() . "<br />";

echo "Location:<br />";
$location_array = $tz->getLocation();
foreach($location_array as $key => $value) {
  echo "* {$key}: {$value} <br />";
}

echo "<hr />";

// Create DateTime using default TZ
$dt = new DateTime('March 1, 2018');

$tz = $dt->getTimezone();
echo "Default TZ: " . $tz->getName() . "<br />";
echo "Offset: " . $dt->getOffset() . "<br />";

// Change DateTime to a new TZ
$losangeles_tz = new DateTimeZone('America/Los_Angeles');
$dt->setTimezone( $losangeles_tz );

$tz = $dt->getTimezone();
echo "Los Angeles TZ: " . $tz->getName() . "<br />";
echo "Offset: " . $dt->getOffset() . "<br />";

// Create a DateTime with a Custom TZ
$tokyo_tz = new DateTimeZone('Asia/Tokyo');

$dt = new DateTime('March 1, 2018', $tokyo_tz);

$tz = $dt->getTimezone();
echo "Tokyo TZ: " . $tz->getName() . "<br />";
echo "Offset: " . $dt->getOffset() . "<br />";

// DateTimeZone::getOffset($datetime_object)
echo "TZ Offset: " . $tz->getOffset($dt) . "<br />";

?>
