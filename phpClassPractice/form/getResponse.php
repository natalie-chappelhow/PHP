<?php

	/*$host = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "contactform";

	//create connection
	$connection = new mysql_connect($host, $username, $password, $databaseName);
	*/

	//$connection = mysqli_connect("localhost", "root", "", "contactform")

	require_once('./config.php');/*includes config.php file. require_once - checks of file has already been included. If it has it does not include it again. Same as using include(). Only when an error is picked up it differs  
	require() - will produce a fatal error and stop the script
	include() -  will produce a warning and the script will still run
	*/

//validating form

	//required fields

	//set empty variables
	//$nameError = $emailError = $telError = $subjectError = $messageError = ""; // = is used to give the same value to multiple variables. 
	//$name = $email = $tel = $subject = $message = "";


	if ((isset($_POST['name'])&& $_POST['name'] =='') && (isset($_POST['email']) && $_POST['email'] =='')&& (isset($_POST['tel']) && $_POST['tel'] =='') && (isset($_POST['subject']) && $_POST['message'] =='') &&(isset($_POST['message'])&& $_POST['message'] =='')){

			$nameError = $emailError = $messageError = "This is a required field";
			$tel = $subject = "";

	}	else{
			require_once("form.php");//includes form.php file
				$name = $connection->real_escape_string($_POST['name']);
				$email = $connection->real_escape_string($_POST['email']);
				$tel = $connection->real_escape_string($_POST['tel']);
				$subject = $connection->real_escape_string($_POST['subject']); 
				$message = $connection->real_escape_string($_POST['message']);
			

			$sqlInsert = "INSERT INTO contactform (name, email, telephone, subject, message) VALUES ('".$name."','".$email."', '".$tel."', '".$subject."', '".$message."')";
		

			if(!$resultInsert = $connection->query($sqlInsert)){
				die("There was a connection error [" . $connection->error ."]"); //stops running the script
			} else{
				echo "Thank you for submitting"; //otherwise 
			}
		}
	


	//validating form

	//required fields

	//set empty variables
	/*$nameError = $emailError = $telError = $subjectError = $messageError = ""; // = is used to give the same value to multiple variables. 
	$name = $email = $tel = $subject = $message = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST['name'])){
			$nameError = "Name is a required field";
		} else {
			$name = $connection->real_escape_string($_POST['name']);
		}
	
	}
	
*/





	$sqlSelect = "SELECT * FROM contactform"; //;selects all data stored in the database
	$resultSelect = $connection->query($sqlSelect);

	if(mysqli_num_rows($resultSelect) > 0){//mysqli_num_rows() returns the number of rows in a set of results
		echo "<table> <tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Telephone</th> <th>Subject</th> <th>Message</th> </tr>";
		while($row = mysqli_fetch_assoc($resultSelect)){//fetches rows of data from the database
			echo "<tr> <td>" . $row["id"]." </td>
			<td>" . $row["name"]." </td>
			<td>" . $row["email"]." </td>
			<td>" .$row["telephone"]." </td>
			<td>" .$row["subject"]." </td>
			<td>" .$row["message"]."</td>
			</tr>";	
		}
		echo "</table>";
	}

?>