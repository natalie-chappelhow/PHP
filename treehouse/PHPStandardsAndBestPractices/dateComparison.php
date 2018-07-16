<?php 
//this first line is to set your timezone
date_default_timezone_set('UTC');

//$date = new DateTime('tomorrow');
//<p>The output date is: <?php echo $date->format('m/d/Y') </p>

$dvone = new DateTime('August 1, 1972');
$spike = new DateTime('August 13, 1970');



//who is older?
if($dvone < $spike){
  echo '<p>D-Von is older than Spike</p>';
} else{
  echo '<p>Spike is older than D-Von</p>';
}


//age difference
//creating an object called and storing it in a variable called difference. The object is an instance of date time interval
//Means we can call methods on it
//One method recalled is the format method
//Pass it as a string and use certain characters preceded by a % to denote actual values that represent a portion of the difference. %y will show the number of years
$difference = $dvone->diff($spike);
echo $difference->format("<p> There is %y years, and %m months and %d days between Spike and D-Von </p>");

?>



