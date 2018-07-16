<?php

	//send erros to output
	ini_set('display errors', 1);


	set_error_handler(function($errno, $errstr, $errfile, $errline){//$error number, $error string - contains human readable message
		throw new ErrorException($errno, 0, $errstr, $errfile, $errline);
	})


	
	
	try{
	//read a file
	$handle = fopen('nope.txt' 'r');

	} catch (ErrorException $e){
		echo "<p>Can't find the file</p>";
	} 
	//if it didn't work, then print a human error
	//if(! $handle){
		//echo "<p>Can't find the file</p>";
	//}

	echo "<p>Do something else</p>";

	//PHP has a callback setErrorHandler() which accepts an anonymous function as a callback. Every time a PHP error is about to be thrown, it will run the callback

?>