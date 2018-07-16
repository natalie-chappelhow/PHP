<?php
	//turning on errors within an individual PHP file
	//Report simple running errors
	error_reporting(E_ALL);//all errors
	//Make sure they are on screen
	ini_set('display_errors', 1);//1 means true so they are on
	//HTML formatted errors
	ini_set('html_errors', 1);

	//$error_levels = array('E_ALL', 'E_NOTICE', 'E_WARNING', 'E_ERROR', 'E_STRICT', 'E_DEPRECATED', 'E_PARSE');

	//foreach ($error_levels as $error) {
	//	echo $error . "<br />";
	//}
	


	$player1 = 0;
	$player2 = 0;
	$round = 0;

	//var_dump(abs($player1 - $player2));//abs - absolute value
	//var_dump($player2 - $player1);


	//WIN
	//a player must reach the score of 11
	//a player must be a min of 2 points higher than opponent
	while (abs($player1 - $player2) < 2 || ($player1 < 11 && $player2 < 11)){ //$player1 must be less than 11 and $player2 must be less than 11 to continue the loop -  if the difference between the players is less than 2, the loop will continue. Or if $player1 and $player2 are both less than 11 the loop will continue.
		$round++; //incrementing the $round
		echo "<h2> Round $round </h2> \n";
		if (rand(0,1)){//0 and 1 are the max and min values. These values will also be included in the rand
			$player1++;//add the random value (0 or 1) to player 1
		} else {
			$player2++;//add the random value (0 or 1) to player 2
		}
		echo "Player 1 = $player1 <br />\n";	
		echo "Player 2 = $player2 <br />\n";
	}
	echo "<h1>";
	if($player1 >$player2){
		echo "Player 1";
	} else{
		echo "Player 2";
	}
	echo " is the winner after $round rounds </h1>";

	//LOSE / NOT WIN
	//randomly increment on of player scores each round
?>