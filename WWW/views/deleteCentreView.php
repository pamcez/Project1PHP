<?php  

class deleteCentre extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

		$details = $this -> model -> getCentre($_GET['id']);
		
		//create forms object
		include('classes/formsClass.php');
		$form = new form ($this -> model);
				
		//only administrators can view this page!
		if(!$this -> model -> checkAdmin()) {
			//header('Location:index.php?page=home');		
			//return false;
			$html .= '<h4><a href="index.php?page=login"> Go back to Login page and enter your login details </a></h4>';
			
		} else {
		
					//if the cancel button was clicked
			if(isset($_POST['deleteNo'])) {
				//redirect back to the admin
				//header('Location: index.php?page=admin');
				$html .= '<a href="index.php?page=centre"> Go back to the Childcare Directory </a>';
				return false;
			
			}

			if(!isset($_POST['deleteYes'])) {			
				$html .= $form -> deleteCentre($details);
				$html .= '<p>Press the cancel button to return to the Administrator&#39;s pages</p>';
			} else {
				//confirmation received go ahead and delete
				$result = $this -> model -> processDelete();

				//also the success of the image deletion
					if(!$result['deleteSuccess']) {
						$html .= $form -> deleteCentre($details);							
					} else {
						$html .= '<p>The centre was successfully deleted</p>';	
						$html .= '<a href="index.php?page=centre"> Go back to the Childcare Directory </a>';
					} 				
			}		
		}
 	 return $html;
	}
}

?>