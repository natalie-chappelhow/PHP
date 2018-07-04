<?php
	
	
	//$dictionaryFile = 'dictionary/brandWords.txt';
	//$lines = file($dictionaryFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//read the contents of the words.txt file - breaks each line up into an array. will ignore a line break (new line after a word) and skip any empty lines)

	//echo $lines[5]; //displays the fifth word in the file
	//echo $lines[8];
	//echo $lines[12];

	

	$brandWords = readDictionary('brandWords.txt');
	$basicWords = readDictionary('words.txt');

	$words = array_merge($brandWords, $basicWords);//merges arrays together

	//creating a function so multiple dictionaries can be added
	function readDictionary($filename = ""){
	$dictionaryFile = "dictionary/{$filename}"; //will look in the dictionary file only
	return file($dictionaryFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//read the contents of the words.txt file - breaks each line up into an array. will ignore a line break (new line after a word) and skip any empty lines)
	}
	//echo $words[5];
	//echo $words[8];
	//echo $words[12];
	//echo $words[25];


	//create a function that selects a random word
	function selectRandom($array){
		$i = mt_rand(0, count($array)-1);
		return $array[$i];

		//$i = array_rand($array); //uses array_rand - could use this
	}

	//$password = selectRandom($words);

	function randomSymbol (){
		$symbols = '£$%^&*~#@?';

		$i = mt_rand(0, strlen($symbols)-1);//strlen to find the length of the string. -1 as the array produced from using rand starts at 1
		return $symbols[$i];
	}


	function randomNumber(){
		$numbers = '0123456789';

		$i = mt_rand(0, strlen($numbers)-1);//strlen to find the length of the string. -1 as the array produced from using rand starts at 1
		return $numbers[$i];
	}

	

	$password = '';
	$password .= selectRandom($words);
	$password .= randomSymbol();
	$password .= selectRandom($words);
	$password .= randomNumber();


	echo "Friendly Password: ". $password;//displays random word

	//WORKS UP TO HERE
?>