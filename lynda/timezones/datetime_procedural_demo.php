<?php
  
// time()
$current_time = time();
echo "time(): {$current_time}<br />";

echo "<br />";

// strtotime()
$tomorrow1 = $current_time + (60 * 60 * 24);
echo "time() + (60*60*24): {$tomorrow1}<br />";
$tomorrow2 = strtotime('tomorrow');
echo "strtotime('tomorrow'): {$tomorrow2}<br />";
$tomorrow3 = strtotime('+1 day');
echo "strtotime('+1 day'): {$tomorrow3}<br />";

echo "<br />";

// mktime()
$new_year1 = mktime(0, 0, 0, 1, 1, 2017);
echo "New Year mktime: {$new_year1}<br />";
$new_year2 = strtotime('January 1, 2017');
echo "New Year strtotime: {$new_year2}<br />";

echo "<br />";

// date() and strftime()
echo "date(): " . date('l, F j, Y', $new_year1) . "<br />";
echo "strftime(): " . strftime('%A, %B %e, %Y', $new_year1) . "<br />";

echo "<br />";

// checkdate()
$years = array(2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030, 3000);
foreach($years as $year) {
  if(checkdate(2,29,$year)) {
    echo "Year {$year} contains 29 days.<br />";
  } else {
    echo "Year {$year} does not contain 29 days.<br />";
  }
}
  
?>