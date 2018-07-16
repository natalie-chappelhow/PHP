<?php

	function hello(){
		echo "Hello World!";
	}

	//hello();

	$currentUser = "Teddy";
	function isNatalie(){
		global $currentUser;
		if($currentUser == "Natalie"){
			echo "Hello $currentUser";
		} else {
			echo 'Nope, not Natalie';
		}
	}

	isNatalie();


	function helloName($array){
		if(is_array($array)){
			foreach($array as $name){
				echo " <br /> Hello $name <br />";
			}
		} else{
			echo "<br />" . "Hello friends";
		}
		
	}

	$names = array(
			"Sandro",
			"Teddy",
		);

	helloName($names);


	//variable functions

	function answer(){
		return 42;
	}


	//function addUp($a, $b){
		//return $a + $b;
	//}

	//$func = "addUp";

	//$num = $func(5, 10);

	//echo $func();

	//array_keys()

	//array_walk();


	$names = array(
		"Mike" => "Frog",
		"Chris" => "Teacher",
		"Hampton" => "Teacher"
		);
	//var_dump(array_keys($names));

	//foreach (array_keys($names) as $name) {
		//echo "Hello $name <br />";
	//}

	function printInfo($value, $key){
		echo "$key is a $value";
	}

	array_walk($names, "printInfo");

?>