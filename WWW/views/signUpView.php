<?php 
	class sign extends view {

		protected function displayContent() {
			$html = '<p>'. nl2br($this -> pageInfo['content']) .'</p>';

		$html = '<br/>';
 		$html.= '<img src="images/image1.png" class="left">'. "\n";
			//instantiate the form
			include('classes/formsClass.php');
			$form = new form($this -> model);

			if(!isset($_POST['join'])) {
				//call sign up form in the form class
				$html .= $form -> signUpForm();	
				$html .= '<p>If you have an existing account, <a href="index.php?page=login"';
				$html .= ($this -> pageInfo['page'] == 'login') ? '' : '';
				$html .= '> LOGIN</a> here</p>' . "\n";
			} else {
				//run the validation function
				$result = $this -> model -> validateSignUp();
				if($result) {
					$html .= $form -> signUpForm($result, 'add');	
				} else {
					//add new user
				 	$fail = $this -> model -> processSignUp();
				 	if($fail) {
				 		$html .= '<p>Sorry, something went wrong please contact us <a href="index.php?page=contact">here</a></p>';
				 	} else {				 		
				 		$html .='<h3>Thanks for joining us!</h3>';
				 	}
				}
			}
			//if the user has not yet submitted the form show the form				

			$html .= '</form>';
			$html .= '</div>';
			// Return HTML back to displayPage in viewClass
			return $html;

		}

	}

?>

