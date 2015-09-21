<?php 

class home extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';
		
		$html .= '<div class="content">';			
		$html .= '<img src="images/toddlers1.jpg" class="left">';					
		$html .= '<h3>Top 10 in Wellington Region</h3>';

		$html .= '<ol class="olist">';
		$html .= '<li>Capital City Preschool</li>';
		$html .= '<li>Queen Margaret Preschool</li>';
		$html .= '<li>Johnsonville Childcare Centre</li>';
		$html .= '<li>St. Marks Preschool</li>';
		$html .= '<li>Johnsonville Kindergarten</li>';
		$html .= '<li>Play School Early Learning Centre</li>';
		$html .= '<li>I-Kids</li>';
		$html .= '<li>Little Wonders Childcare</li>';
		$html .= '<li>Elim International Kids</li>';
		$html .= '<li>Little School</li>';
		$html .= '</ol>';

		$html .= '</div>';		

		// Return HTML back to displayPage in viewClass
		return $html;
	}

	
	

}





?>