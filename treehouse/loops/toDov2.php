<?php

	include 'list.php';



	echo '<table>';
	echo '<tr>';
	echo '<th> Title </th>';
	echo '<th> Priority </th>';
	echo '<th> Due Date </th>';
	echo '<th> Complete </th>';
	echo '</tr>';

	foreach($list as $item){ //assign an item from the $list to $item
		echo '<tr>';
		echo '<td>' . $item['title'] . "</td>\n";
		echo '<td>' . $item['priority'] . "</td>\n";
		echo '<td>' . $item['due'] . "</td>\n";
		//echo '<td>' . $item['complete'] . "</td>\n";
		echo '<td>';
		if($item['complete']){//check the status of completion
			echo 'Yes';
		}else {
			echo 'No';
		}
		echo '</tr>';
	}
	echo '</table>';
	//var_dump($list);



//WORKS - SHOWS TO DO LIST
	




	//echo "<pre>";
	//var_dump($filter, $list);
	//echo "</pre>";



?>