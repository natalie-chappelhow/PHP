<?php

//store each exercise in a string variable
$exercise1 = "football";
$exercise2 = "rugby";
$exercise3 = "golf";
$exercise4 = "cricket";
$exercise5 = "tennis";
$exercise6 = "badminton";
$exercise7 = "rounders";
//create a variable containing the day of the week
$day = date('N');//returns todays date
//use an if statement to test for the day of the week
if ($day == 1){
  echo $exercise1;
} elseif ($day == 2){
  echo $exercise2;
} elseif ($day == 3){
  echo $exercise3;
} elseif ($day == 4){
  echo $exercise4;
} elseif ($day == 5){
  echo $exercise5;
} elseif ($day == 6){
  echo $exercise6;
} elseif ($day == 7){
  echo $exercise7;
}
//display the corresponding excerise string




?>