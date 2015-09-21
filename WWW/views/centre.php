<?php 

class centre extends view {
	//delare properties
	private $centre;

	protected function displayContent() {
		// nl2br converts a new line character to an HTML break tag
		$html = '<p>' . ($this -> pageInfo['content']) . '</p>';

		$html .= '<div class="content">'."\n";
		$html .= '<h1 class="redhead title">Childcare NZ Directory</h1>'."\n";
		$html .= '<h2>Wellington Region</h2>'."\n";
		$html .= '<table>'."\n";
		$html .= '<tr>'."\n";
		$html .= '<th class="whitefont">Childcare Name</th>'."\n";
		$html .= '<th class="whitefont">Address</th>'."\n";
		$html .= '<th class="whitefont">Phone</th>'."\n";
		$html .= '<th class="whitefont">Email Address</th>'."\n";
		$html .= '</tr> '."\n";	

		$centres = $this -> model -> getCentres();
		
		if(is_array($centres)) {			
			//$html .= $this -> displayCentres($centres);			
			foreach ($centres as $centre) {							
				$html .= '<tr>'."\n";
				$html .= '<td>'.$centre['name'].'</td>'."\n";
				$html .= '<td>'.$centre['location'].'</td>'."\n";
				$html .= '<td>04 384 6560</td>'."\n";
				$html .= '<td><a href="mailto:'.$centre['description'].'">'.$centre['description'].'</a></td>'."\n";
				$html .= '</tr>'."\n";
			}

		} else {
			//error
			$html .= '<h1 class="redhead">404 NOT FOUND</h1>';
			$html .= '<h2>Error Document Not Found<br/> The requested resource could not be found <br/> but may be available again in the future. <br/> Subsequent requests by the client are permissible.';
			$html .= '</h2>';

		}

		$html .= '</table>';
		$html .= '</div>';
		return $html;
	}
}



?>