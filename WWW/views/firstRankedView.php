<?php 
	class first extends view {

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';

		$first = $this -> model -> getFirst();

		$html .= '<div class ="content">';
		$html .= '<h2>Ranked First in Wellington Region</h2>';
		$html .= '<div>';
		$html .= '<img src="images/ccp.jpg" class="left"><br/><br/>';
				
		//$html .= '<h3 class="center"><strong>Capital City Preschool</strong><br/> ';
		$html .= '<h3 class="center"><strong>'.$first['centreName'].'</strong><br/> ';
		$html .= 'A non-profit Preschool <br/> providing education and <br/>care for Preschool children <br/> ages 3-5 years, for over 18 years.</h3><br/><br/><br/><br/><br/><br/>';
		$html .= '</div>';
		$html .= '<div>';
		$html .= '<ul class="list left" >';
		$html .= '<li><strong><i>Capital City Preschool</i></strong></li>';
		$html .= '<li>'.$first['location'].'</li>';
		//$html .= '<li>Te Aro, Wellington</li>';					
		$html .= '<br/>';
		$html .= '<li>p '. $first['phone'] .'</li>';
		$html .= '<li>e <a href="mailto:'.$first['description'].'">preschool@capitalcitypreschool.co.nz</a></li>';
		$html .= '<li>w <a href="http://www.capitalcitypreschool.co.nz/">www.capitalcitypreschool.co.nz</a></li>';			
		$html .= '</ul>';
		$html .= '<img src="images/first.png">';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
		}
	}
?>