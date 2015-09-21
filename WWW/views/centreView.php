<?php 

class centreView extends view {
	//delare properties
	private $centres;

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

		//instantiate the form
		include('classes/centreClass.php');
		$centre = new centre($this -> model);

		$html = '<div class="content">'."\n";
		$html .= '<h1 class="redhead title">Childcare NZ Directory</h1>'."\n";
		//if the user has not yet submitted the form show the form
		$html .= $centre -> displayCentres();

		return $html;
	}

	
}




?>