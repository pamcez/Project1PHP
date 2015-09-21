<?php 

class about extends view {

	protected function displayContent() {
		$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

		$html .= '<div class ="content">';
		$html .= '<h1 class="redhead title">ChildCare New Zealand</h1>';
		$html .= '<div class="center">';
		$html .= '<img src="images/bg1.jpg" >';
		$html .= '<h2>Lets provide a safe and better childcare in New Zealand </h2>';
		$html .= '<h3>ChildCare NZ is a non-profit organisation which helps parents make decisions <br/> by  providing unbiased, and honest ratings of Childcare Centres in  <br/>New Zealand,  through other parents first-hand experiences.</h3>';
		$html .= '</div>';
		$html .= '</div>';

		// Return HTML back to displayPage in viewClass
		return $html;
	} 
		
}





?>