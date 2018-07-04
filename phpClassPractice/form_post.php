<?php

class Form
{
	public $firstName;
	public $lastName;
	private $email;

	public function __construct(
		$firstName,
		$lastName,
		$email
	) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;

		// $this->checkIfValid($firstName, $lastName, $email);
	}

	private function connectToSql()
	{
		return mysqli_connect('localhost', 'root', '', 'test_db');
	}

	public function processForm() {
			if($con = $this->connectToSql()) {
				$firstName 							= mysqli_escape_string($con, $this->firstName);
				$lastName 							= mysqli_escape_string($con, $this->lastName);
				$email									= mysqli_escape_string($con, $this->email);

				mysqli_query($con, 'INSERT INTO TABLE (firstName, gender) VALUES "' . $firstName . '", "' . $gender . '"');
			}
	}

	public function sendEmail() {
		echo "I've sent an email!";
	}
}

class FormWithNewsletter extends Form
{
	public $subscribeToNewsletter;

	public function __construct(
		string $firstName,
		$lastName,
		$email,
		boolean $subscribeToNewsletter
	) {
		$this->subscribeToNewsletter = $subscribeToNewsletter;

		parent::__construct($firstName, $lastName, $email);
	}

	public function processForm() {
		if($con = $this->connectToSql()) {
			$firstName 							= mysqli_escape_string($con, $this->firstName);
			$lastName 							= mysqli_escape_string($con, $this->lastName);
			$email									= mysqli_escape_string($con, $this->email);
			$subscribeToNewsletter	= mysqli_escape_string($con, $this->subscribeToNewsletter);

			mysqli_query($con, 'INSERT INTO TABLE (firstName, gender) VALUES "' . $firstName . '", "' . $gender . '"');
		}
	}
}

$form = new FormWithNewsletter('Sam', 'Butler-Thompson', 'sam.bt@nublue.co.uk', true);
$form->sendEmail();

// FUNCTION EXAMPLE

// function processForm(
// 						$firstName,
// 						$lastName,
// 						$gender,
// 						$subject,
// 						$comments = 'There are no comments',
// 		)
// {
// 	if(!$con = mysqli_connect('localhost', 'root', '', 'test_db')) {
// 		die('No connection found!');
// 	}
//
// 	$firstName 	= mysqli_escape_string($con, $_POST['first_name']);
// 	$gender 		= mysqli_escape_string($con, $_POST['gender']);
//
// 	mysqli_query($con, 'INSERT INTO TABLE (firstName, gender) VALUES "' . $firstName . '", "' . $gender . '"');
// }
//
//
// if($result = processForm($_POST['firstName'], $_POST['lastName'], $_POST['gender'])) {
// 	echo "Everything is fine!";
// } else {
// 	die('Something really terrible happened...');
// }
//
// processForm('Sam', 'Butler-Thompson', 'Male', 'Hello World');
