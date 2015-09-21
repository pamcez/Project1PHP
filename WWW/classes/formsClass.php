<?php 

 class form {

 	public function __construct($model){
 		$this -> model = $model; 
 	}

 	public function signUpForm($messages='') {
		/*
		If an array of errors was sent, it will be in the following format:
			$messages[firstNameError] => Please enter your name
			$messages[lastNameError] => Please enter your name correctly
			$messages[emailAddressError] => Please enter your email address correctly
		*/
		if(is_array($messages)) {
			// By doing an extract, these messages become $firstNameError, $lastNameError and $emailAddress error respectively
			extract($messages);
		}

		// $form = '<br/>';
 		// 	$form .= '<img src="images/image1.png" class="left">'. "\n";

 		$form .= '<form method="post" action="'. $_SERVER['REQUEST_URI'] .'" class="left">'. "\n";
		$form .= '<h3>FREE Sign up </h3>'. "\n";
		
		$form .= '<input type="text" placeholder="First Name" name="firstName" value="' . htmlentities(stripslashes($_POST['firstName']), ENT_QUOTES) . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $firstNameError . '</span><br/>' . "\n";		

		$form .= '<input type="email" name="username" value="' . htmlentities(stripslashes($_POST['username']), ENT_QUOTES) . '" placeholder="username" ><br/>'."\n";
		$form .= '<span class="error">' . $usernameError . '</span><br/>' . "\n";

		$form .= '<input type="password" name="password" placeholder="password"  maxlength="10"><br/>'."\n";
		$form .= '<input type="submit" name="join" value="Join now" class="green whitehead"><br/>'."\n";
		
		return $form;
	}

 	public function loginForm($messages='') {

 		if(is_array($messages)) {
			// By doing an extract, these messages become $firstNameError, $lastNameError and $emailAddress error respectively
			extract($messages);
		}
		$form = '<br/>';					
		$form .= '<img src="images/toddlers.jpg" class="left">'."\n";			
		$form .= '<div>'."\n";				
		$form .= '<form method="post" action="'. $_SERVER['REQUEST_URI'] .'" class="left">'."\n";
		$form .= '<h3>Login to your Account</h3>'."\n";
		$form .= '<input type="text" name="username" value="' . htmlentities(stripslashes($_POST['emailAddress']), ENT_QUOTES) . '" placeholder="username" ><br/>'."\n";
		$form .= '<span class="error">' . $emailAddressError . '</span><br/>' . "\n";

		$form .= '<input type="password" name="password" value="' . htmlentities(stripslashes($_POST['password']), ENT_QUOTES) . '" placeholder="password"  ><br/>'."\n";

		$form .= '<span class="error">' . $passwordError . '</span><br/>' . "\n";

		$form .= '<input type="submit" name="login" value="Log in" class="blue whitefont" class="input"> <br/><p><a href="">Forgot your password?</a></p><br/>'."\n";	
 		
 		return $form;
 	}

 	public function contactForm($messages='') {

 		if(is_array($messages)) {
			// By doing an extract, these messages become $nameError, $priceError...etc
			extract($messages);
		}

		$form = '<form method="post" action="'. $_SERVER['REQUEST_URI'] .'" class="left">';
		
		$form .= '<input type="text" placeholder="First Name" name="firstName" value="' . htmlentities(stripslashes($_POST['firstName']), ENT_QUOTES) . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $firstNameError . '</span><br/>' . "\n";		
		
		$form .= '<input type="text" placeholder="Last Name" name="lastName"  value="' . htmlentities(stripslashes($_POST['lastName']), ENT_QUOTES) . '"><br/>	';
		$form .= '<span class="error">' . $lastNameError . '</span><br/>' . "\n";

		$form .= '<input type="email" name="emailAddress" placeholder="someone@email.com" value="' . htmlentities(stripslashes($_POST['emailAddress']), ENT_QUOTES) . '" "><br/>';
		$form .= '<span class="error">' . $emailAddressError . '</span><br/>' . "\n";

		$form .= '<input type="text" name="phone" placeholder="Phone or Mobile"><br/>';
		$form .= '<span class="error">' . $phoneError . '</span><br/>' . "\n";

		$form .= '<textarea rows="8" cols="30" name="comment" placeholder="Message"></textarea><br/>';
		$form .= '<input type="submit" name="contactSubmit" value="Send" class="blue whitefont">';
		$form .= '<span class="error">' . $formMessage . '</span><br/>' . "\n";
		$form .= '</form>';

		return $form;
 	} 	


 	public function rateForm($messages='') {
 		if(is_array($messages)) {
			// By doing an extract, these messages become $nameError, $rateError...etc
			extract($messages);
		}
		
 		$form = '<form class="left" method="post" action="' . $_SERVER['REQUEST_URI'] . '" enctype="multipart/form-data">' . "\n";		

		$form .= '<input type="text" name="centreName" placeholder="Centre Name" value="' . htmlentities(stripslashes($_POST['centreName']), ENT_QUOTES)  . '" /> <br/>';
		$form .= '<span class="error">' . $centreNameError . '</span></p>' . "\n";		
		
		$form .= '<input type="text" name="phone" placeholder="Phone" value="' .htmlentities(stripslashes($_POST['phone']), ENT_QUOTES)  . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $phoneError . '</span><br/>' . "\n";		 

		$form .= '<input type="text" name="location" placeholder=" Address" value="' . htmlentities(stripslashes($_POST['location']), ENT_QUOTES) . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $locationError . '</span><br/>' . "\n";
		
		// Description input
		$form .= '<textarea id="description" name="description"  value= "'.htmlentities(stripslashes($_POST['description']), ENT_QUOTES).'"placeholder="Centre email or website" rows="4" cols="20"></textarea>' . "\n";
		$form .= '<span class="error">' . $descriptionError . '</span></p>' . "\n";

		$form .= '<input type="text" name="rate" placeholder="Rate" value="' .htmlentities(stripslashes($_POST['rate']), ENT_QUOTES)  . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $rateError . '</span><br/>' . "\n";

		$form .= '<input type="hidden" name="centreID" value="' . $_GET['centreID'] . '" />' . "\n";		
		$form .= '<textarea name="feedback" rows="3"cols="30" placeholder="Feedback(optional)"></textarea><br/>	';			
		$form .= '<input type="submit" name="submitRank" value="Submit" class="green whitefont">';			
		$form .= '</form>' . "\n";
		$form .= '</div>';

		return $form;
 	}

	public function addCentreForm($mode, $messages='') {
		if(is_array($messages)) {
			// By doing an extract, these messages become $nameError, $rateError...etc
			extract($messages);
		}
			if($mode == 'edit' && !isset($_POST['editCentre'])) {
				$details = $this -> model -> getCentre($_GET['id']);
				$nameValue = $details['centreName'];				
				$descriptionValue = $details['description'];
				$location = $details['location'];
				$phone = $details['phone'];
				$ranking = $details['ranking'];
				$rate = $details['rate'];
				
			} else {	
			//print_r($_POST);		
				$nameValue = $_POST['centreName'];				
				$descriptionValue = $_POST['description'];
				$location = $details['location'];
				$phone = $details['phone'];
				$ranking = $details['ranking'];
				$rate = $details['rate'];
			}
			
		$form = '<form class="left" method="post" action="' . $_SERVER['REQUEST_URI'] . '" enctype="multipart/form-data">' . "\n";		

		$form .= '<p><label for="name">Centre Name</label>' . "\n";
		$form .= '<input type="text" name="centreName" value="' . $nameValue  . '" /> <br/>';
		$form .= '<span class="error">' . $centreNameError . '</span></p>' . "\n";
		
		$form .= '<p><label for="phone" >Phone</label>' . "\n";
		$form .= '<input type="text" name="phone" placeholder="00000000" value="' . $phone . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $phoneError . '</span><br/>' . "\n";
		 
		$form .= '<p><label for="location">Location</label>' . "\n";
		$form .= '<input type="text" name="location" placeholder=" Address" value="' . $location . '" /><br/>' . "\n";
		$form .= '<span class="error">' . $locationError . '</span><br/>' . "\n";

		
		// Description input
		$form .= '<p><label for="description">Description</label>';
		$form .= '<textarea id="description" name="description" placeholder="Centre email or website" rows="4" cols="20">'.  $descriptionValue .'</textarea>' . "\n";
		$form .= '<span class="error">' . $descriptionError . '</span></p>' . "\n";

		$form .= '<input type="hidden" name="centreID" value="' . $_GET['id'] . '" />' . "\n";

		//check Session
		if ($this -> model -> checkAdmin()) {
			$form .= '<p><label for="ranking">Ranking</label>';
			$form .= '<input type="text" name="ranking" value="' . $ranking . '" />' . "\n";
		}
		
		$form .= '<p><label for="rate">Rate</label>';
		$form .= '<input type="text" name="rate" value="' . $rate . '" /><br/>' . "\n";
		
		// The submit button will be different, depending on whether this is an add or an edit form
		if($mode == 'add') {
			$form .= '<input type="submit" name="addCentre" value="Add Centre" />' . "\n";
		} else {
			$form .= '<input type="submit" name="editCentre" value="Edit Centre" />' . "\n";
		}	
		
		$form .= '</form>' . "\n";
		return $form;

	}
	
	public function deleteCentre($centre) {
		extract($centre);
		$form = '<p><strong>Are you sure you want to delete <em>' . $name . '</em>?</strong></p>' . "\n";
		$form .= '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '">' . "\n";
		$form .= '<input type="hidden" name="centreID" value="' . $centreID . '" />' . "\n";
		//$form .= '<input type="hidden" name="imageFile" value="' . $image . '" />' . "\n";
		$form .= '<p><input type="submit" name="deleteNo" value="Cancel" />' . "\n";
		$form .= '<input type="submit" name="deleteYes" value="Confirm" /></p>' . "\n";
		$form .= '</form>' . "\n";
		return $form;
	}

}//end forms


 ?>