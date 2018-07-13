<?php
// Returns same timezone list as 
// http://php.net/manual/en/timezones.php

$tz_idents = timezone_identifiers_list();
// $tz_idents = DateTimeZone::listIdentifiers();

foreach($tz_idents as $zone) {
  echo $zone . "<br />";
}
?>

<hr />

<?php
$tz_abbr = 'EST';
$tz_name = timezone_name_from_abbr($tz_abbr);
echo $tz_name;
?>
