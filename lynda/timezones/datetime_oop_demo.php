<?php

$dt = new DateTime('March 1, 2018');

echo "Date: " . $dt->format('l, F j, Y H:i:s') . "<br />";
echo "Timestamp: " . $dt->getTimestamp() . "<br />";

echo "<br />";

$timestamp = strtotime('June 15, 2017') + (60*60*8);
$dt->setTimestamp( $timestamp );
echo "Date: " . $dt->format('l, F j, Y H:i:s') . "<br />";

echo "<br />";

$dt->modify('+1 year');
echo "Date: " . $dt->format('l, F j, Y H:i:s') . "<br />";

?>
