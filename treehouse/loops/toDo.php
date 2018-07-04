<?php

	include 'list.php';


	$filter = array();

	$status = false;
	$field = 'priority';

	foreach($list as $originalKey => $item){
		if($status === 'all' || $item['complete'] == $status){//if the status is all or the item is complete
			if(isset($field) && isset($item[$field])){
				$filter[$originalKey] = $item[$field];
			} else{
				$filter[$originalKey] = $item['priority']+12;
			}
		}
		//echo $key . '=' . $item['title'] . "<br />\n";
	}

	asort($filter);

	echo '<table>';
	echo '<tr>';
	echo '<th> Title </th>';
	echo '<th> Priority </th>';
	echo '<th> Due Date </th>';
	echo '<th> Complete </th>';
	echo '</tr>';

	foreach($filter as $id => $value){ //assign an item from the $list to $item
		echo '<tr>';
		echo '<td>' . $list[$id]['title'] . "</td>\n";
		echo '<td>' . $list[$id]['priority'] . "</td>\n";
		echo '<td>' . $list[$id]['due'] . "</td>\n";
		//echo '<td>' . $item['complete'] . "</td>\n";
		echo '<td>';
		if($list[$id]['complete']){//check the status of completion
			echo 'Yes';
		}else {
			echo 'No';
		}
		echo '</tr>';
	}
	echo '</table>';
	//var_dump($list);




	




	//echo "<pre>";
	//var_dump($filter, $list);
	//echo "</pre>";



?>