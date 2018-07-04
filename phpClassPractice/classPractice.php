<?php

	class form {

		public $name;
		private $email;
		private $tel;
		public $subject;
		public $message;


		public function __construct($name, $email, $tel, $subject, $message){
			$this->name = $name;
			$this->email = $email;
			$this->tel = $tel;
			$this->subject = $subject;
			$this->message = $message;
		}

		try{
			$newForm = new form($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['subject'], $_POST['message']);
		} 



		//function to check the connection
		private function connectionToSql(){ //A private function (method) cannot be called outside of the function - only can be called in the class
			return mysqli_connect("localhost", "root", "", "contactform");
		}


		public function formprocessing(){//A public function can be called anywhere, including outside of the class 
			if ($connection = $this->connectionToSql()) {

				require_once("formCopy.php");//includes form.php file

				$name = $connection->real_escape_string($_POST['name']);
				$email = $connection->real_escape_string($_POST['email']);
				$tel = $connection->real_escape_string($_POST['tel']);
				$subject = $connection->real_escape_string($_POST['subject']); 
				$message = $connection->real_escape_string($_POST['message']);
			

				$sqlInsert = "INSERT INTO contactform (name, email, telephone, subject, message) VALUES ('".$name."','".$email."', '".$tel."', '".$subject."', '".$message."')";
				if(!$resultInsert = $connection->query($sqlInsert)){
					die("There was a connection error [" . $connection->error ."]"); //stops running the script
				}
			}
		}


		public function sentEmail(){
			echo "Thank you for submitting";
		}

	}

	$form = new form($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['subject'], $_POST['message']); //creating a new instance of the form class
	$form->sentEmail();



/*

	$sqlSelect = "SELECT * FROM contactform"; //selects all data stored in the database
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

*/

?>