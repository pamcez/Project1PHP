<?php  

class adminView extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';	
		
 		if(!isset($_SESSION['userID'])) {
			//redirect
			//header('Location:index.php?page=login');
			return false;
		}

		//instantiate the form
		include('classes/formsClass.php');
		$form = new form($this -> model);

		//instantiate the class user
		include('classes/userClass.php');
		$user = new user($this -> model);	

		$html .= $user -> displayAdminPage();
		$html .= '<img class="left half" alt="hand" src="images/hand.png"><br/><br/>';

		// Is the user logged in?
		$loggedIn = $this -> model -> checkAdmin();

		if($loggedIn) {				
			if(!isset($_POST['addCentre'])) {
				$html .= $form -> addCentreForm('add');
			} else {
				$result = $this -> model -> validateAddCentre();	
				if($result) {						
					$html .= $form -> addCentreForm($result, 'add');	
				} else {
					$failed = $this -> model -> processAddCentreForm();
					if(!$failed) {
						$html .= '<h4 class="redhead">You have successfully <br/>submitted the form!</h4>';						
					} else {
						$html .= '<p>Sorry, something went wrong please contact us <a href="index.php?page=contact">here</a></p>'; 
					}		
				}
			}		
				return $html;				 
		}
	}		
}		

?>