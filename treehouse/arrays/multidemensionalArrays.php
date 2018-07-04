<?php


	$task1 = array(
		'title' => 'laundry',
		'priority' => 2,
		'due' => '',
		'complete' => true,
		);

	$task2 = array(
		'title' => 'dust',
		'priority' => 1,
		'due' => '03/07/2018',
		'complete' => true,
		);


	$list = array($task1, $task2);

	//var_dump($list);


	echo $list[0]['title'];




?>