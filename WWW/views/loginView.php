<?php 
class login extends view {

	protected function displayContent() {
		$html = '<p>'. nl2br($this -> pageInfo['content']) .'</p>'; 
	
		//instantiate the form
		include('classes/formsClass.php');
		$form = new form($this -> model);

		//instantiate the class user
		include('classes/userClass.php');
		$user = new user($this -> model);

		//instantiate the class centre
		include('classes/centreClass.php');
		$centre = new centre($this -> model);
		if(isset($_POST['login'])) {
			//validate login form input
			$result = $this -> model -> processLogin();
			if($result) {						
				//if valid check if user exist log user in
				$loggedIn = $this -> model -> checkUser();
				if(!$loggedIn) {
					$html .= '<img class="left half" src="images/hand.png"><br/><br/>';
					$html .= $user -> displayAdminPage();
					$html .= '<h2><a href="index.php?page=admin">Add Centre</a></h2>'."\n";
					$html .= '<h2><a href="index.php?page=centre">Edit Centre</a></h2>'."\n";	
					$html .= '<h2><a href="index.php?page=centre">Delete Centre</a></h2>'."\n";												
				} else {	
					$html .= $user -> displayUserPage();
					$html .= '<h2><a href="index.php?page=user">Rate Centre</a></h2>'."\n";	
				}
			} else {
				$html .= $form -> loginForm();
				$html .= '<p class="redhead">Please enter a valid username and password!</p>';					
			}					
		} else {
			//if the user has not yet submitted the form show the form
		 	$html .= $form -> loginForm();
		}			 				
		$html .= '</form>'. "\n";			
	
		$html .= '</div>';
		// Return HTML back to displayPage in viewClass
		return $html;
	}
}
?>