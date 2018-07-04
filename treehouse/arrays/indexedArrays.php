<?php
	//INDEXED ARRAYS
	$firstArray = array('conditionals', 'arrays', 'loops');

	//var_dump($firstArray);

	//echo $firstArray[2];

	//echo implode("\n", $firstArray);//implode allows us to join array elements together into a single string

	$firstArray[] = 'build something fun';
	//var_dump($firstArray);

	//ADDING TO AN ARRAY
	//array push - push one or more elements to the end of the array
	array_push($firstArray, 'forms', 'functions');
	//var_dump($firstArray);

	//array unshift - add one or more elements to the start of an array
	array_unshift($firstArray, 'objects', 'variables');
	//var_dump($firstArray);

	//REMOVING FROM AN ARRAY
	//removes first element from the array
	array_shift($firstArray);
	//var_dump($firstArray);

	//removes last element of the array
	array_pop($firstArray);
	//var_dump($firstArray);

	//can remove array element when using the key - doesn't update the key index
	unset($firstArray[1]);
	//var_dump($firstArray);

	//replacing elements in an array - replacing the 5th array element with another string
	$firstArray[5] = "dog";
	//var_dump($firstArray);



	//SORTING ARRAYS
	//var_dump($firstArray);
	//sort by value
	asort($firstArray);
	//var_dump($firstArray);

	rsort($firstArray);//reverse order
	//var_dump($firstArray);


	//sort by key
	ksort($firstArray);
	//var_dump($firstArray);

	krsort($firstArray);//reverse order
	var_dump($firstArray);


	

