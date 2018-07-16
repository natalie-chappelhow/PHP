<?php

	spl_autoload_register(function($class)){//autoload registered with an anonymous function. The anonymous function acts as a callback. Whenever a class is referenced that PHP doesn't recognise, it will hit the call back and pass the name of the class in as a string argument
		$classPath = str_replace('\\', '/', $class);// call back accepts the string as an argument and back slashes are replaced with a forward slash. Two \ are used as putting one would esacpe the '
		include __DIR__ . '/src/' . $classPath . '.php';//create a new string starting with the current directory. Appending the src folder and use the new class name and put .php on the end
	}





?>