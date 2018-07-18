<?php

	class form {

		public $name;
		private $email;
		private $tel;
		public $subject;
		public $message;


		public function __construct(
				$name,
				$email,
				$tel,
				$subject,
				$message){

				$connection = $this->connectionToSql();

				$this->name = mysqli_escape_string($connection, $name);
				$this->email = mysqli_escape_string($connection, $email);
				$this->tel = mysqli_escape_string($connection, $tel);
				$this->subject = mysqli_escape_string($connection, $subject); 
				$this->message = mysqli_escape_string($connection, $message);

				$this->formProcessing();

		}

		//function to check the connection - no need to include config.php file
		private function connectionToSql(){ //A private function (method) cannot be called outside of the function - only can be called in the class
			return mysqli_connect("localhost", "root", "", "contactform");//("host", "username", "password", "database name")
		}


		//function to send the data
		public function formProcessing(){

			if($connection = $this->connectionToSql()){

				require_once("formCopy.php");

				try {
					$sqlInsert = "INSERT INTO contactform (name, email, telephone, subject, message) VALUES ('".$this->name."', '".$this->email."', '".$this->tel."', '".$this->subject."', '".$this->message."')";
					$connection->query($sqlInsert);
					$this->sentForm();

					$sqlSelect = "SELECT * FROM contactform";
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

				} catch(Exception $e) {
					echo $e->getMessage();
				}

			}
		}	





		//when the form has been sent this function is exectued
		public function sentForm(){
			echo "Thank you for submitting";
		}


	}





		if(isset($_POST["name"])){
			try{
				$newForm = new form($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['subject'], $_POST['message']);
				//echo 'Message received!';
			} 

			catch(Exception $e){
				echo 'Error message:' .$e->getMessage();
			}
		}



?>