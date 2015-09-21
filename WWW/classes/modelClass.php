<?php

include('database.php'); //include relevant files
include('validateClass.php');

class model extends database {

	// This function checks whether or not the user is an admin	
	public function checkUser() {
		if($_SESSION['access'] != 'user') {
	 		return false;
	 	} else {
	 		return true;
	 	}
	}
	
	public function checkAdmin() {
	 	if($_SESSION['access'] != 'admin') {
	 		return false;
	 	} else {
	 		return true;
	 	}
	}

	// This function will process a login attempt
	public function processLogin() {
		$result = $this -> checkLogin();//function exists in the database class
		if(!$result) {
			return false;
		} else {
			// Add user details to session
			$_SESSION['firstName'] = $result['firstName'];			
			$_SESSION['username'] = $result['username'];
			$_SESSION['userID'] = $result['userID'];
			$_SESSION['access'] = $result['access'];
			return true;
		}
	}
	// This function will log out a user, simply by unsetting the relevant elements in the session
	public function processLogout() {
		$_SESSION = array();
		session_destroy();				 
	}

	public function processDelete() {
		//get the info from the form
		extract($_POST);
		//initialise result arrays(returned as messages)
		$results = array();
		//run the deletion query
		$deleted = $this -> deleteFromDatabase();
		if (!$deleted) {
			$results['deleteSuccess'] = false;
		} else{
			//record successfully delete from the database
			$results['deleteSuccess'] = true;

			//return results
			return $results;
		}
	}


	public function validateSignUp() {
		//Instantiate the validate object
		$validate = new validate();

		//get data from the form inputs
		extract($_POST);

		//Initialise array to store messages
		$messages = array();
		
		//validate first name (required)
		$messages['firstNameError'] = $validate -> checkName($firstName, true);

		//validate username or email address (required)
		$messages['usernameError'] = $validate -> checkUsername($username, true);

		$errors = $validate -> checkErrors($messages);
		if($errors) {
			//if there were errors, return the array
			return $messages;
		} else {
			//validate success!
			//proceed 
			return false;
		}
	}
	public function validateCentre() {
		//Instantiate the validate object
		$validate = new validate();

		//get data from the form inputs
		extract($_POST);

		//Initialise array to store messages
		$messages = array();
		
		//validate first name (required)
		$messages['centreNameError'] = $validate -> checkName($centreName, true);
		$messages['rateError'] = $validate -> checkRate($rate, true);

		$errors = $validate -> checkErrors($messages);
		if($errors) {
			//if there were errors, return the array
			return $messages;
		} else {
			//validate success!
			//proceed 
			return false;
		}
	}


	public function validateContact() {
		//Instantiate the validate object
		$validate = new validate();

		//get data from the form inputs
		extract($_POST);

		//Initialise array to store messages
		$messages = array();		
		
		//validate first name (required)
		$messages['firstNameError'] = $validate -> checkName($firstName, true);
		//validate last name (required)
		$messages['lastNameError'] = $validate -> checkName($lastName, true);
		//validate email address (required)
		$messages['emailAddressError'] = $validate -> checkEmail($emailAddress, true);
		//validate phone (required)
		$messages['phoneError'] = $validate -> checkPhone($phone, true);		

		$errors = $validate -> checkErrors($messages);
		if($errors) {
			//if there were errors, return the array
			return $messages;
		} else {
			//validate success!
			//proceed 
			return false;
		}
	}	

	public function processSignUp() {		
		$result = $this -> addUserToDatabase();//function exists in the database class	
	}

	public function processRankForm() {		
		//$result = $this -> addCentreToDatabase();
		$result = $this -> postCentreToDatabase();
	}

	public function processAddCentreForm() {
		$result = $this -> addCentreToDatabase();
	}
	
	public function processEditCentre() {
		$result = $this -> editCentre();
	}

	
	public function validateAddCentre() {
		//Instantiate the validate object
		$validate = new validate();

		//get data from the form inputs
		extract($_POST);

		//Initialise array to store messages
		$messages = array();

		//validate  name (required)
		$messages['centreNameError'] = $validate -> checkName($centreName, true);
		
		$messages['descriptionError'] = $validate -> checkDescription($description, true);
		//validate phone (required)
		$messages['phoneError'] = $validate -> checkPhone($phone, true);	

		$errors = $validate -> checkErrors($messages);
		if($errors) {
			//if there were errors, return the array
			return $messages;
		} else {
			//validate success!
			//proceed 
			return false;
		}
	}
	
	//public function processEditCentre() {}

	public function processContact() { //NOT YET WORKING
		//filter the inputs
		extract($_POST);

		//prepare the array
		$inputs = array();
		//filter the inputs		
		 $firstName      = $_POST['firstName'];
		 $lastName       = $_POST['lastName'];
		 $emailAddress	 = $_POST['emailAddress'];
		 $phone          = $_POST['phone'];
		 $town           = $_POST['town'];
		 $comment  	     = $_POST['comment'];
		 
		$message = $firstName.' '.$lastName."\n".$emailAddress."\n".$phone."\n".$town."\n".$comment;
		 
		// //$to = "childcare@email.co.nz";
		$to ='pamcez@yahoo.co.nz';
		$subject = 'Message sent from Childcare website';
		$inputs = $_POST['contactSubmit'];	

		//send details to the company's email
		mail($to, $subject, $message);	
	}


}// end of model class 


?>