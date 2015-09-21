<?php  

class editCentre extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';
		
		//Instantiate the form
		include('classes/formsClass.php');
		$form = new form($this -> model);
		
		//instantiate the class user
		include('classes/userClass.php');
		$user = new user($this -> model);	

		$html .= $user -> displayAdminPage();
		$html .= '<img class="left half" alt="hand" src="images/hand.png"><br/><br/>';

		// Is the user logged in?
		$loggedIn = $this -> model -> checkAdmin();

		//If the admin has not yet submitted the addProduct form, dispay it.
		if(!isset($_POST['editCentre'])) {
			
			$html .= '<h4>Edit Centre Form</h4>';			
			$html .= $form -> addCentreForm('edit'); //edit form
			
		} else {
			$result = $this -> model -> validateAddCentre();
			if($result) {
				$html .= $form -> addCentreForm('edit',$result);	
			}	else {
				//add centre to database
				//$success = $this -> model -> editCentre();
				$result = $this -> model -> processEditCentre();				
				if(!$result) {
					$html .= '<p><strong>The centre has been successfully edited.</strong></p>';
				} else {	
					$html .= '<p><strong>The centre was not edited</strong></p>';
					$html .= '<a href="index.php?page=centre"> Go back to the Childcare Directory </a>';			
				}	 
			}
		}
		return $html;	
	}
}
?>