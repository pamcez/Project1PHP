<?php 

class sitemap extends view {
	protected function displayContent() {
		$html = '<p>' . nl2br($this -> pageInfo['content']) . '</p>';

		$html .= '<div class="content">';
		$html .= '<img src="images/toddlers1.jpg" class="left">';
		
		$html .= '<ul class="site" >';
		$html .= '<h3>Sitemap</h3>';

		$html .= '<li><a href="index.php?page=home"';
		$html .= ($this -> pageInfo['page'] == 'home') ? ' ' : '';
		$html .= '>Home</a></li>';

		$html .= '<li><a href="index.php?page=about"';
		$html .= ($this -> pageInfo['page'] == 'about') ? ' ' : '';
		$html .= '>About Us</a></li>';

		$html .= '<li><a href="index.php?page=directory"';
		$html .= ($this -> pageInfo['page'] == 'directory') ? ' ' : '';
		$html .= '>Childcare Directory</a></li>';

		$html .= '<li>Parents Access</li>';

		$html .= '<ul class="site">';
		$html .= '<li><a href="index.php?page=login"';
		$html .= ($this -> pageInfo['page'] == 'login') ? ' ' : '';
		$html .= '> >> Parents Login</a></li>';

		$html .= '<li><a href="index.php?page=sign"';
		$html .= ($this -> pageInfo['page'] == 'sign') ? ' ' : '';
		$html .= '> >> Parents Sign Up</a></li>';		
		$html .= '</ul>';

		$html .= '<li>Articles</a></li>';		
		$html .= '<ul class="site">';
		$html .= '<li><a href="index.php?page=articles"';
		$html .= ($this -> pageInfo['page'] == 'articles') ? ' ' : '';
		$html .= '> >>Article Page</a></li>';
		$html .= '</ul>';

		$html .= '<li><a href="index.php?page=first"';
		$html .= ($this -> pageInfo['page'] == 'first') ? ' ' : '';
		$html .= '>Ranked First</a></li>';

		$html .= '<li><a href="index.php?page=contact"';
		$html .= ($this -> pageInfo['page'] == 'contact') ? ' ' : '';
		$html .= '>Contact Us</a></li>';				
		$html .= '</ul>';
		$html .= '</div>';

		return $html;

	}


}


?>