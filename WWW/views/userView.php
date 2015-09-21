<?php  

class userView extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';

		if(!isset($_SESSION['userID'])) {
			return false;		
		}		

		//instantiate the form
		include('classes/formsClass.php');
		$form = new form($this -> model);

		//instantiate the class user
		include('classes/userClass.php');
		$user = new user($this -> model);

		//instantiate the class centre
		include('classes/centreClass.php');
		$centre = new centre($this -> model);		

			$html .= $user -> displayUserPage();

			if (!isset($_POST['submitRate'])) {
				$html .= '<div><br/><br/>';
				$html .= $centre -> displayCentres();
				$html .= '</div>';				
			} else {
				$result = $centre -> addRate();
				if (!$result) {
					$html .= '<h4 class="redhead">You have successfully <br/>ranked the centre!</h4>';	
					//count function					
					
					//$html .= $centre -> displayNewRanking();
										
				 //display the arrays in the 
				} else {
					$html .= '<h4>Sorry, something went wrong please contact us <a href="index.php?page=contact">here</a></h4>';
				}
				
			}		
		
		return $html;

	}
}

?>