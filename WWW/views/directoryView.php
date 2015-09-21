<?php 

class childcareDirectory extends view {
	//delare properties

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

		$html = '<div class="content">';
		$html .= '<h1 class="redhead title">Childcare NZ</h1>';
		$html .= '<h2>By Regions</h2>';
		$html .= '<ul class="list">';
		$html .= '<img src="images/regions.png" class="left">';			
		$html .= '<div class="left">';	
		$html .= '<h3>North Island</h3>';
		
		$html .= '<li>Northland</li>';
		$html .= '<li>Auckland</li>';
				//wellington
		$html .= '<li><a href="index.php?page=centre"';
		$html .= ($this -> pageInfo['page'] == 'centre') ? '' : '';	
		$html .= '>Wellington</a></li><br/>'. "\n";

		$html .= '<li>Coromandel</li>';
		$html .= '<li>Bay of Plenty</li>';
		$html .= '<li>Waikato</li>';
		$html .= '<li>Rotorua</li>';
		$html .= '<li>Eastland</li>';
		$html .= '<li>Taupo</li>';
		$html .= '<li>Ruapehu</li>';
		$html .= '<li>Taranaki</li>';
		$html .= '<li>Hawkes Bay</li>';
		$html .= '<li>Wanganui</li>';
		$html .= '<li>Manawatu</li>';
		$html .= '<li>Wairarapa</li><br/>';

		$html .= '</div>';


		$html .= '<div><br/>'; 
		$html .= '<h3>South Island</h3>';

		$html .= '<li>Nelson</li>';
		$html .= '<li>Marlborough</li>';
		$html .= '<li>West Coast</li>';
		$html .= '<li>Christchurch</li>';
		$html .= '<li>Canterbury</li>';
		$html .= '<li>Mt Cook</li>';
		$html .= '<li>Wanaka</li>';
		$html .= '<li>Queenstown</li>';
		$html .= '<li>Otago</li>';
		$html .= '<li>Dunedin</li>';
		$html .= '<li>Fiordland</li>';
		$html .= '<li>Southland</li>';
		$html .= '</div>';
		$html .= '</ul>';
			
		$html .= '<div>';


		// Return HTML back to displayPage in viewClass
		return $html;	
	} 	

	


}

	








?>