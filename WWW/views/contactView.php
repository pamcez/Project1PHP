<?php 

class contact extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';		

		$html .= '<div class="left">';
		$html .= '<div id="map-canvas"></div><br/>';
		$html .= '<ol class="list" >';
		$html .= '<h3>Contact Us</h3>';
		$html .= '<li>ChildCare NZ</li>';
		$html .= '<li>Thorndon, Wellington</li>';
		$html .= '<li>Email: <a href="mailto:childcare@email.co.nz">childcare@email.co.nz</li></a>';
		$html .= '<li>Phone: 0800 1234567</li>';
		$html .= '</ol><br/>';
		$html .= '</div>';

		//instantiate the form
		include('classes/formsClass.php');
		$form = new form($this -> model);

		if(!isset($_POST['contactSubmit'])) {
			//if the user has not yet submitted the form show the form
			$html .= $form -> contactForm();	
		} else {
			//run the validation function to check inputs
			$result = $this -> model -> validateContact();
			if($result) {
				//show form with result of form validation
				$html .= $form -> contactForm($result);
			} else {
				//if valid proceed processing the form
				$failed = $this -> model -> processContact();				
				 if(!$failed) {
				 	$html .= '<h3>Thanks, we will contact you <br/> as soon as possible.</h3>';
				 } else {
				 	$html .= '<p>Sorry, something went wrong - <br/>Please call us FREE 0800 1234567</a></p>';
				 }
			}
		}				
		
		$html .= '</div>';
		return $html;
	}
}
?>