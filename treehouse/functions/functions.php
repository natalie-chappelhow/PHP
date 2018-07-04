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

?>