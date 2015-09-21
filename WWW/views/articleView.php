<?php 

	class articles extends view {
		//delare properties

		protected function displayContent() {
			// nl2br converts a new line character to an HTML break tag
			$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

			$html .= '<div class="content">';
			$html .= '<h2 class="redhead title">Parenting Tips and Other Articles</h2>';
			$html .= '<img src="images/toddlers1.jpg" class="left">';
			$html .= '<ul class="list">';
			$html .= '<li><a href="">Information and Support</a></li>';
			$html .= '<li><a href="">Parenting Guides</a></li></a>';
			$html .= '<li><a href="">Summer/Holidays Childcare</li></a>';
			$html .= '<li><a href="">Holiday Programmes</li></a>';
			$html .= '<li><a href="">Settling in Tips</li></a>';
			$html .= '<li><a href="http://www.workingforfamilies.govt.nz/">Working for Families </li></a>';
			$html .= '<li><a href="">Ministry of Education</li></a>';
			$html .= '<li><a href="">Early Years Childhood </li></a>';
			$html .= '<li><a href="">Local Emergency Info</li></a>';
			$html .= '<li><a href="">Lunch Box Ideas</li></a>';
			$html .= '<li><a href="">Sleep</a> </li>';
			$html .= '</ul>';
	
			$html .= '<div class="center">';		
			$html .= '<ul class="list left">';
			$html .= '<h3>Information and Support</h3>';
			$html .= '<li>PlunketLine - Phone 0800 933 922</li>';
			$html .= '<li>Healthline - Phone 0800 611 116</li>';
			$html .= '<li>Emergency (fire, police, ambulance)- Cal 111</li>';
			$html .= '<li>Immunisation Advisory Centre - Phone 0800 466863</li>';
			$html .= '<li>Parent Help line - Phone 0800 568 856</li>';
			$html .= '</ul>';
			$html .= '<ul class="list"><br/>';
			$html .= '<h3>Parenting Guides</h3>';
			$html .= '<li><a href="http://www.webmd.com/parenting/guide/"> WebMD</a>  Information on health and support</li></a>';
			$html .= '<li><a href="http://www.kiwifamilies.co.nz/review-category/parenting-books/">Kiwi Families</a> Books about Parenting</li>';
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '</div>';
		
			return $html;	
		} 	

		


	}

?>